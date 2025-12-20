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
  <title>Update Form</title>
  <link rel="stylesheet" href="../assests/css/update-style.css">
  <link rel="shortcut icon" href="../assests/icons/Update.svg" type="image/x-icon">
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
                        <a href="../pages/update-item.php" class="sidebar-menu-link active">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Update.svg" alt="Update Icon"></span>
                            <span>Update</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/delete-item.php" class="sidebar-menu-link">
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
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Users.svg" alt="User Icon"> </span>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                         <a href="../pages/logout.php" class="sidebar-menu-link" id="js-logout-trigger">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Logout.svg" alt="Logout Icon"></span>
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
            <h1 class="dashboard-title">Be updated!</h1>
            <h2 class="dashboard-subtitle">Manage your inventory efficiently with Stockify dashboard</h2>
        </header>

        <?php
        // Display success message if exists
        if (isset($_GET['success']) && $_GET['success'] == 'updated') {
            echo "<div style='max-width: 1400px; margin: 20px auto; padding: 1rem 1.5rem; background: rgba(0, 255, 136, 0.1); border: 2px solid var(--success); border-radius: 8px; color: var(--success); font-weight: 600; text-align: center;'>✓ Product updated successfully!</div>";
        }
        ?>

        <!-- Update Item Modal -->
        <section id="update-item-modal" class="modal-overlay" aria-hidden="true">
            <div class="modal-container modal-container--update-item">
                <h2 class="modal-title">Update Item Details</h2>
                <form id="update-item-form" class="item-form" method="POST" action="update-process.php">
                    <input type="hidden" id="update-item-id" name="id" />
                    
                    <div class="form-group">
                        <label for="update-item-id-display" class="form-label">ID:</label>
                        <input type="text" id="update-item-id-display" class="form-input" readonly />
                    </div>

                    <div class="form-group">
                        <label for="update-item-name" class="form-label">Product Name:</label>
                        <input type="text" id="update-item-name" name="product_name" class="form-input" placeholder="Update item name:" required />
                    </div>

                    <div class="form-group">
                        <label for="update-item-description" class="form-label">Description:</label>
                        <textarea id="update-item-description" name="description" class="form-input" placeholder="Update the description:" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="update-item-price" class="form-label">Price:</label>
                        <input type="number" id="update-item-price" name="price" class="form-input" placeholder="Update price:" step="0.01" required />
                    </div>

                    <div class="form-group">
                        <label for="update-item-quantity" class="form-label">Quantity:</label>
                        <input type="number" id="update-item-quantity" name="quantity" class="form-input" placeholder="Update item quantity:" required />
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button button--primary" id="js-update-item-submit">Update</button>
                        <button type="button" class="button button--secondary" id="js-update-item-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Inventory Table Section -->
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
                                            <button class="button button--action js-update-item" 
                                                    data-id="<?php echo $row['id']; ?>"
                                                    data-name="<?php echo htmlspecialchars($row['product_name']); ?>"
                                                    data-description="<?php echo htmlspecialchars($row['description']); ?>"
                                                    data-price="<?php echo $row['price']; ?>"
                                                    data-quantity="<?php echo $row['quantity']; ?>">
                                                Update
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

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-toggle')?.addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('mobile-open');
        });

        // Update item buttons
        document.querySelectorAll('.js-update-item').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.dataset.id;
                const name = this.dataset.name;
                const description = this.dataset.description;
                const price = this.dataset.price;
                const quantity = this.dataset.quantity;

                // Fill the modal form
                document.getElementById('update-item-id').value = id;
                document.getElementById('update-item-id-display').value = id;
                document.getElementById('update-item-name').value = name;
                document.getElementById('update-item-description').value = description;
                document.getElementById('update-item-price').value = price;
                document.getElementById('update-item-quantity').value = quantity;

                // Show modal
                document.getElementById('update-item-modal').classList.add('active');
                document.getElementById('update-item-modal').setAttribute('aria-hidden', 'false');
            });
        });

        // Cancel button
        document.getElementById('js-update-item-cancel')?.addEventListener('click', function() {
            document.getElementById('update-item-modal').classList.remove('active');
            document.getElementById('update-item-modal').setAttribute('aria-hidden', 'true');
        });

        // Close modal when clicking outside
        document.getElementById('update-item-modal')?.addEventListener('click', function(e) {
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
</body>
</html>

<?php
mysqli_close($connection);
?>