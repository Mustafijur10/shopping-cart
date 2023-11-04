<?php
include 'db.php';
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $sql = "select * from users where user_name ='" . $username . "' AND passwords='" . $password . "'";
    $data = mysqli_query($connection, $sql);
    $row_count = mysqli_num_rows($data);

    if ($row_count == 1) {
        $row = mysqli_fetch_array($data);
        $id = $row['id'];
        session_start();
        $_SESSION['id'] = $id;
        echo "success";
    } else {
        echo "failed";
    }
}
?>