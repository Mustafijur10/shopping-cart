<?php
include '../session.php';
include '../db.php';
include 'nav.php';
?>
<div class="col-sm-10 ">
    <table class="table text-center">
        <thead class="text-center">
            <tr class="bg-dark text-light">
                <th scope="col">Order Id</th>
                <th scope="col">Users Name</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Address</th>
                <th scope="col">Email</th>
                <th scope="col">Delivery Type</th>
                <th scope="col">Total Price</th>
                <th scope="col">Additional Info</th>
                <th scope="col">Date</th>

                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($connection, $sql);

            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $order_id = $row['id'];
                    $rand_order_id = rand(1111, 9999) . $row['id'];
                    $user_id = $row['user_id'];
                    $mobile_number = $row['mobile_number'];
                    $address = $row['address'];
                    $address = $row['address'];
                    $delivery_type = $row['delivery_type'];
                    $total_price = $row['total_price'];
                    $additional_info = $row['additional_info'];
                    $date = $row['date'];
                    $status = $row['status'];

                    $select_username = "SELECT user_name, email from users where id = '$user_id'";
                    $run_select_username = mysqli_query($connection, $select_username);
                    $username_row = mysqli_fetch_assoc($run_select_username);

                    $uname = $username_row['user_name'];
                    $email = $username_row['email'];

                    echo '<tr>';
                    echo '  <th scope="row" >
                                <button class="btn btn-info">
                                    <a href="order-details.php?detail=' . $order_id . '" class="text-light text-decoration-none">' . $rand_order_id . '</a>
                                </button></th>';
                    echo '  <td>' . $uname . '</td>
                            <td>' . $mobile_number . '</td>
                            <td>' . $address . '</td>
                            <td>' . $email . '</td>
                            <td>' . $delivery_type . '</td>
                            <td>' . $total_price . '</td>
                            <td>' . $additional_info . '</td>
                            <td>' . $date . '</td>                   
                            <td>';

                    if ($status == 0) {
                        echo '<div class="d-flex justify-content-between ">';
                        echo '<p class="text-primary">Pending</p>';
                        echo '<button class="btn btn-danger">
                            <a href="delete.php?cancel=' . $order_id . '" class="text-light text-decoration-none">Cancel</a>
                        </button>';
                        echo '</div>';
                    } elseif ($status == 1) {

                        echo '<div class="d-flex justify-content-between ">';
                        echo '<p class="text-primary">Processing</p>';
                        echo '<button class="btn btn-danger">
                                <a href="delete.php?cancel=' . $order_id . '" class="text-light text-decoration-none">Cancel</a>
                            </button>';
                        echo '</div>';
                    } else {
                        echo '<p class="text-success">Delivered successfully</p>';
                    }
                    echo '</td> </tr>';
                }
            }
            ?>
        </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
</body>

</html>