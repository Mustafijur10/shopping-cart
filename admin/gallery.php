<?php
include '../session.php';
include '../db.php';
//echo $_SESSION['usersname']   ;

//--------------Gallery-------------------
include 'nav.php';
?>
<div class="col-sm-10">
    <div class="d-flex justify-content-center">
        <button class="btn btn-success w-25 mb-5"><a href="add-gallery.php" class="text-light text-decoration-none">Add
                New Gallery</a></button>
    </div>

    <table class="table text-center">
        <thead>
            <tr class="bg-dark text-light">
                <th scope="col">Title</th>
                <th scope="col">Shortcode</th>
                <th scope="col">Images</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM gallery";
            $result = mysqli_query($connection, $sql);

            if ($result) {

                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $shortcode = $row['shortcode'];

                    echo '<tr>';
                    echo '  <td>' . $title . '</td>
                                    <td>' . $shortcode . '</td>';

                    $sql2 = "SELECT images FROM gallery_images where gallery_id='$id'";
                    $result2 = mysqli_query($connection, $sql2);
                    echo '<td>';
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $images = $row2["images"];
                        echo "<img src='../images/$images' width='100px' height='70px' style='margin-right: 5px;'> ";
                    }
                    echo '</td>';
                    echo '<td>
                              <button class="btn btn-primary"><a href="edit.php?editgalleryid=' . $id . '" class="text-light text-decoration-none">Edit</a></button>
                              <button class="btn btn-danger"><a href="delete.php?deletegalleryid=' . $id . '" class="text-light text-decoration-none">Delete</a></button>
                          </td>
                    </tr>';
                }
            }

            ?>
        </tbody>
    </table>
</div>

</body>

</html>