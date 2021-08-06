function Incluir() 
{
  document.querySelector('#titleModal').innerHTML = "Nuevo producto";    
  document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
  document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
  document.querySelector('#btnText').innerHTML = "Guardar";
  document.querySelector('#btnTextCancelar').innerHTML = "Cerrar";    
  document.querySelector("#id").value = "";
  document.querySelector("#nombre").value = "";
  document.querySelector("#precio").value = "";
  document.querySelector("#descripcion").value = "";
  document.querySelector("#codigo").value = "";
  document.querySelector("#stock").value = ""; 
  document.querySelector("#fecha").value = "";   
  $('#campoImagen').hide();  

  $("body").on('submit', '#formDefault', function(event) { 
    event.preventDefault()
    if ($('#formDefault').valid()) {  
      $.ajax({
        type:"POST",
        url: "productoModelo.php?option=incluir",
        dataType: "json",
        data: $(this).serialize(),
        success: function(respuesta) {          
          if (respuesta.error == 1) {            
            swal("Houston, tenemos un problema", "Este producto ya existe!", "error");          
          }
          if (respuesta.error == 3) {            
            swal("Houston, tenemos un problema", "Debe introducir correctamente los datos! evite usar caracteres especiales", "error");
          }            
          if (respuesta.exito == 1) {        
            document.querySelector('#btnTextCancelar').innerHTML = "Cerrar";           
            window.location.href='index.php';         
          }
        }
      })
    }
  })    
}


function Modificar(id)
{
    $.ajax({
    type:"POST",
    url: "productoModelo.php?option=modificarConsultar&id="+id,
    dataType: "json",
    data: $(this).serialize(),
    success: function(respuesta) {          
      if (respuesta.error == 1) {            
        swal("Houston, tenemos un problema", "Este producto ya fue eliminado!", "error");          
      }
      if (respuesta.error == 2) {            
        swal("Houston, tenemos un problema", "Esteproducto no fue encontrado!", "error");
      }  
      if (respuesta.error == 3) {            
        swal("Houston, tenemos un problema", "Debe completar todos los datos!", "error");
      }            
      if (respuesta.exito == 1) {        
        document.querySelector('#titleModal').innerHTML = "Actualizar producto";    
        document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
        document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
        document.querySelector('#btnText').innerHTML = "Actualizar";
        document.querySelector('#btnTextCancelar').innerHTML = "Cancelar";    
        document.querySelector("#id").value = respuesta.id;
        document.querySelector("#nombre").value = respuesta.nombre;
        document.querySelector("#precio").value = respuesta.precio;
        document.querySelector("#descripcion").value = respuesta.descripcion;
        document.querySelector("#categoriaid").value = respuesta.categoriaid;
        document.querySelector("#codigo").value = respuesta.codigo;
        document.querySelector("#stock").value = respuesta.stock;
        document.querySelector("#fecha").value = respuesta.fecha;   
        document.querySelector("#status").value = respuesta.status; 
        document.querySelector("#idProductoImagen").value = respuesta.id;
        document.querySelector("#ProductoCodigo").value = respuesta.codigo;        
        $('#campoImagen').show();  
        $('#modal-default').modal('show');  
      }
    }
  })

  $("body").on('submit', '#formDefault', function(event) { 
    event.preventDefault()
    if ($('#formDefault').valid()) {  
      $.ajax({
        type:"POST",
        url: "productoModelo.php?option=modificar",
        dataType: "json",
        data: $(this).serialize(),
        success: function(respuesta) {          
          if (respuesta.error == 1) {            
            swal("Houston, tenemos un problema", "Este producto ya existe!", "error");          
          }
          if (respuesta.error == 3) {            
            swal("Houston, tenemos un problema", "Debe introducir correctamente los datos! evite usar caracteres especiales", "error");
          }            
          if (respuesta.exito == 1) {        
            document.querySelector('#btnTextCancelar').innerHTML = "Cerrar";           
            window.location.href='index.php';         
          }
        }
      })
    }
  })   

  $("body").on('submit', '#formImagen', function(event) 
  {
    event.preventDefault()
    if ($('#formImagen').valid()) {    
         
      $.ajax({
        type:"POST",
        url: "subir.php?option=modificar",          
        dataType: "json",
        data: new FormData(this),
        contentType: false,
        processData: false,           
        success: function(respuesta) {            
          if (respuesta.error == 1) {               
            swal("Houston, tenemos un problema", "Solo esta permitido publicar hasta 5 imagenes", "error");      
          } 
          if (respuesta.error == 2) {               
            swal("Houston, tenemos un problema", "Ocurrió algún error al subir el archivo. No pudo guardarse.", "error");      
          }                   
          if (respuesta.exito == 1) {
            window.location.href='index.php';          
          }
        }
      })
    }
  }) 
}


function Eliminar(id)
{
  swal({
      title: "¿Está seguro de eliminar este registro?",
      text: "Una vez eliminado, ¡no podrá recuperar este registro!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
  .then((willDelete) => {
      if (willDelete) { 
        $.ajax({
            type: "POST",            
            url: "productoModelo.php?option=eliminar&id="+ id,
            dataType: "json",
            data: $(this).serialize(),
            success: function(respuesta) {              
              if (respuesta.error ==1) {                
                swal("Houston, tenemos un problema", "Esta producto no fue encontrada!", "error");  
              }
              if (respuesta.exito == 1) {                       
                window.location.href='index.php';          
              }
            }
          });        
      } 
    });
}