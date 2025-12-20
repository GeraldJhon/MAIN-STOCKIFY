<?php
require_once '../DBConnection/product.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $price = mysqli_real_escape_string($connection, $_POST['price']);
    $quantity = mysqli_real_escape_string($connection, $_POST['quantity']);

    $sql = "UPDATE products SET 
            product_name = '$product_name',
            description = '$description',
            price = '$price',
            quantity = '$quantity'
            WHERE id = '$id'";

    if (mysqli_query($connection, $sql)) {
        header("Location: update-item.php?success=updated");
        exit();
    } else {
        echo "Error:".mysqli_error($connection);
    }
} else {
    header("Location: update-item.php");
    exit();
}
mysqli_close($connection);
?>