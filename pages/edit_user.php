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
    $nombre_usuario = $_POST["nombre_usuario"];
    $contrasena = $_POST["contrasena"];
    

    // Verificar si se subió un nuevo archivo de imagen
    if ($_FILES["image"]["size"] > 0) {
        // Elimina la imagen anterior si existe
        // Aquí deberías implementar el código para eliminar el archivo de la imagen anterior

        // Subir la nueva imagen
        $target_dir = "perfil/"; // Directorio donde se guardarán las imágenes
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Guardar la ruta de la nueva imagen en la base de datos
        $ruta_imagen = $target_file;
    } else {
        // No se subió una nueva imagen, mantener la imagen existente en la base de datos
        $sql_select_image = "SELECT ruta_imagen FROM usuarios WHERE id = $id";
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
    $sql = "UPDATE usuarios SET nombre_usuario='$nombre_usuario', ruta_imagen='$ruta_imagen', contrasena='$contrasena' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirige de vuelta a la página principal después de actualizar
        header("Location: mi_cuenta.php?id=1");
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
