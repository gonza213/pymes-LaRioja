<?php


class ControllerContacto{

    static public function ctrMostrarContactos()
    {

        $tabla = 'contacto';

        $respuesta = ModelContacto::mdlMostrarContactos($tabla);

        return $respuesta;
    }

    static public function ctrBorrarContacto()
    {

        if (isset($_GET["idBorrarContacto"])) {

            $tabla = "contacto";
            $datos = $_GET["idBorrarContacto"];

            $respuesta = ModelContacto::mdlBorrarContacto($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
               
                     Swal.fire({
                       icon: 'success',
                       title: '¡El contacto ha sido borrado exitosamente!',
                       showConfirmButton: true,
                       confirmButtonText: 'Cerrar',
                       closeOnConfirm: false
                   }).then((result)=>{
               
                       if(result.value){
               
                           window.location = 'contactos';
                       }
                   })
                             
                     
                          </script>";
            }
        }
    }

    static public function ctrMostrarSuscripciones()
    {

        $tabla = 'suscripciones';

        $respuesta = ModelContacto::mdlMostrarSuscripciones($tabla);

        return $respuesta;
    }

    static public function ctrBorrarSuscripcion()
    {

        if (isset($_GET["idBorrarSuscripcion"])) {

            $tabla = "suscripciones";
            $datos = $_GET["idBorrarSuscripcion"];

            $respuesta = ModelContacto::mdlBorrarSuscripcion($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
               
                     Swal.fire({
                       icon: 'success',
                       title: '¡La suscripcion ha sido borrado exitosamente!',
                       showConfirmButton: true,
                       confirmButtonText: 'Cerrar',
                       closeOnConfirm: false
                   }).then((result)=>{
               
                       if(result.value){
               
                           window.location = 'suscripciones';
                       }
                   })
                             
                     
                          </script>";
            }
        }
    }

}