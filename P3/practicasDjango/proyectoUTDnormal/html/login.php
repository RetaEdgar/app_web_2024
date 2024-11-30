<?php
session_start(); 

$servidor = "localhost";
$usuario = "root"; 
$contrasena = ""; 
$base_datos = "bd_proyectoutd";

$conexion = new mysqli($servidor, $usuario, $contrasena, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$mensaje = ""; 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validar que los campos no estén vacíos
    if (!empty($username) && !empty($password)) {
        $stmt = $conexion->prepare("SELECT password, privilegio FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($hashed_password, $privilegio);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['username'] = $username;
                $_SESSION['privilegio'] = $privilegio;

                header("Location: ../index.php");
                exit();
            } else {
                $mensaje = "<p style='color: red;'>Contraseña incorrecta.</p>";
            }
        } else {
            $mensaje = "<p style='color: red;'>Usuario no encontrado.</p>";
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
    <title>Login | PHP Proyecto UTD</title>
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
        <form action="" method="POST">
            <label for="username">Nombre de Usuario: </label>
            <input type="text" name="username" required />
            <label for="password">Contraseña: </label>
            <input type="password" name="password" required />
            <input type="submit" value="Login" />
        </form>
        <div class="mensaje">
            <?php if (!empty($mensaje)) echo $mensaje; ?>
        </div>
       </div>
    </section>
    <footer>
        <p>Curso de Django con Dagonline &copy; 2024 | Visitado el: 01/10/24</p>
    </footer>
</body>
</html>