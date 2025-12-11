// Search functionality
const searchInput = document.getElementById("searchInput");
const tableBody = document.getElementById("tableBody");
const noResults = document.getElementById("noResults");

searchInput.addEventListener("input", function () {
const searchTerm = this.value.toLowerCase();
const rows = tableBody.getElementsByTagName("tr");
let visibleCount = 0;

for (let row of rows) {
        const text = row.textContent.toLowerCase();
        if (text.includes(searchTerm)) {
        row.style.display = "";
        visibleCount++;
        } else {
        row.style.display = "none";
        }
    }

    noResults.style.display = visibleCount === 0 ? "block" : "none";
});

    // Placeholder functions for update and delete
function updateItem(id) {
        alert(
            "Update functionality for item #" + id + " would be implemented here"
        );
    }

function deleteItem(id) {
        if (confirm("Are you sure you want to delete item #" + id + "?")) {
            alert("Delete functionality would be implemented here");
        }
    }