/**
 * ---------------------------------------------------------------------
 * Core Events Manager
 * ---------------------------------------------------------------------
 * This file is responsible for registering all global UI events
 * used throughout the application.
 * ---------------------------------------------------------------------
 */

/* =======================
   Module Imports
========================== */
import { handleAjaxInput } from "./ajax";
import {
    calculateInvestment,
    calculateRemaining,
    calculateSalary,
} from "./calculation";
import { changeMediaType, playVideo } from "./media";
import { closeModal, handleMediaUpload, openModal } from "./modal";
import { handleMenuClick, markActiveMenu, toggleSidebar } from "./sidebar";
import { toggleTabs } from "./tab";
import {
    handleAjaxForm,
    handleAlertAutoDismiss,
    printRow,
    showAlert,
    togglePasswordSection,
    updateStatus,
} from "./utility";

document.addEventListener("DOMContentLoaded", () => {
    //hide preloader once the page is ready
    let preloader = document.getElementById("loader");
    if (preloader) {
        preloader.classList.add("hidden");
    }

    //if succes message exists show them
    const messages = sessionStorage.getItem("success_messages");
    if (messages) {
        JSON.parse(messages).forEach((message) => {
            showAlert("success", message);
        });

        sessionStorage.removeItem("success_messages");
    }
});

/* ============================================================
  Global Click Events.
=============================================================== */
document.addEventListener("click", function (event) {
    // Toggle sidebar visibility
    if (event.target.classList.contains("toggle-sidebar")) {
        toggleSidebar();
    }

    // Handle sidebar submenu toggle
    if (event.target.classList.contains("has-submenu")) {
        handleMenuClick(event.target.id);
    }

    // Open modal window
    if (event.target.classList.contains("open-modal")) {
        openModal(event.target.getAttribute("data-targetModalId"));
    }

    // Close modal window
    if (event.target.classList.contains("close-modal")) {
        closeModal(event.target.getAttribute("data-targetModalId"));
    }

    // Handle tab switching
    if (event.target.classList.contains("tab-button")) {
        toggleTabs(event);
    }

    // handle table row data printing
    if (event.target.classList.contains("print-btn")) {
        printRow(event);
    }

    if (event.target.classList.contains("toggle-video")) {
        playVideo(event.target);
    }
});

document.addEventListener("change", function (event) {
    if (event.target.classList.contains("image-upload&preview")) {
        handleMediaUpload(event.target);
    }

    if (event.target.classList.contains("status-toggle")) {
        updateStatus(event.target);
    }

    if (event.target.classList.contains("change-media-type")) {
        changeMediaType(event.target);
    }

    if (event.target.classList.contains("toggle-password-section")) {
        togglePasswordSection(event.target.value);
    }
});

document.addEventListener("input", function (event) {
    if (event.target.classList.contains("calculate-salary")) {
        calculateSalary();
    }

    if (event.target.classList.contains("calculate-investment")) {
        calculateInvestment();
    }

    if (event.target.classList.contains("calculate-remaining")) {
        calculateRemaining();
    }

    if (event.target.classList.contains("ajax-input")) {
        handleAjaxInput(event.target);
    }
});

document.addEventListener("submit", function (event) {
    if (event.target.classList.contains("ajax-form")) {
        handleAjaxForm(event);
    }
});

// Highlight active sidebar menu item on page load
markActiveMenu();

// Hide alert box automatically
handleAlertAutoDismiss();
