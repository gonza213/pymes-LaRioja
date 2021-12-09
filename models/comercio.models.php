<?php

require_once 'conexion.php';


class ModelComercio{

    static public function mdlMostrarComercios($tabla1, $tabla2, $tabla3){
        
        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_rubro = $tabla2.id INNER JOIN $tabla3 ON $tabla1.id_localidad = $tabla3.id");


        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}