
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