<?php  
include "conn.php"; 

$name = $_POST['name'];
$image = $_POST['image'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$categoria = $_POST['categoria'];



$sql= mysqli_query($conn, "INSERT INTO productos (id, precio, image, descripcion, categoria_id, nombre) VALUES (0,'$price','$image', '$desc', '$categoria', '$name')");
if (!$sql) {
    die("Error en la consulta: " . mysqli_error($conn)."<br>");
}
header("Location: adminproductos.php");


?>