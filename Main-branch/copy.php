<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CITEMIS Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Cinzel+Decorative:wght@400;700;900&family=Graduate&family=Jersey+10&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/copy.css" />
  </head>
  <body>
    <nav>
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="#">LOGOUT</a></li>
      </ul>
    </nav>

    <header class="head-container">
      <h1>Welcome "User"!</h1>
      <h2>Manage your inventory efficiently with CITEMIS dashboard</h2>
    </header>

    <section class="table-container">
      <h1>INVENTORY ITEMS</h1>
      <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search Items...." />
      </div>

      <table id="inventoryTable">
        <thead>
          <tr>
            <th>Item #</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Item Qty</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="tableBody">
          <tr>
            <td>001</td>
            <td>Laptop</td>
            <td>Dell XPS 15 - High Performance</td>
            <td>25</td>
            <td>
              <div class="action-buttons">
                <a href="#" onclick="updateItem(1); return false;">UPDATE</a>
                <a href="#" onclick="deleteItem(1); return false;">DELETE</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>002</td>
            <td>Mouse</td>
            <td>Logitech Wireless Mouse</td>
            <td>150</td>
            <td>
              <div class="action-buttons">
                <a href="#" onclick="updateItem(2); return false;">UPDATE</a>
                <a href="#" onclick="deleteItem(2); return false;">DELETE</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>003</td>
            <td>Keyboard</td>
            <td>Mechanical RGB Keyboard</td>
            <td>80</td>
            <td>
              <div class="action-buttons">
                <a href="#" onclick="updateItem(3); return false;">UPDATE</a>
                <a href="#" onclick="deleteItem(3); return false;">DELETE</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>004</td>
            <td>Monitor</td>
            <td>27" 4K UHD Display</td>
            <td>45</td>
            <td>
              <div class="action-buttons">
                <a href="#" onclick="updateItem(4); return false;">UPDATE</a>
                <a href="#" onclick="deleteItem(4); return false;">DELETE</a>
              </div>
            </td>
          </tr>
          <tr>
            <td>005</td>
            <td>Headphones</td>
            <td>Noise Cancelling Wireless</td>
            <td>120</td>
            <td>
              <div class="action-buttons">
                <a href="#" onclick="updateItem(5); return false;">UPDATE</a>
                <a href="#" onclick="deleteItem(5); return false;">DELETE</a>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
      <div class="no-results" id="noResults">
        No items found matching your search.
      </div>
    </section>

    <script src="./assets/js/copy-script.js"></script>
  </body>
</html>
