<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_example";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>