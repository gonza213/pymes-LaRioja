<?php

require_once 'conexion.php';


class ModelContacto{

    static public function mdlCrearContacto($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, tel, email, mensaje) VALUES (:nombre, :tel, :email, :mensaje)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":tel", $datos["tel"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":mensaje", $datos["mensaje"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;

    }

    static public function mdlCrearSuscripcion($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(email) VALUES (:email)");

        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;

    }

}