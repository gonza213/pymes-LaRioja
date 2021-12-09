<?php

require_once 'conexion.php';


class ModelComercio
{


    static public function mdlCrearComercio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, id_rubro, id_localidad, direccion, telefono, sitio, recomendado, foto) VALUES (:nombre, :id_rubro, :id_localidad, :direccion, :telefono, :sitio, :recomendado, :foto)");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":id_rubro", $datos["id_rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":id_localidad", $datos["id_localidad"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":sitio", $datos["sitio"], PDO::PARAM_STR);
        $stmt->bindParam(":recomendado", $datos["recomendado"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarComercios($tabla1, $tabla2, $tabla3)
    {

        $stmt = Conexion::conectar()->prepare("SELECT $tabla1.*, $tabla2.*, $tabla3.* FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_rubro = $tabla2.id INNER JOIN $tabla3 ON $tabla1.id_localidad = $tabla3.id");


        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

    // EDITAR USUARIO
    static public function mdlEditarComercio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, id_rubro = :id_rubro, id_localidad = :id_localidad, direccion = :direccion, telefono = :telefono, sitio = :sitio, recomendado = :recomendado, foto = :foto  WHERE id_c = :id_c");


        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":id_rubro", $datos["id_rubro"], PDO::PARAM_STR);
        $stmt->bindParam(":id_localidad", $datos["id_localidad"], PDO::PARAM_STR);
        $stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
        $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
        $stmt->bindParam(":sitio", $datos["sitio"], PDO::PARAM_STR);
        $stmt->bindParam(":recomendado", $datos["recomendado"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
        $stmt->bindParam(":id_c", $datos["id_c"], PDO::PARAM_INT);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }


    // MOSTRAR Admin
    static public function mdlVerComercio($tabla, $item, $valor)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();

        $stmt = null;
    }

    //Borrar
    static public function mdlBorrarComercio($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_c = :id_c");

        $stmt->bindParam(":id_c", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }
}
