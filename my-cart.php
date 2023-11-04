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


if (isset($_POST['addCart'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_id = $_POST['product_id'];


    if (!empty($_SESSION['cart'])) {
        $check_product = array_column($_SESSION['cart'], 'productName');
        if (in_array($product_name, $check_product)) {
            echo "
            <script>
            alert('Product already Added');
            window.location.href ='index.php';
            </script>
            ";
        } else {
            $_SESSION['cart'][] = array(
                'productName' => $product_name,
                'productPrice' => $product_price,
                'productQuantity' => $product_quantity,
                'productId' => $product_id
            );
            header('location:index.php');

        }
    } else {
        $_SESSION['cart'][] = array(
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQuantity' => $product_quantity,
            'productId' => $product_id
        );
        header('location:index.php');
    }


}

// Buy Now

if (isset($_POST['buyNow'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];
    $product_id = $_POST['product_id'];


    if (!empty($_SESSION['cart'])) {
        $check_product = array_column($_SESSION['cart'], 'productName');
        if (in_array($product_name, $check_product)) {
            echo "
            <script>
            alert('Product already Added');
            window.location.href ='index.php';
            </script>
            ";
        } else {
            $_SESSION['cart'][] = array(
                'productName' => $product_name,
                'productPrice' => $product_price,
                'productQuantity' => $product_quantity,
                'productId' => $product_id
            );
            header('location:login.php');

        }
    } else {
        $_SESSION['cart'][] = array(
            'productName' => $product_name,
            'productPrice' => $product_price,
            'productQuantity' => $product_quantity,
            'productId' => $product_id
        );
        header('location:login.php');
    }

}


//Post Review

if (isset($_POST['post-review'])) {
    $post_area = $_POST['post-area'];
    $post_star = $_POST['post-star'];
    $product_id = $_POST['product_id'];
    // print_r($post_area);
    // echo $post_star;

    $user_name = $_SESSION['usersname'];

    $select_user_id = "SELECT id from users where user_name='$user_name'";
    $select_user_id_run = mysqli_query($connection, $select_user_id);
    $select_id = mysqli_fetch_assoc($select_user_id_run);
    $user_id = $select_id['id'];
    $date = date('y-m-d h-i-s');

    $insert_into_table = "INSERT INTO product_reviews (user_id, product_id, ratting, comment, status, added_on) 
                            VALUES ('$user_id','$product_id', '$post_star', '$post_area', 0, '$date')";
    $insert_into_table_run = mysqli_query($connection, $insert_into_table);
    header('location:cart.php?productid=' . $product_id);

}


// Remove Product 
if (isset($_POST['remove'])) {
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] === $_POST['item']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            header('location:my-cart.php');
        }
    }
}
//Update
if (isset($_POST['update'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_quantity = $_POST['product_quantity'];

    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productName'] == $_POST['item']) {
            $_SESSION['cart'][$key] = array(
                'productName' => $product_name,
                'productPrice' => $product_price,
                'productQuantity' => $product_quantity
            );
            header('location:my-cart.php');
        }
    }
}
?>
<div class=" container-fluid  w-50 ">
    <h4 class="font-weight-bold text-center ">My Cart</h4>
    <table class="table text-center">
        <thead>
            <tr>
                <th scope="col">Products</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_price = 0;
            $subtotal = 0;
            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    $total_price = (int) $value['productPrice'] * (int) $value['productQuantity'];
                    $subtotal += (int) $value['productPrice'] * (int) $value['productQuantity'];
                    echo "
                        <form action='my-cart.php' method='POST'>
                            <tr>
                                <td><input type='hidden' name='product_name' value='$value[productName]' >$value[productName]</td>
                                <td><input type='hidden' name='product_price' value='$value[productPrice]' >$value[productPrice]</td>
                                <td><input type='number' min='1' name='product_quantity' value='$value[productQuantity]' ></td>
                                <td><span>৳</span>$total_price</td>
                                <td><button name='update' class='btn btn-primary'>Update</button>
                                <button name='remove' class='btn btn-danger'>Delete</button></td>
                                <td><input type='hidden' name='item' value='$value[productName]'></td>
                            </tr>                                 
                        </form>";
                }
            }
            ?>
            <tr>
                <td colspan="3">
                    <h3 class="font-weight-bold text-right ">Subtotal:</h3>
                </td>
                <td>
                    <h3 class="font-weight-bold ">৳
                        <?= $subtotal ?>
                    </h3>
                </td>
                <td>
                    <h3>
                        <?php
                        if ($subtotal == 0) {
                            echo '<a href="#" class="btn btn-success">Place Order</a>';
                        } else {
                            echo '<a href="login.php" type = "submit" class="btn btn-success">Place Order</a>';
                        }
                        ?>
                    </h3>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script src="my-cart.js"></script>
</body>

</html>