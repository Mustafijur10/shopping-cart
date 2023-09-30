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

    $image = rand(11111111, 99999999) . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);

    $query = "INSERT INTO products (name, color, brand, image, price, stock ) VALUES ('$name','$color', '$brand', '$image','$price', '$stock' ) ";
    $result = mysqli_query($connection, $query);

    $last_id = mysqli_insert_id($connection);

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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
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

                                <input type="file" class="form-control" accept=".jpg, .jpeg, .png" name="image"
                                    required>
                            </div>
                            <div>
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" required>
                            </div>
                            <div>
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" name="stock" required>
                            </div>

                            <div class="add-category-btn ">
                                <input type="submit" class="form-control btn-success mt-5 " value="Add Product"
                                    name="Add-Category">
                            </div>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>

</body>

</html>