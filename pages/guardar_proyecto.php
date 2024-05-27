<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_portafolio");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre_proyecto = $_POST['nombre_proyecto'];
$etapas = $_POST['etapas'];
$descripcion_proyecto = $_POST['descripcion_proyecto'];
$enlace_proyecto = $_POST['enlace_proyecto'];

// Manejar la subida de la imagen
$directorio_destino = 'uploads/'; // Directorio donde se guardarán las imágenes
$nombre_archivo = $_FILES['imagen']['name'];
$ruta_archivo = $directorio_destino . $nombre_archivo;

if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_archivo)) {
    // Insertar proyecto en la base de datos
    $sql = "INSERT INTO proyectos (nombre_proyecto, etapas, ruta_imagen, descripcion_proyecto, enlace_proyecto) VALUES ('$nombre_proyecto', '$etapas','$ruta_archivo', '$descripcion_proyecto', '$enlace_proyecto')";
    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la misma página
        echo '<script>window.location = "'.$_SERVER['HTTP_REFERER'].'";</script>';
        exit();

    } else {
        echo "Error al agregar el proyecto: " . $conexion->error;
    }
} else {
    echo "Error al subir la imagen";
}

// Cerrar conexión
$conexion->close();
?>
