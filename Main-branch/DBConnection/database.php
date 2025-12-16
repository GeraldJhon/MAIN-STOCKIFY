<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citemis";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Set charset to prevent SQL injection
$connection->set_charset("utf8mb4");
?>