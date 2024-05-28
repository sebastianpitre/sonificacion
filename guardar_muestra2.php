<?php
include "conexion.php";

// Obtener los datos del formulario
$id_lote = $_POST['id_lote'];
    $ph = $_POST['ph'];
    $conductividad = $_POST['conductividad'];
    $materia_organica = $_POST['materia_organica'];
    $fosforo = $_POST['fosforo'];
    $azufre = $_POST['azufre'];
    $alh = $_POST['alh'];
    $al = $_POST['al'];
    $ca = $_POST['ca'];
    $mg = $_POST['mg'];
    $k = $_POST['k'];
    $na = $_POST['na'];
    $cice = $_POST['cice'];
    $fe = $_POST['fe'];
    $mn = $_POST['mn'];
    $zn = $_POST['zn'];
    $cu = $_POST['cu'];
    $b = $_POST['b'];
    $fecha_hora = date ("Y-m-d H:i:s");

    $sql = "INSERT INTO muestras2 (id_lote, ph, conductividad, materia_organica, fosforo, azufre, alh, al, ca, mg, k, na, cice, fe, mn, zn, cu, b, fecha_hora)
            VALUES ('$id_lote', '$ph', '$conductividad', '$materia_organica', '$fosforo', '$azufre', '$alh', '$al', '$ca', '$mg', '$k', '$na', '$cice', '$fe', '$mn', '$zn', '$cu', '$b', '$fecha_hora')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva muestra agregada exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>
