<?php
include '../db.php';

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM categories where id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location:category-details.php");
    }
}

if (isset($_GET['activeid'])) {

    $id = $_GET['activeid'];
    $check_id = "SELECT category_id from product_categories where category_id='$id'";
    $query_result = mysqli_query($connection, $check_id);
    $check_array = mysqli_fetch_array($query_result);

    if ($check_array['category_id'] === null) {
        $sql = "UPDATE categories set status=0 where id = $id";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            header("location:category-details.php");
        }
    } else {
        header("location:category-details.php");
    }


}

if (isset($_GET['inactiveid'])) {
    $id = $_GET['inactiveid'];
    $sql = "UPDATE categories set status=1 where id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location:category-details.php");
    }

}


if (isset($_GET['iuserid'])) {
    $id = $_GET['iuserid'];
    $sql = "UPDATE users set status=0 where id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location:user-request.php");
    }

}

if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $sql = "UPDATE users set status=1 where id = $id";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location:user-request.php");
    }

}
?>