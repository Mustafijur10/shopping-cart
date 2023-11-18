<?php
include 'db.php';
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['usersname'])) {
    include 'navUser.php';
} else {
    include 'header.php';
}

$image_id = $_GET['productid'];

$products = "SELECT * from products where id = '$image_id'";
$sql = mysqli_query($connection, $products);

$row = mysqli_fetch_assoc($sql);
$image_names = $row['image'];

$product = "SELECT * from products limit 8";
$sql2 = mysqli_query($connection, $products);

$select_image = "SELECT images from product_images where product_id = $image_id";
$select_image_run = mysqli_query($connection, $select_image);
?>
<div class="product_section layout_padding ">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="product_taital">Product Details</h1>
                <p class="product_text"></p>
            </div>
        </div>
        <div class="product_section_2 layout_padding ">

            <div class="row d-flex justify-content-center shadow-lg p-3 mb-5 bg-white rounded">
                <?php while ($row = mysqli_fetch_assoc($sql2)) { ?>
                    <div class="col-lg-7 col-sm-6 d-flex flex-column align-items-center justify-content-center">
                        <div>
                            <img id="imageChange" style="width:100%; height:500px" src="images/<?= $row['image']; ?>">
                        </div>
                        <div class="mt-5 d-flex justify-content-between container ">
                            <?php
                            while ($rows = mysqli_fetch_assoc($select_image_run)) { ?>
                                <button>
                                    <img onclick="changeImage('images/<?= $rows['images']; ?>', '<?= $rows['images']; ?>')"
                                        style="width: 80px; height: 110px;" src="images/<?= $rows['images']; ?>">
                                </button>

                            <?php } ?>
                        </div>

                    </div>
                    <div class="col-lg-5 col-sm-6 ">
                        <form action="my-cart.php" method="POST">
                            <p class="">Name:
                                <input type="hidden" name="product_name" value="<?= $row['name']; ?>" id="">


                                <?= $row['name']; ?>
                            </p>
                            <p class="">Description:
                                <?= $row['description']; ?>
                            </p>

                            <p class="" id="NameChange">shortcode:
                                <?php $rep_name = $row['image'];
                                $rep_name = str_replace(".jpg", "", $rep_name);
                                echo $rep_name; ?>


                            </p>
                            <p class="">Brand:
                                <?= $row['brand']; ?>
                            </p>
                            <p class="">Color:
                                <?= $row['color']; ?>
                            </p>
                            <p>Price: <span class="text-danger font-weight-bold">৳
                                    <input type="hidden" name="product_price" value="<?= $row['price']; ?>" id="">
                                    <input type="hidden" name="product_id" value="<?= $image_id; ?>" id="">

                                    <?= $row['price']; ?>
                                </span>
                            </p>
                            <p class="">Availability:
                                <?php
                                if ($row['stock'] >= 1) {
                                    ?><span class="text-success font-weight-bold">
                                        In Stock
                                    </span>
                                    <?php

                                } else {
                                    ?><span class="text-danger font-weight-bold">
                                        Stock Out
                                    </span>
                                    <?php
                                }
                                ?>
                            </p>
                            <p class=""> <input type="number" class="form-control w-25" placeholder="Quantity"
                                    name="product_quantity" id="" required>
                            </p>
                            <p id="add-to-cart">

                                <input type="Submit" value="Buy Now" class="btn btn-success mt-1 mb- text-light1"
                                    name="buyNow" id="">
                                <input type="Submit" value="Add to cart" class="btn btn-info mt-1 mb- text-light1"
                                    name="addCart" id="">
                            </p>
                            <div class=" mt-5 container-fluid d-flex justify-content-between ">

                            </div>
                        </form>

                    </div>
                    <?php
                    if (isset($_SESSION['usersname'])) {
                        ?>

                        <div class="mt-5">
                            <div class="text-center">
                                <h2 class="font-weight-bold">Submit a review</h2>
                            </div>
                            <form method="POST" action="my-cart.php">


                                <div>
                                    <textarea name="post-area" id="" placeholder="Write your comment" cols="100"
                                        rows="6"></textarea>
                                </div>

                                <div class="mt-1">
                                    <label for="select-ratting">
                                        <h3>Select Your Ratting</h3>
                                    </label>
                                    <select class="form-select" name="post-star" aria-label="Default select example">

                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>

                                <div class="d-flex">
                                    <input type="hidden" name="product_id" value="<?= $image_id ?>" id="">
                                    <input type="submit" value="Post" name="post-review"
                                        class="form-control btn-info mt-5 w-25 text-center">
                                    <input type="submit" value="Cancel"
                                        class="form-control ml-3 btn-danger mt-5 w-25 text-center">

                                </div>
                            </form>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    function changeImage(filename, name) {
        let img = document.querySelector("#imageChange");
        img.setAttribute("src", filename);

        name = name.replace(".jpg", "");
        document.querySelector("#NameChange").innerText = 'shortcode: ' + name;
    }
</script>
</body>

</html>