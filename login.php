<?php  
include "conn.php";
// include autoloader


$password = $_POST['password'];
$userName = $_POST['username'];


$stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
if (!$stmt) {
    die("Error en la preparación de la consulta: " . mysqli_error($conn)."<br>");
}
$stmt->bind_param("ss", $userName, $password);
$stmt->execute();
$result = $stmt->get_result();


if (mysqli_num_rows($result) > 0){
session_start();

$_SESSION['name'] = $userName;
header("Location: index.php");

} else {
    echo "Login failed";
}



