// Logout Confirmation (optional)
document.addEventListener("DOMContentLoaded", function () {
  const logoutBtn = document.getElementById("js-logout-trigger");

  if (logoutBtn) {
    logoutBtn.addEventListener("click", function (e) {
      // Optional: Add confirmation dialog
      const confirmLogout = confirm("Are you sure you want to logout?");

      if (!confirmLogout) {
        e.preventDefault(); // Cancel logout if user clicks "Cancel"
      }
    });
  }
});
