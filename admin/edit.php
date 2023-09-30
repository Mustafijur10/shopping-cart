<?php
include '../session.php';
include '../db.php';

if (isset($_POST['Add-product'])) {
    if (isset($_GET['editid'])) {
        $edit_id = $_GET['editid'];

        $id = mysqli_real_escape_string($connection, $_POST['product_id']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $color = mysqli_real_escape_string($connection, $_POST['color']);
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $stock = mysqli_real_escape_string($connection, $_POST['stock']);
        $image_name = mysqli_real_escape_string($connection, $_POST['image']);
        $category_id = $_POST['edit_category'];

        // $get_image_info = "SELECT image from products where id='$edit_id'";
        // $get_image_info_run = mysqli_query($connection, $get_image_info);
        // $get_row = mysqli_fetch_array($get_image_info_run);

        // $image_info = $get_row['image'];



        $delete_id = $category_id;

        include 'delete.php';
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);

        $query = "UPDATE products set name='$name', color='$color', brand='$brand', image='$image', price='$price', stock='$stock' WHERE id='$id'";
        $result = mysqli_query($connection, $query);

        foreach ($delete_id as $list) {
            $s = "DELETE FROM product_categories where product_id='$edit_id'";
            $d = mysqli_query($connection, $s);
        }

        foreach ($category_id as $list) {

            $query2 = "INSERT INTO product_categories (product_id, category_id) VALUES ('$edit_id','$list') ";
            $result2 = mysqli_query($connection, $query2);
            if ($result2) {
                $_SESSION['message'] = "Successfuly";
                header("location:adminPage.php");
            } else {
                header("location:add-products.php");
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>

    <link rel="stylesheet" href="../style/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
    <div>
        <?php
        if (isset($_GET['editid'])) {
            //echo $product_id = $_GET['editid'];
        
            $product_id = mysqli_real_escape_string($connection, $_GET['editid']);
            $sql = "SELECT * FROM products where id = '$product_id'";
            $sql_run = mysqli_query($connection, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                $product_info = mysqli_fetch_array($sql_run);
                ?>


                <div class="row">

                    <?php include "nav.php"; ?>
                    <div class="col-sm-10 bg-light">
                        <div class="row">
                            <div class="col-sm-2">
                                <p class="text-center pt-5">

                            </div>
                            <div class="col-sm-8">
                                <h1 class="text-center pt-4 pb-5"><strong>Products</strong>
                                    <hr class="w-25 mx-auto">
                            </div>
                            <div class="col-sm-2">
                                <p class="pt-5 text-center">
                                    <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                                </p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <form action="#" method="POST" class="w-50" enctype="multipart/form-data">

                                <h1 class="row d-flex justify-content-center">Edit Product</h1>

                                <div class="category-content">
                                    <div>
                                        <label for="category-name">Select Category Name</label>
                                        <select name="edit_category[]" multiple="multiple" class="ms-1 d-block w-100" required>
                                            <?php
                                            $cat_array = [];

                                            $query2 = "SELECT category_id FROM product_categories WHERE product_id = $product_id";
                                            $result2 = mysqli_query($connection, $query2);
                                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                                array_push($cat_array, $row2['category_id']);
                                            }
                                            $category = mysqli_query($connection, "SELECT id, name, status from categories");
                                            foreach ($category as $row) {
                                                $category_status = $row['status'];

                                                if ($category_status == 1) {
                                                    ?>
                                                    <option value="<?= $row['id']; ?>" <?php echo in_array($row['id'], $cat_array) ? 'selected' : '' ?>>
                                                        <?= $row['name']; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div>
                                        <input type="hidden" name="product_id" id="" value="<?= $product_info['id']; ?>"
                                            required>
                                    </div>
                                    <div>
                                        <label for="name">Product Name</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            value="<?= $product_info['name']; ?>" required>
                                    </div>
                                    <div>
                                        <label for="color">Select Color</label>
                                        <input type="text" name="color" id="" class="form-control"
                                            value="<?= $product_info['color']; ?>" required>
                                    </div>
                                    <div>
                                        <label for="brand">Brand</label>
                                        <input type="text" name="brand" id="" class="form-control"
                                            value="<?= $product_info['brand']; ?>" required>
                                    </div>
                                    <div>
                                        <label for="image">Image</label>

                                        <input type="file" name="image" id="" class="form-control"
                                            value="<?= $product_info['image']; ?>">
                                    </div>
                                    <div>
                                        <label for="price">Price</label>
                                        <input type="text" name="price" id="" class="form-control"
                                            value="<?= $product_info['price']; ?>" required>
                                    </div>
                                    <div>
                                        <label for="stock">Stock</label>
                                        <input type="text" name="stock" id="" class="form-control"
                                            value="<?= $product_info['stock']; ?>" required>
                                    </div>

                                    <div class="add-category-btn">
                                        <input type="submit" value="Update Product" class="form-control btn-success mt-5"
                                            name="Add-product">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                echo "<h3>Product not found</h3>";
            }
        }
        ?>
    </div>
</body>

</html>