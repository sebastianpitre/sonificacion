<?php
include "conexion.php";

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT * FROM muestras2";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Muestras</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h2>Lista de Muestras</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>ID Lote</th>
            <th>pH</th>
            <th>Conductividad eléctrica (dS/m)</th>
            <th>Materia orgánica (%)</th>
            <th>Fósforo disponible (mg/kg)</th>
            <th>Azufre disponible (mg/kg)</th>
            <th>Acidez intercambiable (Al+H) (cmol(+)kg)</th>
            <th>Aluminio intercambiable (Al) (cmol(+)kg)</th>
            <th>Calcio intercambiable (Ca) (cmol(+)kg)</th>
            <th>Magnesio intercambiable (Mg) (cmol(+)kg)</th>
            <th>Potasio intercambiable (K) (cmol(+)kg)</th>
            <th>Sodio intercambiable (Na) (cmol(+)kg)</th>
            <th>Capacidad de intercambio catiónico (CICE) (cmol(+)kg)</th>
            <th>Hierro disponible (Fe) (mg/kg)</th>
            <th>Manganeso disponible (Mn) (mg/kg)</th>
            <th>Zinc disponible (Zn) (mg/kg)</th>
            <th>Cobre disponible (Cu) (mg/kg)</th>
            <th>Boro disponible (B) (mg/kg)</th>
            <th>Fecha y hora</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                <tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["id_lote"] . "</td>
                    <td>" . $row["ph"] . "</td>
                    <td>" . $row["conductividad"] . "</td>
                    <td>" . $row["materia_organica"] . "</td>
                    <td>" . $row["fosforo"] . "</td>
                    <td>" . $row["azufre"] . "</td>
                    <td>" . $row["alh"] . "</td>
                    <td>" . $row["al"] . "</td>
                    <td>" . $row["ca"] . "</td>
                    <td>" . $row["mg"] . "</td>
                    <td>" . $row["k"] . "</td>
                    <td>" . $row["na"] . "</td>
                    <td>" . $row["cice"] . "</td>
                    <td>" . $row["fe"] . "</td>
                    <td>" . $row["mn"] . "</td>
                    <td>" . $row["zn"] . "</td>
                    <td>" . $row["cu"] . "</td>
                    <td>" . $row["b"] . "</td>
                    <td>" . $row["fecha_hora"] . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='20'>No hay muestras</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
