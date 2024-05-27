<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_portafolio");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener el ID del proyecto a eliminar
$id_eliminar = $_GET['id'];

// Eliminar el proyecto de la base de datos
$sql = "DELETE FROM proyectos WHERE id_proyecto = $id_eliminar";

if ($conexion->query($sql) === TRUE) {
    echo '<script>window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
} else {
    echo "Error al eliminar el proyecto: " . $conexion->error;
}

// Cerrar conexión
$conexion->close();
?>
