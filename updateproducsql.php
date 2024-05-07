<?php  
include "conn.php"; 
$id=$_POST["id"];
$name = $_POST['name'];
$image = $_POST['image'];
$desc = $_POST['desc'];
$price = $_POST['price'];
$categoria = $_POST['categoria'];



$sql= mysqli_query($conn, "UPDATE productos SET  precio=$price, image='$image', descripcion='$desc', categoria_id=$categoria, nombre='$name' WHERE id=$id");
if (!$sql) {
    die("Error en la consulta: " . mysqli_error($conn)."<br>");
}
header("Location: adminproductos.php");