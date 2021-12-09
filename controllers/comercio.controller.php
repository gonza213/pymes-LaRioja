<?php

class ControllerComercio
{

    static public function ctrMostrarComercios()
    {

        $tabla1 = 'comercios';
        $tabla2 = 'rubro';
        $tabla3 = 'localidad';

        $respuesta = ModelComercio::mdlMostrarComercios($tabla1, $tabla2, $tabla3);

        return $respuesta;
    }
}
