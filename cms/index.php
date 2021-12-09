<?php


require_once 'controllers/plantilla.controller.php';
require_once 'controllers/usuarios.controller.php';
require_once 'controllers/localidad.controller.php';
require_once 'controllers/rubro.controller.php';
require_once 'controllers/comercio.controller.php';
require_once 'controllers/contacto.controller.php';


require_once 'models/usuario.models.php';
require_once 'models/localidad.models.php';
require_once 'models/rubro.models.php';
require_once 'models/comercio.models.php';
require_once 'models/contacto.models.php';


$plantilla = new ControllerPlantilla();
$plantilla -> ctrMostrarPlantilla();