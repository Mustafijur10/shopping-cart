<?php
session_start();
unset($_SESSION['usersname']);
header('location:../index.php');
?>