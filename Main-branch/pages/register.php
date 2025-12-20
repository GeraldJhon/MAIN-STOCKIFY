<?php
session_start();
include("../DBConnection/database.php");
// Debug: Check if connection exists
if (!isset($connection)) {
    die("Error: Database connection not established. Check dbconnection.php file.");
}
$message = "";

// when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname   = trim($_POST["fullname"]);
    $email      = trim($_POST["email"]);
    $password   = $_POST["password"];
    $confirm    = $_POST["confirm-password"];
    
    // Validate input
    if (empty($fullname) || empty($email) || empty($password) || empty($confirm)) {
        $message = "Please fill in all fields.";
    } 
    // Check if passwords match
    elseif ($password !== $confirm) {
        $message = "Passwords do not match!";
    } 
    else {
        // Check if email already exists
        $check_stmt = $connection->prepare("SELECT id FROM users WHERE email = ?");
        $check_stmt->bind_param("s", $email);
        $check_stmt->execute();
        $check_result = $check_stmt->get_result();
        
        if ($check_result->num_rows > 0) {
            $message = "Email already registered!";
        } else {
       
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Note: You're using $department but it's not in your form
            // Set a default value or add department field to form
            $department = "General"; // Default value
            
            // Use prepared statements to prevent SQL injection
            $stmt = $connection->prepare("INSERT INTO users (fullName, email, password, department) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $fullname, $email, $hashed_password, $department);
            
            if ($stmt->execute()) {
                $message = "Registration successful! Redirecting to login...";
                // Redirect to login page after 2 seconds
                header("refresh:2;url=login.php");
            } else {
                $message = "Error: " . $connection->error;
            }
            $stmt->close();
        }
        $check_stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assests/css/registers-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="shortcut icon" href="../assests/icons/Inventory.svg" type="image/x-icon">
</head>

<body>
    <div class="register-container">
        <div class="header">
            <h1 class="logo">STOCKIFY</h1>
            <p class="subtitle">Inventory Management System</p>
        </div>

        <div class="register-card">
            <h2 class="register-title">Register</h2>


      <?php if (!empty($message)): ?>
        <div class="error-message" style="padding: 10px; margin-bottom: 15px; 
             background-color:  <?php echo (strpos($message, 'successful') !== false) ? '#d4edda' : '#f8d7da'; ?>; 
             color: <?php echo (strpos($message, 'successful') !== false) ? '#155724' : '#721c24'; ?>; 
             border: 1px solid <?php echo (strpos($message, 'successful') !== false) ? '#c3e6cb' : '#f5c6cb'; ?>; 
             border-radius: 4px; text-align: center;">
          <?php echo htmlspecialchars($message); ?>
        </div>
      <?php endif; ?>

       <form action="" method="POST">
                <fieldset>
                    <legend class="visually-hidden">Account information</legend>

                    <div class="grid">
                        <div class="form-group">
                            <label for="reg-name">Full Name:</label>
                            <input type="text" id="reg-name" name="fullname" required
                                placeholder="Enter your full name">
                        </div>

                        <div class="form-group">
                            <label for="reg-email">Email:</label>
                            <input type="email" id="reg-email" name="email" required placeholder="Enter your email">
                        </div>

                        <div class="form-group">
                            <label for="reg-password">Password:</label>
                            <input type="password" id="reg-password" name="password" required
                                placeholder="Enter password">
                        </div>

                        <div class="form-group">
                            <label for="reg-confirm">Confirm Password:</label>
                            <input type="password" id="reg-confirm" name="confirm-password" required
                                placeholder="Re-enter password">
                        </div>
                    </div>

                    <button type="submit" class="btn">Sign Up</button>
                </fieldset>
            </form>

            <footer class="toggle-footer">
                <p>Already have an account?</p>
                <a href="login.php"><button class="btn-login">Login</button></a>
            </footer>
        </div>
    </div>
</body>
</html>