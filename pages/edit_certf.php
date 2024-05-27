<?php
// Crea la conexión
$conn = new mysqli("localhost", "root", "", "bd_portafolio");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica si se recibió un ID válido
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    $id = $_POST["id"];
    $nombre = $_POST["name"];

    // Verificar si se subió un nuevo archivo de imagen
    if ($_FILES["certificado"]["size"] > 0) {
        // Elimina la imagen anterior si existe
        // Aquí deberías implementar el código para eliminar el archivo de la imagen anterior

        // Subir la nueva imagen
        $target_dir = "uploads/"; // Directorio donde se guardarán las imágenes
        $target_file = $target_dir . basename($_FILES["certificado"]["name"]);
        move_uploaded_file($_FILES["certificado"]["tmp_name"], $target_file);

        // Guardar la ruta de la nueva imagen en la base de datos
        $ruta_documento = $target_file;
    } else {
        // No se subió una nueva imagen, mantener la imagen existente en la base de datos
        $sql_select_image = "SELECT ruta_documento FROM certificados WHERE id = $id";
        $result_select_image = $conn->query($sql_select_image);

        if ($result_select_image->num_rows > 0) {
            $row = $result_select_image->fetch_assoc();
            $ruta_documento = $row["ruta_documento"];
        } else {
            echo "Error al obtener.";
            exit();
        }
    }

    // Actualiza el registro en la base de datos
    $sql = "UPDATE certificados SET nombre_certf='$nombre', ruta_documento='$ruta_documento' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirige de vuelta a la página principal después de actualizar
        header("Location: admin.php");
        exit();
    } else {
        echo "Error al actualizar el proyecto: " . $conn->error;
    }
} else {
    echo "ID no válido";
}

// Cierra la conexión
$conn->close();
?>
