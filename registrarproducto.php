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

    <title>Registro</title>
  </head>
  <body>
    <div style="display:flex;">
      <div class="form-container">
        <form action="registroproducto.php" method="post">
          <div class="login-icon">
        
          </div>
          <h2>Nuevo Producto
          </h2>
          <label for="name">Nombre:</label>
          <input type="text" id="name" name="name" required />

          <label for="image">Image:</label>
          <input type="text" id="image" name="image" required />
          <label for="desc">Descripción:</label>
          <input type="text" id="desc" name="desc" required />
          <label for="price">Precio:</label>
          <input type="number" id="price" name="price" required/>
          
          <label for="categoria">Categoria:</label>
          <input type="number" id="categoria" name="categoria" required list="suggestions"  />
          <?php
          include "conn.php"; 
          echo "<datalist id='suggestions'>";
      $sql= mysqli_query($conn, "SELECT * FROM categorias");
      while($row = mysqli_fetch_array($sql)){
        echo "<option value='".$row['id']."'>".$row['name']."</option>";
      }
      echo "</datalist>";
     
    ?>
          <input type="submit" value="Agregar" />
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