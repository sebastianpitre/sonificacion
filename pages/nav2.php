<?php
session_start();
if(!isset($_SESSION['nombre_usuario'])){
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

</head>

<body class="">

  <!-- nav -->
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
          <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid px-0">
              <a class="navbar-brand font-weight-bolder ms-sm-3" href="index.php"
              rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
              Portafolio
              </a>
              <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
              data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
              </span>
              </button>
              <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
              <ul class="navbar-nav navbar-nav-hover ms-auto">

                  <li class="nav-item ms-lg-auto">
                  <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="index.php">
                      <span class="material-symbols-outlined opacity-6 me-1 text-xl">home_app_logo</span>
                      Inicio
                  </a>
                  </li>

                  <li class="nav-item ms-lg-auto">
                  <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" href="cv.php">
                      <span class="material-symbols-outlined opacity-6 me-1 text-xl">assignment_ind</span>
                      Hoja de Vida 
                  </a>
                  </li>

                  

                  <li class="nav-item dropdown dropdown-hover ">
                  <a class="nav-link ps-2 d-flex cursor-pointer align-items-center" id="dropdownMenuPages"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="material-symbols-outlined opacity-6 me-1 text-xl">shield_person</span>
                      <?php echo $_SESSION['nombre_usuario']; ?>
                      <img src="../assets/img/down-arrow-dark.svg" alt="down-arrow" class="arrow ms-auto ms-md-2">
                  </a>
                  <div class="dropdown-menu dropdown-menu-animation ms-n3 dropdown-md p-3 border-radius-xl mt-0 mt-lg-3"
                      aria-labelledby="dropdownMenuPages">
                      <div class="d-none d-lg-block">
                      <a href="mi_cuenta.php?id=1" class="dropdown-item border-radius-md">
                          <span>Mi cuenta</span>
                      </a>
                      </div>
                      <div class="d-none d-lg-block">
                      <a href="logout.php" class="dropdown-item border-radius-md">
                          <span>Cerrar sesión</span>
                      </a>
                      </div>

                      <div class="d-lg-none">
                      <a href="logout.php" class="dropdown-item border-radius-md">
                          <span>Cerrar sesión</span>
                      </a>

                      </div>

                  </div>
                  </li>

                  <!-- <li class="nav-item my-auto ms-3 ms-lg-0">

                  <a href="https://www.creative-tim.com/product/material-kit-pro"
                      class="btn btn-sm  bg-gradient-primary  mb-0 me-1 mt-2 mt-md-0">redes</a>

                  </li> -->
              </ul>
              </div>
          </div>
          </nav>
          <!-- End Navbar -->
      </div>
    </div>
  </div>
  <!--  end nav -->

</body>

</html>