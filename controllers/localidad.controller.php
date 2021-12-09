<?php

class ControllerLocalidad{

    static public function ctrMostrarLocalidades(){

        $tabla = 'localidad';

        $respuesta = ModelLocalidad::mdlMostrarLocalidades($tabla);

        return $respuesta;
    }
}