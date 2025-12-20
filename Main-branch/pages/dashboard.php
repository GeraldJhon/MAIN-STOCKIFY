<?php
require_once '../DBConnection/product.php';

// Fetch all products from database
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = mysqli_query($connection, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assests/css/dashboard-style.css"> 
=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assests/css/dashboard-style.css"> 
  <link rel="shortcut icon" href="../assests/icons/Dashboard.svg" type="image/x-icon">
>>>>>>> 3f45ab3d633f30d32fd61ea72af88ebac2bfb238
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
                        <a href="../pages/dashboard.php" class="sidebar-menu-link active">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Dashboard.svg" alt="Dashboard Icon"></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="create.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><img src="../assests/icons/Add.svg" alt="Add Icon"></span>
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
<<<<<<< HEAD
                        <a href="../pages/users.php" class="sidebar-menu-link">
=======
                        <a href="../pages/admin.php" class="sidebar-menu-link">
>>>>>>> 3f45ab3d633f30d32fd61ea72af88ebac2bfb238
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
            <h1 class="dashboard-title">Welcome To Stockify!</h1>
            <h2 class="dashboard-subtitle">Manage your inventory efficiently with Stockify dashboard</h2>
        </header>

        <?php
        // Display success message if exists
        if (isset($_GET['success'])) {
            $message = '';
            switch ($_GET['success']) {
                case 'created':
                    $message = 'Product created successfully!';
                    break;
                case 'updated':
                    $message = 'Product updated successfully!';
                    break;
                case 'deleted':
                    $message = 'Product deleted successfully!';
                    break;
            }
            if ($message) {
                echo "<div style='max-width: 1400px; margin: 20px auto; padding: 1rem 1.5rem; background: rgba(0, 255, 136, 0.1); border: 2px solid var(--success); border-radius: 8px; color: var(--success); font-weight: 600; text-align: center;'>✓ $message</div>";
            }
        }
        ?>

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
                                    <th>CREATED AT</th>
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
                                        <td class="inventory-cell"><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="inventory-empty-state">
                            <p class="empty-state-message">No products found. Start by adding a new product!</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="inventory-empty-state" id="inventory-no-results" style="display: none;">
                <p class="empty-state-message">No items found matching your search.</p>
            </div>
        </section>
<<<<<<< HEAD
    </div>  
=======
    </div>
>>>>>>> 3f45ab3d633f30d32fd61ea72af88ebac2bfb238
    <footer><script src="../assests/js/main.js"></script></footer>
</body>
</html>
<?php
mysqli_close($connection);
?>