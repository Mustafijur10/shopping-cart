<?php

include 'db.php';
if (!isset($_SESSION)) {
  session_start();
}
if (isset($_SESSION['usersname'])) {
  header('location:userPage.php');
}

if (isset($_POST["username"]) && isset($_POST["password"])) {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $sql = "select * from users where user_name ='" . $username . "' AND passwords='" . $password . "'";
  $result = mysqli_query($connection, $sql);
  $row = mysqli_num_rows($result);

  $fetch = mysqli_fetch_array($result);

  if ($row == 1 && $fetch["user_type"] === '1') {
    $name = $fetch['user_name'];
    session_start();
    $_SESSION['usersname'] = $name;
    echo "seccess";
    header("location:admin/adminPage.php");

  } elseif ($row == 1 && $fetch["user_type"] === '0' && $fetch["status"] === '1') {
    $name = $fetch['user_name'];
    session_start();
    $_SESSION['usersname'] = $name;
    $_SESSION['status'] = $fetch['status'];
    echo "seccess";
    header("location:userPage.php");

  } else {
    header("location:login.php");
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style/login.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    body {
      width: 50%;
      background: #9999;
    }

    .error {
      color: red;
      font-style: italic;
    }
  </style>
</head>

<body>
  <form class="hi shadow-lg" id="login" method="POST">
    <div class="form-group">
      <label for="username">User Name</label>
      <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp"
        placeholder="Enter username">
      <p class="nameErr"></p>

    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
      <span id="login_message"></span>
    </div>

    <button type="submit" id="login_btn" name="login-btn" class="btn btn-primary new">Submit</button>

  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script src="user/login.js"></script>
</body>

</html>