<?php

require_once 'conexion.php';


class ModelLocalidad{

    static public function mdlMostrarLocalidades($tabla){

        
        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM $tabla ORDER BY localidad ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}