<?php
include '../session.php';
include '../db.php';
//echo $_SESSION['usersname'];

//--------------UPDATE-------------------
if (isset($_POST['Add-Category'])) {

    $id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['tarea']);



    $query = "UPDATE categories set name='$name', description='$description' WHERE id='$id'";
    $result = mysqli_query($connection, $query);


    if ($result) {
        header("location:category-details.php");
    } else {
        echo "Not found";
    }

}
include 'nav.php'; ?>
<div class="col-sm-10 bg-light">

    <div class="row d-flex justify-content-center">
        <button class="btn btn-success w-25 mb-5"><a href="add-category.php" class="text-light text-decoration-none">Add
                New Category</a></button>
        <div class="col-sm-10">
            <table class="table ">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col">Category Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($connection, $sql);


                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $description = $row['description'];

                            echo '<tr>
                                                <th scope="row">' . $name . '</th>
                                                    <td>' . $description . '</td> 
                                                    <td>
                                                    
                                                        <button class="btn btn-primary"><a href="edit-category.php?editid=' . $id . '" class="text-light text-decoration-none">Edit</a></button>
                                                        <button class="btn btn-danger"><a href="delete-category.php?deleteid=' . $id . '" class="text-light text-decoration-none">Delete</a></button>';
                            $status = $row['status'];

                            if ($status == 1) {
                                echo '  <button class="btn btn-success"><a href="delete-category.php?activeid=' . $id . '" class="text-light text-decoration-none">Active</a></button>';
                            } else {
                                echo '  <button class="btn btn-warning"><a href="delete-category.php?inactiveid=' . $id . '" class="text-light text-decoration-none">Inactive</a></button>';
                            }


                            echo '  </td>';
                            echo '  </tr>';

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