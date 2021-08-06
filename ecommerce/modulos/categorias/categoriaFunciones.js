function Incluir() {
    document.querySelector("#titleModal").innerHTML = "Nueva Categoría";
    document
      .querySelector(".modal-header")
      .classList.replace("headerUpdate", "headerRegister");
    document
      .querySelector("#btnActionForm")
      .classList.replace("btn-info", "btn-primary");
    document.querySelector("#btnText").innerHTML = "Guardar";
    document.querySelector("#btnTextCancelar").innerHTML = "Cerrar";
    document.querySelector("#id").value = "";
    document.querySelector("#idCategoriaImagen").value = "";
    document.querySelector("#nombre").value = "";
    document.querySelector("#descripcion").value = "";
    document.querySelector("#fecha").value = "";
    $("#campoImagen").hide();
  
    $("body").on("submit", "#formDefault", function (event) {
      event.preventDefault();
      if ($("#formDefault").valid()) {
        $.ajax({
          type: "POST",
          url: "categoriaModelo.php?option=incluir",
          dataType: "json",
          data: $(this).serialize(),
          success: function (respuesta) {
            if (respuesta.error == 1) {
              swal(
                "Houston, tenemos un problema",
                "Esta categoría ya existe!",
                "error"
              );
            }
            if (respuesta.error == 3) {
              swal(
                "Houston, tenemos un problema",
                "Debe introducir correctamente los datos! evite usar caracteres especiales",
                "error"
              );
            }
            if (respuesta.exito == 1) {
              document.querySelector("#btnTextCancelar").innerHTML = "Cerrar";
              window.location.href = "index.php";
            }
          },
        });
      }
    });
  }
  
  function Modificar(id) {
    $.ajax({
      type: "POST",
      url: "categoriaModelo.php?option=modificarConsultar&id=" + id,
      dataType: "json",
      data: $(this).serialize(),
      success: function (respuesta) {
        if (respuesta.error == 1) {
          swal(
            "Houston, tenemos un problema",
            "Esta categoría ya fue eliminada!",
            "error"
          );
        }
        if (respuesta.error == 2) {
          swal(
            "Houston, tenemos un problema",
            "Esta categoría no fue encontrada!",
            "error"
          );
        }
        if (respuesta.error == 3) {
          swal(
            "Houston, tenemos un problema",
            "Debe completar todos los datos!",
            "error"
          );
        }
        if (respuesta.exito == 1) {
          document.querySelector("#titleModal").innerHTML =
            "Actualizar Categoría";
          document
            .querySelector(".modal-header")
            .classList.replace("headerRegister", "headerUpdate");
          document
            .querySelector("#btnActionForm")
            .classList.replace("btn-primary", "btn-info");
          document.querySelector("#btnText").innerHTML = "Actualizar";
          document.querySelector("#btnTextCancelar").innerHTML = "Cancelar";
          document.querySelector("#id").value = respuesta.id;
          document.querySelector("#idCategoriaImagen").value = respuesta.id;
          document.querySelector("#nombre").value = respuesta.nombre;
          document.querySelector("#descripcion").value = respuesta.descripcion;
          document.querySelector("#fecha").value = respuesta.fecha;
          document.querySelector("#status").value = respuesta.status;
          document.querySelector("#idEmpresaImagen").value = respuesta.idEmpresa;
          $("#campoImagen").show();
          $("#modal-default").modal("show");
        }
      },
    });
  
    $("body").on("submit", "#formDefault", function (event) {
      event.preventDefault();
      if ($("#formDefault").valid()) {
        $.ajax({
          type: "POST",
          url: "categoriaModelo.php?option=modificar",
          dataType: "json",
          data: $(this).serialize(),
          success: function (respuesta) {
            if (respuesta.error == 1) {
              swal(
                "Houston, tenemos un problema",
                "Esta categoría ya existe!",
                "error"
              );
            }
            if (respuesta.error == 3) {
              swal(
                "Houston, tenemos un problema",
                "Debe introducir correctamente los datos! evite usar caracteres especiales",
                "error"
              );
            }
            if (respuesta.exito == 1) {
              document.querySelector("#btnTextCancelar").innerHTML = "Cerrar";
              window.location.href = "index.php";
            }
          },
        });
      }
    });
  }
  
  function Eliminar(id) {
    swal({
      title: "¿Está seguro de eliminar este registro?",
      text: "Una vez eliminado, ¡no podrá recuperar este registro!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {
        $.ajax({
          type: "POST",
          url: "categoriaModelo.php?option=eliminar&id=" + id,
          dataType: "json",
          data: $(this).serialize(),
          success: function (respuesta) {
            if (respuesta.error == 1) {
              swal(
                "Houston, tenemos un problema",
                "Esta categoría no fue encontrada!",
                "error"
              );
            }
            if (respuesta.exito == 1) {
              window.location.href = "index.php";
            }
          },
        });
      }
    });
  }
  