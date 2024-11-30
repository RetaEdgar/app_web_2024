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

$sql = "SELECT a.id AS article_id, a.descripcion AS descripcion,a.nombre AS title, a.pu AS price, a.cantidad AS cantidad, 
               c.nombre AS category
        FROM articulos a
        LEFT JOIN categorias c ON a.id_categoria = c.id";

$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artículos | PHP Proyecto UTD</title>
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
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="acercade.php">Acerca de</a></li>
                <li><a href="mision.php">Misión</a></li>
                <li><a href="vision.php">Visión</a></li>
                <li><a href="articulos.php">Artículos</a></li>
                <li><a href="insertar_articulos.php">Insertar Artículos</a></li>
                <li><a href="categorias.php">Categorías</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="register.php">Registrarse</a></li>
                <li><a href="login.php">Iniciar Sesión</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <section id="content">
       <div class="box">
            <h1 class="title">Artículos</h1>
            <hr>
            <h1 align="center">Listado</h1>
            <?php
            if ($resultado->num_rows > 0) {
                while ($articulo = $resultado->fetch_assoc()) {
                    echo '<article class="article-item">';
                    
                    
            
                    echo '<div class="data">';
                    echo '<h2>' . htmlspecialchars($articulo['title']) . '</h2>';
                    echo '<p>Descripción: ' . htmlspecialchars($articulo['descripcion']) . '</p>';
                    echo '<p>Categorías: ' . htmlspecialchars($articulo['category']) . '</p>';
                    echo '<p>Precio Unitario: ' . htmlspecialchars($articulo['price']) . '</p>';
                    echo '<p>Cantidad: ' . htmlspecialchars($articulo['cantidad']) . '</p>';

                    echo '<span class="date">';
                    
                    echo '</span>';
                    echo '<hr>';
                    echo '</div>';
                    echo '<div class="clearfix"></div>';
                    echo '</article>';
                }
            } else {
                echo '<p>No se encontraron artículos.</p>';
            }
            ?>
       </div>
    </section>
    <footer>
        <p>Curso de PHP &copy; 2024 | Visitado el: <?php echo date('d/m/Y'); ?></p>
    </footer>
</body>
</html>
<?php