<?php
include "conexion.php";


// Obtener el id_lote
$id_lote = $_GET['id_lote'];

// Consultar las muestras del lote específico
$sql = "SELECT * FROM muestras WHERE id_lote = '$id_lote'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Muestras del Lote</title>
</head>
<body>
    <h1>Muestras del Lote</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Lote</th>
            <th>Muestra 1</th>
            <th>Muestra 2</th>
            <th>Muestra 3</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['id_lote'] . "</td>";
                echo "<td>" . $row['muestra1'] . "</td>";
                echo "<td>" . $row['muestra2'] . "</td>";
                echo "<td>" . $row['muestra3'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No hay muestras para este lote</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
