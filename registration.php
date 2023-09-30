

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style/registration.css">
</head>
<body>
    
    <div>
        <form action="#" method="POST">

            <h1>Registration</h1>
            
            <div>
                <label for="fname">Enter First Name</label>
                <input type="text" name="fname" id="" required>
            </div>


            <div>
                <label for="lname">Enter Last Name</label>
                <input type="text" name="lname" id="" required>
            </div>
        

            <div>
                <label for="username">Enter a username</label>
                <input type="text" name="username" id="" required>
            </div>
        
            <div>
                <label for="uemail">Enter a valid Email</label>
                <input type="email" name="uemail" id="" required>
            </div>

            <div>
                <label for="password">Enter Password</label>
                <input type="password" name="password" id="" required>
            </div>
        
            <div>
                <label for="cpassword">Confirm Password</label>
                <input type="password" name="cpassword" id="" required>
            </div>

            <div class="input-field">
                <input type="submit"  value="Register" class="btn" name="register">
                <a href="index.php">Home</a>
            </div>



        </form>
        
    </div>
</body>
</html>




<?php
    include 'db.php';

    if($_SERVER["REQUEST_METHOD"]=="POST"){
   
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $username = $_POST['username'];
        $uemail = $_POST['uemail'];
        $password = md5($_POST['password']);

        $query = "INSERT INTO users (first_name, last_name, user_name, email, user_type, passwords) VALUES ('$fname','$lname','$username','$uemail', 0,'$password')";
        $result = mysqli_query($connection, $query);

        if($result){
            header("location:login.php");
        }
        else{
            echo "data not inserted";
        }

}


// mysqli_free_result($result);
// mysqli_close($data);



?>