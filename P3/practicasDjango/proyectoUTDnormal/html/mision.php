<?php
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php"); 
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misión | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="../css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="../img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="acercade.php">Acerca de</a></li>
            <li><a href="mision.php">Misión</a></li>
            <li><a href="vision.php">Visión</a></li>
            <li><a href="articulos.php">Artículos</a></li>
            <li><a href="categorias.php">Categorías</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Misión</h1>
            <h2>Soy misión</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium placeat voluptatum saepe ab dolores consequatur animi! Eos perspiciatis vel placeat beatae nulla non odit. Cumque omnis modi quibusdam sapiente neque.</p>
       </div>
    </section>
    <footer>
        <p>Curso de PHP &copy; 2024 | Visitado el: <?php echo date('d/m/Y'); ?></p>
    </footer>
</body>
</html>