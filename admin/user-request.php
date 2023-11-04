<?php
include '../session.php';
include '../db.php';
include 'nav.php';

?>
<div class="col-sm-10">
    <table class="table text-center">
        <thead>
            <tr class="bg-dark text-light">
                <!-- <th scope="col">Name</th> -->
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">User Name</th>
                <th scope="col">Email</th>
                <th scope="col">Operations</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql = "SELECT * FROM users";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['user_type'] == 0) {

                        $id = $row['id'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $user_name = $row['user_name'];
                        $email = $row['email'];
                        $status = $row['status'];

                        echo '  <th scope="row" class="">' . $first_name . '</th>';
                        echo '          
                                
                                <td>' . $last_name . '</td>
                                <td>' . $user_name . '</td>
                                <td>' . $email . '</td>';

                        if ($status == 0) {
                            echo '  <td>
                                        <button class="btn btn-warning"><a href="delete-category.php?userid=' . $id . '" 
                                        class="text-light text-decoration-none">Inactive</a></button>
                                        
                                    </td>';
                        }
                        if ($status == 1) {
                            echo '  <td>
                                        <button class="btn btn-success"><a href="delete-category.php?iuserid=' . $id . '"
                                         class="text-light text-decoration-none">Active</a></button>
                                        
                                    </td>';
                        }
                    }
                    echo '</tr>';
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