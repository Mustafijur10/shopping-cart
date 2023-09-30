<?php
include '../session.php';
include '../db.php';
//echo $_SESSION['usersname']   ;

//--------------UPDATE-------------------


?>
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

            <?php include 'nav.php'; ?>
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
                            <a href="logout.php" class="btn btn-outline-primary">Logout</a>
                        </p>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-10">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Brand</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "SELECT * FROM products";
                                $result = mysqli_query($connection, $sql);


                                if ($result) {

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $name = $row['name'];
                                        $color = $row['color'];
                                        $brand = $row['brand'];
                                        $image = $row['image'];
                                        $price = $row['price'];
                                        $stock = $row['stock'];



                                        $multiple_name = "SELECT GROUP_CONCAT(name) as cat_name from categories where id IN (SELECT category_id FROM product_categories WHERE product_id = '$id' ) ;
                                                ";
                                        $run = mysqli_query($connection, $multiple_name);

                                        if ($run) {
                                            echo '<tr>';
                                            while ($row2 = mysqli_fetch_assoc($run)) {
                                                // print_r($row2);
                                                echo '     <th scope="row" class="">' . $row2['cat_name'] . '</th>';
                                            }

                                            echo '          <td>' . $name . '</td>
                                                                    <td>' . $color . '</td>
                                                                    <td>' . $brand . '</td>
                                                                    <td>' . "<img src='../images/$image' width='100px' height='70px'>" . '</td>
                                                                    <td>' . $price . '</td>
                                                                    <td>' . $stock . '</td>
                                                    
                                                                    <td>
                                                                        <button class="btn btn-primary"><a href="edit.php?editid=' . $id . '" class="text-light text-decoration-none">Edit</a></button>
                                                                        <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light text-decoration-none">Delete</a></button>
                                                                    </td>
                                                    </tr>';
                                        }
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