<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "shopping_cart";

$connection = mysqli_connect($host, $user, $password, $db);

if ($connection === false) {
    die("connection error");
}

?>