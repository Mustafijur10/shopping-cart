<?php
include '../session.php';
include '../db.php';
//echo $_SESSION['usersname']   ;

//--------------UPDATE-------------------
include 'nav.php';
?>
<div class="col-sm-10">
    <table class="table text-center">
        <thead>
            <tr class="bg-dark text-light">
                <th scope="col">Category Name</th>
                <th scope="col">Name</th>
                <th scope="col">Color</th>
                <th scope="col">Brand</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Stock</th>
                <th scope="col">Description</th>
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
                    $description = $row['description'];

                    $multiple_name = "SELECT GROUP_CONCAT(name) as cat_name from categories where id IN 
                    (SELECT category_id FROM product_categories WHERE product_id = '$id' ) ;                                              ";
                    $run = mysqli_query($connection, $multiple_name);

                    if ($run) {
                        echo '<tr>';
                        while ($row2 = mysqli_fetch_assoc($run)) {
                            echo '  <th scope="row" class="">' . $row2['cat_name'] . '</th>';
                        }
                        echo '  <td>' . $name . '</td>
                                    <td>' . $color . '</td>
                                    <td>' . $brand . '</td>
                                    <td>' . "<img src='../images/$image' width='100px' height='70px'>" . '</td>
                                    <td>' . $price . '</td>
                                    <td>' . $stock . '</td>
                                    <td class="text-wrap">' . $description . '</td>                                                  
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