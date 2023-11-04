<?php
include '../session.php';
include '../db.php';
include 'nav.php';
?>
<div class="col-sm-10 container-fluid justify-content-center">
    <h1 class="text-center font-weight-bold">Order Details</h1>
    <table class="table text-center">
        <thead>
            <tr class="bg-dark text-light">
                <th scope="col">Product Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $order_details = $_GET['detail'];
            $multiple_name = "SELECT * from order_products where order_id='$order_details'";
            $run = mysqli_query($connection, $multiple_name);

            $select_status = "SELECT status from orders where id='$order_details'";
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
                <td colspan="4 ">
                    <h3 class="font-weight-bold text-end">Subtotal:</h3>
                </td>

                <td>
                    <h3 class="font-weight-bold">৳
                        <?= $sub; ?>
                    </h3>
                </td>
            </tr>


            <?php
            echo '<tr><td colspan="4"></td>
            <td class="text-right d-flex justify-content-around">';
            if ($status == 0) {
                echo '<button class="btn btn-warning">
            <a href="edit.php?pending=' . $order_details . '" class="text-light text-decoration-none">Pending</a>
        </button>';
            } elseif ($status == 1) {
                echo '<button class="btn btn-info">
            <a href="edit.php?processing=' . $order_details . '" class="text-light text-decoration-none">Processing</a>
        </button>';
            } else {
                echo '<button class="btn btn-success">
            <a href="#" class="text-light text-decoration-none">Completed</a>
        </button>';
            }
            echo '<button class="btn btn-secondary">
        <a href="edit.php?last_status=' . $order_details . '" class="text-light text-decoration-none">Last Status</a>
    </button>';
            echo '<button class="btn btn-danger">
        <a href="delete.php?cancel=' . $order_details . '" class="text-light text-decoration-none">Cancel</a>
    </button>
            </td>
        </tr>';

            ?>
        </tbody>
    </table>
</div>