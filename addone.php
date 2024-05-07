<?php
session_start();
if (isset($_SESSION['carritos'])) {
    $id = $_GET['id'];
    $carrito = $_SESSION['carritos'];

    foreach ($carrito["producto"] as $key => $producto) {
        if ($producto['id'] == $id) {
            $carrito['subtototal'] += $producto['precio'];
            $carrito["producto"][$key]['cantidad'] += 1;
            $_SESSION['carritos'] = $carrito;
            break;
        }
    }
}
header("location: ".$_SERVER['HTTP_REFERER']);