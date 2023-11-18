<?php

include "db.php";

$u_name = $_GET['users_name'];
$u_password = md5($_GET['user_password']);

$get_user = "SELECT * from users where user_name ='" . $u_name . "' AND passwords='" . $u_password . "'";
$get_user_result = mysqli_query($connection, $get_user);

if ($get_user_result) {
    while ($row = mysqli_fetch_array($get_user_result)) {
        $name = $row['user_name'];
        $pass = $row['passwords'];

        if ($name === $u_name && $pass === $u_password) {
            $query = "SELECT * FROM products";
            $result = $connection->query($query);

            while ($row = $result->fetch_assoc()) {
                $products_list[] = $row;
            }
            echo json_encode($products_list, JSON_PRETTY_PRINT);
        }
    }
}
?>