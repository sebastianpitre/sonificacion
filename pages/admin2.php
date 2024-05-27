<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Portafolio
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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container">
        <div class="row">
        <style>
            /* Personalización adicional */
            .custom-file-input {
                color: transparent;
            }

            .custom-file-input::-webkit-file-upload-button {
                visibility: hidden;
            }

            .custom-file-input::before {
                content: 'Seleccionar archivo';
                color: white;
                background-color: #6f42c1;
                display: inline-block;
                padding: 6px 12px;
                border-radius: 4px;
                cursor: pointer;
            }
        </style>



            <div class="col-md-6">
                <h2>Agregar Proyecto</h2>
                <form action="guardar_proyecto.php" method="POST" enctype="multipart/form-data">
                <div class="input-group input-group-static mb-2">
                    <label for="nombre_proyecto">Nombre del proyecto:</label>
                    <input type="text" id="nombre_proyecto" class="form-control" placeholder="ingrese" name="nombre_proyecto">
                </div>
                <div class=" mb-2">
                <label for="imagen" class="form-label">Selecciona una portada</label>
                    <input type="file" id="imagen" class="form-control custom-file-input" name="imagen">
                </div>
                <div class="input-group input-group-static mb-2">
                    <label for="descripcion_proyecto">Descripción:</label>
                    <textarea id="descripcion_proyecto" class="form-control" placeholder="ingrese" name="descripcion_proyecto"></textarea>
                </div>
                <div class="input-group input-group-static mb-4">
                    <label for="enlace"> Ingrese la URL:</label>
                    <input type="text" id="enlace_proyecto" class="form-control" placeholder="ingrese" name="enlace_proyecto">
                </div>
                    <input type="submit"  class="btn bg-purple text-white mb-0" value="Agregar Proyecto">
                </form>
            </div>

            <div class="col-md-6">
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
            </div>
            <hr>
            <div class="col-md-6">
                <h2>Eliminar Proyecto</h2>
                <form action="eliminar_proyecto.php" method="post">
                    ID del Proyecto a Eliminar: <input type="text" name="id_proyecto_eliminar"><br><br>
                    <input type="submit" value="Eliminar Proyecto">
                </form>
            </div>



        </div>
    </div>
    
    

    
</body>
</html>
