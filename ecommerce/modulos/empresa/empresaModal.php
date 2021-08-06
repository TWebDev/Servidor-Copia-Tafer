<section class="content">
       <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="titleModal">Nueva Empresa</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>
             <div class="modal-body">
               <form class="form-horizontal" id="formDefault">
                 <input type="hidden" name="id" id="id" value="">
                 <div class="form-group">
                   <label for="nombre" class="control-label">Nombre</label>
                   <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la Empresa" required="">
                 </div>
                 <div class="form-group">
                   <label for="telefono" class="control-label">Teléfono</label>
                   <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono: (xxx) xxx-xxx" required="">
                 </div>
                 <div class="form-group">
                   <label for="ciudad" class="control-label">Ciudad</label>
                   <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" required="">
                 </div>
                 <div class="form-group">
                   <label for="pais" class="control-label">País</label>
                   <input type="text" class="form-control" id="pais" name="pais" placeholder="Ciudad" required="">
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
                       <input class="form-control" id="txtImagen" name="txtImagen" type="text" placeholder="Logotipo de la empresa">
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