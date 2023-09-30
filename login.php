<?php

include 'db.php';
//include 'session.php';

if (isset($_POST['login-btn'])) {
  $username = $_POST["uname"];
  $password = md5($_POST["upassword"]);

  $sql = "select * from users where user_name ='" . $username . "' AND passwords='" . $password . "'";

  $result = mysqli_query($connection, $sql);
  //$row2 = mysqli_fetch_array($result);
  $row = mysqli_num_rows($result);


  $fetch = mysqli_fetch_array($result);

  if ($row == 1 && $fetch["user_type"] === '1') {
    $name = $fetch['user_name'];
    session_start();

    $_SESSION['usersname'] = $name;
    header("location:admin/adminPage.php");
  } elseif ($row == 1 && $fetch["user_type"] === '0') {
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
  </style>
</head>

<body>
  <form class="hi shadow-lg" method="POST">
    <div class="form-group">
      <label for="uname">User Name</label>
      <input type="text" class="form-control" name="uname" id="exampleInputEmail1" aria-describedby="emailHelp"
        placeholder="Enter username">

    </div>
    <div class="form-group">
      <label for="upassword">Password</label>
      <input type="password" name="upassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>

    <button type="submit" name="login-btn" class="btn btn-primary new">Submit</button>

  </form>
</body>

</html>