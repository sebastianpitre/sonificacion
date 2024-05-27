
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
    <style>
      .mapboxgl-ctrl-bottom-right{
        visibility: hidden;
      }
    </style>
        <div class="col-md-2 mb-3">
            <div class="row">
                <div class="card p-2">
                  <div class="btn col-6 btn-sm btn-success" onclick="agg_lote()"> Agregar Lote</div>
                  
                  <?php
                  include "conexion.php";
                  
                  
                  // Consultar las muestras del lote específico
                  $sql = "SELECT id_lote, nombre_lote, coordenada1, coordenada2, color_punto FROM lotes";
                  $result = $conn->query($sql);
                  
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                          echo "<div class='bg-" . $row["color_punto"] . " text-white my-1' style='background:" . $row["color_punto"] . ";'>" . $row["id_lote"] . ". " . $row["nombre_lote"] . "</div>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No hay muestras para este lote</td></tr>";
                    }
                  ?>
                </div>
            </div>
            
        </div>
        <div class="col-md-10">
            <div class="card p-2">
                <div class="card" id="map" style="height: 600px;"></div>
            </div>
        </div>

    </div>
  </div>

  
  <!-- Ejecutar mapa -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css' rel='stylesheet' />
  <script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiamNhbWVsbzYyNSIsImEiOiJjbGR1enBwM24wNXRyM29ubzBjZmY5aXdvIn0.hzI9ZFtUSUhqIm_dWoSJrg';
    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/jcamelo625/clemt2qhk000601s4prht0a9e',
        center: [-73.234350, 10.400134],
        zoom: 14.5
    });

    map.on('load', function() {
        fetch('obtener_lotes.php')
        .then(response => response.json())
        .then(data => {
            map.addLayer({
                "id": "puntos-de-cultivo",
                "type": "circle",
                "source": {
                    "type": "geojson",
                    "data": data
                },
                "paint": {
                    "circle-color": [
                        "match",
                        ["get", "type"],
                        // Aquí tienes que mapear todos los colores de los puntos de la base de datos
                        ...data.features.map(feature => [feature.properties.type, feature.properties.color]).flat(),
                        "#ccc"
                    ],
                    "circle-radius": 10,
                    "circle-stroke-width": 2,
                    "circle-stroke-color": "#fff"
                }
            });
            
            map.addLayer({
            "id": "puntos-de-cultivo-labels",
            "type": "symbol",
            "source": {
                "type": "geojson",
                "data": data
            },
            "layout": {
                "text-field": ["get", "id"], // Usar el campo id_lote como texto
                "text-font": ["Open Sans Regular"],
                "text-size": 13,
                "text-offset": [0, 0], // Ajustar la posición del texto si es necesario
                "text-anchor": "center", // Alinear el texto al centro del punto
            },
            "paint": {
                "text-color": "#000000", // Color del texto
                "text-halo-color": "white", // Color de la sombra
                "text-halo-width": 1 // Tamaño de la sombra
            }
        });

            // Agregar eventos de clic y cambio de cursor...
            map.on('click', 'puntos-de-cultivo', function (e) {
                var feature = e.features[0];
                var nombre = feature.properties.type;
                var id_lote = feature.properties.id;

                Swal.fire({
                    title: `${nombre}`,
                    html: `
                    <form id="muestraForm" action="guardar_muestra.php" method="post">
                        <input type="hidden" name="id_lote" value="${id_lote}">
                        <label for="muestra1">Muestra 1:</label>
                        <input type="text" id="muestra1" name="muestra1" required><br>
                        <label for="muestra2">Muestra 2:</label>
                        <input type="text" id="muestra2" name="muestra2" required><br>
                        <label for="muestra3">Muestra 3:</label>
                        <input type="text" id="muestra3" name="muestra3" required><br>
                        <div class="row container">
                          <div class="col">
                            <input type="submit" value="Guardar">
                          </div>
                          <div class="col">
                            <a href="muestras.php?id_lote=${id_lote}" class="text-info">ver muestras</a>
                          </div>
                        </div>
                        
                    </form>
                    `,
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                });
            });

            map.on('mouseenter', 'puntos-de-cultivo', function () {
                map.getCanvas().style.cursor = 'pointer';
            });

            map.on('mouseleave', 'puntos-de-cultivo', function () {
                map.getCanvas().style.cursor = '';
            });
        });
    });
  </script>

  <!-- Agregar lote -->
  <script>
    function agg_lote(){
      Swal.fire({
        title: `Agregar Lote nuevo`,
        html: `
        <form class="container" action="guardar_lote.php" method="post">
          <div class="input-group input-group-static is-filled">
            <label for="nombre_lote">Nombre del Lote:</label>
            <input type="text" class="form-control" id="nombre_lote" name="nombre_lote" required>
          </div>
          <div class="input-group input-group-static is-filled">
            <label for="numero_lote">Número del Lote:</label>
            <input type="text" class="form-control" id="numero_lote" name="numero_lote" required>
          </div>
          <div class="input-group input-group-static is-filled">
            <label for="coordenada1">Coordenadas en Y:</label>
            <input type="text" class="form-control" id="coordenada1" name="coordenada1" required>
          </div>
          <div class="input-group input-group-static is-filled">
            <label for="coordenada2">Coordenadas en X:</label>
            <input type="text" class="form-control" id="coordenada2" name="coordenada2" required>
          </div>

          <style>
            input[type="color"].custom {
              --size: 35px;
              width: var(--size);
              height: var(--size);
              background: none;
              padding: 0;
              border: 0;

              &::-webkit-color-swatch-wrapper {
                width: var(--size);
                height: var(--size);
                padding: 0;
              }

              &::-webkit-color-swatch {
                border: 3px solid dark;
                border-radius: 50%;
              }
            }

          </style>
          <div class="input-group  is-filled p-2">
            <input type="color" class="custom" id="color_punto" name="color_punto" value="#d6d6d6" required>
            <label class="mt-2 ms-2" for="color_punto">Seleccione el color del punto</label>
          </div>

          <button type="submit" class="btn mx-auto mt-2 btn-sm btn-success">Guardar</button>
        </form>
        `,
        showCloseButton: true,
        showCancelButton: false,
        showConfirmButton: false,
      });
    }
  </script>




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