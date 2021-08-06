<section class="content">
       <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="titleModal">Nueva Categoría</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <form class="form-horizontal" id="formDefault">
                 <input type="hidden" name="id" id="id" value="">
                 <div class="form-group">
                   <label for="nombre" class="control-label">Nombre</label>
                   <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoría" required="">
                 </div>
                 <div class="form-group">
                   <label for="descripcion" class="control-label">Descripción</label>
                   <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la categoría" required="">
                 </div>
                 <div class="form-group">
                   <label for="fecha" class="control-label">Fecha</label>
                   <input type="text" class="form-control" id="fecha" name="fecha" placeholder="<?php echo date("d-m-Y"); ?>" disabled>
                 </div>
                 <div class="form-group">
                   <label class="control-label">Estados</label>
                   <select class="form-control" name="status" id="status" required="">
                     <option value="1">Activo</option>
                     <option value="0">Inactivo</option>
                   </select>
                 </div>
                 <div class="title-footer">
                   <button id="btnActionForm" class="btn btn-primary" type="submit">
                     <i class="fa fa-fw fa-lg fa-check-circle"></i>
                     <span id="btnText">Guardar</span>
                   </button>
                   &nbsp;&nbsp;&nbsp;
                   <a class="btn btn-secondary" href="#" data-dismiss="modal">
                     <i class="fa fa-fw fa-lg fa-times-circle"></i>
                     <span id="btnTextCancelar">Cancelar</span>
                   </a>
                 </div>
               </form>
               <div class="row">
                 <div class="col-sm-12">
                   <div class="form-group" id="campoImagen" name="campoImagen" style="display: none">
                     <label class="control-label">Imagen</label>
                     <form action="subir.php" method="POST" enctype="multipart/form-data">
                       <input type="hidden" name="idCategoriaImagen" id="idCategoriaImagen" value="">
                       <input type="hidden" name="idEmpresaImagen" id="idEmpresaImagen" value="">
                       <input class="form-control" id="txtImagen" name="txtImagen" type="text" placeholder="Imagen de la categoria">
                       <input type="file" id="archivo" name="archivo" required="">
                       <input type="submit" name="subir" value="Subir imagen">
                     </form>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </section>