// Mobile menu toggle
const mobileToggle = document.getElementById("mobile-menu-toggle");
const sidebar = document.getElementById("sidebar");

if (mobileToggle) {
  mobileToggle.addEventListener("click", function () {
    sidebar.classList.toggle("mobile-open");
  });
}

// Search functionality
const searchInput = document.getElementById("inventory-search");
if (searchInput) {
  searchInput.addEventListener("input", function (e) {
    const searchTerm = e.target.value.toLowerCase();
    const rows = document.querySelectorAll(".inventory-row");
    const noResults = document.getElementById("inventory-no-results");
    let visibleCount = 0;

    rows.forEach((row) => {
      const text = row.textContent.toLowerCase();
      if (text.includes(searchTerm)) {
        row.style.display = "";
        visibleCount++;
      } else {
        row.style.display = "none";
      }
    });

    if (noResults) {
      noResults.style.display = visibleCount === 0 ? "block" : "none";
    }
  });
}

// Update item buttons
document.querySelectorAll(".js-update-item").forEach((button) => {
  button.addEventListener("click", function () {
    const id = this.dataset.id;
    const name = this.dataset.name;
    const description = this.dataset.description;
    const price = this.dataset.price;
    const quantity = this.dataset.quantity;

    // Fill the modal form
    document.getElementById("update-item-id").value = id;
    document.getElementById("update-item-id-display").value = id;
    document.getElementById("update-item-name").value = name;
    document.getElementById("update-item-description").value = description;
    document.getElementById("update-item-price").value = price;
    document.getElementById("update-item-quantity").value = quantity;

    // Show modal
    const updateModal = document.getElementById("update-item-modal");
    updateModal.classList.add("active");
    updateModal.setAttribute("aria-hidden", "false");
  });
});

// Update modal cancel button
document
  .getElementById("js-update-item-cancel")
  ?.addEventListener("click", function () {
    const updateModal = document.getElementById("update-item-modal");
    updateModal.classList.remove("active");
    updateModal.setAttribute("aria-hidden", "true");
  });

// Close update modal when clicking outside
document
  .getElementById("update-item-modal")
  ?.addEventListener("click", function (e) {
    if (e.target === this) {
      this.classList.remove("active");
      this.setAttribute("aria-hidden", "true");
    }
  });

// Delete item buttons
document.querySelectorAll(".js-delete-item").forEach((button) => {
  button.addEventListener("click", function () {
    const id = this.dataset.id;
    const name = this.dataset.name;
    const description = this.dataset.description;
    const price = this.dataset.price;
    const quantity = this.dataset.quantity;

    // Fill the modal with product info
    document.getElementById("delete-item-id").value = id;
    document.getElementById("delete-display-id").textContent = id;
    document.getElementById("delete-display-name").textContent = name;
    document.getElementById("delete-display-description").textContent =
      description;
    document.getElementById("delete-display-price").textContent =
      parseFloat(price).toFixed(2);
    document.getElementById("delete-display-quantity").textContent = quantity;

    // Show modal
    const deleteModal = document.getElementById("delete-confirm-modal");
    deleteModal.classList.add("active");
    deleteModal.setAttribute("aria-hidden", "false");
  });
});

// Delete modal cancel button
document
  .getElementById("js-delete-cancel")
  ?.addEventListener("click", function () {
    const deleteModal = document.getElementById("delete-confirm-modal");
    deleteModal.classList.remove("active");
    deleteModal.setAttribute("aria-hidden", "true");
  });

// Close delete modal when clicking outside
document
  .getElementById("delete-confirm-modal")
  ?.addEventListener("click", function (e) {
    if (e.target === this) {
      this.classList.remove("active");
      this.setAttribute("aria-hidden", "true");
    }
  });
