<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Programa de Financiamiento Federal</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="views/assets/img/logo2.png" rel="icon">
  <link href="views/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="views/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="views/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="views/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="views/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="views/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="views/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="views/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Fontawesome -->
  <script src="https://kit.fontawesome.com/76e0757c77.js" crossorigin="anonymous"></script>

  <!-- Template Main CSS File -->
  <link href="views/assets/css/style.css" rel="stylesheet">


  <!-- SWEET ALERT2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <!-- =======================================================
  * Template Name: Mamba - v4.6.0
  * Template URL: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
 
  </style>
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <?php include 'pages/modules/top.php' ?>

  <?php

  if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 'index') {
      include 'pages/inicio.php';
    } else if ($_GET['pagina'] == 'localidades') {
      include 'pages/localidades.php';
    } else if ($_GET['pagina'] == 'rubros') {
      include 'pages/rubros.php';
    } else {
      include 'pages/error-404.php';
    }
  } else {
    include 'pages/inicio.php';
  }

  ?>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include 'pages/modules/footer.php' ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="views/assets/vendor/aos/aos.js"></script>
  <script src="views/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="views/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="views/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <!-- <script src="views/assets/vendor/php-email-form/validate.js"></script> -->
  <script src="views/assets/vendor/purecounter/purecounter.js"></script>
  <script src="views/assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="views/assets/js/main.js"></script>

</body>

</html>