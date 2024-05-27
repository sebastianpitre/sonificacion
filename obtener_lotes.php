<?php
include "conexion.php";

// Consultar los datos de los lotes
$sql = "SELECT id_lote, nombre_lote, coordenada1, coordenada2, color_punto FROM lotes";
$result = $conn->query($sql);

// Generar GeoJSON
$features = array();

while ($row = $result->fetch_assoc()) {
    $features[] = array(
        "type" => "Feature",
        "geometry" => array(
            "type" => "Point",
            "coordinates" => array((float)$row['coordenada1'], (float)$row['coordenada2'])
        ),
        "properties" => array(
            "id" => $row['id_lote'],
            "type" => $row['nombre_lote'],
            "color" => $row['color_punto']
        )
    );
}

$geojson = array(
    "type" => "FeatureCollection",
    "features" => $features
);

header('Content-Type: application/json');
echo json_encode($geojson);

$conn->close();
?>
