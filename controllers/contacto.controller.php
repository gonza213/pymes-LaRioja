<?php

class ControllerContacto
{

    static public function ctrCrearContacto()
    {

        if (isset($_POST['nombre'])) {

            $tabla = 'contacto';

            $datos = array(
                'nombre' => $_POST['nombre'],
                'tel' => $_POST['tel'],
                'email' => $_POST['email'],
                'mensaje' => $_POST['mensaje'],
            );

            $respuesta = ModelContacto::mdlCrearContacto($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
          
                    Swal.fire({
                      icon: 'success',
                      title: '¡El contacto se ha enviado correctamente!',
                      showConfirmButton: true,
                      confirmButtonText: 'Cerrar',
                      closeOnConfirm: false
                      }).then((result)=>{
              
                      if(result.value){
              
                        window.location = 'index';
                      }
                  })
                            
                    
                         </script>";
            }
        }
    }



    static public function ctrCrearSuscripcion()
    {

        if (isset($_POST['emails'])) {

            $tabla = 'suscripciones';

            $datos = array(
                'email' => $_POST['emails']
            );

            $respuesta = ModelContacto::mdlCrearSuscripcion($tabla, $datos);

            if ($respuesta == "ok") {

                echo "<script>
          
                Swal.fire(
                    '¡Te has suscripto exitosamente!',
                    '¡Haga click en el botón!',
                    'success'
                  )
                            
                    
                         </script>";
            }
        }
    }
}
