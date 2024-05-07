<?php
  include 'conn.php';
  $id = $_GET['id'];
  $sql = "DELETE FROM productos WHERE id = '$id'";
  $resultado = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="login.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />

    <title>Actualizar</title>
  </head>
  <body>
    <div style="display:flex;">
      <div class="form-container" style="align-self: center;">
        <?php
          echo "<h2>Producto eliminado con id ".$_GET['id']. "</h2>";
        ?>
       <input type="button" value="Regresar" onclick="location.href='adminproductos.php'"/>
      </div>
      <div>
        <div class="login-image">
            <img src="images/peluches.jpeg" alt="login" style="object-fit: cover; height: inherit; width: inherit;"/>
        </div>
      </div>
    </div>
  </body>
</html>