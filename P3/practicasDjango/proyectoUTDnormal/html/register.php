<?php
$servidor = "localhost";
$usuario = "root"; 
$contrasena = ""; 
$base_datos = "bd_proyectoutd";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$username = "";
$password = "";
$privilegio = "usuario"; 
$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    if (!empty($username) && !empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conexion->prepare("INSERT INTO usuarios (username, password, privilegio) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $hashed_password, $privilegio);

        if ($stmt->execute()) {
            header("Location: ../index.php");
            exit(); 
        } else {
            $mensaje = "<p style='color: red;'>Error al registrar el usuario: " . $stmt->error . "</p>";
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
    <title>Registro | PHP Proyecto UTD</title>
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
            
            <li><a href="login.php">Iniciar Sesión</a></li>
            <li><a href="register.php">Registrarse</a></li>
        </ul>
    </nav>
    <section id="content">
        <div class="box">
            <h1>Registro de Usuario</h1>
            <form action="" method="POST">
                <label for="">Nombre de Usuario:</label>
                <input type="text" name="user" required>
                <label for="">Contraseña:</label>
                <input type="password" name="pass" required>
                <input type="submit" value="Registrarse" />
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