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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-kit.css?v=3.0.4" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="blog-author bg-gray-200">

  <!-- Navbar Transparent -->
  <?php
    include 'nav.php';
  ?>
  <!-- End Navbar -->

  
  <!-- -------- START HEADER 4 w/ search book a ticket form ------- -->
  <header id="inicio">
    <div class="page-header min-height-400" style="background-image: url('../assets/img/bg2.jpg');" loading="lazy">
      <span class="mask bg-gradient-purple opacity-8"></span>
    </div>
  </header>
  <!-- -------- END HEADER 4 w/ search book a ticket form ------- -->
  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6 mb-4">
    <!-- START Testimonials w/ user image & text & info -->
    <section class="py-sm-7 py-5 position-relative">
      <div class="container">
        <div class="row">
          <div class="col-12 mx-auto">
            <div class="mt-n8 mt-md-n9 text-center">
              <img class="avatar avatar-xxl shadow-xl position-relative z-index-2" src="../assets/img/perfil/perfil3.jpeg" alt="vanesa" loading="lazy">
            </div>
            <div class="row py-5">
              <div class="col-lg-7 col-md-7 z-index-2 position-relative px-md-2 px-sm-5 mx-auto">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <h3 class="mb-0 text-purple">Vanesa madruñero</h3>
                  <div class="d-block">
                    <button type="button" class="btn btn-sm btn-outline-purple text-nowrap mb-0">Seguir <i class="fas fa-arrow-right text-sm ms-1"></i></button>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col-auto">
                    <span class="h6 text-purple">323</span>
                    <span>Posts</span>
                  </div>
                  <div class="col-auto">
                    <span class="h6 text-purple">3.5k</span>
                    <span>Followers</span>
                  </div>
                  <div class="col-auto">
                    <span class="h6 text-purple">260</span>
                    <span>Following</span>
                  </div>
                </div>
                <p class="text-lg mb-0">
                  Decisions: If you can’t decide, the answer is no.
                  If two equally difficult paths, choose the one more
                  painful in the short term (pain avoidance is creating
                  an illusion of equality). Choose the path that leaves
                  you more equanimous. <br><a href="javascript:;" class="text-purple icon-move-right">More about me
                    <i class="fas fa-arrow-right text-sm ms-1"></i>
                  </a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- proyectos -->
    <section id="proyectos" class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="mb-5 text-purple">Mis proyectos</h3>
          </div>
        </div>
        <div class="row">
        <?php
      // Conexión a la base de datos
      $conexion = new mysqli("localhost", "root", "", "bd_portafolio");

      // Verificar la conexión
      if ($conexion->connect_error) {
          die("Error de conexión: " . $conexion->connect_error);
      }

      // Consultar proyectos
      $consulta = "SELECT id_proyecto, nombre_proyecto, etapas, ruta_imagen, descripcion_proyecto, enlace_proyecto FROM proyectos";
      $resultado = $conexion->query($consulta);

      // Mostrar proyectos
      if ($resultado->num_rows > 0) {
          while ($fila = $resultado->fetch_assoc()) {
            $color = ($fila['etapas'] == 'Inicio') ? 'dark' : 
            (($fila['etapas'] == 'Planificacion') ? 'danger' : 
            (($fila['etapas'] == 'Ejecucion') ? 'warning' : 
            (($fila['etapas'] == 'Supervision') ? 'info' : 
            (($fila['etapas'] == 'Cierre') ? 'success' : ''))));

              echo '
              <div class="col-lg-3 col-sm-6">
                <div class="card">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <a onclick="ver_textoOriginal' . $fila['id_proyecto'] . '()" class="d-block blur-shadow-image">
                      <img style="width: 100%;height: 180px;" src="' . $fila['ruta_imagen'] . '" alt="img-colored-shadow" class="img-fluid border-radius-lg">
                    </a>
                  </div>
                  <div class="p-2 text-center">
                  
                    <h5 class="font-weight-normal ">
                      <a class="text-purple" href="' . $fila['enlace_proyecto'] . '" >' . $fila['nombre_proyecto'] . '</a>
                    </h5>
                    <div class="textoOriginal">
                    ' . $fila['descripcion_proyecto'] . '
                    </div>
                    <td >
                      <p class="mb-0" class="textoRecortado">
                      </p>
                    </td>
                    <a href="' . $fila['enlace_proyecto'] . '">
                    <button type="button" class="btn bg-gradient-purple text-white btn-sm mb-0 mt-2">Visitar</button></a>
                  </div>
                  <td>
                  <span class="badge col-12 my-auto">
                  <i class="bg-success "></i>
                  <span class="text-' . $color . ' text-xs font-weight-bold">• EN ETAPA DE ' . $fila['etapas'] . '</span>
                  </span>
                  </td> 
                </div>
              </div>
              <script>
                function ver_textoOriginal' . $fila['id_proyecto'] . '(){
                    Swal.fire({
                        showConfirmButton: false,
                        html: `
                        <div class="">
                          <div class="card-header p-0 position-relative mx-3 z-index-2">
                            <a onclick="ver_textoOriginal()" class="d-block blur-shadow-image">
                              <img style="width: 100%;height: 180px;" src="' . $fila['ruta_imagen'] . '" alt="img-colored-shadow" class="img-fluid border-radius-lg">
                            </a>
                          </div>
                          <div class="p-2 text-center">
                            <h5 class="font-weight-normal text-purple">
                              ' . $fila['nombre_proyecto'] . '
                            </h5>
                            Descripcion del proyecto
                            <p class=" mb-0">' . $fila['descripcion_proyecto'] . '</p>
                            <a href="' . $fila['enlace_proyecto'] . '">
                            <button type="button" class="btn bg-gradient-purple text-white btn-sm mb-0 mt-2">Visitar</button></a>
                          </div>
                          <td >
                          <span class="badge bg-gray btn btn-outline-' . $color . ' col-6 my-auto">
                          <i class="bg-success "></i>
                          <span class="text-' . $color . ' text-xs font-weight-bold">EN ETAPA DE ' . $fila['etapas'] . '</span>
                          </span>
                          </td> 
                        </div>
                        
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

        </div>
      </div>
    </section>
    <!-- limite de caracteres en el texto -->
    <script>
      // Obtener todos los elementos con la clase "textoOriginal"
      var textosOriginales = document.querySelectorAll(".textoOriginal");

      // Recorrer cada elemento y aplicar la lógica de recorte
      textosOriginales.forEach(function(textoOriginal) {
        var texto = textoOriginal.innerText;

        // Verificar si el texto original es más largo que 80 caracteres
        if (texto.length > 60) {
          // Cortar el texto original a 80 caracteres y agregar "..."
          var textoRecortado = texto.substring(0, 60) + "...";
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


    <!-- certificados -->
    <section id="certificados" class="py-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3 class="mb-5 text-purple">Mis certificados</h3>
          </div>
        </div>

        <div class="row">
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
                  echo '<div class="col-lg-4 ml-auto">';
                  echo '<a href="' . $fila['ruta_documento'] . '" target="_blank"><div class="card justify-content-center mb-3"><div class="card-body p-3"><div class="author">';
                  echo '<img src="../assets/img/draft.svg" alt="team-3" class="avatar avatar-sm shadow me-2 border-radius-lg" loading="lazy">';
                  echo '<h6 class="my-auto">' . $fila['nombre_certf'] . '</h6>';
                  echo '</div></div><div class="position-absolute end-0 me-3 "><i class="fas fa-angle-right text-purple" aria-hidden="true"></i></div></div>';
                  echo '</a>';
                  echo '</div>';
                  
              }
          } else {
              echo "No hay certificados para mostrar";
          }

          // Cerrar conexión
          $conexion->close();
          ?>
          
        </div>
        

      </div>
    </section>
  </div>
  <section id="contacto" class="py-lg-5">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card box-shadow-xl overflow-hidden mb-5">
            <div class="row">
              <div class="col-lg-5 position-relative bg-cover px-0" style="background-image: url('../assets/img/examples/blog2.jpg')" loading="lazy">
                <div class="z-index-2 text-center d-flex h-100 w-100 d-flex m-auto justify-content-center">
                  <div class="mask bg-gradient-dark opacity-8"></div>
                  <div class="p-5 ps-sm-8 position-relative text-start my-auto z-index-2">
                    <h3 class="text-white">Contact Information</h3>
                    <p class="text-white opacity-8 mb-4">Fill up the form and our Team will get back to you within 24 hours.</p>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-phone text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">(+40) 772 100 200</span>
                      </div>
                    </div>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-envelope text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">hello@creative-tim.com</span>
                      </div>
                    </div>
                    <div class="d-flex p-2 text-white">
                      <div>
                        <i class="fas fa-map-marker-alt text-sm"></i>
                      </div>
                      <div class="ps-3">
                        <span class="text-sm opacity-8">Dyonisie Wolf Bucharest, RO 010458</span>
                      </div>
                    </div>
                    <div class="mt-4">
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Facebook">
                        <i class="fab fa-facebook"></i>
                      </button>
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Twitter">
                        <i class="fab fa-twitter"></i>
                      </button>
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Dribbble">
                        <i class="fab fa-dribbble"></i>
                      </button>
                      <button type="button" class="btn btn-icon-only btn-link text-white btn-lg mb-0" data-toggle="tooltip" data-placement="bottom" data-original-title="Log in with Instagram">
                        <i class="fab fa-instagram"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7">
                <form class="p-3" id="contact-form" method="post">
                  <div class="card-header px-4 py-sm-5 py-3">
                    <h2>Say Hi!</h2>
                    <p class="lead"> We'd like to talk with you.</p>
                  </div>
                  <div class="card-body pt-1">
                    <div class="row">
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group input-group-static mb-4">
                          <label>My name is</label>
                          <input type="text" class="form-control" placeholder="Full Name">
                        </div>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group input-group-static mb-4">
                          <label>I'm looking for</label>
                          <input type="text" class="form-control" placeholder="What you love">
                        </div>
                      </div>
                      <div class="col-md-12 pe-2 mb-3">
                        <div class="input-group input-group-static mb-4">
                          <label>Your message</label>
                          <textarea name="message" class="form-control" id="message" rows="6" placeholder="I want to say that..."></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6 text-end ms-auto">
                        <button type="submit" class="btn bg-gradient-info mb-0">Send Message</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- -------- START FOOTER 5 w/ DARK BACKGROUND ------- -->
  <?php
    include 'footer.php';
  ?>
  <!-- -------- END FOOTER 5 w/ DARK BACKGROUND ------- -->
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="../assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
</body>

</html>