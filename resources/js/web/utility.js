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
    const originalText = submitButton.innerText;

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
                form.reset();

                data.messages.forEach((message) => {
                    showAlert("success", message);
                });
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
            submitButton.innerText = originalText;
            submitButton.disabled = false;
        });
}

function togglePasswordField(target) {
    const targetFieldId = event.target.getAttribute("data-targetId");
    const targetField = document.getElementById(`${targetFieldId}`);

    if (!targetField) return;
    const icon = target.querySelector(".toggle-password-icon");
    const isPassword = targetField.type === "password";
    targetField.type = isPassword ? "text" : "password";

    if (icon) {
        icon.src = isPassword ? target.dataset.eyeoff : target.dataset.eye;
    }
}

function loadMoreData(
    containerSelector,
    loadMoreBtn,
    customMessageFieldSelector,
    perPage = 3,
    callback = null,
) {
    const container = document.querySelector(containerSelector);
    const btn = loadMoreBtn;

    if (!container || !btn) return;

    if (!btn.dataset.offset) btn.dataset.offset = 0;
    btn.dataset.limit = perPage;

    const url = btn.dataset.targeturl;

    const customMessageField = document.querySelector(
        customMessageFieldSelector,
    );

    customMessageField ? (customMessageField.innerHTML = "") : "";
    const offset = parseInt(btn.dataset.offset);
    const limit = parseInt(btn.dataset.limit);

    btn.disabled = true;
    const originalHtml = btn.innerHTML;
    btn.textContent = "Loading...";

    fetch(`${url}?offset=${offset}&limit=${limit}`, {
        headers: {
            "X-Requested-With": "XMLHttpRequest",
        },
    })
        .then((res) => res.json())
        .then((data) => {
            if (!data.html.trim() || data.count < 3) {
                if (customMessageField) {
                    const badge = document.createElement("span");
                    badge.textContent = "All data has been displayed";
                    badge.className =
                        "inline-block bg-blue-200 text-blue-700 px-3 py-1 rounded-full mt-3";
                    customMessageField.appendChild(badge);
                }

                btn.style.display = "none";
            }

            if (data.count > 0) {
                container.insertAdjacentHTML("beforeend", data.html);
                btn.dataset.offset = offset + limit;
                if (callback) callback();
            }
        })
        .catch((err) => console.error(err))
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = originalHtml;
        });
}

export {
    handleAlertAutoDismiss,
    handleAjaxForm,
    togglePasswordField,
    loadMoreData,
};
