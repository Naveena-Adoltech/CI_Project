<?php
session_start();
$hostname='localhost';
$username ="root";
$password="";
$dbname="users";

 $conn = new mysqli($hostname,$username,$password,$dbname);

 ?>