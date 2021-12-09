<?php

class ControllerRubro
{

    static public function ctrCrearRubro()
    {

        if (isset($_POST['rubro'])) {

            $tabla = 'rubro';

            $datos = array(
                'rubro' => $_POST['rubro']
            );

            $respuesta = ModelRubro::mdlCrearRubro($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
          
                    Swal.fire({
                      icon: 'success',
                      title: '¡El rubro se ha agregado correctamente!',
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

    static public function ctrMostrarRubros()
    {

        $tabla = 'rubro';

        $respuesta = ModelRubro::mdlMostrarRubros($tabla);

        return $respuesta;
    }

    static public function ctrBorrarRubro()
    {

        if (isset($_GET["idBorrarRubro"])) {

            $tabla = "rubro";
            $datos = $_GET["idBorrarRubro"];

            $respuesta = ModelRubro::mdlBorrarRubro($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
               
                     Swal.fire({
                       icon: 'success',
                       title: '¡El rubro ha sido borrado exitosamente!',
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
