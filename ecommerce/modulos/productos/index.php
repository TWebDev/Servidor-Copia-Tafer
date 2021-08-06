<?php 
include_once("../../tools/header.php");  

include_once("../../tools/navbar.php"); 
include_once("../../tools/sidebar.php"); 
$page_title = "Productos";
?>

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Carrito de compras - <?php echo $page_title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><i class="fa fa-home fa-lg"> </i> <a href="../../"> Inicio</a></li>
              <li class="breadcrumb-item active"><?php echo $page_title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <?php include_once('productoModal.php'); ?>

     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h1><i class="fas fa-user-tag"></i>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default" onclick="Incluir()">
                    <i class="fas fa-plus-circle"></i>
                    Nuevo
                  </button>  
                </h1>
              </div>
              <div class="card-body">
                 <?php include_once('productoTabla.php'); ?>            
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

 <?php include_once("../../tools/footer.php"); ?>

<script src="productoFunciones.js"></script>

<script>
  $(function () {
    $('#example').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });   
  });
</script>
<script> 
var limit = 5;
$(document).ready(function(){
    $('#archivo').change(function() {
        var files = $(this)[0].files;
        if (files.length>limit) {
            alert("Puedes seleccionar máximo " + limit + " imagenes");
            $ ('#archivo').val('');
            return false;
        } else {
            return true;
        }
    });
});
</script>