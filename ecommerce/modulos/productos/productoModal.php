<?php 
require_once('../../tools/sed.php'); 
?>
     <section class="content">
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="titleModal">Nuevo producto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" id="formDefault">
                <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                  <label for="nombre" class="control-label">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del producto" required="">
                </div>

                <div class="row">
                  <div class="col-sm-12">                      
                    <div class="form-group">                   
                      <label class="control-label">Precio</label>
                      <input class="form-control" id="precio" name="precio" type="number" step="any" placeholder="Precio" required="">
                    </div> 
                  </div>                    
                </div>

                <div class="form-group">
                  <label for="descripcion" class="control-label">Descripción</label>
                  <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del producto" required="">
                </div>

                <div class="row">
                  <div class="col-sm-12">                      
                    <div class="form-group">                   
                      <label class="control-label">Categoría</label>
                      <select class="form-control" id="categoriaid" name="categoriaid" required="">
                        <?php 
                        require_once('../../tools/mypathdb.php'); 
                        $sql = "SELECT * FROM categorias WHERE status != 2";
                        $resultado = mysqli_query($conn, $sql);
                        while($data = mysqli_fetch_array($resultado))
                        {
                          $id = $data['id'];
                          $nombre = $data['nombre'];       
                        ?>
                          <option value="<?php echo $id ?>"><?php echo $nombre ?></option>
                        <?php 
                        } ?>
                      </select>
                    </div> 
                  </div>                    
                </div>

                 <div class="row">
                  <div class="col-sm-6">                      
                    <div class="form-group">                   
                      <label class="control-label">Código</label>
                      <input class="form-control" id="codigo" name="codigo" type="text" placeholder="Código del producto" required="">
                    </div> 
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">                   
                      <label class="control-label">Stock</label>
                      <input class="form-control" id="stock" name="stock" type="number" placeholder="Stock" required="">
                    </div>  
                  </div>
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

         <?php          
          $claveEncriptada = SED::encryption($id);
          $id=$claveEncriptada;
          ?>
                <div class="row">
                    <div class="col-sm-12">                      
                      <div class="form-group" id="campoImagen" name="campoImagen" style="display: none"> 
                        <label class="control-label">Imagen</label>                        
                        <form class="form-horizontal" id="formImagen" enctype="multipart/form-data">
                          <input type="hidden" name="idProductoImagen" id="idProductoImagen" value=""> 
                          <input type="hidden" name="ProductoCodigo" id="ProductoCodigo" value="">
                          <input type="file" name="archivo[]" id="archivo" multiple required="" >      
                          <input type="submit" name="subir" id="subir" value="Subir imagen"/>
                        </form>
                      </div>   
                    </div>                    
                </div>  
            </div>           
          </div>
        </div>
      </div>
    </section>