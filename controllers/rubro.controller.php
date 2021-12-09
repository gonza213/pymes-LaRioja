<?php

class ControllerRubro{

    static public function ctrMostrarRubros(){

        $tabla = 'rubro';

        $respuesta = ModelRubro::mdlMostrarRubros($tabla);

        return $respuesta;
    }
}