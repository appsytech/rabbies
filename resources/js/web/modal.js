/*=======================================================
  Opens a modal by removing the "hidden" class from the 
  element with the given ID
======================================================== */
function openModal(modalBtnId) {
    const modal = document.getElementById(`${modalBtnId}`);
    modal.classList.remove("hidden");
}

/*=====================================================
  Close a modal by adding the "hidden" class in the 
  element with the given ID
======================================================== */
function closeModal(modalBtnId) {
    const modal = document.getElementById(`${modalBtnId}`);
    modal.classList.add("hidden");
}

export { openModal, closeModal };
