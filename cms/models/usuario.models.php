<?php

require_once 'conexion.php';


class ModelUsuario{

    static public function mdlIngresarUsuario($tabla, $item, $valor){

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        }



        $stmt->close();

        $stmt = null;
    }

    static public function mdlCrearUsuario($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, email, password, nombre, rol, foto) VALUES (:usuario, :email, :password, :nombre, :rol, :foto)");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
        $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);


        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        $stmt->close();

        $stmt = null;
    }

    static public function mdlMostrarUsuarios($tabla)
    {

        $stmt = Conexion::conectar()->prepare("SELECT *, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha FROM $tabla ORDER BY id DESC");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->close();

        $stmt = null;
    }

       // EDITAR USUARIO
       static public function mdlEditarUsuario($tabla, $datos)
       {
   
           $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario = :usuario, email = :email, password = :password, nombre = :nombre, rol = :rol, foto = :foto  WHERE id = :id");
   
           $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
           $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
           $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
           $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
           $stmt->bindParam(":rol", $datos["rol"], PDO::PARAM_STR);
           $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
           $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
   
   
           if ($stmt->execute()) {
   
               return "ok";
           } else {
   
               return "error";
           }
   
           $stmt->close();
   
           $stmt = null;
       }
   

      // MOSTRAR Admin
      static public function mdlVerUsuario($tabla, $item, $valor)
      {
          $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
          $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
  
          $stmt->execute();
  
          return $stmt->fetch();
  
          $stmt->close();
  
          $stmt = null;
      }

      //Borrar
    static public function mdlBorrarUsuario($tabla, $datos)
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