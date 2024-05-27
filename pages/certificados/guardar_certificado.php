<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "bd_portafolio");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$nombre_certf = $_POST['nombre_certf'];

// Manejar la subida del certificado
$directorio_destino = 'certificados/'; // Directorio donde se guardarán los certificados
$nombre_archivo = $_FILES['certificado']['name'];  // Corrige el nombre del archivo aquí
$ruta_archivo = $directorio_destino . $nombre_archivo;

if (move_uploaded_file($_FILES['certificado']['tmp_name'], $ruta_archivo)) {
    // Insertar certificado en la base de datos
    $sql = "INSERT INTO certificados (nombre_certf, ruta_documento) VALUES ('$nombre_certf', '$ruta_archivo')";
    if ($conexion->query($sql) === TRUE) {
        echo "Certificado agregado exitosamente";
    } else {
        echo "Error al agregar el certificado: " . $conexion->error;
    }
} else {
    echo "Error al subir el certificado";
}

// Cerrar conexión
$conexion->close();
?>
