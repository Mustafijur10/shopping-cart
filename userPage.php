<?php

include 'db.php';
include 'user/session.php';
include 'navUser.php';



$user_name = $_SESSION['usersname'];
$user_details = "SELECT * from users where user_name ='$user_name'";
$user_details_run = mysqli_query($connection, $user_details);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $select_user_id = "SELECT id from users where user_name='$_SESSION[usersname]'";
    $select_user_id_run = mysqli_query($connection, $select_user_id);
    $selected_row = mysqli_fetch_assoc($select_user_id_run);

    $selected_id = $selected_row['id'];
    $phone_number = $_POST['phone_number'];
    $product_name = $_POST['product_name'];
    $address = $_POST['address'];
    $total_price = $_POST['total_price'];
    $delivery_type = $_POST['COD'];
    $additional_info = $_POST['additional_info'];
    $product_quantity = $_POST['product_quantity'];
    $date = date('y-m-d h-i-s');

    print_r($product_quantity);



    if ($total_price == 0) {
        header("location:userPage.php");
    } else {
        $insert_in_orders = "INSERT INTO orders (user_id, mobile_number, address, delivery_type, total_price, additional_info, date, status ) VALUES
        ('$selected_id','$phone_number', '$address', '$delivery_type','$total_price', '$additional_info', '$date', 0 ) ";
        $run_insert_in_orders = mysqli_query($connection, $insert_in_orders);

        $last_order = mysqli_insert_id($connection);
        $i = 0;

        foreach ($product_name as $value) {
            $find_product_id = "SELECT id,price from products where name='$value'";
            $products_id = mysqli_query($connection, $find_product_id);
            $row = mysqli_fetch_assoc($products_id);
            $the_id = $row['id'];
            $product_price = $row['price'];


            $product_total = (int) $product_price * (int) $product_quantity[$i];


            $insert_order_products = "INSERT into order_products ( order_id, product_id, price, quantity, total_amount) values
            ('$last_order', '$the_id', '$product_price', '$product_quantity[$i]', '$product_total')";
            $run_insert_order_products = mysqli_query($connection, $insert_order_products);
            $i++;
        }

        unset($_SESSION['cart']);
        header("location:userPage.php");

    }
}
?>
<div class="container-fluid d-flex justify-content-center pt-5">
    <form class="container-fluid d-flex justify-content-center" method="POST">
        <div class="row w-50 ">
            <div class="col-md-8 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h3 class="mb-0 text-center font-weight-bold">Biling details</h3>
                    </div>
                    <div class="card-body">

                        <?php
                        while ($row = mysqli_fetch_assoc($user_details_run)) {
                            $Fname = $row['first_name'];
                            $Lname = $row['last_name'];
                            $email = $row['email'];
                            $id = $row['id'];

                            ?>
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form7Example1">First name</label>
                                        <input disabled type="text" id="form7Example1" value="<?= $Fname; ?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-outline">
                                        <label class="form-label" for="form7Example2">Last name</label>
                                        <input disabled type="text" id="form7Example2" value="<?= $Lname; ?>"
                                            class="form-control" required />
                                    </div>
                                </div>
                            </div>

                            <!-- Text input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form7Example4">Address</label>
                                <input type="text" name="address" id="form7Example4" class="form-control" required />
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form7Example5">Email</label>
                                <input disabled type="email" id="form7Example5" value="<?= $email; ?>" class="form-control"
                                    required />
                            </div>

                            <!-- Number input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form7Example6">Phone</label>
                                <input type="number" name="phone_number" id="form7Example6" class="form-control" required />

                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="delivery">Select an Option</label>

                                <select class="form-control" name="delivery" id="cars">
                                    <option>Cash On Delivery</option>
                                    <input type="hidden" name="COD" value="COD">
                                </select>
                            </div>

                            <!-- Message input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form7Example7">Additional information</label>
                                <textarea class="form-control" name="additional_info" id="form7Example7" rows="3" value=""
                                    required></textarea>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h3 class="mb-0 text-center font-weight-bold">Summary</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <?php
                            $total_price = 0;
                            $subtotal = 0;

                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $total_price = $value['productPrice'] * $value['productQuantity'];
                                    $subtotal += $value['productPrice'] * $value['productQuantity'];

                                    ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center px-0 ">
                                        <?= $value['productQuantity']; ?> X

                                        <?= $value['productName']; ?>
                                        <input type="hidden" name="product_quantity[]"
                                            value="<?= $value['productQuantity']; ?>">
                                        <input type="hidden" name="product_price" value="<?= $value['productPrice']; ?>">
                                        <input type="hidden" name="product_name[]" value="<?= $value['productName']; ?>">

                                        <span>৳
                                            <?= $total_price; ?>
                                        </span>
                                    </li>
                                <?php }
                            } ?>
                            <li class=" list-group-item d-flex justify-content-between align-items-center px-0">
                                <span class="font-weight-bold text-dark">Total Amount:</span>

                                <span class="font-weight-bold  text-danger">৳
                                    <strong name="total_price">
                                        <?= $subtotal; ?>
                                    </strong>
                                </span>
                            </li>
                        </ul>
                        <input type="hidden" name="total_price" value="<?= $subtotal; ?>">
                        <input type="submit" class="btn btn-primary btn-lg btn-block text-light" value="Make
                            purchase" name="make-purchase">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>