
$(".imagen").change(function () {
    var imagen = this.files[0];
  
    //validamos formato de imagen
    if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
      $(".imagen").val("");
  
      Swal.fire({
        title: "¡Error al subir imagen!",
        text: "¡La imagen debe estar en formato JPG o PNG!",
        icon: "error",
        confirmButtonText: "Cerrar",
      });
    } else {
      var datosImagen = new FileReader();
      datosImagen.readAsDataURL(imagen);
  
      $(datosImagen).on("load", function (event) {
        var rutaImagen = event.target.result;
  
        $(".previsualizar").attr("src", rutaImagen);
      });
    }
  });

  function editarUsuario(id) {
    var idEditarUsuario = id;
  
    var datos = new FormData();
  
    datos.append("idEditarUsuario", idEditarUsuario);
  
    $.ajax({
      url: "views/ajax/ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#nombre").val(respuesta["nombre"]);
        $("#usuario").val(respuesta["usuario"]);
        $("#email").val(respuesta["email"]);
        $("#passwordE").val(respuesta["password"]);
        $("#rolE option:selected").val(respuesta["rol"]);
        if (respuesta["rol"] === "administrador") {
          $("#rolE option:selected").html("Administrador");
        } else {
          $("#rolE option:selected").html("Editor");
        }
        $("#fotoE").val(respuesta["foto"]);
        $("#visualizar img").attr("src", respuesta["foto"]);
        $("#id").val(respuesta["id"]);
      },
    });
  }

  function editarPerfil(id) {
    var idEditarUsuario = id;
  
    var datos = new FormData();
  
    datos.append("idEditarUsuario", idEditarUsuario);
  
    $.ajax({
      url: "views/ajax/ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#nombreP").val(respuesta["nombre"]);
        $("#usuarioP").val(respuesta["usuario"]);
        $("#emailP").val(respuesta["email"]);
        $("#passwordP").val(respuesta["password"]);
        $("#rolP option:selected").val(respuesta["rol"]);
        if (respuesta["rol"] === "administrador") {
          $("#rolP option:selected").html("Administrador");
        } else {
          $("#rolP option:selected").html("Editor");
        }
        $("#fotoP").val(respuesta["foto"]);
        $("#visualizar img").attr("src", respuesta["foto"]);
        $("#idP").val(respuesta["id"]);
      },
    });
  }

  function borrarUsuario(id) {
    var idBorrarUsuario = id;
  
    Swal.fire({
      title: "¿Estás seguro de borrar el usuario?",
      text: "¡Si no lo está puede cancelar la acción!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Si, borrar el usuario!",
    }).then((result) => {
      if (result.value) {
        window.location =
          "index.php?pagina=usuarios&idBorrarUsuario=" + idBorrarUsuario;
      }
    });
  }

  function borrarLocalidad(id) {
    var idBorrarLocalidad = id;
  
    Swal.fire({
      title: "¿Estás seguro de borrar la localidad?",
      text: "¡Si no lo está puede cancelar la acción!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Si, borrar la localidad!",
    }).then((result) => {
      if (result.value) {
        window.location =
          "index.php?pagina=crear-localidad-rubro&idBorrarLocalidad=" + idBorrarLocalidad;
      }
    });
  }

  function borrarRubro(id) {
    var idBorrarRubro = id;
  
    Swal.fire({
      title: "¿Estás seguro de borrar el rubro?",
      text: "¡Si no lo está puede cancelar la acción!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Si, borrar el rubro!",
    }).then((result) => {
      if (result.value) {
        window.location =
          "index.php?pagina=crear-localidad-rubro&idBorrarRubro=" + idBorrarRubro;
      }
    });
  }

  function borrarComercio(id) {
    var idBorrarComercio = id;
  
    Swal.fire({
      title: "¿Estás seguro de borrar el comercio?",
      text: "¡Si no lo está puede cancelar la acción!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Si, borrar el comercio!",
    }).then((result) => {
      if (result.value) {
        window.location =
          "index.php?pagina=comercios&idBorrarComercio=" + idBorrarComercio;
      }
    });
  }

  function editarComercio(id) {
    var idEditarComercio = id;
  
    var datos = new FormData();
  
    datos.append("idEditarComercio", idEditarComercio);
  
    $.ajax({
      url: "views/ajax/ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        $("#nombreC").val(respuesta["nombre"]);
        $("#rubroC option:selected").val(respuesta["id_rubro"]);  
        $("#localidadC option:selected").val(respuesta["id_localidad"]);  
        $("#recomendadoC option:selected").val(respuesta["recomendado"]); 
     
        $("#direccionC").val(respuesta["direccion"]);
        $("#sitioC").val(respuesta["sitio"]);
        $("#telefonoC").val(respuesta["telefono"]);
        $("#fotoC").val(respuesta["foto"]);

        $("#visualizar img").attr("src", respuesta["foto"]);
        $("#idC").val(respuesta["id_c"]);
      },
    });
  }

  function borrarContacto(id) {
    var idBorrarContacto = id;
  
    Swal.fire({
      title: "¿Estás seguro de borrar el contacto?",
      text: "¡Si no lo está puede cancelar la acción!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Si, borrar el contacto!",
    }).then((result) => {
      if (result.value) {
        window.location =
          "index.php?pagina=contactos&idBorrarContacto=" + idBorrarContacto;
      }
    });
  }

  function borrarSuscripcion(id) {
    var idBorrarSuscripcion = id;
  
    Swal.fire({
      title: "¿Estás seguro de borrar la suscripción?",
      text: "¡Si no lo está puede cancelar la acción!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      cancelButtonText: "Cancelar",
      confirmButtonText: "¡Si, borrar la suscripción!",
    }).then((result) => {
      if (result.value) {
        window.location =
          "index.php?pagina=suscripciones&idBorrarSuscripcion=" + idBorrarSuscripcion;
      }
    });
  }
  