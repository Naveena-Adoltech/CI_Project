<?php
require 'config.php';

if(!empty($_SESSION["id"])) {
    $id=$_SESSION["id"];
    $result = mysqli_query($conn,"SELECT * FROM tbl_user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
}
else {
    header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Index</title>
    </head>
   <body>
    <h1> Welcome </h1>
    <a href="logout.php">Logout</a>
   </body> 
</html>

