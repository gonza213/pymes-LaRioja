<?php


require_once '../../controllers/usuarios.controller.php';
require_once '../../controllers/comercio.controller.php';

require_once '../../models/usuario.models.php';
require_once '../../models/comercio.models.php';



class Ajax{

      //Editar usuario
      public $idEditarUsuario;

      public function ajaxEditUsuario()
      {
          $item = "id";
          $valor = $this->idEditarUsuario;
          $respuesta = ControllerUsuario::ctrVerUsuario($item, $valor);
  
          echo json_encode($respuesta);
      }

       //Editar comercio
       public $idEditarComercio;

       public function ajaxEditComercio()
       {
           $item = "id_c";
           $valor = $this->idEditarComercio;
           $respuesta = ControllerComercio::ctrVerComercio($item, $valor);
   
           echo json_encode($respuesta);
       }
}


//Editar usuario
if (isset($_POST["idEditarUsuario"])) {
    $c = new Ajax();
    $c->idEditarUsuario = $_POST["idEditarUsuario"];
    $c->ajaxEditUsuario();
}

//Editar comercio
if (isset($_POST["idEditarComercio"])) {
    $c = new Ajax();
    $c->idEditarComercio = $_POST["idEditarComercio"];
    $c->ajaxEditComercio();
}
