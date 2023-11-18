<?php
include '../session.php';
include '../db.php';
//echo $_SESSION['usersname'];

//--------------UPDATE-------------------
if (isset($_POST['Add-Page'])) {

    $id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $description = mysqli_real_escape_string($connection, $_POST['tarea']);



    $query = "UPDATE pages set name='$name', content='$description' WHERE id='$id'";
    $result = mysqli_query($connection, $query);


    if ($result) {
        header("location:page-edit.php");
    } else {
        echo "Not found";
    }

}
include 'nav.php'; ?>
<div class="col-sm-10 bg-light">

    <div class="row d-flex justify-content-center">
        <button class="btn btn-success w-25 mb-5"><a href="page-creator.php" class="text-light text-decoration-none">Add
                New Page</a></button>
        <div class="col-sm-10">
            <table class="table ">
                <thead>
                    <tr class="bg-dark text-light">
                        <th scope="col" class="text-center">Page Name</th>
                        <th scope="col" class="text-center">Page Content</th>
                        <th scope="col" class="text-center">Operations</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM pages";
                    $result = mysqli_query($connection, $sql);


                    if ($result) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $description = $row['content'];

                            echo '<tr>
                                       <th scope="row">' . $name . '</th>
                                       <td>' . $description . '</td> 
                                        <td>
                                                    
                                        <button class="btn btn-primary"><a href="edit-category.php?editpageid=' . $id . '" class="text-light text-decoration-none">Edit</a></button>
                                        <button class="btn btn-danger"><a href="delete-category.php?deletepageid=' . $id . '" class="text-light text-decoration-none">Delete</a></button>';

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