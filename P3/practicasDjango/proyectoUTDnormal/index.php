<?php
session_start(); // Iniciar la sesión

// Verificar si el usuario ha iniciado sesión
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | PHP Proyecto UTD</title>
    <link rel="stylesheet" href="css/estilos.css" type="text/css">
</head>
<body>
    <header>
        <div id="logotipo">
            <img src="img/logophp.png" alt="Imagen PHP" title="PHP">
            <h1>PHP Proyecto Web</h1>
        </div>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if ($isLoggedIn): ?>
                <li><a href="html/mision.php">Misión</a></li>
                <li><a href="html/vision.php">Visión</a></li>
                <li><a href="html/acercade.php">Acerca de</a></li>
                <li><a href="html/articulos.php">Artículos</a></li>
                <li><a href="html/categorias.php">Categorías</a></li>
                <li><a href="html/logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="html/login.php">Iniciar Sesión</a></li>
                <li><a href="html/register.php">Registrarse</a></li>
                
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1>Inicio</h1>
            <hr>
            <p>.:: ¡Bienvenido a mi página de Inicio! ::.</p>
            <?php if ($isLoggedIn): ?>
                <p>Binevenido, Has iniciado sesión</p>
            <?php else: ?>
                <p>Por favor... Inicia Sesión para continuar...</p>
            <?php endif; ?>
       </div>
    </section>
    <footer>
        <p>Curso de PHP &copy; 2024 | Visitado el: <?php echo date('d/m/Y'); ?></p>
    </footer>
</body>
</html>