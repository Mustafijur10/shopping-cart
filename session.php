<?php
session_start();
if (!isset($_SESSION['usersname'])) {
    header('location:../login.php');
}

?>