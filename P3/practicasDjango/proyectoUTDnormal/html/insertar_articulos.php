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

$descripcion = "";
$pu = "";
$cantidad = "";
$id_categoria = "";
$nombre = "";
$mensaje = ""; 

$categorias = [];
$result = $conexion->query("SELECT id, nombre FROM categorias");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descripcion = $_POST['descripcion'];
    $pu = $_POST['pu'];
    $cantidad = $_POST['cantidad'];
    $id_categoria = $_POST['id_categoria'];
    $nombre = $_POST['nombre'];

    if (!empty($descripcion) && !empty($pu) && !empty($cantidad) && !empty($id_categoria) && !empty($nombre)) {
        $stmt = $conexion->prepare("INSERT INTO articulos (descripcion, pu, cantidad, id_categoria, nombre) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdiss", $descripcion, $pu, $cantidad, $id_categoria, $nombre);

        if ($stmt->execute()) {
            header("Location: articulos.php"); 
            exit(); 
        } else {
            $mensaje = "<p style='color: red;'>Error al registrar el artículo: " . $stmt->error . "</p>";
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
    <title>Registrar Artículo | PHP Proyecto UTD</title>
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
            <li><a href="insertar_articulos.php">Insertar Artículos</a></li>

            <li><a href="categorias.php">Categorías</a></li>
            <!-- <li><a href="insertar_categoria.php">Agregar Categoría</a></li> -->
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Registrar Artículo</h1>
            <form action="" method="POST">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
                
                <label for="">Descripción:</label>
                <input type="text" name="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>" required>
                
                <label for="">Precio Unitario:</label>
                <input type="number" step="0.01" name="pu" value="<?php echo htmlspecialchars($pu); ?>" required>
                
                <label for="">Cantidad:</label>
                <input type="number" name="cantidad" value="<?php echo htmlspecialchars($cantidad); ?>" required>
                
                <label for="">Categoría:</label>
                <select name="id_categoria" required>
                    <option value="">Seleccione una categoría</option>
                    <?php foreach ($categorias as $categoria) { ?>
                        <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>
                    <?php } ?>
                </select>
                
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