<?php

$rubros = ControllerRubro::ctrMostrarRubros();
$localidades = ControllerLocalidad::ctrMostrarLocalidades();
$comercios = ControllerComercio::ctrMostrarComercios();

?>

<!-- ======= Header ======= -->
<?php include 'modules/header.php' ?>
<!-- End Header -->


<!-- ======= Hero Section ======= -->
<?php include 'modules/banner.php' ?>
<!-- End Hero -->

<main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="programa" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">
                <div class="col-lg-6 video-box">
                    <img src="views/assets/img/riojana.jpg" class="img-fluid h-100 w-100" alt="">
                    <!-- <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video" data-autoplay="true"></a> -->
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                    <div class="section-title">
                        <h2>¡Hasta 40cuotas!</h2>
                        <p>¡Sumate al programa de financiación más confiable!</p>
                    </div>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">Financiación a Empleados Públicos.</a></h4>
                        <p class="description">Financiamos en hasta 40 cuotas a los Empleados Públicos Provinciales, estén o no en Veraz sin límite de monto. Solo con tu DNI En segundos podés consultar acerca de tu línea de crédito, donde comprar y cómo abonar las cuotas. ¡Escribinos!</p>
                    </div>

                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">Financiación Directa en Comercios</a></h4>
                        <p class="description">¿Sos un comerciante y querés adherirte al Programa de Financiamiento Federal? Envíanos un mensaje con tus datos y te sumamos en minutos a nuestra Red de Comercios.</p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->

    <!-- ======= About Lists Section ======= -->
    <section class="about-lists" id="beneficios">
        <div class="container">

            <div class="row no-gutters">

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up">
                    <span>01</span>
                    <h4>CUOTAS</h4>
                    <p>Permite financiar de 3 hasta 40 cuotas fijas</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="100">
                    <span>02</span>
                    <h4>INMEDIATO</h4>
                    <p>Sin boreau de crédito, sin Veraz, Nosis o clearin local.</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="200">
                    <span>03</span>
                    <h4>CÓMODO</h4>
                    <p>Ofrecemos distintos plazos de liquidación para los comercios</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="300">
                    <span>04</span>
                    <h4>FÁCIL</h4>
                    <p>La aprobación es inmediata a través de nuestro sitio web</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="400">
                    <span>05</span>
                    <h4>¡SUMATE!</h4>
                    <p>Podés sumarte al programa de financiación más confiable</p>
                </div>

                <div class="col-lg-4 col-md-6 content-item" data-aos="fade-up" data-aos-delay="500">
                    <span>06</span>
                    <h4>EMPLEADOS</h4>
                    <p>Abarca a todos los Empleados Públicos de la Rioja, Provinciales, Municipales del interior, Docentes, Policías, Salud Pública.</p>
                </div>

            </div>

        </div>
    </section><!-- End About Lists Section -->

    <!-- ======= Counts Section ======= -->
    <section class="counts section-bg">
        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-md-6 text-center" data-aos="fade-up">
                    <div class="count-box">
                        <div class="row">
                            <div class="col-md-8 p-1">
                                <h3 class="text-center" style="color: #0071BC">¡CONSULTÁ TU LINEA DE CRÉDITO!</h3>
                            </div>
                            <div class="col-md-4 p-2">
                                <a href="https://sytes.federalriojana.com.ar/tfr/servlet/inicio" target="_blank" style="font-size: 15px"><i class="fas fa-arrow-right" style="font-size: 20px"></i> HACELO AHORA</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- End Counts Section -->


    <!-- ======= Our Portfolio Section ======= -->
    <section id="filtros" class="portfolio section-bg">
        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="section-title">
                <h2>FILTRÁ POR RUBROS O LOCALIDADES</h2>
                <p>Podes conocer los comercios adheridos en tu localidad, o también filtrar por rubros. ¡Estás a un paso de llevarte lo que quieras!</p>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-center" style="color: #0071BC" class="p-2">Localidades:</h4>
                    <ul id="portfolio-flters">
                        <?php foreach ($localidades as $key => $value) : ?>
                            <li data-filter=".localidad<?php echo $value['id'] ?>"><?php echo $value['localidad'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <div class="row">
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
                            <?php if ($value['recomendado'] == 1) : ?>
                                <div class="col-lg-4 col-md-6 portfolio-item rubro<?php echo $value['id_rubro'] ?> localidad<?php echo $value['id_localidad'] ?>">
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


    <!-- ======= Contact Us Section ======= -->
    <section id="contacto" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Contacto</h2>
            </div>

            <div class="row">


                <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="info-box">
                        <i class="bx bx-envelope"></i>
                        <h3>Email</h3>
                        <p>info@example.com<br>contact@example.com</p>
                    </div>
                </div>

                <div class="col-lg-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-box ">
                        <i class="bx bx-phone-call"></i>
                        <h3>Teléfono:</h3>
                        <p>0810-777-8001</p>
                        <h3>Whatsapp:</h3>
                        <p><span>Atención al público:</span> <a href="https://api.whatsapp.com/send?phone=543804330507">+543804330507</a><br>
                            <span>Atención comercial:</span> <a href=" https://api.whatsapp.com/send/?phone=543804817991&text&app_absent=0">+543804817991</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="info-box ">
                        <h3>Redes Sociales</h3>
                        <div class="social-links mt-3">
                            <!-- <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a> -->
                            <a href="https://www.facebook.com/ProgramadeFinanciamiento/" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="https://www.instagram.com/programa_de_financiamiento/" class="instagram" target="_blank"><i class="bx bxl-instagram"></i></a>
                            <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a> -->
                        </div>

                    </div>
                </div>

                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <form method="post" class="php-email-form">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-6 form-group">
                                <input type="text" class="form-control" name="tel" placeholder="Teléfono" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="mensaje" rows="5" placeholder="Escribe un mensaje..." required></textarea>
                        </div>
                        <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                        <?php

                        $contacto = new ControllerContacto();
                        $contacto->ctrCrearContacto();

                        ?>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Us Section -->

</main>