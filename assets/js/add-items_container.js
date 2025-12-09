// ========================================
// DOM ELEMENT REFERENCES
// ========================================

// Modals
const addItemModal = document.getElementById("add-item-modal");
const updateItemModal = document.getElementById("update-item-modal");

// Trigger Buttons
const addItemsTrigger = document.getElementById("js-add-items-trigger");
const updateItemsTrigger = document.getElementById("js-update-items-trigger");

// Forms
const addItemForm = document.getElementById("add-item-form");
const updateItemForm = document.getElementById("update-item-form");

// Form Buttons
const addItemSubmit = document.getElementById("js-add-item-submit");
const addItemCancel = document.getElementById("js-add-item-cancel");
const updateItemSubmit = document.getElementById("js-update-item-submit");
const updateItemCancel = document.getElementById("js-update-item-cancel");

// Table Elements
const inventoryTableBody = document.querySelector(".inventory-table-body");
const inventorySearch = document.getElementById("inventory-search");
const inventoryNoResults = document.getElementById("inventory-no-results");

// ========================================
// MODAL FUNCTIONS
// ========================================

/**
 * Opens a modal by setting aria-hidden to false
 * @param {HTMLElement} modal - The modal element to open
 */
function openModal(modal) {
  modal.setAttribute("aria-hidden", "false");
}

/**
 * Closes a modal by setting aria-hidden to true
 * @param {HTMLElement} modal - The modal element to close
 */
function closeModal(modal) {
  modal.setAttribute("aria-hidden", "true");
}

/**
 * Resets a form and closes its associated modal
 * @param {HTMLFormElement} form - The form to reset
 * @param {HTMLElement} modal - The modal to close
 */
function resetFormAndCloseModal(form, modal) {
  form.reset();
  closeModal(modal);
}

// ========================================
// EVENT LISTENERS - ADD ITEM MODAL
// ========================================

// Open add item modal
addItemsTrigger.addEventListener("click", (e) => {
  e.preventDefault();
  openModal(addItemModal);
});

// Close add item modal (Cancel button)
addItemCancel.addEventListener("click", (e) => {
  e.preventDefault();
  resetFormAndCloseModal(addItemForm, addItemModal);
});

// Close add item modal when clicking outside
addItemModal.addEventListener("click", (e) => {
  if (e.target === addItemModal) {
    resetFormAndCloseModal(addItemForm, addItemModal);
  }
});

// ========================================
// EVENT LISTENERS - UPDATE ITEM MODAL
// ========================================

// Open update item modal
// Note: You'll need to attach this to specific update buttons in each table row
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("js-update-item")) {
    e.preventDefault();
    const itemId = e.target.dataset.itemId;
    populateUpdateForm(itemId);
    openModal(updateItemModal);
  }
});

// Close update item modal (Cancel button)
updateItemCancel.addEventListener("click", (e) => {
  e.preventDefault();
  resetFormAndCloseModal(updateItemForm, updateItemModal);
});

// Close update item modal when clicking outside
updateItemModal.addEventListener("click", (e) => {
  if (e.target === updateItemModal) {
    resetFormAndCloseModal(updateItemForm, updateItemModal);
  }
});

// ========================================
// ADD ITEM FUNCTIONALITY
// ========================================

/**
 * Generates a unique item ID based on current table rows
 * @returns {string} - Formatted item ID (e.g., "0004")
 */
function generateItemId() {
  const currentRows = inventoryTableBody.querySelectorAll(".inventory-row");
  const nextId = currentRows.length + 1;
  return String(nextId).padStart(7, "0");
}

/**
 * Creates a new table row element for an inventory item
 * @param {string} itemId - The item ID
 * @param {string} itemName - The item name
 * @param {string} itemDescription - The item description
 * @param {string} itemQuantity - The item quantity
 * @returns {HTMLTableRowElement} - The created row element
 */
function createInventoryRow(itemId, itemName, itemDescription, itemQuantity) {
  const newRow = document.createElement("tr");
  newRow.classList.add("inventory-row");
  newRow.dataset.itemId = itemId;

  newRow.innerHTML = `
    <td class="inventory-cell inventory-cell--id">${itemId}</td>
    <td class="inventory-cell inventory-cell--name">${itemName}</td>
    <td class="inventory-cell inventory-cell--description">${itemDescription}</td>
    <td class="inventory-cell inventory-cell--quantity">${itemQuantity}</td>
    <td class="inventory-cell inventory-cell--actions">
      <button class="button button--action js-update-item" data-item-id="${itemId}">Update</button>
      <button class="button button--danger js-delete-item" data-item-id="${itemId}">Delete</button>
    </td>
  `;

  return newRow;
}

// Handle add item form submission
addItemForm.addEventListener("submit", (e) => {
  e.preventDefault();

  // Get form values
  const itemName = document.getElementById("add-item-name").value;
  const itemDescription = document.getElementById("add-item-description").value;
  const itemQuantity = document.getElementById("add-item-quantity").value;

  // Generate item ID
  const itemId = generateItemId();

  // Create and append new row
  const newRow = createInventoryRow(
    itemId,
    itemName,
    itemDescription,
    `${itemQuantity} pcs`
  );
  inventoryTableBody.appendChild(newRow);

  // Reset form and close modal
  resetFormAndCloseModal(addItemForm, addItemModal);

  // Show success message (optional)
  console.log("Item added successfully:", {
    itemId,
    itemName,
    itemDescription,
    itemQuantity,
  });
});

