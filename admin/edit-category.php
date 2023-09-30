<?php
include '../session.php';
include '../db.php';


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
        
            $category_id = mysqli_real_escape_string($connection, $_GET['editid']);
            $sql = "SELECT * FROM categories where id = '$category_id'";
            $sql_run = mysqli_query($connection, $sql);
            if (mysqli_num_rows($sql_run) > 0) {
                $category_info = mysqli_fetch_array($sql_run);
                ?>


                <div class="row">

                    <?php include "nav.php"; ?>
                    <div class="col-sm-10 bg-light">
                        <div class="row">
                            <div class="col-sm-2">
                                <p class="text-center pt-5">

                            </div>
                            <div class="col-sm-8">
                                <h1 class="text-center pt-4 pb-5"><strong>Category Details</strong>
                                    <hr class="w-25 mx-auto">
                            </div>
                            <div class="col-sm-2">
                                <p class="pt-5 text-center">
                                    <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                                </p>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center">
                            <form action="category-details.php" method="POST" class="w-50 m-5">

                                <h1>Edit Category</h1>

                                <div class="category-content">

                                    <div>
                                        <input type="hidden" name="product_id" id="" value="<?= $category_info['id']; ?>"
                                            required>
                                    </div>
                                    <div>
                                        <label for="name">Product Name</label>
                                        <input type="text" name="name" id="" class="form-control"
                                            value="<?= $category_info['name']; ?>" required>
                                    </div>
                                    <div>
                                        <label for="tarea" class=" mt-3">Description</label>

                                        <textarea name="tarea" cols="21" class="form-control"
                                            rows="5"><?= $category_info['description']; ?></textarea>
                                    </div>


                                    <div class="add-category-btn">
                                        <input type="submit" value="Update Category" class="form-control btn btn-success mt-5 "
                                            name="Add-Category">


                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
                >
                <?php

            } else {
                echo "<h3>Product not found</h3>";
            }
        }

        ?>

    </div>


</body>

</html>