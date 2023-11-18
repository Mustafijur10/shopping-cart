<?php
include '../session.php';
include '../db.php';

if (isset($_GET['editid'])) {
    $image_name = $_GET['editid'];
    $select_id = "SELECT product_id, images from product_images where id=$image_name";
    $select_id_run = mysqli_query($connection, $select_id);
    $result = mysqli_fetch_assoc($select_id_run);
    $id = $result['product_id'];
    $image_id = $result['images'];

    unlink('../images/' . $image_id);

    $sql = "DELETE from product_images where id=$image_name";
    $sql_run = mysqli_query($connection, $sql);
    header("location:edit.php?editid=$id");
}

if (isset($_GET['editgalleryid'])) {
    $image_name = $_GET['editgalleryid'];
    $select_id = "SELECT gallery_id, images from gallery_images where id=$image_name";
    $select_id_run = mysqli_query($connection, $select_id);
    $result = mysqli_fetch_assoc($select_id_run);
    $id = $result['gallery_id'];
    $image_id = $result['images'];

    unlink('../images/' . $image_id);

    $sql = "DELETE from gallery_images where id=$image_name";
    $sql_run = mysqli_query($connection, $sql);
    header("location:edit.php?editgalleryid=$id");
}

?>