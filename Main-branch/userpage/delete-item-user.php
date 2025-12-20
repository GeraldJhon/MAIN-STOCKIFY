<?php
require_once('../Projects/DBConnection/product.php');

// Your existing delete code here
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Form</title>
  <link rel="stylesheet" href="../assests/css/fanalize-style.css">k
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
                        <a href="../pages/dashboard.php" class="sidebar-menu-link" id="sidebar-add-items">
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
            <h1 class="dashboard-title">Delete some items!</h1>
            <h2 class="dashboard-subtitle">Manage your inventory efficiently with CITEMIS dashboard</h2>
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
                <h1 class="inventory-title">INVENTORY ITEMS</h1>
                <input type="text" id="inventory-search" class="search-input" placeholder="Search Items..." />
            </div>

            <div class="table-wrapper">
                <div class="table-scroll-container">
                    <table class="inventory-table">
                        <thead class="inventory-table-head">
                            <tr>
                                <th>MIS#</th>
                                <th>ITEM NAME</th>
                                <th>DESCRIPTION</th>
                                <th>ITEM QTY</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody class="inventory-table-body">
                            <tr class="inventory-row" data-item-id="001">
                                <td class="inventory-cell inventory-cell--id">0093213</td>
                                <td class="inventory-cell inventory-cell--name">LAPTOP</td>
                                <td class="inventory-cell inventory-cell--description">MSI
                                    Titan-18-HX-Dragon-Edition-Norse-Myth-A2XWX</td>
                                <td class="inventory-cell inventory-cell--quantity">10 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="001">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="002">
                                <td class="inventory-cell inventory-cell--id">0213312</td>
                                <td class="inventory-cell inventory-cell--name">FLASH DRIVE</td>
                                <td class="inventory-cell inventory-cell--description">SANDISK 256GB ULTRA FLAIR USB3.0
                                    (SDCZ73-256G-G46) Flash Drive (Black)</td>
                                <td class="inventory-cell inventory-cell--quantity">5 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                 
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="002">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="003">
                                <td class="inventory-cell inventory-cell--id">321312</td>
                                <td class="inventory-cell inventory-cell--name">LAPTOP</td>
                                <td class="inventory-cell inventory-cell--description">ASUS TUF FX505</td>
                                <td class="inventory-cell inventory-cell--quantity">3 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                   
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="003">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="004">
                                <td class="inventory-cell inventory-cell--id">421456</td>
                                <td class="inventory-cell inventory-cell--name">MONITOR</td>
                                <td class="inventory-cell inventory-cell--description">Dell UltraSharp 27" 4K USB-C
                                    Monitor (U2720Q)</td>
                                <td class="inventory-cell inventory-cell--quantity">8 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                   
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="004">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="005">
                                <td class="inventory-cell inventory-cell--id">531789</td>
                                <td class="inventory-cell inventory-cell--name">KEYBOARD</td>
                                <td class="inventory-cell inventory-cell--description">Logitech MX Keys Wireless
                                    Keyboard</td>
                                <td class="inventory-cell inventory-cell--quantity">15 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                  
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="005">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="006">
                                <td class="inventory-cell inventory-cell--id">641892</td>
                                <td class="inventory-cell inventory-cell--name">MOUSE</td>
                                <td class="inventory-cell inventory-cell--description">Logitech MX Master 3 Wireless
                                    Mouse</td>
                                <td class="inventory-cell inventory-cell--quantity">12 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                  
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="006">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="007">
                                <td class="inventory-cell inventory-cell--id">752013</td>
                                <td class="inventory-cell inventory-cell--name">PRINTER</td>
                                <td class="inventory-cell inventory-cell--description">HP LaserJet Pro M404n Monochrome
                                    Printer</td>
                                <td class="inventory-cell inventory-cell--quantity">4 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="007">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="008">
                                <td class="inventory-cell inventory-cell--id">862134</td>
                                <td class="inventory-cell inventory-cell--name">WEBCAM</td>
                                <td class="inventory-cell inventory-cell--description">Logitech C920 HD Pro Webcam</td>
                                <td class="inventory-cell inventory-cell--quantity">20 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">       
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="008">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="009">
                                <td class="inventory-cell inventory-cell--id">972245</td>
                                <td class="inventory-cell inventory-cell--name">HEADSET</td>
                                <td class="inventory-cell inventory-cell--description">HyperX Cloud II Gaming Headset
                                </td>
                                <td class="inventory-cell inventory-cell--quantity">18 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                               
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="009">Delete</button>
                                </td>
                            </tr>
                            <tr class="inventory-row" data-item-id="010">
                                <td class="inventory-cell inventory-cell--id">082356</td>
                                <td class="inventory-cell inventory-cell--name">EXTERNAL HDD</td>
                                <td class="inventory-cell inventory-cell--description">Seagate Backup Plus 2TB External
                                    Hard Drive</td>
                                <td class="inventory-cell inventory-cell--quantity">7 pcs</td>
                                <td class="inventory-cell inventory-cell--actions">                                    
                                    <button class="button button--danger js-delete-item"
                                        data-item-id="010">Delete</button>
                                </td>
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