<?php
include '../session.php';
include '../db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category-name'];
    $name = $_POST['name'];
    $color = $_POST['color'];
    $brand = $_POST['brand'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['tarea'];



    // $image = rand(11111111, 99999999) . $_FILES['image']['name'];
    // move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);

    $query = "INSERT INTO products (name, color, brand, price, stock, description ) VALUES 
                ('$name','$color', '$brand','$price', '$stock', '$description' ) ";
    $result = mysqli_query($connection, $query);

    $last_id = mysqli_insert_id($connection);

    foreach ($_FILES['image']['name'] as $key => $value) {
        $rand = rand(11111111, 99999999);
        $images = $rand . $value;
        move_uploaded_file($_FILES['image']['tmp_name'][$key], '../images/' . $images);

        $query3 = "INSERT INTO product_images (product_id, images) VALUES ('$last_id','$images') ";
        $result3 = mysqli_query($connection, $query3);

        if ($result3) {
            $_SESSION['message'] = "Successfuly";
            header("location:adminPage.php");
        } else {
            header("location:add-products.php");
        }
    }

    $selects = "SELECT images from product_images where product_id = '$last_id' group by images limit 1";
    $query_run = mysqli_query($connection, $selects);
    $seleced_image = mysqli_fetch_assoc($query_run);

    $li = $seleced_image['images'];
    $query5 = "UPDATE products set image = '$li' WHERE id = '$last_id';";
    $result5 = mysqli_query($connection, $query5);

    foreach ($category_id as $list) {
        $query2 = "INSERT INTO product_categories (product_id, category_id) VALUES ('$last_id','$list') ";
        $result2 = mysqli_query($connection, $query2);
        if ($result2) {
            $_SESSION['message'] = "Successfuly";
            header("location:adminPage.php");
        } else {
            header("location:add-products.php");
        }
    }
}
include 'nav.php';
?>



<form action="#" method="POST" class="w-50" enctype="multipart/form-data">

    <h1 class="row d-flex justify-content-center">Add Product</h1>

    <div class="category-content">
        <div>
            <label for="category-name">Select Category Names</label>
            <select name="category-name[]" class="form-select" multiple="multiple" required>
                <?php
                $info = "SELECT * FROM categories";
                $results = mysqli_query($connection, $info);
                if ($results) {
                    while ($row = mysqli_fetch_assoc($results)) {
                        $columnName = $row['name'];
                        $columnId = $row['id'];
                        $columnStatus = $row['status'];

                        if ($columnStatus == 1) {
                            ?>
                            <option value="<?= $columnId; ?>">
                                <?= $columnName; ?>
                            </option>
                            <?php
                        }

                    }
                }
                ?>
            </select>
        </div>
        <div>
            <label for="name">Product Name</label>
            <input type="text" class="form-control" name="name" required>
        </div>
        <div>
            <label for="color">Color</label>
            <input type="text" class="form-control" name="color" required>
        </div>
        <div>
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" required>
        </div>
        <div>
            <label for="image">Image</label>

            <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="image[]" multiple required>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" class="form-control" name="price" required>
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="text" class="form-control" name="stock" required>
        </div>
        <div class="description">
            <label for="tarea">Category Description</label>
            <textarea name="tarea" id="" cols="21" rows="2" class="form-control" required></textarea>
        </div>

        <div class="add-category-btn ">
            <input type="submit" class="form-control btn-success mt-5 " value="Add Product" name="Add-Category">
        </div>
    </div>
</form>
</div>

</div>

</div>
</div>

</body>

</html>