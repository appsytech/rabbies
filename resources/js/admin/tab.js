/**
 * ---------------------------------------------------------------------
 * Tab Controller
 * ---------------------------------------------------------------------
 * This module handles all tab-related interactions including:
 * - Switching between tab contents
 * - Parent and child tab synchronization
 * - UI state reset for active/inactive tabs
 * ---------------------------------------------------------------------
 */

/* ================================
   Handles tab switching logic.
=================================== */
function toggleTabs(event) {
  const target = event.target;

  let tabContentId = target.getAttribute("data-targetId");

  const tabButtons = document.querySelectorAll(".tab-button");
  const tabContents = document.querySelectorAll(".tab-content");
  const parentTabButtons = document.querySelectorAll(".parent-tab-button");

  resetTabButtons(tabButtons);
  hideAllTabContents(tabContents);
  resetParentTabs(parentTabButtons);

  if (isParentTab(target)) {
    activateParentTab(target);
  } else {
    handleChildOrNormalTab(target, parentTabButtons);
    tabContentId = resolveParentTabContent(target, tabContentId);
  }

  showTabContent(tabContentId);
}

/* ================= Helper Functions ================= */

/* =======================================
Removes active styles from all tab buttons.
========================================== */
function resetTabButtons(buttons) {
  buttons.forEach((btn) => btn.classList.remove("bg-blue-100", "text-black"));
}

/* =======================================
Hides all tab content sections.
========================================== */
function hideAllTabContents(contents) {
  contents.forEach((content) => content.classList.add("hidden"));
}

/* =============================================
Resets parent tab buttons to their default state.
=============================================== */
function resetParentTabs(parentTabs) {
  parentTabs.forEach((btn) => {
    btn.classList.remove("bg-blue-600");
    btn.classList.add("bg-blue-500", "text-white");
  });
}

/* ===============================================
Determines whether the clicked tab is a parent tab.
================================================= */
function isParentTab(target) {
  return target.classList.contains("parent-tab-button");
}

/* ===============================================
Activates a parent tab visually.
================================================= */
function activateParentTab(target) {
  target.classList.add("bg-blue-600", "text-white");
  target.classList.remove("bg-blue-100", "text-blue-700");
}

/* ===============================================
Handles normal and child tab activation logic.
================================================= */
function handleChildOrNormalTab(target) {
  target.classList.add("bg-blue-100", "text-black");

  if (target.hasAttribute("data-parentTabBtnId")) {
    const parentBtnId = target.getAttribute("data-parentTabBtnId");
    document
      .getElementById(parentBtnId)
      .classList.add("bg-blue-100", "text-black");
  }

  if (target.classList.contains("add-slide-btn")) {
    setupCancelSlideButton(target);
  }
  if (target.classList.contains("edit-slide-btn")) {
    setupCancelSlideButton(target, "edit");
  }
}

/* =================================================================================
Resolves the correct tab content ID when dealing with parent-child tab relationships.
================================================================================== */
function resolveParentTabContent(target, tabContentId) {
  if (
    target.classList.contains("tab-button") &&
    target.classList.contains("has-parent-tab")
  ) {
    const parentTabId = target.getAttribute("data-parentTabId");

    document
      .querySelector(`[data-targetId="${parentTabId}"]`)
      .classList.add("bg-blue-100", "text-black");

    return parentTabId;
  }

  return tabContentId;
}

/* =====================================================
Configures cancel button behavior for slide actions.
=========================================================*/
function setupCancelSlideButton(target, cancelBtnFor = "add") {
  let cancelBtn = document.querySelector(".cancel-slide-addition");

  if (cancelBtnFor != "add") {
    cancelBtn = document.querySelector(".cancel-slide-edition");
  }

  cancelBtn.classList.add("has-parent-tab");
  cancelBtn.setAttribute(
    "data-parentTabId",
    target.getAttribute("data-parentTabId")
  );
}

/* =====================================================
Displays the requested tab content.
=========================================================*/
function showTabContent(tabContentId) {
  document.getElementById(tabContentId).classList.remove("hidden");
}

export { toggleTabs };
