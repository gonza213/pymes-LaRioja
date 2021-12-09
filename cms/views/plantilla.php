<?php

session_start();

//Comprobamos si esta definida la sesión 'tiempo'.
if (isset($_SESSION['tiempo'])) {

    //Tiempo en segundos para dar vida a la sesión.
    $inactivo = 1200; //20min en este caso.

    //Calculamos tiempo de vida inactivo.
    $vida_session = time() - $_SESSION['tiempo'];

    //Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
    if ($vida_session > $inactivo) {


        //Removemos sesión.
        session_unset();
        //Destruimos sesión.
        session_destroy();
        //Redirigimos pagina.

        header("Location: login");

        exit();
    }
}
$_SESSION['tiempo'] = time();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>cms - Programa de Financiamiento Federal </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="views/images/favicon.png">
    <link rel="stylesheet" href="views/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="views/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="views/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <!-- Datatable -->
    <link href="views/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">

    <link href="views/css/style.css" rel="stylesheet">

    <script src="https://kit.fontawesome.com/76e0757c77.js" crossorigin="anonymous"></script>

     <!-- SWEET ALERT2 -->
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>

<body>

    <?php if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") : ?>
        <!--**********************************
        Main wrapper start
    ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
            Nav header start
        ***********************************-->
            <?php include 'pages/modules/nav.php' ?>
            <!--**********************************
            Nav header end
        ***********************************-->

            <!--**********************************
            Header start
        ***********************************-->
            <?php include 'pages/modules/header.php' ?>
            <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

            <!--**********************************
            Sidebar start
        ***********************************-->
            <?php include 'pages/modules/sidebar.php' ?>
            <!--**********************************
            Sidebar end
        ***********************************-->

            <!--**********************************
            Content body start
        ***********************************-->
            <?php

            if (isset($_GET['pagina'])) {

                if ($_GET['pagina'] == 'home') {
                    include 'pages/home.php';
                } else if ($_GET['pagina'] == 'usuarios') {
                    include 'pages/usuarios.php';
                } else if ($_GET['pagina'] == 'crear-localidad-rubro') {
                    include 'pages/localidad_rubro.php';
                } else if ($_GET['pagina'] == 'comercios') {
                    include 'pages/comercios.php';
                } else if ($_GET['pagina'] == 'contactos') {
                    include 'pages/contactos.php';
                } else if ($_GET['pagina'] == 'suscripciones') {
                    include 'pages/suscripciones.php';
                } else if ($_GET['pagina'] == 'mi-perfil') {
                    include 'pages/perfil.php';
                } else if ($_GET['pagina'] == 'salir') {
                    include 'pages/salir.php';
                } else {
                    include 'pages/error-404.php';
                }
            } else {

                include 'pages/home.php';
            }

            ?>
            <!--**********************************
            Content body end
        ***********************************-->


            <!--**********************************
            Footer start
        ***********************************-->
            <?php include 'pages/modules/footer.php' ?>
            <!--**********************************
            Footer end
        ***********************************-->


        </div>
        <!--**********************************
        Main wrapper end 
    ***********************************-->

    <?php else : ?>

        <?php include "pages/login.php"; ?>

    <?php endif; ?>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="views/vendor/global/global.min.js"></script>
    <script src="views/js/quixnav-init.js"></script>
    <script src="views/js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="views/vendor/raphael/raphael.min.js"></script>
    <script src="views/vendor/morris/morris.min.js"></script>


    <script src="views/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="views/vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="views/vendor/gaugeJS/dist/gauge.min.js"></script>

    <!--  flot-chart js -->
    <script src="views/vendor/flot/jquery.flot.js"></script>
    <script src="views/vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="views/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="views/vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="views/vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="views/vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <!-- Datatable -->
    <script src="views/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="views/js/plugins-init/datatables.init.js"></script>


    <script src="views/js/dashboard/dashboard-1.js"></script>
    <script src="views/js/main.js"></script>


</body>

</html>