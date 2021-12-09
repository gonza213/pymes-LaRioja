<?php

class ControllerComercio{

       // REGISTRAR ADMIN
       static public function ctrCrearComercio()
       {
   
           if (isset($_POST["nombre"])) {
   
               if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["id_localidad"])) {
   
                   $ruta = "";
   
                   if ($_FILES["foto"]["tmp_name"] == "") {
   
                       $ruta = "views/images/avatar/1.png";
                   } else {
   
                       if (isset($_FILES["foto"]["tmp_name"])) {
   
   
                           list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);
   
                           // $nuevoancho = 400;
                           // $nuevoalto = 400;
   
                           $directorio = "views/images/comercios/" . $_POST["nombre"];
   
                           mkdir($directorio, 0755);
   
                           if ($_FILES["foto"]["type"] == "image/jpeg") {
   
                               $aleatorio = mt_rand(100, 999);
   
                               $ruta = "views/images/comercios/" . $_POST["nombre"] . "/" . $aleatorio . ".jpg";
   
                               $origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);
   
                               $destino = imagecreatetruecolor($ancho, $alto);
   
                               imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);
   
                               imagejpeg($destino, $ruta);
                           } else if ($_FILES["foto"]["type"] == "image/png") {
   
                               $aleatorio = mt_rand(100, 999);
   
                               $ruta = "views/images/comercios/" . $_POST["nombre"] . "/" . $aleatorio . ".png";
   
                               $origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);
   
                               $destino = imagecreatetruecolor($ancho, $alto);
   
