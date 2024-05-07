<?php
session_start();


if (isset($_SESSION['carritos'])) {
    $id = $_GET['id'];
    $carrito = $_SESSION['carritos'];
    
    foreach ($carrito["producto"] as $key => $producto) {
        if ($producto['id'] == $id) {
            $carrito['subtototal'] -= $producto['precio']* $producto['cantidad'];
            unset($carrito['producto'][$key]);
            break;
        }
    }
    
    $_SESSION['carritos'] = $carrito;
} 
header("location: ".$_SERVER['HTTP_REFERER']);
