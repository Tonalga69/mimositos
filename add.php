<?php
include "conn.php";
session_start(); 
$carrito= array(
    'producto' => array(),
    'subtototal' => 0, 
    'total' => 0
);



if(!isset($_SESSION['carritos'])){
    $_SESSION['carritos'] = $carrito;
    $id = $_GET['id'];



    $sql = mysqli_query($conn, "SELECT * FROM productos WHERE id = $id");
    $row = mysqli_fetch_array($sql);
    $producto = array(
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'cantidad' => 1
    );
    array_push($_SESSION['carritos']['producto'], $producto);
    $subTotal = $_SESSION['carritos']['subtototal'] + $row['precio'];
    $_SESSION['carritos']['subtototal'] = $subTotal;
}
else{
    $carrito = $_SESSION['carritos'];
    $id = $_GET['id'];
    foreach($_SESSION['carritos']['producto'] as $indice => $producto){
        if($producto['id'] == $id){
            $cantidad = $_SESSION['carritos']['producto'][$indice]['cantidad'] + 1;
            $_SESSION['carritos']['producto'][$indice]['cantidad'] = $cantidad;
            $subTotal = $_SESSION['carritos']['subtototal'] + $producto['precio'];
            $_SESSION['carritos']['subtototal'] = $subTotal;

            if(isset($_GET['search'])){
            
                header("location: search.php?search=".urlencode($_GET['search']));
                exit();
            }
            header(("location: ".$_SERVER['HTTP_REFERER'])); 
          die();
        }
    }
    $sql = mysqli_query($conn, "SELECT * FROM productos WHERE id = $id");
    $row = mysqli_fetch_array($sql);
    $producto = array(
        'id' => $row['id'],
        'nombre' => $row['nombre'],
        'precio' => $row['precio'],
        'cantidad' => 1
    );
    array_push($_SESSION['carritos']['producto'], $producto);
    $subTotal = $_SESSION['carritos']['subtototal'] + $row['precio'];
    $_SESSION['carritos']['subtototal'] = $subTotal;
}

if(isset($_GET['search'])){
   header("location: search.php?search=".urlencode($_GET['search']));
   exit();
}
header(("location: ".$_SERVER['HTTP_REFERER'])); 


