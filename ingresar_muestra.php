<?php
include "conexion.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ingresar Muestra</title>
</head>
<body>
    <h2>Formulario para ingresar muestra</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        ID Lote: <input type="text" name="id_lote" required><br><br>
        pH: <input type="text" name="ph" required><br><br>
        Conductividad eléctrica: <input type="text" name="conductividad" required><br><br>
        Materia orgánica: <input type="text" name="materia_organica" required><br><br>
        Fósforo disponible: <input type="text" name="fosforo" required><br><br>
        Azufre disponible: <input type="text" name="azufre" required><br><br>
        Acidez intercambiable (Al+H): <input type="text" name="alh" required><br><br>
        Aluminio intercambiable (Al): <input type="text" name="al" required><br><br>
        Calcio intercambiable (Ca): <input type="text" name="ca" required><br><br>
        Magnesio intercambiable (Mg): <input type="text" name="mg" required><br><br>
        Potasio intercambiable (K): <input type="text" name="k" required><br><br>
        Sodio intercambiable (Na): <input type="text" name="na" required><br><br>
        Capacidad de intercambio catiónico (CICE): <input type="text" name="cice" required><br><br>
        Hierro disponible (Fe): <input type="text" name="fe" required><br><br>
        Manganeso disponible (Mn): <input type="text" name="mn" required><br><br>
        Zinc disponible (Zn): <input type="text" name="zn" required><br><br>
        Cobre disponible (Cu): <input type="text" name="cu" required><br><br>
        Boro disponible (B): <input type="text" name="b" required><br><br>
        <input type="submit" value="Guardar">
    </form>
</body>
</html>
