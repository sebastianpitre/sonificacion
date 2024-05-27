<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logos/logo.svg">
    <link rel="icon" type="image/png" href="assets/img/logos/logo.svg">
    <title>Mapbox Sonificacion</title>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.js"></script>
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.5.1/mapbox-gl.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href=" assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
    <style>
        body { margin: 0; padding: 0;  }
        .menu { z-index: 9999; position: absolute; bottom: 10px; left: 10px}
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
    </style>
</head>
<body>
    <?php
        include 'componentes/nav.php';
    ?>

    <div class="menu col-sm-4 col-md-2 card p-2">
        Listado de lotes
        
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
    <div id="map"></div>

    
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
</body>
</html>
