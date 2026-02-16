/* ============================================================
Prints a single row from a table in a new print-friendly window.
==============================================================*/
function printRow(event) {
    const button = event.target;
    const row = button.closest("tr");
    const clonedRow = row.cloneNode(true);
    const lastCell = clonedRow.querySelector("td:last-child");
    if (lastCell) {
        lastCell.remove();
    }

    const printWindow = window.open("", "", "width=800,height=600");
    const table = document.createElement("table");
    table.style.width = "100%";
    table.style.borderCollapse = "collapse";
    table.appendChild(clonedRow);
    const style = document.createElement("style");
    style.textContent = `
    table { width: 100%; border-collapse: collapse; }
    td, th { border: 1px solid #000; padding: 8px; text-align: left; }`;
    printWindow.document.head.appendChild(style);
    printWindow.document.body.appendChild(table);
    printWindow.focus();
    printWindow.print();
    printWindow.close();
}

function togglePasswordSection(roleValue) {
    const password = document.getElementById("password");
    const confirmPassword = document.getElementById("password_confirmation");
    const passWordSections = document.querySelectorAll(".password-section");

    const isTeacher = roleValue === "4" || roleValue == "5";

    passWordSections.forEach((section) => {
        section.style.display = isTeacher ? "none" : "block";
    });

    password.toggleAttribute("required", !isTeacher);
    confirmPassword.toggleAttribute("required", !isTeacher);

    if (isTeacher) {
        password.value = "";
        confirmPassword.value = "";
    }
}

/* =====================================
Handles alert dismissal behavior..
========================================*/
function handleAlertAutoDismiss() {
    const alerts = document.querySelectorAll(".alert");
    alerts.forEach((alert) => {
        const timeout = 5000;

        setTimeout(() => {
            alert.classList.add("opacity-0", "translate-x-2");
            setTimeout(() => alert.remove(), 300);
        }, timeout);

        alert.querySelector(".close-alert")?.addEventListener("click", () => {
            alert.classList.add("opacity-0", "translate-x-2");
            setTimeout(() => alert.remove(), 300);
        });
    });
}

/* =====================================================
Sends an AJAX request to toggle the status of a record.
=======================================================*/
function updateStatus(target) {
    const targetUrl = target.getAttribute("data-targetUrl");
    const targetId = target.getAttribute("data-targetId");
    const csrf = target.getAttribute("data-csrf");

    const formData = new FormData();
    formData.append("id", targetId);

    fetch(targetUrl, {
        method: "POST",
        headers: {
            "X-CSRF-TOKEN": csrf,
        },
        body: formData,
    });
    // .then((response) => response.json())
    // .then((data) => {
    //     console.log(data);
    // })
    // .catch((error) => {
    //     console.error(error);
    // });
}

/* ============================================
 Creates and displays a reusable success/error.
==============================================*/
function showAlert(type, message, duration = 5000) {
    const alertContainer = document.getElementById("popup-container");

    const alertId =
        "alert-" + Date.now() + "-" + Math.floor(Math.random() * 1000);
    const alertDiv = document.createElement("div");
    alertDiv.id = alertId;
    alertDiv.className = `alert flex items-center gap-2 whitespace-nowrap rounded-md text-sm font-medium
        ring-offset-background transition-all duration-500 ease-out focus-visible:outline-none
        focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 justify-start
        h-auto p-4 z-50`;

    if (type === "success") {
        alertDiv.classList.add("bg-green-500", "text-white");
        alertDiv.innerHTML = `
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-circle-check-big w-5 h-5 text-success">
                    <path d="M21.801 10A10 10 0 1 1 17 3.335"></path>
                    <path d="m9 11 3 3L22 4"></path>
                </svg>
                <div class="text-left">
                    <div class="font-medium text-foreground">Success!</div>
                    <div class="text-sm text-muted-foreground">${message}</div>
                </div>
            </div>
        `;
    } else {
        alertDiv.classList.add("bg-red-500", "text-white");
        alertDiv.innerHTML = `
            <div class="flex items-center space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     class="lucide lucide-circle-alert w-5 h-5">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" x2="12" y1="8" y2="12"></line>
                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                </svg>
                <div class="text-left">
                    <div class="font-medium text-foreground">Error occurred</div>
                    <div class="text-sm text-muted-foreground">${message}</div>
                </div>
            </div>
        `;
    }

    alertContainer.appendChild(alertDiv);

    alertDiv.style.transform = "translateY(-20px)";
    alertDiv.style.opacity = "0";
    requestAnimationFrame(() => {
        alertDiv.style.transition = "all 0.5s ease-out";
        alertDiv.style.transform = "translateY(0)";
        alertDiv.style.opacity = "1";
    });

    setTimeout(() => {
        alertDiv.style.transform = "translateY(-20px)";
        alertDiv.style.opacity = "0";
        alertDiv.addEventListener("transitionend", () => {
            alertDiv.remove();
        });
    }, duration);
}

/* ============================================
 Handles AJAX form submission.
==============================================*/
function handleAjaxForm(event) {
    event.preventDefault();
    const form = event.target;
    const submitButton = form.querySelector('button[type="submit"]');
    const originalText = submitButton.innerHTML;
    const reloadOnSucces = form.classList.contains("reload-on-success");

    submitButton.disabled = true;
    submitButton.innerText = "Processing...";

    const formData = new FormData(form);

    fetch(form.action, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.status) {
                if (reloadOnSucces) {
                    sessionStorage.setItem(
                        "success_messages",
                        JSON.stringify(data.messages),
                    );

                    window.location.reload();
                }
                form.reset();
            } else {
                data.errors.forEach((message) => {
                    showAlert("error", message);
                });
            }
        })
        .catch((error) => {
            console.error("Error:", error);
        })
        .finally(() => {
            submitButton.innerHTML = originalText;
            submitButton.disabled = false;
        });
}

// function

export {
    printRow,
    handleAlertAutoDismiss,
    updateStatus,
    handleAjaxForm,
    showAlert,
    togglePasswordSection,
};
