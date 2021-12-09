<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <p style="margin-top: -30px">
                        <img src="views/assets/img/logo.png" class="img-fluid" style="width: 140px; margin-top: -20px">
                        <br>
                        Programa de Financiamiento Federal <br>
                        <strong>Teléfono:</strong> 0810-777-8001<br>
                        <strong>Atención al público:</strong> +543804330507<br>
                    </p>
                    <div class="social-links mt-3">
                        <a href="https://www.facebook.com/ProgramadeFinanciamiento/" class="facebook"><i class="bx bxl-facebook"></i></a>
                        <a href="https://www.instagram.com/programa_de_financiamiento/" class="instagram"><i class="bx bxl-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 footer-newsletter">
                    <h4>Nuestro boletín</h4>
                    <p>¡Enterate de todas nuestras novedades!</p>
                    <form  method="post">
                        <input type="email" name="emails"><input type="submit" value="Subscribite">
                        <?php 
                         
                         $suscripcion = new ControllerContacto();
                         $suscripcion-> ctrCrearSuscripcion();
                        
                        ?>
                    </form>

                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Menu</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#hero">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#programa">Programa</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#beneficios">Beneficios</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#filtros">Filtros</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#contacto">Contacto</a></li>
                    </ul>
                </div>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy;<script>
                document.write(new Date().getFullYear());
            </script> <strong><span>Programa de Financiamiento Federal </span></strong>. Todos los Derechos Reservados.
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mamba-one-page-bootstrap-template-free/ -->
            Desarrollado por: <a href="http://www.marketingvirtualweb.com/">Marketing Virtual-Web</a>
        </div>
    </div>
</footer>