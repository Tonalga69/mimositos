<?php
session_start();
if (isset($_SESSION['carritos'])) {
    $id = $_GET['id'];
    $carrito = $_SESSION['carritos'];

    foreach ($carrito["producto"] as $key => $producto) {
        if ($producto['id'] == $id) {
            $carrito['subtototal'] += $producto['precio'];
            $carrito["producto"][$key]['cantidad'] -= 1;
            $_SESSION['carritos'] = $carrito;
            if ($carrito["producto"][$key]['cantidad'] <= 0) {
                echo $carrito["producto"][$key]['cantidad'];
                unset($carrito['producto'][$key]);
                $_SESSION['carritos'] = $carrito;
            }
            break;
        }
    }
}
header("location: ".$_SERVER['HTTP_REFERER']);