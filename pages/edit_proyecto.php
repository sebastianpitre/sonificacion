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
    $etapas = $_POST["etapas"];
    $descripcion = $_POST["description"];
    $enlace = $_POST["link"];

    // Verificar si se subió un nuevo archivo de imagen
    if ($_FILES["image"]["size"] > 0) {
        // Elimina la imagen anterior si existe
        // Aquí deberías implementar el código para eliminar el archivo de la imagen anterior

        // Subir la nueva imagen
        $target_dir = "uploads/"; // Directorio donde se guardarán las imágenes
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Guardar la ruta de la nueva imagen en la base de datos
        $ruta_imagen = $target_file;
    } else {
        // No se subió una nueva imagen, mantener la imagen existente en la base de datos
        $sql_select_image = "SELECT ruta_imagen FROM proyectos WHERE id_proyecto = $id";
        $result_select_image = $conn->query($sql_select_image);

        if ($result_select_image->num_rows > 0) {
            $row = $result_select_image->fetch_assoc();
            $ruta_imagen = $row["ruta_imagen"];
        } else {
            echo "Error al obtener la imagen actual del proyecto.";
            exit();
        }
    }

    // Actualiza el registro en la base de datos
    $sql = "UPDATE proyectos SET nombre_proyecto='$nombre', etapas='$etapas', ruta_imagen='$ruta_imagen', descripcion_proyecto='$descripcion', enlace_proyecto='$enlace' WHERE id_proyecto=$id";

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
