<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
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

    <div class="presentation">
        <div class="presentation-container">
            <form action="search.php" method="POST">
            <div class="search-container">
                <div style="display: flex;  justify-items: center;">
                    <h3>Buscar Mimositos</h1>
                        <img src="images/aguacate.jpg" alt="icono"
                            style="height: 48px; width: 48px; object-fit: cover;">
                </div>
                <input type="search" name="search" id="search" placeholder="Buscar">
                <input type="submit" value="Buscar" >
                
            </div>
            </form>
        </div>
    </div>

    <div class=" presentation-container2">

                <div class="search-container">
                    <h1>Mision</h1>
                    <p>Ofrecer a nuestros clientes los mejores peluches del mercado, con la mejor calidad y al mejor
                        precio</p>
                </div>
                <div style="margin: 10px;"></div>
                <div class="search-container">
                    <h1>Visión</h1>
                    <p>Nuestra vision es ser la mejor tienda de peluches en el mercado, ofreciendo la mejor calidad y el
                        mejor precio</p>
                </div>

            </div>


            <div class="presentation-container">
                <div class="presentation-text">
                    <h1>Los mejores peluches para regalar!</h1>
                    <p>Los mejores peluches para ti, para tu pareja y para tus hijos</p>
                </div>
                <section class="sections">
                    <img src="images/aguacate.jpg" alt="producto">
                    <img src="images/gatogusano.webp" alt="producto">
                    <img src="images/gatotiburon.jpg" alt="producto">

                    <img src="images/oso.png" alt="producto">

                    <img src="images/osos.png" alt="producto">

                    <img src="images/gatoboonito.webp" alt="producto">

                    <img src="images/lotso.jpeg" alt="producto">




                </section>
            </div>


            <footer>
                <p>Creado por Samuel Ramos, tengo sueño y ya me quiero dormir
                </p>

            </footer>
</body>

</html>