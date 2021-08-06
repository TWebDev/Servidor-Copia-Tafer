<?php 
require_once('../../tools/mypathdb.php'); 
require_once('../../tools/sed.php'); 
?>

 <table id="example" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Imagen</th>
      <th>Código</th>
      <th>Stock</th>
      <th>Status</th>
      <th>Acciones</th>
    </tr>
    </thead>
    <tbody> 
    <?php 
    $sql = "SELECT * FROM productos WHERE status !=2";
    $resultado = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($resultado))
    {
      $id = $data['id'];
      $nombre = $data['nombre'];
      $precio = $data['precio'];
      $imagen = $data['imagen'];
      $categoriaid = $data['categoriaid'];
      $codigo = $data['codigo'];
      $stock = $data['stock'];
      $status = $data['status'];

      $imagen = "../../img/productos/" .$imagen;
    ?>               
    <tr>
      <td><?php echo substr($nombre, 0, 35) ?></td>
      <td><?php echo $precio ?></td>
      <td><img src="<?php echo $imagen ?>" width="48" alt="Carrito de compras"></td>
      <td><?php echo $codigo ?></td>
      <td><?php echo $stock ?></td>
      <td>
        <?php if ($status == 1) { ?>
          <span class="badge badge-success">Activo</span>
        <?php } else { ?>
          <span class="badge badge-danger">Inactivo</span>
        <?php } ?>
      </td>
      <td>
        <div class="text-center">
          <?php 
          $claveEncriptada = SED::encryption($id);
          $id=$claveEncriptada;
          ?>
          <button class="btn btn-primary btn-sm" 
            type="button"
            data-toogle="modal"
            data-target="#modal-default"
            title="Modificar"
            onclick="Modificar('<?php echo $id ?>')">
            <i class="fas fa-pencil-alt"></i>
          </button>
          <button class="btn btn-danger btn-sm" 
            type="button"
            title="Eliminar"
            onclick="Eliminar('<?php echo $id ?>')">
            <i class="fas fa-trash-alt"></i>
          </button>
        </div>
      </td>
    </tr>    
    <?php 
    }
    mysqli_close($conn);
    ?>
    </tbody>
    <tfoot>
     <tr>
      <th>Nombre</th>
      <th>Precio</th>
      <th>Imagen</th>
      <th>Código</th>
      <th>Stock</th>
      <th>Status</th>
      <th>Acciones</th>
    </tr>
    </tfoot>
</table>