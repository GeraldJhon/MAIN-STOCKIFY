<?php
require_once '../DBConnection/product.php';

// Fetch all products from database
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($connection, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Form</title>
  <link rel="stylesheet" href="../assests/css/delete-style.css">
  <link rel="shortcut icon" href="../assests/icons/Delete.svg" type="image/x-icon">
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobile-menu-toggle">☰</button>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo"><img src="../assests/logo/logo-Recovered copy.jpg" alt="This is logo" width="200px"></div>
            <div class="sidebar-subtitle">Inventory Management</div>
        </div>

        <nav class="sidebar-nav">
            <!-- Main Menu -->
            <div class="sidebar-section">
                <h3 class="sidebar-section-title">Main Menu</h3>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a href="../pages/dashboard.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Dashboard.svg" alt="Dashboard Icon"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/crud-app.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Add.svg" alt="Add Item Icon"></span>
                            <span>Add Items</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/update-item.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Update.svg" alt="Update Icon"></span>
                            <span>Update</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/delete-item.php" class="sidebar-menu-link active">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Delete.svg" alt="Delete Icon"></span>
                            <span>Delete</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Categories -->
            <div class="sidebar-section">
                <h3 class="sidebar-section-title">Categories</h3>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a href="../pages/all-item.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Inventory.svg" alt="All Item Icon"></span>
                            <span>All Items</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Management -->
            <div class="sidebar-section">
                <h3 class="sidebar-section-title">Management</h3>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a href="../pages/admin.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Users.svg" alt="User Icon"></span>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                         <a href="../pages/logout.php" class="sidebar-menu-link" id="js-logout-trigger">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Logout.svg" alt="Delete Icon"></span>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="sidebar-user">
                <div class="sidebar-user-avatar">GJ</div>
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name">Gerald Jhon</div>
                    <div class="sidebar-user-role">Administrator</div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Main Navigation -->
        <nav class="main-navigation">
            <ul class="navigation-list">
                <li class="navigation-item">
                    <a href="#" class="navigation-link">HOME</a>
                </li>
            </ul>
        </nav>

        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <h1 class="dashboard-title">Delete some items!</h1>
            <h2 class="dashboard-subtitle">Manage your inventory efficiently with Stockify dashboard</h2>
        </header>

        <?php
        // Display success message if exists
        if (isset($_GET['success']) && $_GET['success'] == 'deleted') {
            echo "<div style='max-width: 1400px; margin: 20px auto; padding: 1rem 1.5rem; background: rgba(0, 255, 136, 0.1); border: 2px solid var(--success); border-radius: 8px; color: var(--success); font-weight: 600; text-align: center;'>✓ Product deleted successfully!</div>";
        }
        ?>

        <!-- Delete Confirmation Modal -->
        <section id="delete-confirm-modal" class="modal-overlay" aria-hidden="true">
            <div class="modal-container modal-container--delete-confirm">
                <h2 class="modal-title" style="color: var(--danger);">⚠️ Confirm Deletion</h2>
                <form id="delete-confirm-form" class="item-form" method="POST" action="delete-process.php">
                    <input type="hidden" id="delete-item-id" name="id" />
                    
                    <div style="background: rgba(255, 51, 102, 0.1); padding: 1.5rem; border-radius: 8px; margin-bottom: 1.5rem; border: 2px solid var(--danger);">
                        <p style="color: var(--text-light); line-height: 1.6; margin-bottom: 1rem;">
                            <strong>Warning:</strong> You are about to permanently delete this product. This action cannot be undone.
                        </p>
                        <div style="color: var(--text-muted); font-size: 0.9rem;">
                            <p><strong>Product ID:</strong> <span id="delete-display-id"></span></p>
                            <p><strong>Product Name:</strong> <span id="delete-display-name"></span></p>
                            <p><strong>Description:</strong> <span id="delete-display-description"></span></p>
                            <p><strong>Price:</strong> $<span id="delete-display-price"></span></p>
                            <p><strong>Quantity:</strong> <span id="delete-display-quantity"></span> pcs</p>
                        </div>
                    </div>

                    <div class="form-actions">
<<<<<<< HEAD
                        <button type="submit" class="button button--danger" style="flex: 1;">Yes, Delete Product</button>
                        <button type="button" class="button button--secondary" id="js-delete-cancel" style="flex: 1;">Cancel</button>
=======
                        <button type="submit" class="button button--primary" id="js-add-item-submit">Add</button>
                        <button type="button" class="button button--secondary" id="js-add-item-cancel">Cancel</button>
>>>>>>> 3f45ab3d633f30d32fd61ea72af88ebac2bfb238
                    </div>
                </form>
            </div>
        </section>

<<<<<<< HEAD
        <!-- Inventory Table Section -->
=======
  <!-- Inventory Table Section -->
>>>>>>> 3f45ab3d633f30d32fd61ea72af88ebac2bfb238
        <section class="inventory-section">
            <div class="inventory-header">
                <h1 class="inventory-title">INVENTORY ITEMS</h1>
                <input type="text" id="inventory-search" class="search-input" placeholder="Search Items..." />
            </div>

            <div class="table-wrapper">
                <div class="table-scroll-container">
                    <?php if (mysqli_num_rows($result) > 0): ?>
                        <table class="inventory-table">
                            <thead class="inventory-table-head">
                                <tr>
                                    <th>ID</th>
                                    <th>PRODUCT NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody class="inventory-table-body">
                                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                                    <tr class="inventory-row" data-item-id="<?php echo $row['id']; ?>">
                                        <td class="inventory-cell inventory-cell--id"><?php echo $row['id']; ?></td>
                                        <td class="inventory-cell inventory-cell--name"><?php echo htmlspecialchars($row['product_name']); ?></td>
                                        <td class="inventory-cell inventory-cell--description"><?php echo htmlspecialchars($row['description']); ?></td>
                                        <td class="inventory-cell inventory-cell--price">$<?php echo number_format($row['price'], 2); ?></td>
                                        <td class="inventory-cell inventory-cell--quantity"><?php echo $row['quantity']; ?> pcs</td>
                                        <td class="inventory-cell inventory-cell--actions">
                                            <button class="button button--danger js-delete-item"
                                                    data-id="<?php echo $row['id']; ?>"
                                                    data-name="<?php echo htmlspecialchars($row['product_name']); ?>"
                                                    data-description="<?php echo htmlspecialchars($row['description']); ?>"
                                                    data-price="<?php echo $row['price']; ?>"
                                                    data-quantity="<?php echo $row['quantity']; ?>">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="inventory-empty-state">
                            <p class="empty-state-message">No products found.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="inventory-empty-state" id="inventory-no-results" style="display: none;">
                <p class="empty-state-message">No items found matching your search.</p>
            </div>
        </section>
    </div>
<<<<<<< HEAD

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-toggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
        });

        // Delete item buttons
        document.querySelectorAll('.js-delete-item').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const description = this.dataset.description;
                const price = this.dataset.price;
                const quantity = this.dataset.quantity;

                // Fill the modal with product info
                document.getElementById('delete-item-id').value = id;
                document.getElementById('delete-display-id').textContent = id;
                document.getElementById('delete-display-name').textContent = name;
                document.getElementById('delete-display-description').textContent = description;
                document.getElementById('delete-display-price').textContent = parseFloat(price).toFixed(2);
                document.getElementById('delete-display-quantity').textContent = quantity;

                // Show modal
                document.getElementById('delete-confirm-modal').classList.add('active');
                document.getElementById('delete-confirm-modal').setAttribute('aria-hidden', 'false');
            });
        });

        // Cancel button
        document.getElementById('js-delete-cancel')?.addEventListener('click', function() {
            document.getElementById('delete-confirm-modal').classList.remove('active');
            document.getElementById('delete-confirm-modal').setAttribute('aria-hidden', 'true');
        });

        // Close modal when clicking outside
        document.getElementById('delete-confirm-modal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
                this.setAttribute('aria-hidden', 'true');
            }
        });

        // Search functionality
        document.getElementById('inventory-search')?.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.inventory-row');
            let visibleCount = 0;

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                if (text.includes(searchTerm)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            document.getElementById('inventory-no-results').style.display = visibleCount === 0 ? 'block' : 'none';
        });
    </script>
=======
    <footer><script src="../assests/js/main.js"></script></footer>
>>>>>>> 3f45ab3d633f30d32fd61ea72af88ebac2bfb238
</body>
</html>

<?php
mysqli_close($connection);
?>