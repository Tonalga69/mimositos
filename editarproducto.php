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
      <div class="form-container">
        <form action="updateproducsql.php" method="post">
          <div class="login-icon">
        
          </div>
          <h2>Actualizar Producto
          </h2>

          <?php
          include "conn.php";
          $id = $_GET['id'];
          $sql= mysqli_query($conn, "SELECT * FROM productos WHERE id=$id");
          $row = mysqli_fetch_array($sql);
          echo  "<label for='id'>ID:</label>"; 
          echo "<input type='number' name='id' value='".$row['id']."'/>";
          echo "<br>";
          echo "<label for='name'>Nombre:</label>";
          echo "<input type='text' id='name' name='name' value='".$row['nombre']."' required />";
          echo "<label for='image'>Image:</label>";
          echo "<input type='text' id='image' name='image' value='".$row['image']."' required />";
          echo "<label for='desc'>Descripción:</label>";
          echo "<input type='text' id='desc' name='desc' value='".$row['descripcion']."' required />";
          echo "<label for='price'>Precio:</label>";
          echo "<input type='number' id='price' name='price' value='".$row['precio']."' required/>";
          echo "<label for='categoria'>Categoria:</label>";
          echo "<input type='number' id='categoria' name='categoria' value='".$row['categoria_id']."' required list='suggestions'  />";
          echo "<datalist id='suggestions'>";
          $sql= mysqli_query($conn, "SELECT * FROM categorias");
          while($row = mysqli_fetch_array($sql)){
            echo "<option value='".$row['id']."'>".$row['name']."</option>";
          }
          echo "</datalist>";


          ?>
           <input type="submit" value="Actualizar" />
        </form>
      </div>
      <div>
        <div class="login-image">
            <img src="images/peluches.jpeg" alt="login" style="object-fit: cover; height: inherit; width: inherit;"/>
        </div>
      </div>
    </div>
  </body>
</html>