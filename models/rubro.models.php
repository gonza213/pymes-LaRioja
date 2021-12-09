<?php

require_once 'conexion.php';


class ModelRubro{

    static public function mdlMostrarRubros($tabla){

        
        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM $tabla ORDER BY rubro ASC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }
}