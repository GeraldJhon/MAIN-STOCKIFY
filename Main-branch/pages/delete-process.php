<?php
require_once '../DBConnection/product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $sql = "DELETE FROM products WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {
        header("Location: delete-item.php?success=deleted");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($connection);
    }
} else {
    header("Location: delete-item.php");
    exit();
}

mysqli_close($connection);
?>