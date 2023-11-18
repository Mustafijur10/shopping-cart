<?php
include 'db.php';

$product_list = $_GET['productId'];
$product_quantity = $_GET['quantity'];

$get_user = "SELECT stock from products where id ='" . $product_list . "'";
$get_user_result = mysqli_query($connection, $get_user);

if ($get_user_result) {
    while ($row = mysqli_fetch_array($get_user_result)) {
        $remaining_stock = $row['stock'] - $product_quantity;
        if ($remaining_stock >= 1) {
            $update_stock = "UPDATE products SET stock='$remaining_stock' WHERE id = '$product_list'";
            $update_stock_result = mysqli_query($connection, $update_stock);

            $orders_code = 'order' . rand(111, 999);

            echo json_encode(array('message' => 'Product Placed Successfully', 'orderId' => $orders_code));
        } else {
            echo json_encode(array('message' => 'Product Quantity Not Available!'));
        }
    }
}
?>