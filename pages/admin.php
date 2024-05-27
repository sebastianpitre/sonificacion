<!--
=========================================================
* Material Kit 2 - v3.0.4
=========================================================

* Product Page:  https://www.creative-tim.com/product/material-kit 
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Administración
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
        include 'nav2.php';
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
            <div class="row mt-4">
                <div class="col-12 col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    
                                    <div class="col ml-2">
                                        <h4 class="mb-0">
                                           Proyectos 
                                        </h4>
                                    </div>
                                    <div class="col-auto">
                                        <a onclick="agg_proyecto()" class="btn btn-outline-purple btn-xs mb-0">Agregar</a>
                                    </div>
                                </div>
                            </li>
                            <script>
                                function agg_proyecto(){
                                    Swal.fire({
                                        showConfirmButton: false,
                                        html: `<div class="col-md-12">
                                            <h2>Agregar Proyecto</h2>
                                            <form action="guardar_proyecto.php" method="POST" enctype="multipart/form-data">
                                            <div class="input-group input-group-static mb-3">
                                                <label for="nombre_proyecto">Nombre del proyecto:</label>
                                                <input type="text" id="nombre_proyecto" class="form-control" placeholder="ingrese" name="nombre_proyecto">
                                            </div>
                                            
                                            <div class=" mb-3">
                                            <label for="imagen" class="">Selecciona una portada</label>
                                                <input type="file" id="imagen" class="form-control custom-file-input" name="imagen">
                                            </div>

                                            <div class="mb-3">
                                                <label for="etapas">Etapa actual del proyecto</label>
                                                <select  class="form-select p-2" aria-label="Selecciona una opción" name="etapas" id="etapas">
                                                    <option value="Inicio">Inicio</option>
                                                    <option value="Planificacion">Planificación</option>
                                                    <option value="Ejecucion">Ejecución</option>
                                                    <option value="Supervision">Supervisión</option>
                                                    <option value="Cierre">Cierre</option>
                                                </select>
                                            </div>
                                            <div class="input-group input-group-static mb-3">
                                                <label for="descripcion_proyecto">Descripción:</label>
                                                <textarea id="descripcion_proyecto" class="form-control" placeholder="ingrese" name="descripcion_proyecto"></textarea>
                                            </div>
                                            <div class="input-group input-group-static mb-4">
                                                <label for="enlace"> Ingrese la URL:</label>
                                                <input type="text" id="enlace_proyecto" class="form-control" placeholder="ingrese" name="enlace_proyecto">
                                            </div>
                                                <input type="submit"  class="btn bg-purple text-white mb-0" value="Agregar Proyecto">
                                            </form>
                                        </div>`,
                                      });

                                }
                                
                            </script>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                                ID</th>
                                                <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 text-center">
                                                Nombre del proyecto</th>
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 text-center">
                                                Etapa actual</th>
                                                
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-5">
                                                Descripción</th>
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                                Enlace</th>
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                                Opciones</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                        // Conexión a la base de datos
                                        $conexion = new mysqli("localhost", "root", "", "bd_portafolio");

                                        // Verificar la conexión
                                        if ($conexion->connect_error) {
                                            die("Error de conexión: " . $conexion->connect_error);
                                        }

                                        // Consultar proyectos
                                        $consulta = "SELECT  id_proyecto, etapas, nombre_proyecto, ruta_imagen, descripcion_proyecto, enlace_proyecto FROM proyectos";
                                       
                                        $resultado = $conexion->query($consulta);
                                        
                                        // Mostrar proyectos 
                                        if ($resultado->num_rows > 0) {
                                            while ($fila = $resultado->fetch_assoc()) {
                                                $color = ($fila['etapas'] == 'Inicio') ? 'dark' : 
                                                (($fila['etapas'] == 'Planificacion') ? 'danger' : 
                                                (($fila['etapas'] == 'Ejecucion') ? 'warning' : 
                                                (($fila['etapas'] == 'Supervision') ? 'info' : 
                                                (($fila['etapas'] == 'Cierre') ? 'success' : ''))));

                                                echo '<tbody><tr> 
                                                 <td>
                                                 <h6 class="mb-0 text-xs">' . $fila['id_proyecto'] . '</h6>
                                                 </td> 
                                                 <td>
                                                 <div class="d-flex px-2"><div> 
                                                 <img src="' . $fila['ruta_imagen'] . '" class="avatar-sm  me-4"></div> 
                                                 <div class="my-auto"><h6 class="mb-0 text-xs">' . $fila['nombre_proyecto'] . '</h6></div>
                                                 </td> 

                                                 <td>
                                                 <span class="badge bg-gray btn btn-outline-' . $color . ' col-12 my-auto">
                                                 <i class="bg-success "></i>
                                                 <span class="text-' . $color . ' text-xs font-weight-bold">' . $fila['etapas'] . '</span>
                                                 </span>
                                                 </td> 
                                                 
                                                 <td style="cursor:pointer;" onclick="ver_textoOriginal' . $fila['id_proyecto'] . '()">
                                                 <div class="textoOriginal">
                                                    ' . $fila['descripcion_proyecto'] . '
                                                 </div>
                                                 <p class="text-xs font-weight-bold mb-0 textoRecortado"></p>
                                                 </td> 

                                                 <td>
                                                 <a target="_blank" href="' . $fila['enlace_proyecto'] . '.html" class="text-info text-sm icon-move-right"> 
                                                 <button type="button" class="btn mt-n2 btn-sm btn-outline-purple text-nowrap mb-0">ir</button> 
                                                 </a> 
                                                 </td>

                                                 <td class="align-middle"> 
                                                 <a class="table__item__link" href="eliminar_proyecto.php?id=' . $fila['id_proyecto'] . '"><span class="material-symbols-outlined opacity-6 me-1 text-xl text-danger">delete</span></a>
                                                 <a href="form_edit_proyecto.php?id=' . $fila['id_proyecto'] . '"><span class="material-symbols-outlined opacity-6 me-1 text-xl text-purple">edit</span></a> 
                                                 </td> 
                                                 </tr></tbody>
                                                <script>
                                                    function ver_textoOriginal' . $fila['id_proyecto'] . '(){
                                                        Swal.fire({
                                                            showConfirmButton: false,
                                                            html: `
                                                            Descripcion del proyecto
                                                            <p class=" mb-0">' . $fila['descripcion_proyecto'] . '</p>
                                                            `,
                                                        });

                                                    }
                                                    
                                                </script>
                                                 ';
                                            }
                                        } else {
                                            echo "No hay proyectos para mostrar";
                                        }

                                        // Cerrar conexión
                                        $conexion->close();
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- limite de caracteres en el texto -->
                    <script>
                        // Obtener todos los elementos con la clase "textoOriginal"
                        var textosOriginales = document.querySelectorAll(".textoOriginal");

                        // Recorrer cada elemento y aplicar la lógica de recorte
                        textosOriginales.forEach(function(textoOriginal) {
                            var texto = textoOriginal.innerText;

                            // Verificar si el texto original es más largo que 80 caracteres
                            if (texto.length > 20) {
                            // Cortar el texto original a 80 caracteres y agregar "..."
                            var textoRecortado = texto.substring(0, 20) + "...";
                            // Mostrar el texto recortado en el elemento siguiente al texto original
                            var textoRecortadoElement = document.createElement("div");
                            textoRecortadoElement.classList.add("textoRecortado");
                            textoRecortadoElement.innerText = textoRecortado;
                            textoOriginal.parentNode.insertBefore(textoRecortadoElement, textoOriginal.nextSibling);
                            } else {
                            // Si el texto original es menor o igual a 80 caracteres, mostrarlo sin cambios
                            var textoRecortadoElement = document.createElement("div");
                            textoRecortadoElement.classList.add("textoRecortado");
                            textoRecortadoElement.innerText = texto;
                            textoOriginal.parentNode.insertBefore(textoRecortadoElement, textoOriginal.nextSibling);
                            }

                            // Ocultar el texto original
                            textoOriginal.style.display = "none";
                        });
                    </script>
                   
                   
                </div>
                
                <div class="col-12 col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <li class="list-group-item px-0">
                                <div class="row align-items-center">
                                    
                                    <div class="col ml-2">
                                        <h4 class="mb-0">
                                           Certificados
                                        </h4>
                                        
                                    </div>
                                    <div class="col-auto">
                                        <a onclick="agg_certificado()" class="btn btn-outline-primary btn-xs mb-0">Agregar</a>
                                    </div>
                                </div>
                            </li>
                            <script>
                                function agg_certificado(){
                                    Swal.fire({
                                        showConfirmButton: false,
                                        html: `<div class="col-md-12">
                                            <h2>Agregar certificado</h2>
                                            <form action="guardar_certificado.php" method="POST" enctype="multipart/form-data">
                                            <div class="input-group input-group-static mb-2">
                                                <label for="nombre_certf">Nombre del certificado:</label>
                                                <input type="text" id="nombre_certf" class="form-control" placeholder="ingrese"  name="nombre_certf">
                                            </div>
                            
                                            <div class=" mb-2">
                                                <label for="certificado"> Seleccione el documento:</label><br>
                                                <input type="file" id="certificado" class="form-control custom-file-input" name="certificado"><br>
                                            </div>
                                            <input type="submit"  class="btn bg-purple text-white mb-0" value="Agregar certificado">
                                            </form>
                                        </div>`,
                                      });

                                }
                                
                            </script>
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                            class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                            ID</th>
                                            <th class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7">
                                                Nombre del proyecto</th>
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                                Descargar</th>
                                            <th
                                                class="text-uppercase text-dark text-xxs font-weight-bolder opacity-7 ps-2">
                                                Opciones</th>
                                            
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <?php
                                        // Conexión a la base de datos
                                        $conexion = new mysqli("localhost", "root", "", "bd_portafolio");

                                        // Verificar la conexión
                                        if ($conexion->connect_error) {
                                            die("Error de conexión: " . $conexion->connect_error);
                                        }

                                        // Consultar certificados
                                        $consulta = "SELECT id, nombre_certf, ruta_documento FROM certificados";
                                        $resultado = $conexion->query($consulta);

                                        // Mostrar certificados
                                        if ($resultado->num_rows > 0) {
                                            while ($fila = $resultado->fetch_assoc()) {
                                                echo '<tbody><tr>
                                                 <td><h6 class="mb-0 text-xs">' . $fila['id'] . '</h6></td>
                                                 <td><div class="d-flex px-2"><div>
                                                 <img src="../assets/img/draft.svg" alt="team-3" class="avatar avatar-sm shadow me-2 border-radius-lg" loading="lazy"></div>
                                                 <div class="my-auto"><h6 class="mb-0 text-xs">' . $fila['nombre_certf'] . '</h6></div>
                                                 </div></td>
                                                 <td>
                                                 <a target="_blank" href="' . $fila['ruta_documento'] . '.html" class="text-info text-sm icon-move-right">
                                                 <button type="button" class="btn mt-n2 btn-sm btn-outline-purple text-nowrap mb-0">Descargar</button>
                                                 </a>
                                                 </td>
                                                 <td class="align-middle"><button class="btn btn-link text-dark mb-0">
                                                 <span class="material-symbols-outlined opacity-6 me-1 text-xl">delete</span>
                                                 </button></td>
                                                 </tr></tbody>';
                                                
                                            }
                                        } else {
                                            echo "No hay certificados para mostrar";
                                        }

                                        // Cerrar conexión
                                        $conexion->close();
                                    ?>
                                </table>
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
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="../assets/js/argon-dashboard.min.js?v=2.0.5"></script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"8620e708ed452b09","version":"2024.2.4","token":"1b7cbb72744b40c580f8633c6b62637e"}'
        crossorigin="anonymous"></script>
</body>

</html>