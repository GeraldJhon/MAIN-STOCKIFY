<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Users</title>
  <link rel="stylesheet" href="../assests/css/users-style.css"> 
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobile-menu-toggle">☰</button>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
<div class="sidebar-header"> 
            <div class="sidebar-logo"><img src="../assests/logo/logo-Recovered copy.jpg" alt="This is logo"width="200px"></div>
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
                        <a href="#" class="sidebar-menu-link" id="sidebar-add-items">
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
                        <a href="../pages/users.php" class="sidebar-menu-link">
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
            <h1 class="dashboard-title">Welcome Users!</h1>
            <h2 class="dashboard-subtitle">Free to exlore our Stockify Inventory Management</h2>
        </header>

        <!-- Add Item Modal -->
        <section id="add-item-modal" class="modal-overlay" aria-hidden="true">
            <div class="modal-container modal-container--add-item">
                <h2 class="modal-title">What items do you want to add?</h2>
                <form id="add-item-form" class="item-form">
                    <div class="form-group">
                        <label for="add-item-name" class="form-label">Item Name:</label>
                        <input type="text" id="add-item-name" class="form-input" placeholder="Enter Items" required />
                    </div>

                    <div class="form-group">
                        <label for="add-item-description" class="form-label">Description:</label>
                        <input type="text" id="add-item-description" class="form-input" placeholder="Enter Description"
                            required />
                    </div>

                    <div class="form-group">
                        <label for="add-item-quantity" class="form-label">Quantity:</label>
                        <input type="number" id="add-item-quantity" class="form-input" placeholder="Enter Quantity"
                            required />
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button button--primary" id="js-add-item-submit">Add</button>
                        <button type="button" class="button button--secondary" id="js-add-item-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Update Item Modal -->
        <section id="update-item-modal" class="modal-overlay" aria-hidden="true">
            <div class="modal-container modal-container--update-item">
                <h2 class="modal-title">Update Item Details</h2>
                <form id="update-item-form" class="item-form">
                    <div class="form-group">
                        <label for="update-item-id" class="form-label">ID:</label>
                        <input type="text" id="update-item-id" class="form-input" placeholder="#:" readonly />
                    </div>

                    <div class="form-group">
                        <label for="update-item-name" class="form-label">Item Name:</label>
                        <input type="text" id="update-item-name" class="form-input" placeholder="Update item name:" />
                    </div>

                    <div class="form-group">
                        <label for="update-item-description" class="form-label">Description:</label>
                        <input type="text" id="update-item-description" class="form-input"
                            placeholder="Update the description:" />
                    </div>

                    <div class="form-group">
                        <label for="update-item-quantity" class="form-label">Qty:</label>
                        <input type="number" id="update-item-quantity" class="form-input"
                            placeholder="Update item quantity:" />
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="button button--primary" id="js-update-item-submit">Update</button>
                        <button type="button" class="button button--secondary"
                            id="js-update-item-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </section>

        <!-- Inventory Table Section -->
        <section class="inventory-section">
            <div class="inventory-header">
                <h1 class="inventory-title">USERS</h1>
                <input type="text" id="inventory-search" class="search-input" placeholder="Search..." />
            </div>

            <div class="table-wrapper">
                <div class="table-scroll-container">
                    <table class="inventory-table">
                        <thead class="inventory-table-head">
                            <tr>
                                <th>FULL NAME:</th>
                                <th>EMAIL</th>
                                <th>POSITION</th>
                            </tr>
                        </thead>
                        <tbody class="inventory-table-body">
                            <tr class="inventory-row" data-item-id="001">
                                <td class="inventory-cell inventory-cell--id">Gerald Jhon G. Necesario</td>
                                <td class="inventory-cell inventory-cell--name">Gerald.necesario6@gmail.com</td>
                                <td class="inventory-cell inventory-cell--description">ADMIN</td>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="002">
                                <td class="inventory-cell inventory-cell--id">Dexter Paul Tingal</td>
                                <td class="inventory-cell inventory-cell--name">Dexter@gmail.com</td>
                                <td class="inventory-cell inventory-cell--description">ADMIN</td>
                            </tr>
                            <tr class="inventory-row" data-item-id="003">
                                <td class="inventory-cell inventory-cell--id">John Paulo Donghil</td>
                                <td class="inventory-cell inventory-cell--name">John-Paulo@gmail.com</td>
                                <td class="inventory-cell inventory-cell--description">USER</td>  
                            </tr>
                            <tr class="inventory-row" data-item-id="004">
                                <td class="inventory-cell inventory-cell--id">Matthew Villaranda</td>
                                <td class="inventory-cell inventory-cell--name">Matthew@gmail.com</td>
                                <td class="inventory-cell inventory-cell--description">USER</td>
                            </tr>          
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="inventory-empty-state" id="inventory-no-results" style="display: none;">
                <p class="empty-state-message">No items found matching your search.</p>
            </div>
        </section>
    </div>
</body>
</html>