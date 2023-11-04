<?php
include 'db.php';
include 'user/session.php';
include 'navUser.php';

?>
<div class="col-sm-10 container-fluid justify-content-center">
    <h1 class="text-center font-weight-bold">Order List</h1>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Address</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Email</th>
                <th scope="col">Delivery Type</th>
                <th scope="col">Total</th>
                <th scope="col">Date </th>
                <th scope="col">Status </th>
                <th scope="col">Product Details </th>

            </tr>
        </thead>
        <tbody>

            <?php
            $a = $_SESSION['usersname'];

            $session_id = "SELECT id from users where user_name='$a'";
            $run_session_id = mysqli_query($connection, $session_id);
            $val = mysqli_fetch_assoc($run_session_id);
            $rows = $val['id'];

            $sql = "SELECT * FROM orders where user_id = '$rows'";
            $result = mysqli_query($connection, $sql);

            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['id'];
                    $user_id = $row['user_id'];
                    $mobile_number = $row['mobile_number'];
                    $address = $row['address'];
                    $delivery_type = $row['delivery_type'];
                    $total_price = $row['total_price'];
                    $additional_info = $row['additional_info'];
                    $date = $row['date'];
                    $status = $row['status'];

                    $select_username = "SELECT user_name, id, email from users where id = '$user_id'";
                    $run_select_username = mysqli_query($connection, $select_username);
                    $username_row = mysqli_fetch_assoc($run_select_username);

                    $uname = $username_row['user_name'];
                    $email = $username_row['email'];
                    $uid = $username_row['id'];

                    $multiple_name = "SELECT GROUP_CONCAT(name) as cat_name from categories where id IN (SELECT category_id FROM product_categories WHERE product_id = '$user_id' ) ;";
                    $run = mysqli_query($connection, $multiple_name);

                    if ($run) {
                        echo '<tr>';
                        while ($row2 = mysqli_fetch_assoc($run)) {

                            echo '  <th scope="row" class="">' . $address . '</th>';
                        }
                        echo '  
                                
                                <td>' . $mobile_number . '</td>
                                <td>' . $email . '</td>
                                <td>' . $delivery_type . '</td>
                                <td>' . $total_price . '</td>
                                <td>' . $date . '</td> 
                                                                               
                                <td>';

                        if ($status == 0) {
                            echo '
                                    Pending';
                        } elseif ($status == 1) {
                            echo '
                            Processing';
                        } else {
                            echo '
                            <p>Order delivered successfully. Thank you for shop from us</p>
                            ';
                        }
                        echo '</td>';
                        echo '<td><button class="btn btn-info"><a href="product-details.php?detail=' . $order_id . '" class="text-light text-decoration-none">Details</a></button></td> ';
                    }

                }
            }



            ?>


        </tbody>
    </table>
</div>