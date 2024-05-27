<?php
// Crea la conexión
$conn = new mysqli("localhost", "root", "", "bd_portafolio");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
// Verifica si se recibió un ID válido
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = $_GET["id"];

    // Consulta SQL para obtener los datos del proyecto a editar
    $sql = "SELECT id_proyecto, nombre_proyecto, etapas, ruta_imagen, descripcion_proyecto, enlace_proyecto FROM proyectos WHERE id_proyecto=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Muestra el formulario de edición con los datos actuales
        $row = $result->fetch_assoc();
        ?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    editar
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="g-sidenav-show   bg-gray-100">


    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <div class="min-height-300 bg-purple position-absolute w-100"></div>
    
    <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar Transparent -->
    <?php
        include 'nav.php';
    ?>
    <!-- End Navbar -->

        <div class="container-fluid mt-6 py-4">
            
            <style>
                /* Personalización adicional */
                .custom-file-input {
                    color: #6f42c1;
                    border: 2px solid  #6f42c1;
                    padding: 6px 12px;
                    border-radius: 4px;
                    cursor: pointer;
                }
    
                .custom-file-input::-webkit-file-upload-button {
                    visibility: hidden;
                    color: #6f42c1;
                }
    
                .custom-file-input::before {
                    content: '+';
                    
                }
            </style>
            
            <div class="row mt-4 justify-content-center ">
                <div class="col-12 d-right col-lg-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-md-12">
                                            
                                <div class="text-center">
                                    <h4 class="mb-0">Portada</h4>
                                    <img src="<?php echo $row['ruta_imagen']; ?>" class="" style="width: 260px !important; height: 260px !important;">
                                </div>      
                                            
                            </div>
                        </div>
                            
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    
                                    <div class="col ml-2">
                                        <h4 class="mb-0">
                                        Editar proyecto con <span class="bg-purple text-white p-1 border-radius-xl"> id <?php echo $row['id_proyecto']; ?></span>
                                        </h4>
                                    </div>
                                    
                                </div>
                            </li>
                            <div class="col-md-12">
                                <form action="edit_proyecto.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $row['id_proyecto']; ?>">
                                    
                                    <div class="input-group input-group-static mb-2">
                                        <label for="name">Nombre del Proyecto:</label>
                                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $row['nombre_proyecto']; ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="etapas">Etapa actual del proyecto</label>
                                        <select  class="form-select p-2" aria-label="Selecciona una opción" name="etapas" id="etapas" >
                                            <option value="<?php echo $row['etapas']; ?>" class="text-info bg-info"><?php echo $row['etapas']; ?></option>
                                            <option value="Inicio">Inicio</option>
                                            <option value="Planificacion">Planificación</option>
                                            <option value="Ejecucion">Ejecución</option>
                                            <option value="Supervision">Supervisión</option>
                                            <option value="Cierre">Cierre</option>
                                        </select>
                                    </div>
                                    <div class=" mb-2">
                                        <label for="image" class="form-label">Seleccionar imagen:</label>
                                        <input type="file" id="image" class="form-control custom-file-input" name="image">
                                    </div>

                                    <div class="input-group input-group-static mb-2">
                                        <label for="description">Descripción del Proyecto:</label><br>
                                        <textarea id="description" name="description" class="form-control" rows="4" cols="50"><?php echo $row['descripcion_proyecto']; ?></textarea>
                                    </div>

                                    <div class="input-group input-group-static mb-4">
                                        <label for="link">Enlace del Proyecto:</label>
                                        <input type="text" id="link" name="link" class="form-control" value="<?php echo $row['enlace_proyecto']; ?>">
                                    </div>
                                    <input type="submit"  class="btn bg-purple text-white mb-0" value="Actualizar datos">
                                </form>
                            </div>
                        </div>
                    </div>
                   
                   
                </div>
            </div>

        </div>
    </main>

    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>

    <script src="../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="confirmacion.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="../assets/js/argon-dashboard.min.js?v=2.0.5"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"8620e708ed452b09","version":"2024.2.4","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
</body>

</html>
<?php
    } else {
        echo "Proyecto no encontrado";
    }
} else {
    echo "ID no válido";
}

// Cierra la conexión
$conn->close();
?>