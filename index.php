<?php
include "db.php";
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['usersname'])) {
    include 'navUser.php';
} else {
    include 'header.php';
}

$products = "SELECT * from products limit 8";
$sql = mysqli_query($connection, $products);

if (isset($_GET['addid'])) {
    $id = $_GET['addid'];

    $product_details = "SELECT price from products where id='$id'";
    $run_query = mysqli_query($connection, $product_details);
}

$latest_product = "SELECT * from products group by id desc limit 4";
$latest_product_run = mysqli_query($connection, $latest_product);

?>
<!-- header section end -->
<!-- banner section start -->
<div class="banner_section layout_padding">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="banner_taital">50% <br>Off</h1>
                            <p class="banner_text">Ncididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                            <div class="read_bt"><a href="#">Buy Now</a></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="banner_img"><img src="images/38402220laptop.jpg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php while ($row = mysqli_fetch_assoc($latest_product_run)) {

                ?>
                <div class="carousel-item">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-6 ">
                                <h1 class="banner_taital">
                                    <?= $row['name']; ?> <br>
                                    <?= $row['brand']; ?>
                                </h1>
                                <p class="banner_text">
                                    <?= $row['description']; ?>
                                </p>
                                <div class="read_bt"><a href="#">Buy Now</a></div>
                            </div>
                            <div class="col-sm-6  d-flex align-items-center">
                                <div class="banner_img w-100  d-flex justify-content-center">
                                    <img style="height: 340px" src="images/<?= $row['image'] ?>">
                                    <!-- <a href="cart.php?productid=<?= $row2['id']; ?>"><img style="height: 340px" src="images/<?= $row2['image']; ?>"
                                            class="image_1 "></a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>
</div>
<!-- banner section end -->
<!-- product section start -->
<div class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="product_taital">Our Products</h1>
                <p class="product_text font-weight-bold">
                <ul>

                    <li><a href="#">Select Category</a>
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
                                            <a href="products-in-category.php?ids=<?= $columnId ?>">
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
                </p>
            </div>
        </div>
        <div class="product_section_2 layout_padding">

            <div class="row d-flex justify-content-center ">
                <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="product_box  ">
                            <form action="my-cart.php" method="POST">
                                <h4 class="bursh_text">
                                    <input type="hidden" name="product_id" value="<?= $row['name']; ?>" id="">
                                </h4>
                                <h4 class="bursh_text">
                                    <?= $row['name']; ?>
                                    <input type="hidden" name="product_name" value="<?= $row['name']; ?>" id="">
                                </h4>
                                <h6 class="text-center font-weight-bold">
                                    <?= $row['brand']; ?>
                                </h6>
                                <a href="cart.php?productid=<?= $row['id']; ?>"><img src="images/<?= $row['image']; ?>"
                                        class="image_1 "></a>
                                <div class="text-center ">
                                    <input type="number" placeholder="Quantity" name="product_quantity" id="">
                                </div>
                                <div class="d-flex justify-content-center ">
                                    <input type="submit" value="Add to cart" class="btn btn-success mt-1 mb-1"
                                        name="addCart" id="">
                                    <h3 class="price_text text-dark font-weight-bold pt-3">৳
                                        <?= number_format($row['price']); ?>
                                        <input type="hidden" name="product_price" value="<?= $row['price']; ?>" id="">
                                    </h3>

                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="seemore_bt"><a href="#">See More</a></div>
    </div>
</div>
</div>

