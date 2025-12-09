<!---<?php
include("../DBConnection/dbconnection.php");

// Debug: Check if connection exists
if (!isset($connection)) {
    die("Error: Database connection not established. Check dbconnection.php file.");
}

$message = "";

// when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname   = $_POST["fullname"];
    $email      = $_POST["email"];
    $password   = $_POST["password"];
    $confirm    = $_POST["confirm-password"];
    $department = $_POST["department"];
    
    // Check if passwords match
    if ($password !== $confirm) {
        $message = "Passwords do not match!";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // Use prepared statements to prevent SQL injection
        $stmt = $connection->prepare("INSERT INTO users (fullName, email, password, department) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fullname, $email, $hashed_password, $department);
        
        if ($stmt->execute()) {
            $message = "Registration successful!";
        } else {
            $message = "Error: " . $connection->error;
        }
        $stmt->close();
    }
}
?>
----->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/register-style.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Allerta+Stencil&family=Cinzel+Decorative:wght@400;700;900&family=Graduate&family=Jersey+10&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container">
 <section id="register-form"  aria-labelledby="register-heading">
  
      <header>
        <h1>Register</h1>
      </header>

      <form action="" method="POST">
        <fieldset>
          <legend class="visually-hidden">Account information:</legend>
          <div class="grid">
            <div class="form-group">
              <label for="reg-name">Full Name:</label>
              <input type="text" id="reg-name" name="fullname" required placeholder="Enter Your Fullname">
            </div>
            <div class="form-group">
              <label for="reg-email">Email:</label>
              <input type="email" id="reg-email" name="email" required  placeholder="Enter Your Email"> 
            </div>
            <div class="form-group">
              <label for="reg-password">Password:</label>
              <input type="password" id="reg-password" name="password" required  placeholder="Enter Your Password">
            </div>
            <div class="form-group">
              <label for="reg-confirm">Confirm Password:</label>
              <input type="password" id="reg-confirm" name="confirm-password" required  placeholder="Re-Enter Your Password">
            </div>
          </div>
          <button type="submit" class="btn">Sign Up</button>
        </fieldset>
      </form>
      <footer class="toggle-text">
        <p>Already have an account?</p>
        <a href="login.php"><button class="btn-login">login</button></a>
      </footer>
    </section>
  </div>  
</body>
</html>