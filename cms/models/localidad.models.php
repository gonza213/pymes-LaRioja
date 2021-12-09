<?php

require_once 'conexion.php';


class ModelLocalidad{

    static public function mdlCrearLocalidad($tabla, $datos){

        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(localidad) VALUES (:localidad)");

        $stmt->bindParam(":localidad", $datos["localidad"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarLocalidades($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM $tabla ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    static public function mdlBorrarLocalidad($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}