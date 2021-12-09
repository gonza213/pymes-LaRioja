<?php

class ControllerLocalidad
{

    static public function ctrCrearLocalidad()
    {

        if (isset($_POST['localidad'])) {

            $tabla = 'localidad';

            $datos = array(
                'localidad' => $_POST['localidad']
            );

            $respuesta = ModelLocalidad::mdlCrearLocalidad($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
          
                    Swal.fire({
                      icon: 'success',
                      title: '¡La localidad se ha agregado correctamente!',
                      showConfirmButton: true,
                      confirmButtonText: 'Cerrar',
                      closeOnConfirm: false
                      }).then((result)=>{
              
                      if(result.value){
              
                        window.location = 'crear-localidad-rubro';
                      }
                  })
                            
                    
                         </script>";
            }
        }
    }

    static public function ctrMostrarLocalidades()
    {

        $tabla = 'localidad';

        $respuesta = ModelLocalidad::mdlMostrarLocalidades($tabla);

        return $respuesta;
    }

    static public function ctrBorrarLocalidad()
    {

        if (isset($_GET["idBorrarLocalidad"])) {

            $tabla = "localidad";
            $datos = $_GET["idBorrarLocalidad"];

            $respuesta = ModelLocalidad::mdlBorrarLocalidad($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
               
                     Swal.fire({
                       icon: 'success',
                       title: '¡La localidad ha sido borrado exitosamente!',
                       showConfirmButton: true,
                       confirmButtonText: 'Cerrar',
                       closeOnConfirm: false
                   }).then((result)=>{
               
                       if(result.value){
               
                           window.location = 'crear-localidad-rubro';
                       }
                   })
                             
                     
                          </script>";
            }
        }
    }
}
