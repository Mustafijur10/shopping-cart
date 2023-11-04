<?php

session_start();

if (!isset($_SESSION['usersname'])) {
    header('location:login.php');
}

$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>