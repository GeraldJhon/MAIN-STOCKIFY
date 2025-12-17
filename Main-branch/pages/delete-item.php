<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Table</title>
  <link rel="stylesheet" href="../assests/css/fanalize-style.css">k
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="mobile-menu-toggle">☰</button>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">CITEMIS</div>
            <div class="sidebar-subtitle">Inventory Management</div>
        </div>

        <nav class="sidebar-nav">
            <!-- Main Menu -->
            <div class="sidebar-section">
                <h3 class="sidebar-section-title">Main Menu</h3>
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item">
                        <a href="../pages/dashboard.php" class="sidebar-menu-link active">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0084ff"><path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z"/></svg></span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/dashboard.php" class="sidebar-menu-link" id="sidebar-add-items">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M440-280h80v-160h160v-80H520v-160h-80v160H280v80h160v160ZM200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-80h560v-560H200v560Zm0-560v560-560Z"/></svg></span>
                            <span>Add Items</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/update-item.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#75FB4C"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h357l-80 80H200v560h560v-278l80-80v358q0 33-23.5 56.5T760-120H200Zm280-360ZM360-360v-170l367-367q12-12 27-18t30-6q16 0 30.5 6t26.5 18l56 57q11 12 17 26.5t6 29.5q0 15-5.5 29.5T897-728L530-360H360Zm481-424-56-56 56 56ZM440-440h56l232-232-28-28-29-28-231 231v57Zm260-260-29-28 29 28 28 28-28-28Z"/></svg></span>
                            <span>Update</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="../pages/update-item.php" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#EA3323"><path d="m376-300 104-104 104 104 56-56-104-104 104-104-56-56-104 104-104-104-56 56 104 104-104 104 56 56Zm-96 180q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520Zm-400 0v520-520Z"/></svg></span>
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
                        <a href="#" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#0084ff"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h560q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H200Zm0-507h560v-133H200v133Zm0 214h560v-134H200v134Zm0 213h560v-133H200v133Zm40-454v-80h80v80h-80Zm0 214v-80h80v80h-80Zm0 214v-80h80v80h-80Z"/></svg></span>
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
                        <a href="#" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M400-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM80-160v-112q0-33 17-62t47-44q51-26 115-44t141-18h14q6 0 12 2-8 18-13.5 37.5T404-360h-4q-71 0-127.5 18T180-306q-9 5-14.5 14t-5.5 20v32h252q6 21 16 41.5t22 38.5H80Zm560 40-12-60q-12-5-22.5-10.5T584-204l-58 18-40-68 46-40q-2-14-2-26t2-26l-46-40 40-68 58 18q11-8 21.5-13.5T628-460l12-60h80l12 60q12 5 22.5 11t21.5 15l58-20 40 70-46 40q2 12 2 25t-2 25l46 40-40 68-58-18q-11 8-21.5 13.5T732-180l-12 60h-80Zm40-120q33 0 56.5-23.5T760-320q0-33-23.5-56.5T680-400q-33 0-56.5 23.5T600-320q0 33 23.5 56.5T680-240ZM400-560q33 0 56.5-23.5T480-640q0-33-23.5-56.5T400-720q-33 0-56.5 23.5T320-640q0 33 23.5 56.5T400-560Zm0-80Zm12 400Z"/></svg> </span>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="#" class="sidebar-menu-link">
                            <span class="sidebar-menu-icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff0000"><path d="M806-440H320v-80h486l-62-62 56-58 160 160-160 160-56-58 62-62ZM600-600v-160H200v560h400v-160h80v160q0 33-23.5 56.5T600-120H200q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h400q33 0 56.5 23.5T680-760v160h-80Z"/></svg></span>
                            <span>Log out</span>
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
            <h1 class="dashboard-title">Welcome Back!</h1>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="001">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="002">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="003">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="004">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="005">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="006">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="007">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="008">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="009">Update</button>
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
                                    <button class="button button--action js-update-item"
                                        data-item-id="010">Update</button>
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