<?php
include "db.php";
include "header.php";

$id = $_GET['ids'];
$products = "SELECT product_id from product_categories where category_id ='$id'";
$sql = mysqli_query($connection, $products);

if (isset($_GET['addid'])) {
    $id = $_GET['addid'];

    $product_details = "SELECT price from products where id='$id'";
    $run_query = mysqli_query($connection, $product_details);
}

?>
<!-- product section start -->
<div class="product_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="product_taital">Our Products</h1>
                <p class="product_text font-weight-bold">

                </p>
            </div>
        </div>
        <div class="product_section_2 layout_padding">

            <div class="row d-flex justify-content-center ">
                <?php while ($row = mysqli_fetch_assoc($sql)) {
                    $information = $row['product_id'];
                    $product_show = "SELECT * from products where id ='$information'";
                    $run_product_show = mysqli_query($connection, $product_show);
                    while ($row2 = mysqli_fetch_assoc($run_product_show)) {
                        ?>

                        <div class="col-lg-3 col-sm-6">
                            <div class="product_box">
                                <h4 class="bursh_text">
                                    <?= $row2['name']; ?>
                                </h4>
                                <h6 class="text-center font-weight-bold">
                                    <?= $row2['brand']; ?>
                                </h6>
                                <a href="cart.php?productid=<?= $row2['id']; ?>"><img src="images/<?= $row2['image']; ?>"
                                        class="image_1 "></a>

                                <div class="d-flex justify-content-center ">
                                    <div class="btn_main">
                                        <div class="buy_bt">
                                            <ul>
                                                <li><a href="#">Buy Now</a></li>
                                            </ul>
                                        </div>
                                        <h3 class="price_text">$
                                            <?= $row2['price']; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                }
                ?>
            </div>

        </div>
    </div>
</div>
</body>

</html>