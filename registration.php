<?php
include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $uemail = $_POST['uemail'];
    $password = md5($_POST['password']);

    $check = "SELECT email from users where email='$uemail'";
    $run_check = mysqli_query($connection, $check);
    $row = mysqli_num_rows($run_check);

    if ($row == 1) {
        echo 'email exist';
        header("location:registration.php");

    } else {
        $query = "INSERT INTO users (first_name, last_name, user_name, email, user_type, passwords, status) VALUES ('$fname','$lname','$username','$uemail', 0,'$password',0)";
        $result = mysqli_query($connection, $query);

        if ($result) {
            header("location:login.php");
        } else {
            echo "data not inserted";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .error {
            color: red;
            font-style: italic;
        }
    </style>
</head>

<body class="container-fluid ">

    <div class="col-lg-6">
        <form id="registration" action="" method="POST" class="" class="w-75">

            <h1 class="text-center">Registration</h1>

            <div>
                <label for="fname">Enter First Name</label>
                <input type="text" name="fname" id="firstname" class="form-control" required>
            </div>

            <div>
                <label for="lname">Enter Last Name</label>
                <input type="text" name="lname" id="lastname" class="form-control">
            </div>

            <div>
                <label for="username">Enter a username</label>
                <input type="text" name="username" id="username" class="form-control">
            </div>

            <div>
                <label for="uemail">Enter a valid Email</label>
                <input type="email" name="uemail" id="email" class="form-control">
            </div>

            <div>
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div>
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="cpassword" class="form-control">
            </div>

            <div class="input-field">
                <input type="submit" value="Register" class="form-control  btn-success mt-5 w-25 text-center"
                    name="register">
                <a href="index.php"
                    class="form-control  btn-primary mt-5 w-25 text-center text-decoration-none">Home</a>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="user/validation.js"></script>
</body>

</html>