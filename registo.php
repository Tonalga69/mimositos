<?php  
include "conn.php"; 

$username= $_POST["username"];
$password =$_POST['password'];
$telephone= $_POST[ 'telephone' ];


$sql= mysqli_query($conn, "INSERT INTO user(id, email, password, phone) VALUES (0,'$username','$password', '$telephone')");
header("Location: index.html");


?>