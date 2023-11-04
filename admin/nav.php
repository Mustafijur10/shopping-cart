<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../style/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

    <div class="container-fluid">


        <div class="row">

            <div class="col-sm-2 bg-dark height">

                <p class="pt-5 pb-5 text-center">
                    <a href="adminPage.php" class="text-decoration-none"><span
                            class="text-light text-font">Admin</span></a>
                </p>
                <p>

                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="adminPage.php" class="text-decoration-none"><span class="text-light">Profile</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="category-details.php" class="text-decoration-none"><span
                            class="text-light">Category</span></a>
                </p>
                <hr class="bg-light ">

                <p class="pt-2 pb-2 text-center">
                    <a href="add-products.php" class="text-decoration-none"><span class="text-light">Add
                            Products</span></a>
                </p>
                <hr class="bg-light ">

                <p class="pt-2 pb-2 text-center">
                    <a href="user-request.php" class="text-decoration-none"><span class="text-light">User
                            Requests</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="product-review.php" class="text-decoration-none"><span class="text-light">Product
                            Reviews</span></a>
                </p>
                <hr class="bg-light ">
                <p class="pt-2 pb-2 text-center">
                    <a href="order-list.php" class="text-decoration-none"><span class="text-light">Order
                            Requests</span></a>
                </p>



            </div>
            <div class="col-sm-10 bg-light">
                <div class="row">
                    <div class="col-sm-2">
                        <p class="text-center pt-5">
                        <h6 class="text-success">Welcome
                            <?php echo $_SESSION['usersname']; ?>
                        </h6>
                        </p>
                    </div>
                    <div class="col-sm-8">
                        <h1 class="text-center pt-4 pb-5"><strong>Products</strong>
                            <hr class="w-25 mx-auto">
                    </div>
                    <div class="col-sm-2">
                        <p class="pt-5 text-center">
                            <a href="logout.php" class="btn btn-outline-primary"
                                onClick="return confirm('are you sure?')">Logout</a>
                        </p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">