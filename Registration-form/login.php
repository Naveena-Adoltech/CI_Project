<?php

require 'config.php';
if(!empty($_SESSION["id"])) {
     header("Location:index.php");
}
if(isset($_POST ["submit"])) {
 
    $usernameemail =$_POST["usernameemail"];
    $password =$_POST["password"];
    
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$usernameemail' OR email='$usernameemail'");
    $row = mysqli_fetch_assoc($result); 


    if(mysqli_num_rows($result)>0){
       if($password == $row['password']) {
        $_SESSION["login"] = true;
        $_SESSION["id"] = $row["id"];
        header("Location:index.php");
        }
        else {
            echo "<script> alert('Wrong Password');</script>";
        }
    }
    else {
        echo "<script> alert ('User not registered');</script>";
    }
}
?>
<!Doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
</head>
<body>
  <center>
    <h2>Login</h2>
    <form action ="login.php" method ="post">
        <label for="usernameemail"><b> Username or Email</b></label>
         <input class="form-control" type="text" name="usernameemail" required =""> <br>

         <label for="password"><b>Password</b></label>
         <input class="form-control" type="text" name="password" required =""> <br>
         <br>
        <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href ="registration.php">Registration</a>
 </center>
</body>
</html>
