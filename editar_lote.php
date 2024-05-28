<?php
include "conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_lote = $_POST['id_lote'];
    $nombre_lote = $_POST['nombre_lote'];
    $numero_lote = $_POST['numero_lote'];
    $coordenada1 = $_POST['coordenada1'];
    $coordenada2 = $_POST['coordenada2'];
    $color_punto = $_POST['color_punto'];

    if ($id_lote) {
        // Actualizar el lote existente
        $sql = "UPDATE lotes SET nombre_lote = '$nombre_lote', numero_lote = '$numero_lote', coordenada1 = '$coordenada1', coordenada2 = '$coordenada2', color_punto = '$color_punto' WHERE id_lote = $id_lote";
    } else {
        // Insertar un nuevo lote
        $sql = "INSERT INTO lotes (nombre_lote, numero_lote, coordenada1, coordenada2, color_punto) VALUES ('$nombre_lote', '$numero_lote', '$coordenada1', '$coordenada2', '$color_punto')";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registro guardado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: admin.php"); // Redirige a la página principal después de guardar
    exit;
}
?>
