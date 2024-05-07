<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="productos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Mimositos</title>
</head>
<body>
    <header>
        
        <nav class="nav_appbar">
           
            <p id="title" style="margin-left: 10px;">Mimositos</p>
                <input type="checkbox" id="check">
                <label for="check" class="checkbtn">
                 <i class="fas fa-bars"></i>
                </label>
            <ul class="list_nav">
                <li><a href="">Acerca de nosotros</a></li>
                <?php
                if (isset($_SESSION['name'])) {
                    echo "<li>" . "Bienvenido " . $_SESSION['name'];
                    echo "<li><a href='logout.php'>Cerrar sesión</a></li>";
                    echo "<li><a href='carrito.php'>Carrito</a></li>";

                } else {
                    echo "<li><a href='login.html'>Inicar Sesión</a></li>";
                    echo "<li><a href='registro.html'>Registrate</a></li>";
                   

                }


                ?>
            </ul>
        </nav>
    </header>

   <div style="display: flex; align-content: center; flex-direction: row;  align-content: space-between; width: 100%">
    <h1>Productos</h1>
    <a  class="add-product" href="registrarproducto.php">Registrar producto</a>
   </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
      include "conn.php"; 

      $sql= mysqli_query($conn, "SELECT productos.*, 
      categorias.name AS category FROM productos JOIN categorias ON
       productos.categoria_id = categorias.id");

      if (!$sql) {
          die("Error en la consulta: " . mysqli_error($conn)."<br>");
      }

      while($row = mysqli_fetch_array($sql)){
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['nombre']."</td>";
        echo "<td>$".$row['precio']."</td>";
        echo "<td>".$row['category']."</td>";
        echo "<td><img src='images/".$row['image']."' alt='Avatar' style='width: 50px;'></td>";
        echo "<td>".$row['descripcion']."</td>";
        echo "<td><a href='editarproducto.php?id=".$row['id']."'>Editar</a> | <a href='eliminarproducto.php?id=".$row['id']."'>Eliminar</a></td>";
        echo "</tr>";
      }
    ?>

    
           
            <!-- Add more rows for additional products -->
        </tbody>
    </table>


    <footer>
        <p>Creado por Samuel Ramos, tengo sueño y ya me quiero dormir
        </p>
    
    </footer>
</body>
</html>