                               imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);
   
                               imagepng($destino, $ruta);
                           } else {
   
                               echo "<script>
                     
                                   Swal.fire({
                                     icon: 'error',
                                     title: '¡La foto debe ser formato JPG o PNG!',
                                     showConfirmButton: true,
                                     confirmButtonText: 'Cerrar',
                                     closeOnConfirm: false
                                     }).then((result)=>{
                             
                                     if(result.value){
                             
                                         window.location = 'comercios';
                                     }
                                 })
                                           
                                   
                                        </script>";
                           }
                       }
                   }
   
   
                   $tabla = "comercios";
   
                   $datos = array(
                       "nombre" => $_POST["nombre"],
                       "id_rubro" => $_POST["id_rubro"],
                       "id_localidad" => $_POST["id_localidad"],
                       "direccion" => $_POST["direccion"],
                       "telefono" => $_POST["telefono"],
                       "sitio" => $_POST["sitio"],
                       "recomendado" => $_POST["recomendado"],
                       "foto" => $ruta
                   );
   
                   $respuesta = ModelComercio::mdlCrearComercio($tabla, $datos);
   
                   if ($respuesta == "ok") {
   
                       echo "<script>
                 
                           Swal.fire({
                             icon: 'success',
                             title: '¡El comercio se ha agregado correctamente!',
                             showConfirmButton: true,
                             confirmButtonText: 'Cerrar',
                             closeOnConfirm: false
                             }).then((result)=>{
                     
                             if(result.value){
                     
                                 window.location = 'comercios';
                             }
                         })
                                   
                           
                                </script>";
                   }
               } else {
   
                   echo "<script>
                 
                       Swal.fire({
                         icon: 'error',
                         title: '¡El usuario no debe llevar caracteres especiales!',
                         showConfirmButton: true,
                         confirmButtonText: 'Cerrar',
                         closeOnConfirm: false
                         }).then((result)=>{
                 
                         if(result.value){
                 
                             window.location = 'comercios';
                         }
                     })
                               
                       
                            </script>";
               }
           }
       }


       
    // EDITAR ADMIN
    static public function ctrEditarComercio()
    {

        if (isset($_POST["nombreC"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["idC"])) {

                $ruta = "";

                if ($_FILES["fotoC"]["tmp_name"] == "") {

                    $ruta = $_POST["fotoActualC"];
                } else {

                    if (isset($_FILES["fotoC"]["tmp_name"])) {


                        list($ancho, $alto) = getimagesize($_FILES["fotoC"]["tmp_name"]);

                        // $nuevoancho = 400;
                        // $nuevoalto = 400;

                        $directorio = "views/images/comercios/" . $_POST["nombreC"];

                        mkdir($directorio, 0755);


                        if ($_FILES["fotoC"]["type"] == "image/jpeg") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "views/images/comercios/" . $_POST["nombreC"] . "/" . $aleatorio . ".jpg";

                            $origen = imagecreatefromjpeg($_FILES["fotoC"]["tmp_name"]);

                            $destino = imagecreatetruecolor($ancho, $alto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        } else if ($_FILES["fotoC"]["type"] == "image/png") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "views/images/comercios/" . $_POST["nombreC"] . "/" . $aleatorio . ".png";

                            $origen = imagecreatefrompng($_FILES["fotoC"]["tmp_name"]);

                            $destino = imagecreatetruecolor($ancho, $alto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);

                            imagepng($destino, $ruta);
                        } else {

                            echo "<script>
                  
                                Swal.fire({
                                  icon: 'error',
                                  title: '¡La foto debe ser formato JPG o PNG!',
                                  showConfirmButton: true,
                                  confirmButtonText: 'Cerrar',
                                  closeOnConfirm: false
                                  }).then((result)=>{
                          
                                  if(result.value){
                          
                                      window.location = 'comercios';
                                  }
                              })
                                        
                                
                                     </script>";
                        }
                    }
                }


                $tabla = "comercios";

                $datos = array(
                    "id_c" => $_POST["idC"],
                    "nombre" => $_POST["nombreC"],
                    "id_rubro" => $_POST["id_rubroC"],
                    "id_localidad" => $_POST["id_localidadC"],
                    "direccion" => $_POST["direccionC"],
                    "telefono" => $_POST["telefonoC"],
                    "sitio" => $_POST["sitioC"],
                    "recomendado" => $_POST["recomendadoC"],
                    "foto" => $ruta
                );


                $respuesta = ModelComercio::mdlEditarComercio($tabla, $datos);

                if ($respuesta == "ok") {

                    echo "<script>
              
                        Swal.fire({
                          icon: 'success',
                          title: '¡El comercio se ha editado correctamente!',
                          showConfirmButton: true,
                          confirmButtonText: 'Cerrar',
                          closeOnConfirm: false
                          }).then((result)=>{
                  
                          if(result.value){
                  
                            window.location = 'comercios';
                          }
                      })
                                
                        
                             </script>";
                }
            } else {

                echo "<script>
              
                    Swal.fire({
                      icon: 'error',
                      title: '¡El comercio no debe llevar caracteres especiales!',
                      showConfirmButton: true,
                      confirmButtonText: 'Cerrar',
                      closeOnConfirm: false
                      }).then((result)=>{
              
                      if(result.value){
              
                        window.location = 'comercios';
                      }
                  })
                            
                    
                         </script>";
            }
        }
    }

       static public function ctrMostrarComercios(){

        $tabla1 = 'comercios';
        $tabla2 = 'rubro';
        $tabla3 = 'localidad';

        $respuesta = ModelComercio::mdlMostrarComercios($tabla1, $tabla2, $tabla3);

        return $respuesta;
       }



       // MOSTRAR Usuario
    static public function ctrVerComercio($item, $valor)
    {

        $tabla = "comercios";

        $resultado = ModelComercio::mdlVerComercio($tabla, $item, $valor);

        return $resultado;
    }

       //Borrar 
       static public function ctrBorrarComercio()
       {
   
           if (isset($_GET["idBorrarComercio"])) {
   
               $tabla = "comercios";
               $datos = $_GET["idBorrarComercio"];
   
               $respuesta = ModelComercio::mdlBorrarComercio($tabla, $datos);
   
               if ($respuesta == "ok") {
   
                   echo "<script>
               
                     Swal.fire({
                       icon: 'success',
                       title: '¡El comercio ha sido borrado exitosamente!',
                       showConfirmButton: true,
                       confirmButtonText: 'Cerrar',
                       closeOnConfirm: false
                   }).then((result)=>{
               
                       if(result.value){
               
                           window.location = 'comercios';
                       }
                   })
                             
                     
                          </script>";
               }
           }
       }
   

   
   
}