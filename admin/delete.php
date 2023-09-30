<?php
include '../db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $delete_from_folder = "SELECT image from products where id = '$id'";
    $run = mysqli_query($connection, $delete_from_folder);
    $row = mysqli_fetch_array($run);
    $image_name = $row['image'];
    unlink('../images/' . $image_name);

    $product_category_delete = "DELETE FROM product_categories where product_id = $id";
    $delete_product = mysqli_query($connection, $product_category_delete);
    $sql = "DELETE FROM products where id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location:adminPage.php");
    }
}

if (isset($_GET['editid'])) {
    $id = $_GET['editid'];

    $delete_from_folder = "SELECT image from products where id = '$id'";
    $run = mysqli_query($connection, $delete_from_folder);
    $row = mysqli_fetch_array($run);
    $image_name = $row['image'];
    unlink('../images/' . $image_name);
}
?>