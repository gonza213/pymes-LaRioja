<?php

class ControllerUsuario{

    static public function ctrIngresarUsuario(){

        if (isset($_POST["usuario"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])) {

                $encriptar = crypt($_POST["password"], '$2y$05$2ihDv8vVf7QZ9BsaRrKyqs2tkn55Yq');

                $tabla = "usuarios";

                $item = "usuario";
                $valor = $_POST["usuario"];

                $respuesta = ModelUsuario::mdlIngresarUsuario($tabla, $item, $valor);

                if ($respuesta["usuario"] == $_POST["usuario"] && $respuesta["password"] == $encriptar) {

                    $_SESSION["iniciarSesion"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    $_SESSION["usuario"] = $respuesta["usuario"];
                    $_SESSION["rol"] = $respuesta["rol"];
                    $_SESSION['tiempo'] = time();

                    echo '<script> 
      
                           window.location = "home";
                
                          </script>';

                } else {

                    echo "<div class='alert alert-danger'>Error al ingresar, vuelve a intentar</div>";
                }
            }
        }
    }

       // REGISTRAR ADMIN
       static public function ctrCrearUsuario()
       {
   
           if (isset($_POST["usuario"])) {
   
               if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["rol"])) {
   
                   $ruta = "";
   
                   if ($_FILES["foto"]["tmp_name"] == "") {
   
                       $ruta = "views/images/avatar/1.png";
                   } else {
   
                       if (isset($_FILES["foto"]["tmp_name"])) {
   
   
                           list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);
   
                           // $nuevoancho = 400;
                           // $nuevoalto = 400;
   
                           $directorio = "views/images/usuarios/" . $_POST["usuario"];
   
                           mkdir($directorio, 0755);
   
                           if ($_FILES["foto"]["type"] == "image/jpeg") {
   
                               $aleatorio = mt_rand(100, 999);
   
                               $ruta = "views/images/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".jpg";
   
                               $origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);
   
                               $destino = imagecreatetruecolor($ancho, $alto);
   
                               imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);
   
                               imagejpeg($destino, $ruta);
                           } else if ($_FILES["foto"]["type"] == "image/png") {
   
                               $aleatorio = mt_rand(100, 999);
   
                               $ruta = "views/images/usuarios/" . $_POST["usuario"] . "/" . $aleatorio . ".png";
   
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
                             
                                         window.location = 'usuarios';
                                     }
                                 })
                                           
                                   
                                        </script>";
                           }
                       }
                   }
   
   
                   $tabla = "usuarios";
   
                   $encriptar = crypt($_POST["password"], '$2y$05$2ihDv8vVf7QZ9BsaRrKyqs2tkn55Yq');
   
                   $datos = array(
                       "usuario" => $_POST["usuario"],
                       "email" => $_POST["email"],
                       "password" => $encriptar,
                       "nombre" => $_POST["nombre"],
                       "rol" => $_POST["rol"],
                       "foto" => $ruta
                   );
   
                   $respuesta = ModelUsuario::mdlCrearUsuario($tabla, $datos);
   
                   if ($respuesta == "ok") {
   
                       echo "<script>
                 
                           Swal.fire({
                             icon: 'success',
                             title: '¡El usuario se ha creado correctamente!',
                             showConfirmButton: true,
                             confirmButtonText: 'Cerrar',
                             closeOnConfirm: false
                             }).then((result)=>{
                     
                             if(result.value){
                     
                                 window.location = 'usuarios';
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
                 
                             window.location = 'usuarios';
                         }
                     })
                               
                       
                            </script>";
               }
           }
       }


       
    // EDITAR ADMIN
    static public function ctrEditarUsuario()
    {

        if (isset($_POST["usuarioE"])) {

            if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["idE"])) {

                $ruta = "";

                if ($_FILES["fotoE"]["tmp_name"] == "") {

                    $ruta = $_POST["fotoActual"];
                } else {

                    if (isset($_FILES["fotoE"]["tmp_name"])) {


                        list($ancho, $alto) = getimagesize($_FILES["fotoE"]["tmp_name"]);

                        // $nuevoancho = 400;
                        // $nuevoalto = 400;

                        $directorio = "views/images/usuarios/" . $_POST["usuarioE"];

                        mkdir($directorio, 0755);


                        if ($_FILES["fotoE"]["type"] == "image/jpeg") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "views/images/usuarios/" . $_POST["usuarioE"] . "/" . $aleatorio . ".jpg";

                            $origen = imagecreatefromjpeg($_FILES["fotoE"]["tmp_name"]);

                            $destino = imagecreatetruecolor($ancho, $alto);

                            imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);

                            imagejpeg($destino, $ruta);
                        } else if ($_FILES["fotoE"]["type"] == "image/png") {

                            $aleatorio = mt_rand(100, 999);

                            $ruta = "views/images/usuarios/" . $_POST["usuarioE"] . "/" . $aleatorio . ".png";

                            $origen = imagecreatefrompng($_FILES["fotoE"]["tmp_name"]);

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
                          
                                      window.location = 'usuarios';
                                  }
                              })
                                        
                                
                                     </script>";
                        }
                    }
                }


                $tabla = "usuarios";

                if ($_POST["passwordE"] == "") {

                    $encriptar = $_POST["passwordActual"];
                } else {

                    $encriptar = crypt($_POST["passwordE"], '$2y$05$2ihDv8vVf7QZ9BsaRrKyqs2tkn55Yq');
                }



                $datos = array(
                    "id" => $_POST["idE"],
                    "usuario" => $_POST["usuarioE"],
                    "email" => $_POST["emailE"],
                    "password" => $encriptar,
                    "nombre" => $_POST["nombreE"],
                    "rol" => $_POST["rolE"],
                    "foto" => $ruta
                );

                $respuesta = ModelUsuario::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {

                    echo "<script>
              
                        Swal.fire({
                          icon: 'success',
                          title: '¡El usuario se ha editado correctamente!',
                          showConfirmButton: true,
                          confirmButtonText: 'Cerrar',
                          closeOnConfirm: false
                          }).then((result)=>{
                  
                          if(result.value){
                  
                            window.location = 'usuarios';
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
              
                        window.location = 'usuarios';
                      }
                  })
                            
                    
                         </script>";
            }
        }
    }

        // EDITAR ADMIN
        static public function ctrEditarPerfil()
        {
    
            if (isset($_POST["usuarioP"])) {
    
                if (preg_match('/^[a-zA-Z0-9]+$/', $_POST["idP"])) {
    
                    $ruta = "";
    
                    if ($_FILES["fotoP"]["tmp_name"] == "") {
    
                        $ruta = $_POST["fotoActual"];
                    } else {
    
                        if (isset($_FILES["fotoP"]["tmp_name"])) {
    
    
                            list($ancho, $alto) = getimagesize($_FILES["fotoP"]["tmp_name"]);
    
                            // $nuevoancho = 400;
                            // $nuevoalto = 400;
    
                            $directorio = "views/images/usuarios/" . $_POST["usuarioP"];
    
                            mkdir($directorio, 0755);
    
    
                            if ($_FILES["fotoP"]["type"] == "image/jpeg") {
    
                                $aleatorio = mt_rand(100, 999);
    
                                $ruta = "views/images/usuarios/" . $_POST["usuarioP"] . "/" . $aleatorio . ".jpg";
    
                                $origen = imagecreatefromjpeg($_FILES["fotoEP"]["tmp_name"]);
    
                                $destino = imagecreatetruecolor($ancho, $alto);
    
                                imagecopyresized($destino, $origen, 0, 0, 0, 0,  $ancho, $alto, $ancho, $alto);
    
                                imagejpeg($destino, $ruta);
                            } else if ($_FILES["fotoP"]["type"] == "image/png") {
    
                                $aleatorio = mt_rand(100, 999);
    
                                $ruta = "views/images/usuarios/" . $_POST["usuarioP"] . "/" . $aleatorio . ".png";
    
                                $origen = imagecreatefrompng($_FILES["fotoP"]["tmp_name"]);
    
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
                              
                                          window.location = 'home';
                                      }
                                  })
                                            
                                    
                                         </script>";
                            }
                        }
                    }
    
    
                    $tabla = "usuarios";
    
                    if ($_POST["passwordP"] == "") {
    
                        $encriptar = $_POST["passwordActual"];
                    } else {
    
                        $encriptar = crypt($_POST["passwordP"], '$2y$05$2ihDv8vVf7QZ9BsaRrKyqs2tkn55Yq');
                    }
    
    
    
                    $datos = array(
                        "id" => $_POST["idP"],
                        "usuario" => $_POST["usuarioP"],
                        "email" => $_POST["emailP"],
                        "password" => $encriptar,
                        "nombre" => $_POST["nombreP"],
                        "rol" => $_POST["rolP"],
                        "foto" => $ruta
                    );
    
                    $respuesta = ModelUsuario::mdlEditarUsuario($tabla, $datos);
    
                    if ($respuesta == "ok") {
    
                        echo "<script>
                  
                            Swal.fire({
                              icon: 'success',
                              title: '¡Tu perfil se ha editado correctamente!',
                              showConfirmButton: true,
                              confirmButtonText: 'Cerrar',
                              closeOnConfirm: false
                              }).then((result)=>{
                      
                              if(result.value){
                      
                                window.location = 'home';
                              }
                          })
                                    
                            
                                 </script>";
                    }
                } else {
    
                    echo "<script>
                  
                        Swal.fire({
                          icon: 'error',
                          title: '¡Tu perfil no debe llevar caracteres especiales!',
                          showConfirmButton: true,
                          confirmButtonText: 'Cerrar',
                          closeOnConfirm: false
                          }).then((result)=>{
                  
                          if(result.value){
                  
                            window.location = 'home';
                          }
                      })
                                
                        
                             </script>";
                }
            }
        }

       static public function ctrMostrarUsuarios(){

        $tabla = 'usuarios';

        $respuesta = ModelUsuario::mdlMostrarUsuarios($tabla);

        return $respuesta;
       }



       // MOSTRAR Usuario
    static public function ctrVerUsuario($item, $valor)
    {

        $tabla = "usuarios";

        $resultado = ModelUsuario::mdlVerUsuario($tabla, $item, $valor);

        return $resultado;
    }

       //Borrar admin
       static public function ctrBorrarUsuario()
       {
   
           if (isset($_GET["idBorrarUsuario"])) {
   
               $tabla = "usuarios";
               $datos = $_GET["idBorrarUsuario"];
   
               $respuesta = ModelUsuario::mdlBorrarUsuario($tabla, $datos);
   
               if ($respuesta == "ok") {
   
                   echo "<script>
               
                     Swal.fire({
                       icon: 'success',
                       title: '¡El usuario ha sido borrado exitosamente!',
                       showConfirmButton: true,
                       confirmButtonText: 'Cerrar',
                       closeOnConfirm: false
                   }).then((result)=>{
               
                       if(result.value){
               
                           window.location = 'usuarios';
                       }
                   })
                             
                     
                          </script>";
               }
           }
       }
   

   
   
}