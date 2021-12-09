<?php

$rubros = ControllerRubro::ctrMostrarRubros();
$localidades = ControllerLocalidad::ctrMostrarLocalidades();
$comercios = ControllerComercio::ctrMostrarComercios();
$id = $_GET['id'];

?>
  <!-- ======= Header ======= -->
  <?php include 'modules/header2.php' ?>
  <!-- End Header -->

<main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <div class="col-md-12 p-0 banner">
        <img src="views/assets/img/slide/slider-1.jpg" class="w-100" >
        <h1 class="text-right p-3">Localidades</h1>
    </div>
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <?php foreach ($localidades as $key => $value) : ?>
                    <?php if ($value['id'] == $id) : ?>
                        <h2 style="color: #F7BFDA">Localidad: <strong style="color: #0071BC"><?php echo $value['localidad'] ?></strong></h2>
                    <?php endif; ?>
                <?php endforeach; ?>
                <ol>
                    <li><a href="index">Home</a></li>
                    <?php foreach ($localidades as $key => $value) : ?>
                        <?php if ($value['id'] == $id) : ?>
                            <li style="color: #F7BFDA"><?php echo $value['localidad'] ?></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs Section -->

    <!-- ======= Our Portfolio Section ======= -->
    <section id="filtros" class="portfolio">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row section-bg p-3">
                <div class="col-md-3">
                    <div class="row">

                        <div class="col-lg-12">
                            <h4 style="color: #0071BC" class="text-center p-2">Rubros:</h4>
                            <ul id="portfolio-flters">
                                <?php foreach ($rubros as $key => $value) : ?>
                                    <li data-filter=".rubro<?php echo $value['id'] ?>"><?php echo $value['rubro'] ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row portfolio-container">

                        <?php foreach ($comercios as $key => $value) : ?>
                            <?php if ($value['id_localidad'] == $id) : ?>
                                <div class="col-lg-4 col-md-6 portfolio-item rubro<?php echo $value['id_rubro'] ?>">
                                    <div class="portfolio-wrap">
                                        <img src="cms/<?php echo $value['foto'] ?>" class="img-fluid" style="width: 100%; height: 300px">
                                        <div class="portfolio-info">
                                            <h4><?php echo $value['nombre'] ?></h4>
                                            <!-- <p>App</p> -->
                                            <div class="portfolio-links">
                                                <a href="cms/<?php echo $value['foto'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<h2 style='color: #0071BC'> <?php echo $value['nombre'] ?></h2> <br> Localidad: <span style='color: #0071BC'>  <?php echo $value['localidad'] ?> </span> <br> Rubro: <span style='color: #0071BC'> <?php echo $value['rubro'] ?> </span> <br> Teléfono: <span style='color: #0071BC'> <?php echo $value['telefono'] ?> </span>  <br> Dirección: <span style='color: #0071BC'>  <?php echo $value['direccion'] ?> </span> "><i class="bi bi-plus"></i></a>
                                                <a href="<?php echo $value['sitio'] ?>" title="Más detalles"><i class="bi bi-link"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>



        </div>
    </section><!-- End Our Portfolio Section -->


</main><!-- End #main -->