<?php
session_start();
?>

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
            <?php
                if (isset($_SESSION['name'])) {
                    echo "<li>" . "Bienvenido " . $_SESSION['name'];
                    echo "<li><a href='logout.php'>Cerrar sesión</a></li>";
                

                } else {
                    echo "<li><a href='login.html'>Inicar Sesión</a></li>";
                    echo "<li><a href='registro.html'>Registrate</a></li>";
                   

                }


                ?>
                   <li><a href='carrito.php'>Carrito</a></li>
                <li><a href="products.php">Peluches</a></li>
            
               
            </ul>
        </nav>
    </header>

   <div style="display: flex; align-content: center; flex-direction: row;  align-content: space-between; width: 100%">
    <h1>Carrito</h1>
   </div>
    <table>
        <thead>
            <tr>
            
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php

        if(!isset($_SESSION['carritos'])){
            $_SESSION['carritos'] = array(
                'producto' => array(),
                'subtototal' => 0, 
                'total' => 0
            );

            return; 
        }
        $carrito = $_SESSION['carritos'];
        foreach ($carrito['producto'] as $key => $producto) {
        
        echo "<tr>";
        echo "<td>".$producto['nombre']."</td>";
        echo "<td>$".$producto['precio']."</td>";
        echo "<td>".$producto['cantidad']."</td>";
        echo "<td><a href='addone.php?id=".$producto['id']."'>+1</a> |<a href='remove.php?id=".$producto['id']."'>-1</a>| <a href='eliminar_carrito.php?id=".$producto['id']."'>Eliminar</a></td>";
        echo "</tr>";

        }
      
    ?>

    
           
            <!-- Add more rows for additional products -->
        </tbody>
    </table>

    <div class="total">
        <h3>Total: $<?php echo $_SESSION['carritos']['subtototal'];?></h3>
    </div>


    <div id="pagar">
        <a href="pagar.php">Pagar</a>
    </div>



    <footer>
        <p>Creado por Samuel Ramos, tengo sueño y ya me quiero dormir
        </p>
    
    </footer>
</body>
</html>