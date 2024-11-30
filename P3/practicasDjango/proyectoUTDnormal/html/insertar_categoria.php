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

$nombre = "";
$descripcion = "";
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    if (!empty($nombre) && !empty($descripcion)) {
        $result = $conexion->query("SELECT MAX(id) AS max_id FROM categorias");
        $row = $result->fetch_assoc();
        $next_id = $row['max_id'] + 1;

        $stmt = $conexion->prepare("INSERT INTO categorias (id, nombre, descripcion) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $next_id, $nombre, $descripcion);

        if ($stmt->execute()) {
            header("Location: categorias.php");
            $mensaje = "<p style='color: green;'>Categoría registrada con éxito.</p>";
            $nombre = ""; 
            $descripcion = ""; 
        } else {
            $mensaje = "<p style='color: red;'>Error al registrar la categoría: " . $stmt->error . "</p>";
        }

        $stmt->close();
    } else {
        $mensaje = "<p style='color: red;'>Por favor, complete todos los campos.</p>";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Categoría | PHP Proyecto UTD</title>
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
            <h1>Registrar Categoría</h1>
            <form action="" method="POST">
                <label for="">Nombre de la Categoría:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                <label for="">Descripción:</label>
                <input type="text" name="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>" required>
                <input type="submit" value="Registrar" />
            </form>
            <div class="mensaje">
                <?php if (!empty($mensaje)) echo $mensaje; ?>
            </div>
        </div>
    </section>
    <footer>
        <p>Curso de PHP &copy; 2024 | Visitado el: <?php echo date('d/m/Y'); ?></p>
    </footer>
</body>
</html>