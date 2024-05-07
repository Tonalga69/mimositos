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
    <h2 style="color: white">Resultados de la busqueda</h2>
    <div class="grid-container">
        <section>
            <?php
            include "conn.php";
            $search = isset($_POST['search'])? $_POST['search'] : $_GET['search'];
    

            $query="SELECT * FROM productos WHERE "; 
            $words = explode(' ', $search);
            foreach($words as $word){
                $query .= "nombre LIKE '%".$word."%' ";
                if($word != end($words)){
                    $query .= "OR ";
                }
            }
        

            $sql = mysqli_query($conn, $query);

            if (!$sql) {
                echo $query;
                die("Error en la preparación de la consulta: " . mysqli_error($conn)."<br>");
            }
    

            while ($row = mysqli_fetch_array($sql)) {
                echo "<div class='producto'>";
                echo "<img src='images/" . $row['image'] . "' alt='Avatar' style='height: 200px; width: 200px;'>";
                echo "<div class='container'>";
                echo "<h4><b>" . $row['nombre'] . "</b></h4>";
                echo "<p>" . $row['descripcion'] . "</p>";
                echo "<p>$" . $row['precio'] . "</p>";
                echo "<div class='addcart'>"; 
                echo "<a href='add.php?id=".$row['id']."&search=".$search."'>Agregar al carrito</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </section>
    </div>

    </div>


    <footer>
        <p>Creado por Samuel Ramos, tengo sueño y ya me quiero dormir
        </p>

    </footer>
</body>

</html>