<?php
include '../session.php';
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cname = $_POST['cname'];
    $tarea = $_POST['tarea'];

    $existedCategory = "select * from categories where name ='" . $cname . "'";
    $searchInCategory = mysqli_query($connection, $existedCategory);
    $row = mysqli_fetch_array($searchInCategory);

    if ($row["status"] === '1') {
        header("location:adminPage.php");
    } else {
        $query = "INSERT INTO categories (name, description, status) VALUES ('$cname','$tarea', 1)";
        $results = mysqli_query($connection, $query);

        if ($results) {
            header("location:category-details.php");
        } else {
            header("location:add-category.php");
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
    <div class="container-fluid">

        <div class="row">

            <?php include "nav.php"; ?>
            <div class="col-sm-10 bg-light">
                <div class="row">
                    <div class="col-sm-2">
                        <p class="text-center pt-5">

                        </p>

                    </div>
                    <div class="col-sm-8">
                        <h1 class="text-center pt-4 pb-5"><strong>Categories</strong>
                            <hr class="w-25 mx-auto">
                    </div>
                    <div class="col-sm-2">
                        <p class="pt-5 text-center">
                            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                        </p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <form action="#" method="POST" class="w-50">

                        <h1>Create Category</h1>

                        <div class="category-content">
                            <div>
                                <label for="cname">Enter Category Name</label>
                                <input type="text" name="cname" id="" class="form-control" required>
                            </div>
                            <div class="description">
                                <label for="tarea">Category Description</label>
                                <textarea name="tarea" id="" cols="21" rows="5" class="form-control"></textarea>
                            </div>

                            <div class="add-category-btn">
                                <input type="submit" value="Add Category" class="form-control btn-success mt-5"
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