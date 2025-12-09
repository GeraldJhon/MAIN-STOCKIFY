<?php 
session_start();
include("../DBConnection/dbconnection.php");

// Debug: Check if connection exists
if (!isset($connection)) {
    die("Error: Database connection not established. Check dbconnection.php file.");
}

$message = "";

// Redirect if already logged in
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
} 

// When form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    
    // Validate input
    if (empty($email) || empty($password)) {
        $message = "Please fill in all fields.";
    } else {
        // Use prepared statements to prevent SQL injection
        $stmt = $connection->prepare("SELECT id, fullName, email, password, department FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, create session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullName'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['department'] = $user['department'];
                
                // Redirect to index.php (in root folder)
                header("Location: ../index.php");
                exit();
            } else {
                $message = "Invalid email or password.";
            }
        } else {
            $message = "Invalid email or password.";
        }
        $stmt->close();
    }
}
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login-style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Cinzel+Decorative:wght@400;700;900&family=Graduate&family=Jersey+10&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <div class="Header">
      <h1>"Welcome to Stockify"</h1>
    </div>

    <div class="container">
      <!-- Login Form -->
      <section id="login-form" aria-labelledby="login-heading">
        <header>
          <h1 id="login-heading">LOGIN</h1>
        </header>

        <?php if (!empty($message)): ?>
        <div
          class="error-message"
          style="
            padding: 10px;
            margin-bottom: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            text-align: center;
          "
        >
          <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif; ?>

        <form action="" method="POST" role="form" aria-label="Login form">
          <fieldset>
            <legend class="visually-hidden">Login credentials</legend>

            <div class="form-group">
              <label for="login-email">email:</label>
              <input
                type="email"
                id="login-email"
                name="email"
                required
                aria-describedby="email-help"
                placeholder="Enter Your Username"
              />
            </div>

            <div class="form-group">
              <label for="login-password">Password:</label>
              <input
                type="password"
                id="login-password"
                name="password"
                required
                placeholder="Enter Your Password"
              />
            </div>

            <div class="checkbox-group">
              <input type="checkbox" id="remember" name="remember" />
              <label for="remember">Remember password</label>
            </div>

            <button type="submit" class="btn" aria-describedby="login-help">
              Login
            </button>
          </fieldset>
        </form>

        <footer class="toggle-text">
          <p>Don't have an account?</p>
          <a href="register.php"
            ><button class="btn-sign__up">Sign up</button></a
          >
        </footer>
      </section>
    </div>

    <script src="../assets/js/script.js"></script>
  </body>
</html>
