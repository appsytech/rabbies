import { calculateInvestment } from "./calculation";
import { showAlert } from "./utility";

function handleAjaxInput(target) {
    const element = target;
    const value = element.value;
    const url = element.dataset.target;
    const column = element.dataset.column;
    const minLength = parseInt(element.dataset.minLength || 0, 10);
    const csrf = element.dataset.csrf;

    const fillMap = element.dataset.fill
        ? JSON.parse(element.dataset.fill)
        : {};

    if (!value) return;

    if (element.tagName.toLowerCase() !== "select") {
        if (value.trim().length < minLength) {
            resetTargetedInputs();
            if (element.classList.contains("calculate-investment")) {
                calculateInvestment();
            }
            return;
        }
    } else {
        resetTargetedInputs();

        if (element.classList.contains("calculate-investment")) {
            calculateInvestment();
        }
    }

    const formData = new FormData();
    formData.append(column, value);
    formData.append("_token", csrf);

    fetch(url, {
        method: "POST",
        body: formData,
    })
        .then((response) => response.json())
        .then((response) => {
            if (response.status || response.data) {
                Object.keys(fillMap).forEach((responseKey) => {
                    const targetId = fillMap[responseKey];
                    const targetElement = document.getElementById(targetId);

                    if (
                        !targetElement ||
                        response.data[responseKey] === undefined
                    ) {
                        return;
                    }

                    const dataArray = response.data[responseKey];

                    // Clear existing options if select
                    if (targetElement.tagName.toLowerCase() === "select") {
                        targetElement.innerHTML =
                            '<option value="" selected>--select--</option>';

                        // Populate new options from array
                        if (Array.isArray(dataArray)) {
                            dataArray.forEach((item) => {
                                const option = document.createElement("option");
                                option.value = item.id; // assuming id as value
                                option.textContent = item.full_name; // display name
                                targetElement.appendChild(option);
                            });
                        }
                    } else {
                        // For normal inputs, just set value (optional)
                        targetElement.value = dataArray;
                    }
                });
            } else {
                response.errors?.forEach((error) => {
                    showAlert("error", error);
                });

                resetTargetedInputs();
            }
            if (element.classList.contains("calculate-investment")) {
                calculateInvestment();
            }
        })
        .catch((error) => {
            console.error("Ajax error:", error);
            resetTargetedInputs();
            if (element.classList.contains("calculate-investment")) {
                calculateInvestment();
            }
        });

    function resetTargetedInputs() {
        Object.keys(fillMap).forEach((responseKey) => {
            const targetId = fillMap[responseKey];
            const targetElement = document.getElementById(targetId);
            targetElement.value = 0;
        });
    }
}

export { handleAjaxInput };
