<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "citemis"; // Change this to your actual database name

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>