<?php
include '../session.php';
include '../db.php';

$m_id = $_GET['editid'];
if (isset($_POST['Add-product'])) {
    if (isset($_GET['editid'])) {

        $edit_id = $_GET['editid'];
        $id = mysqli_real_escape_string($connection, $_POST['product_id']);
        $name = mysqli_real_escape_string($connection, $_POST['name']);
        $color = mysqli_real_escape_string($connection, $_POST['color']);
        $brand = mysqli_real_escape_string($connection, $_POST['brand']);
        $price = mysqli_real_escape_string($connection, $_POST['price']);
        $stock = mysqli_real_escape_string($connection, $_POST['stock']);
        $description = mysqli_real_escape_string($connection, $_POST['tarea']);
        $category_id = $_POST['edit_category'];
        $delete_id = $category_id;

        include 'delete.php';

        $query = "UPDATE products set name='$name', color='$color', brand='$brand', price='$price', stock='$stock', description='$description' WHERE id='$id'";
        $result = mysqli_query($connection, $query);

        foreach ($delete_id as $list) {
            $s = "DELETE FROM product_categories where product_id='$edit_id'";
            $d = mysqli_query($connection, $s);
        }

        // unlink image from folder
        $selectss = "SELECT images from product_images where product_id = '$edit_id'";
        $query_runs = mysqli_query($connection, $selectss);
        while ($seleced_images = mysqli_fetch_assoc($query_runs)) {
            unlink('../images/' . $seleced_images['images']);
        }

        $ss = "DELETE FROM product_images where product_id='$edit_id'";
        $dd = mysqli_query($connection, $ss);

        foreach ($category_id as $list) {
            $query2 = "INSERT INTO product_categories (product_id, category_id) VALUES ('$edit_id','$list') ";
            $result2 = mysqli_query($connection, $query2);
        }
        foreach ($_FILES['image']['name'] as $key => $value) {
            $rand = rand(11111111, 99999999);
            $images = $rand . $value;

            move_uploaded_file($_FILES['image']['tmp_name'][$key], '../images/' . $images);

            $query3 = "INSERT INTO product_images (product_id, images) VALUES ('$edit_id','$images') ";
            $result3 = mysqli_query($connection, $query3);


        }
        $selects = "SELECT images from product_images where product_id = '$edit_id' group by images limit 1";
        $query_run = mysqli_query($connection, $selects);
        $seleced_image = mysqli_fetch_assoc($query_run);

        $li = $seleced_image['images'];
        $query5 = "UPDATE products set image = '$li' WHERE id = '$edit_id';";
        $result5 = mysqli_query($connection, $query5);

        if ($result5) {
            $_SESSION['message'] = "Successfuly";
            header("location:adminPage.php");
        } else {
            header("location:add-products.php");
        }
    }
}


if (isset($_GET['pending'])) {
    $pending_id = $_GET['pending'];
    $sql = "UPDATE orders set status=1 where id='$pending_id'";
    $sql_run = mysqli_query($connection, $sql);
    header("location:order-list.php");
}
if (isset($_GET['processing'])) {
    $pending_id = $_GET['processing'];
    $sql = "UPDATE orders set status=2 where id='$pending_id'";
    $sql_run = mysqli_query($connection, $sql);
    header("location:order-list.php");
}
if (isset($_GET['last_status'])) {
    $last_status = $_GET['last_status'];

    $status_info = "SELECT status from orders where id = '$last_status'";
    $status_run = mysqli_query($connection, $status_info);
    $row_status_run = mysqli_fetch_assoc($status_run);
    $result = $row_status_run['status'];

    if ($result == 2) {
        $sql = "UPDATE orders set status=1 where id='$last_status'";
        $sql_run = mysqli_query($connection, $sql);
        header("location:order-list.php");
    } elseif ($result == 1) {
        $sql = "UPDATE orders set status=0 where id='$last_status'";
        $sql_run = mysqli_query($connection, $sql);
        header("location:order-list.php");

    } else {
        header("location:order-list.php");
    }
}

if (isset($_GET['editid'])) {

    $product_id = mysqli_real_escape_string($connection, $_GET['editid']);
    $sql = "SELECT * FROM products where id = '$product_id'";
    $sql_run = mysqli_query($connection, $sql);
    if (mysqli_num_rows($sql_run) > 0) {
        $product_info = mysqli_fetch_array($sql_run);
        include 'nav.php';
        ?>
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
                    <input type="hidden" name="product_id" id="" value="<?= $product_info['id']; ?>" required>
                </div>
                <div>
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" name="name" id="" value="<?= $product_info['name']; ?>" required>
                </div>
                <div>
                    <label for="color">Select Color</label>
                    <input type="text" name="color" id="" class="form-control" value="<?= $product_info['color']; ?>" required>
                </div>
                <div>
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" id="" class="form-control" value="<?= $product_info['brand']; ?>" required>
                </div>

                <div>

                    <label for=" image">Image</label>

                    <input type="file" accept=".jpg, .jpeg, .png" name="image[]" id="" class="form-control" multiple required>

                </div>
                <div class="d-flex mt-2 justify-content-center">
                    <?php
                    $select_image_name = "SELECT image from products where id='$m_id'";
                    $select_image_name_run = mysqli_query($connection, $select_image_name);
                    $image_column = mysqli_fetch_assoc($select_image_name_run);
                    $image_name = $image_column['image'];

                    $query_1 = "SELECT id, images from product_images where product_id ='$m_id' AND images !='$image_name' group by images asc ";
                    $query_1_run = mysqli_query($connection, $query_1);

                    while ($rows = mysqli_fetch_assoc($query_1_run)) { ?>

                        <div class="container-fluid d-flex justify-content-center" style="position: relative;">
                            <a href="update-image.php?editid='<?= $rows['id']; ?>'" class="text-decoration-none" style="background-color: transparent;
                             border:0; font-size:40px; curson:pointer; position: absolute;
                             top:-27px; right:2px; color: red">&times;</a>
                            <img style="width: 140px; height: 180px; " src="../images/<?= $rows['images']; ?>">
                        </div>
                    <?php } ?>
                </div>

                <div>
                    <label for="price">Price</label>
                    <input type="text" name="price" id="" class="form-control" value="<?= $product_info['price']; ?>" required>
                </div>
                <div>
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" id="" class="form-control" value="<?= $product_info['stock']; ?>" required>
                </div>
                <div>
                    <label for="tarea">Description</label>
                    <textarea name="tarea" id="" cols="21" rows="2" class="form-control"
                        required><?= $product_info['description']; ?></textarea>
                </div>

                <div class="add-category-btn">
                    <input type="submit" value="Update Product" class="form-control btn-success mt-5" name="Add-product">
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