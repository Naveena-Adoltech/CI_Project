<?php
require 'config.php';
if(!empty($_SESSION["id"])) {
    header("Location:index.php");
}
   if(isset($_POST ["submit"])) {

    $name =$_POST["name"];
    $username =$_POST["username"];
    $email =$_POST["email"];
    $password =$_POST["password"];
    $confirmpassword =$_POST["confirmpassword"];

    $query ="SELECT * FROM tbl_user WHERE username = ? OR email=?";
    $stmt=mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $duplicate=mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($duplicate) > 0){
        echo "<script> alert('Username or Email has already taken');</script>";
    }
    else {
        if($password == $confirmpassword)
        {
            try {
                $query = "INSERT INTO tbl_user (name,username,email,password) VALUES (?,?,?,?)";
                $stmt=mysqli_prepare($conn,$query);
                mysqli_stmt_bind_param($stmt,"ssss",$name,$username,$email,$password);
                mysqli_stmt_execute($stmt);
              echo "<script> alert ('Registration Successful');</script>";
            }
            catch (Exception){
                echo "Query will not work ";
                die;
            }
        }
        else {
            echo "<script> alert ('Doesnot match with your password');</script>";
        }

            }
        }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> User Registration Form </title>
</head>
<body>  
<div>
    <center>
    <form action ="registration.php" method ="post">
        <div class="container">
            
                <h1>Registration</h1>
                 <label for="name"><b>Name:</b></label>
                <input class="form-control" type="text" name="name" required =""> <br>

                <label for="username"><b>Username:</b></label>
                <input class="form-control" type="text" name="username" required=""> <br>

                <label for="email"><b>Email:</b></label>
                <input class="form-control" type="email" name="email" required=""> <br>

                <label for="password"><b>Password:</b></label>
                <input class="form-control" type="password" name="password" required=""> <br>

                <label for="confirmpassword"><b>Confirm Password:</b></label>
                <input class="form-control" type="password" name="confirmpassword" required=""> <br>

                <button type="submit" name="submit"> Register</button>
           
        </div>
    </form>
    <br>
    <a href="login.php"> Login </a>
</center>
</body>
</html>
   


