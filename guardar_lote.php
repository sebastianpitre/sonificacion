<?php
include "conexion.php";

// Obtener los datos del formulario
$nombre_lote = $_POST['nombre_lote'];
$numero_lote = $_POST['numero_lote'];
$coordenada1 = $_POST['coordenada1'];
$coordenada2 = $_POST['coordenada2'];
$color_punto = $_POST['color_punto'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO lotes (nombre_lote, numero_lote, coordenada1, coordenada2, color_punto) VALUES ('$nombre_lote', '$numero_lote', '$coordenada1', '$coordenada2', '$color_punto')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo lote guardado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
