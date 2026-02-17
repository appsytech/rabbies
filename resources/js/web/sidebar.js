/*=======================================================
  Toggles the sidebar visibility by adding/removing the
   "-translate-x-full" class
========================================================== */
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("-translate-x-full");
}

/*================================================================
 Toggles a submenu's visibility and rotates its icon when clicked
================================================================== */
function toggleSubmenu(id) {
    const submenu = document.getElementById(id + "-submenu");
    const icon = document.getElementById(id + "-icon");
    submenu.classList.toggle("hidden");
    icon.classList.toggle("rotate-90");
}

export { toggleSidebar, toggleSubmenu };
