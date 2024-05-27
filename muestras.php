<?php
include "conexion.php";


// Obtener el id_lote
$id_lote = $_GET['id_lote'];

// Consultar las muestras del lote específico
$sql = "SELECT * FROM muestras WHERE id_lote = '$id_lote'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logos/logo.svg">
  <link rel="icon" type="image/png" href="assets/img/logos/logo.svg">
  <title>
    Sonificacion
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href=" assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href=" assets/css/nucleo-svg.css" rel="stylesheet" />

  <link rel="stylesheet" href="assets/css/intro.css">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href=" assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  

</head>

<body class="bg-gray-400">
<!--
  paleta de colores
    #39a900 - success
    #04324d info 
-->

  <div class="min-height-200 position-absolute w-100" style="background-color: #04324d"></div> 
    
    <main class="main-content position-relative border-radius-lg ">
  <?php
    include 'componentes/nav.php';
  ?>

  <div class="mt-7 container-fluid">
    <div class="row mx-auto my-4">

        <div class="col-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <li class="list-group-item px-0">
                        <div class="row align-items-center">
                            
                            <div class="col ml-2">
                                <h4 class="mb-0">
                                    muestras
                                </h4>
                                
                            </div>
                            <div class="col-auto">
                                <a onclick="agg_lote()" class="btn btn-outline-success btn-xs mb-0">Agregar</a>
                            </div>
                        </div>
                    </li>
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                    ID</th>
                                    <th
                                    class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                    id_lote</th>
                                    <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                        muestra1</th>
                                    <th
                                        class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                        muestra2</th>
                                    <th
                                        class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                        muestra3</th>
                                    
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                      echo '<tbody><tr>
                                            <td><h6 class="mb-0 text-xs">' . $row["id"] . '</h6></td>
                                            <td><h6 class="mb-0 text-xs">' . $row["id_lote"] . '</h6></td>
                                            <td><h6 class="mb-0 text-xs">' . $row["muestra1"] . '</h6></td>
                                            <td><h6 class="mb-0 text-xs">' . $row["muestra2"] . '</h6></td>
                                            <td><h6 class="mb-0 text-xs">' . $row["muestra3"] . '</h6></td>
                                            
                                            
                                            </tr></tbody>';
                                    }
                                } else {
                                    echo "<tr><td colspan='5'>No hay lotes registrados</td></tr>";
                                }
                                

                                // Cerrar conexión
                                $conn->close();
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            
            
        </div>

    </div>
  </div>




  <!--   Core JS Files   -->
  <script src=" assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src=" assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src=" assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effect, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src=" assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/4.2.2/intro.min.js"></script>
  <script src="assets/js/instrucciones.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="assets/js/script.js"></script>
</body>

</html>