function toggleTab(target) {
    const targetTabId = target.getAttribute("data-targetTabId");
    if (!targetTabId) return;
    const targetTab = document.querySelector(`#${targetTabId}`);
    if (!targetTab) return;

    resetAllTabs();

    if (target.classList.contains("filter-btn")) {
        // target.classList.remove("bg-gray-200", "text-gray-700");
        target.classList.remove( "text-gray-700");
        target.classList.add("bg-blue-600", "text-white");
    }

    targetTab.classList.remove("hidden");
}

function resetAllTabs() {
    const tabButtons = document.querySelectorAll(".tab-btn");
    const tabContents = document.querySelectorAll(".tab-content");

    tabButtons.forEach(function (button) {
        if (button.classList.contains("filter-btn")) {
            button.classList.remove("bg-blue-600", "text-white");
            // button.classList.add("bg-gray-200", "text-gray-700");
            button.classList.add("text-gray-700");
        }
    });

    tabContents.forEach((content) => {
        content.classList.add("hidden");
    });
}


export {toggleTab}