// ========================================
// UPDATE ITEM FUNCTIONALITY
// ========================================

/**
 * Populates the update form with existing item data
 * @param {string} itemId - The ID of the item to update
 */
function populateUpdateForm(itemId) {
  const row = document.querySelector(
    `.inventory-row[data-item-id="${itemId}"]`
  );

  if (!row) {
    console.error("Item not found:", itemId);
    return;
  }

  // Get cell values
  const cells = row.querySelectorAll(".inventory-cell");
  const id = cells[0].textContent;
  const name = cells[1].textContent;
  const description = cells[2].textContent;
  const quantity = cells[3].textContent.replace(" pcs", "");

  // Populate form fields
  document.getElementById("update-item-id").value = id;
  document.getElementById("update-item-name").value = name;
  document.getElementById("update-item-description").value = description;
  document.getElementById("update-item-quantity").value = quantity;
}

/**
 * Updates an existing inventory row with new data
 * @param {string} itemId - The ID of the item to update
 * @param {string} itemName - Updated item name
 * @param {string} itemDescription - Updated item description
 * @param {string} itemQuantity - Updated item quantity
 */
function updateInventoryRow(itemId, itemName, itemDescription, itemQuantity) {
  const row = document.querySelector(
    `.inventory-row[data-item-id="${itemId}"]`
  );

  if (!row) {
    console.error("Item not found:", itemId);
    return;
  }

  // Update cell values
  const cells = row.querySelectorAll(".inventory-cell");
  cells[1].textContent = itemName;
  cells[2].textContent = itemDescription;
  cells[3].textContent = `${itemQuantity} pcs`;
}

// Handle update item form submission
updateItemForm.addEventListener("submit", (e) => {
  e.preventDefault();

  // Get form values
  const itemId = document.getElementById("update-item-id").value;
  const itemName = document.getElementById("update-item-name").value;
  const itemDescription = document.getElementById(
    "update-item-description"
  ).value;
  const itemQuantity = document.getElementById("update-item-quantity").value;

  // Update the row
  updateInventoryRow(itemId, itemName, itemDescription, itemQuantity);

  // Reset form and close modal
  resetFormAndCloseModal(updateItemForm, updateItemModal);

  // Show success message (optional)
  console.log("Item updated successfully:", {
    itemId,
    itemName,
    itemDescription,
    itemQuantity,
  });
});

// ========================================
// DELETE ITEM FUNCTIONALITY
// ========================================

/**
 * Deletes an inventory item row
 * @param {string} itemId - The ID of the item to delete
 */
function deleteInventoryRow(itemId) {
  const row = document.querySelector(
    `.inventory-row[data-item-id="${itemId}"]`
  );

  if (!row) {
    console.error("Item not found:", itemId);
    return;
  }

  // Confirm deletion
  const itemName = row.querySelector(".inventory-cell--name").textContent;
  const confirmed = confirm(`Are you sure you want to delete "${itemName}"?`);

  if (confirmed) {
    row.remove();
    console.log("Item deleted successfully:", itemId);
  }
}

// Handle delete button clicks
document.addEventListener("click", (e) => {
  if (e.target.classList.contains("js-delete-item")) {
    e.preventDefault();
    const itemId = e.target.dataset.itemId;
    deleteInventoryRow(itemId);
  }
});

// ========================================
// SEARCH FUNCTIONALITY
// ========================================

/**
 * Filters inventory table rows based on search term
 * @param {string} searchTerm - The search query
 */
function filterInventoryTable(searchTerm) {
  const rows = inventoryTableBody.querySelectorAll(".inventory-row");
  const normalizedSearch = searchTerm.toLowerCase().trim();
  let visibleCount = 0;

  rows.forEach((row) => {
    const rowText = row.textContent.toLowerCase();
    const isMatch = rowText.includes(normalizedSearch);

    if (isMatch) {
      row.style.display = "";
      visibleCount++;
    } else {
      row.style.display = "none";
    }
  });

  // Show/hide empty state message
  if (inventoryNoResults) {
    inventoryNoResults.style.display = visibleCount === 0 ? "block" : "none";
  }
}

// Handle search input
inventorySearch.addEventListener("input", (e) => {
  const searchTerm = e.target.value;
  filterInventoryTable(searchTerm);
});

// ========================================
// KEYBOARD ACCESSIBILITY
// ========================================

// Close modals with Escape key
document.addEventListener("keydown", (e) => {
  if (e.key === "Escape") {
    if (addItemModal.getAttribute("aria-hidden") === "false") {
      resetFormAndCloseModal(addItemForm, addItemModal);
    }
    if (updateItemModal.getAttribute("aria-hidden") === "false") {
      resetFormAndCloseModal(updateItemForm, updateItemModal);
    }
  }
});

// ========================================
// INITIALIZATION
// ========================================

console.log("Inventory management system initialized successfully");

// Optional: Add any initialization code here
// For example, loading items from localStorage or an API
