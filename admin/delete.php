<?php
include '../db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $delete_from_folder = "SELECT image from products where id = '$id'";
    $run = mysqli_query($connection, $delete_from_folder);
    $row = mysqli_fetch_array($run);
    $image_name = $row['image'];

    unlink('../images/' . $image_name);
    $product_category_delete = "DELETE FROM product_categories where product_id = '$id'";
    $delete_product = mysqli_query($connection, $product_category_delete);

    $sql = "DELETE FROM products where id = '$id' ";
    $result = mysqli_query($connection, $sql);

    $select_images = "SELECT images from product_images where product_id = '$id'";
    $select_images_run = mysqli_query($connection, $select_images);
    while ($images_row = mysqli_fetch_assoc($select_images_run)) {
        unlink('../images/' . $images_row['images']);
    }

    $sql3 = "DELETE FROM product_images where product_id = '$id' ";
    $result3 = mysqli_query($connection, $sql3);



    if ($result) {
        header("location:adminPage.php");

    }
}
if (isset($_GET['deletegalleryid'])) {
    $id = $_GET['deletegalleryid'];

    $sql = "DELETE FROM gallery where id = '$id' ";
    $result = mysqli_query($connection, $sql);

    $select_images = "SELECT images from gallery_images where gallery_id = '$id'";
    $select_images_run = mysqli_query($connection, $select_images);
    while ($images_row = mysqli_fetch_assoc($select_images_run)) {
        unlink('../images/' . $images_row['images']);
    }

    $sql3 = "DELETE FROM gallery_images where gallery_id = '$id' ";
    $result3 = mysqli_query($connection, $sql3);

    if ($result) {
        header("location:gallery.php");
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

if (isset($_GET['cancel'])) {
    $cancel_id = $_GET['cancel'];
    $order_poroduct_delete = "DELETE FROM order_products where order_id = $cancel_id";
    $delete_order = mysqli_query($connection, $order_poroduct_delete);
    $sql = "DELETE FROM orders where id = $cancel_id";
    $sql_run = mysqli_query($connection, $sql);
    header("location:order-list.php");
}
?>