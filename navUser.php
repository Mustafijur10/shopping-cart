<?php

$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>E-Shopping</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="style/index.css">

    <!-- lightGallery plugins  -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lightgallery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-autoplay.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-thumbnail.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-fullscreen.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-rotate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-share.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-comments.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.1/css/lg-pager.min.css">

</head>


<body>
    <!-- header section start -->
    <div class="header_section mb-5">
        <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="index.html">Home</a>
                    <a href="products.html">Products</a>
                    <a href="about.html">About</a>
                    <a href="client.html">Client</a>
                    <a href="contact.html">Contact</a>
                </div>
                <span class="toggle_icon" onclick="openNav()"><img src="images/toggle-icon.png"></span>
                <a class="logo " href="index.php">
                    <h3 style="color: #535453;font-weight: bold;">SHOPPING CART</h3>
                </a>
                <form class="form-inline ">
                    <div class="login_text">
                        <ul>
                            <li>
                                <ul class="custom-ul">

                                    <li class="custom-li "><a href="#" class="text-dark">Categories</a>
                                        <ul name="category-name" class="dropdown" required>

                                            <?php
                                            $info = "SELECT * FROM categories";
                                            $results = mysqli_query($connection, $info);
                                            if ($results) {
                                                while ($row = mysqli_fetch_assoc($results)) {
                                                    $columnName = $row['name'];
                                                    $columnId = $row['id'];
                                                    $columnStatus = $row['status'];

                                                    if ($columnStatus == 1) {
                                                        ?>
                                                        <li>
                                                            <a href="products-in-category.php?ids=<?= $columnId ?>"
                                                                class="text-dark">
                                                                <?= $columnName ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?>
                                            <ul>
                                    </li>
                                </ul>
                            </li>


                        </ul>
                        <li>
                            <?php
                            $info = "SELECT * FROM pages";
                            $results = mysqli_query($connection, $info);
                            if ($results) {
                                while ($row = mysqli_fetch_assoc($results)) {
                                    $columnName = $row['name'];
                                    $columnId = $row['id'];


                                    if ($results) {
                                        ?>
                                    <li>
                                        <a href="slide-show.php?ids=<?= $columnId ?>" class="text-dark">
                                            <?= $columnName ?>
                                        </a>
                                    </li>
                                    <?php
                                    }
                                }
                            }
                            ?>
                        </li>

                        <li>
                            <?php
                            echo '<a href="my-orders.php" style="color: #535453; ">My Orders</a>';
                            ?>

                        </li>
                        <li>
                            <?php
                            echo '<a href="user/logout.php" style="color: #535453; ">Logout</a>';
                            ?>

                        </li>
                        <li><a href="my-cart.php"><img src="images/bag-icon.png"><span
                                    class="position-absolute start-100 translate-middle badge badge-secondary rounded-circle">
                                    <?= $count; ?>
                                </span></a></li>
                        <li><a href="#"><img src="images/search-icon.png"></a></li>

                    </div>
                </form>
            </nav>
        </div>
    </div>