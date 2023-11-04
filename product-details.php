<?php

include 'db.php';
include 'user/session.php';
include 'navUser.php';

$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>
<div class="col-sm-10 container-fluid justify-content-center">
    <h1 class="text-center font-weight-bold">Order List</h1>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>




            </tr>
        </thead>
        <tbody>

            <?php

            $b_id = $_GET['detail'];
            $multiple_name = "SELECT * from order_products where order_id='$b_id'";
            $run = mysqli_query($connection, $multiple_name);

            $select_status = "SELECT status from orders where id='$b_id'";
            $run_select_status = mysqli_query($connection, $select_status);
            $run_select_status_result = mysqli_fetch_assoc($run_select_status);
            $status = $run_select_status_result['status'];

            $sub = 0;


            if ($run) {

                while ($row = mysqli_fetch_assoc($run)) {
                    $product_id = $row['product_id'];
                    $product_quantity = $row['quantity'];

                    $product_list = "SELECT * from products where id='$product_id'";
                    $result = mysqli_query($connection, $product_list);

                    if ($result) {


                        echo '<tr>';
                        while ($row2 = mysqli_fetch_assoc($result)) {
                            $product_name = $row2['name'];
                            $product_brand = $row2['brand'];
                            $product_price = $row2['price'];
                            $product_quantity = $row['quantity'];
                            $product_name = $row2['name'];
                            $sub += (int) $product_price * (int) $product_quantity;

                            echo '  <th scope="row" class="">' . $product_name . '</th>';
                        }
                        echo '  
                                
                                <td>' . $product_brand . '</td>
                                <td>৳' . $product_price . '</td>
                                <td>' . $product_quantity . '</td>
                                <td>৳' . (int) $product_price * (int) $product_quantity . '</td>
                                
                                                                               
                                </tr>';

                    }

                }
            }



            ?>
            <tr>
                <td colspan="4">
                    <h3 class="font-weight-bold text-right ">Subtotal:</h3>
                </td>

                <td>
                    <h3 class="font-weight-bold ">৳
                        <?= $sub; ?>

                    </h3>
                </td>
            </tr>

            <td colspan="7" class="text-right "><button class="btn btn-info"><a href="my-orders.php"
                        class="text-light text-decoration-none">Back</a></button></td> ';

        </tbody>
    </table>
</div>