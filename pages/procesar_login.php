<?php
session_start();
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_portafolio");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_usuario = $_POST['nombre_usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT id FROM usuarios WHERE nombre_usuario = ? AND contrasena = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("ss", $nombre_usuario, $contrasena);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Inicio de sesión exitoso
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        header("location: admin.php");
    } else {
        // Inicio de sesión fallido
        $error = "Nombre de usuario o contraseña incorrectos.";
        header("location: login.php?error=" . urlencode($error));
    }
}
?>
