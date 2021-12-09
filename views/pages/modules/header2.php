<?php

$localidades = ControllerLocalidad::ctrMostrarLocalidades();
$rubros = ControllerRubro::ctrMostrarRubros();

?>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <!-- <h1><a href="index.html">Mamba</a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index"><img src="views/assets/img/logo.png"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="index">Home</a></li>
                <li><a class="nav-link scrollto" href="index#programa">Programa</a></li>
                <li><a class="nav-link scrollto" href="index#beneficios">Beneficios</a></li>
                <li class="dropdown"><a href="#"><span>Filtros</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li class="dropdown"><a href="#"><span>Localidades</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <?php foreach ($localidades as $key => $value) : ?>
                                    <li><a href="index.php?pagina=localidades&id=<?php echo $value['id'] ?>"><?php echo $value['localidad'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#"><span>Rubros</span> <i class="bi bi-chevron-right"></i></a>
                            <ul>
                                <?php foreach ($rubros as $key => $value) : ?>
                                    <li><a href="index.php?pagina=rubros&id=<?php echo $value['id'] ?>"><?php echo $value['rubro'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="index#contacto">Contacto</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>