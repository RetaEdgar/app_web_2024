<?php
session_start(); 
if (!isset($_SESSION['username'])) {
    header("Location: ../index.php"); 
    exit(); 
}

$servidor = "localhost";
$usuario = "root"; 
$contrasena = ""; 
$base_datos = "bd_proyectoutd";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$title = "Listado de Categorías"; 


$sql = "SELECT * FROM categorias";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías | PHP Proyecto UTD</title>
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
            <li><a href="insertar_categoria.php">Agregar Categoria</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
            
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1 class="title">Categorías</h1>
            <hr>
            <h1 align="center">Listado</h1>
            <hr>

            <?php
            if ($resultado->num_rows > 0) {
                while ($categoria = $resultado->fetch_assoc()) {
                    echo '<article class="article-item">';
                    echo '<div class="data">';
                    echo '<h2>' . htmlspecialchars($categoria['nombre']) . '</h2>';
                    echo '<p>Descripción: ' . htmlspecialchars($categoria['descripcion']) . '</p>';
                    echo '<hr>';
                    echo '</div>';
                    echo '<div class="clearfix"></div>';
                    echo '</article>';
                }
            } else {
                echo '<p>No se encontraron categorías.</p>';
            }

            // Cerrar conexión
            $conexion->close();
            ?>
       </div>
    </section>
    <footer>
        <p>Curso de PHP &copy; 2024 | Visitado el: <?php echo date('d/m/Y'); ?></p>
    </footer>
</body>
</html>