<?php
session_start();
require_once 'libraries/dompdf/autoload.inc.php';
include "conn.php";
use Dompdf\Dompdf;

$userName = $_SESSION['name'];


if (isset($_SESSION['carritos'])) {
   $dompdf = new Dompdf();
   
   $row = "";
   foreach ($_SESSION['carritos']['producto'] as $producto) {
      $row = $row . '<tr>
          <td>' . $producto['nombre'] . '</td>
          <td>' . $producto['precio'] . '</td>
          <td>' . $producto['cantidad'] . '</td>
      </tr>';
   }
   $subTotal = $_SESSION['carritos']['subtototal'];

   $dompdf->loadHtml('<!DOCTYPE html>
<html>
<head>
    <title>Recibo</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
        h1 {
            text-align: center;
            color: #fb8500;
        }
    </style>
</head>
<body>
    <h1>Recibo Mimositos</h1>
    <p>Gracias por su compra ' . $userName . '</p>
    <p>Detalles de la compra:</p>
    <table>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
        </tr>' . $row .
      '
    </table>
      <p class="total">Total: $'.$subTotal . '</p>
    <p>Gracias por su compra: Mimositos</p>
    <p>Para cualquier duda o aclaración, por favor contacte a nuestro servicio al cliente al 1234567890</p>
    <p>Gracias por su preferencia</p>
    <p>ID de compra:'.session_id().' </p>
</body>
</html>');
   $dompdf->setPaper('A4', 'landscape');
   $dompdf->render();
   $dompdf->stream();

}