<!-- Best selling products starts-->
<div class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="product_taital">Top Selling Products</h1>
                <p class="product_text font-weight-bold">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.ipsam soluta impedit quae modi ad dolorum
                    eveniet! Voluptatibus deleniti eius impedit perferendis
                    mollitia nulla quis!
                </p>
            </div>
        </div>
        <div class="product_section_2 layout_padding">

            <div class="row d-flex justify-content-center ">
                <?php
                $top_selling_product = "SELECT product_id, SUM(quantity) FROM order_products GROUP BY product_id ORDER BY SUM(quantity) DESC LIMIT 8";
                $top_selling_product_run = mysqli_query($connection, $top_selling_product);
                while ($row = mysqli_fetch_assoc($top_selling_product_run)) {
                    $select_product = "SELECT * from products where id='$row[product_id]'";
                    $select_product_run = mysqli_query($connection, $select_product);

                    while ($row2 = mysqli_fetch_assoc($select_product_run)) {
                        ?>
                        <div class="col-lg-3 col-sm-6">
                            <div class="product_box  ">
                                <form action="my-cart.php" method="POST">
                                    <h4 class="bursh_text">

                                        <input type="hidden" name="product_id" value="<?= $row2['name']; ?>" id="">
                                    </h4>
                                    <h4 class="bursh_text">
                                        <?= $row2['name']; ?>
                                        <input type="hidden" name="product_name" value="<?= $row2['name']; ?>" id="">
                                    </h4>
                                    <h6 class="text-center font-weight-bold">
                                        <?= $row2['brand']; ?>
                                    </h6>
                                    <a href="cart.php?productid=<?= $row2['id']; ?>"><img src="images/<?= $row2['image']; ?>"
                                            class="image_1 "></a>
                                    <div class="text-center">
                                        <input type="number" placeholder="Quantity" name="product_quantity" id="">
                                    </div>

                                    <div class="d-flex justify-content-center ">
                                        <input type="Submit" value="Add to cart" class="btn btn-success mt-1 mb-1"
                                            name="addCart" id="">
                                        <h3 class="price_text text-dark">৳
                                            <?= number_format($row2['price']); ?>
                                            <input type="hidden" name="product_price" value="<?= $row2['price']; ?>" id="">
                                        </h3>

                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
                } ?>
        </div>
        <div class="seemore_bt"><a href="#">See More</a></div>
    </div>
</div>

<!-- product section end -->
<!-- about section start -->
<!-- <div class="about_section layout_padding">
    <div class="container">
        <div class="about_section_main">
            <div class="row">
                <div class="col-md-6">
                    <div class="about_taital_main">
                        <h1 class="about_taital">About Our beauty sotore</h1>
                        <p class="about_text">labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                            exercitation ullamco laboris nisi ut aliquip ex ea commodo consequatlabore et dolore
                            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                            aliquip ex ea commodo consequatlabore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</p>
                        <div class="readmore_bt"><a href="#">Read More</a></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div><img src="images/about-img.png" class="image_3"></div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- about section end -->
<!-- customer section start -->
<div class="customer_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="customer_taital">What says customers</h1>
            </div>
        </div>
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="client_section_2">
                        <div class="client_main">
                            <div class="client_left">
                                <div class="client_img"><img src="images/client-img.png"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="name_text">Jonyro</h3>
                                <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation eu </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="client_section_2">
                        <div class="client_main">
                            <div class="client_left">
                                <div class="client_img"><img src="images/client-img.png"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="name_text">Jonyro</h3>
                                <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation eu </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="client_section_2">
                        <div class="client_main">
                            <div class="client_left">
                                <div class="client_img"><img src="images/client-img.png"></div>
                            </div>
                            <div class="client_right">
                                <h3 class="name_text">Jonyro</h3>
                                <p class="dolor_text">consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation eu </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>
<!-- customer section end -->
<!-- contact section start -->
<div class="contact_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="contact_taital">Get In Touch</h1>
                <p class="contact_text">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation eu </p>
            </div>
            <div class="col-md-6">
                <div class="contact_main">
                    <div class="contact_bt"><a href="#">Contact Form</a></div>
                    <div class="newletter_bt"><a href="#">Newletter</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="map_main">
        <div class="map-responsive">
            <iframe
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France"
                width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
        </div>
    </div>
</div>
<!-- contact section end -->
<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><a href="index.html"><img src="images/footer-logo.png"></a></div>
        <div class="contact_section_2">
            <div class="row">
                <div class="col-sm-4">
                    <h3 class="address_text">Contact Us</h3>
                    <div class="address_bt">
                        <ul>
                            <li>
                                <a href="#">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i><span
                                        class="padding_left10">Address : Loram Ipusm</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left10">Call
                                        : +01 1234567890</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left10">Email
                                        : demo@gmail.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="footer_logo_1"><a href="index.html"><img src="images/footer-logo.png"></a></div>
                    <p class="dummy_text">commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non</p>
                </div>
                <div class="col-sm-4">
                    <div class="main">
                        <h3 class="address_text">Best Products</h3>
                        <p class="ipsum_text">dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="social_icon">
            <ul>
                <li>
                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">2020 All Rights Reserved. Design by <a href="https://html.design">Free html
                Templates</a></p>
    </div>
</div>
<!-- copyright section end -->
<!-- Javascript files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<!-- javascript -->
<script src="js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
</body>

</html>