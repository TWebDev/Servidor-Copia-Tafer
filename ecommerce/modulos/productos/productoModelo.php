<?php 
require_once('../../tools/mypathdb.php'); 
require_once('../../tools/sed.php'); 
require_once('../../tools/eliminarComillas.php'); 

$option = $_GET['option'];

if ($option=="incluir") {
	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$descripcion = $_POST['descripcion'];
  $categoriaid = $_POST['categoriaid'];
  $codigo = $_POST['codigo'];	
	$stock = $_POST['stock'];
	$status = $_POST['status'];

  $nombre = eliminarComillas($nombre);
	$descripcion = eliminarComillas($descripcion);
	$codigo = eliminarComillas($codigo);
	$stock = eliminarComillas($stock);

	if (empty($nombre) OR empty($descripcion) OR empty($codigo) OR empty($stock) OR empty($categoriaid)) {
		$data = array("error" => '2');
		die(json_encode($data));
	}	

	$sql = "INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `categoriaid`, `codigo`, `stock`, `fecha`, `status`) VALUES (NULL, '$nombre', $precio, '$descripcion', '$categoriaid',  '$codigo', '$stock', NOW(), '$status')";	 

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		$data = array("exito" => '1');
		die(json_encode($data));
	} else {
		$data = array("error" => '1');
		die(json_encode($data));
	}
}

if ($option=="consultar") {
	$clave = $_GET['id'];

	$claveDesencriptada = SED::decryption($clave);
  	$clave=$claveDesencriptada;

  	$sql = "SELECT * FROM productos WHERE id = $clave";
  	var_dump($sql);
  		die();
  	$resultado = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($resultado))
    {
      $id = $data['id'];
      $nombre = $data['nombre'];
      $precio = $data['precio'];
      $descripcion = $data['descripcion'];
      $imagen = $data['imagen'];
      $categoriaid = $data['categoriaid'];
      $codigo = $data['codigo'];
      $stock = $data['stock'];
      $fecha = $data['fecha'];
      $status = $data['status'];
  	}

  	if (!isset($status)) 
  	{
  		$data = array("error" => '2');
		die(json_encode($data));
  	}

  	if ($status==2) 
  	{
  		$data = array("error" => '1');
		die(json_encode($data));
  	}

  	if ($status!=2) 
  	{
	  $data = array("exito" => '1',"id"=>$id,
                "nombre" => $nombre,
                "precio" => $precio,
                "descripcion" => $descripcion,
                "imagen" => $imagen,
                "categoriaid" => $categoriaid,                    
                "codigo" => $codigo,
                "stock" => $stock,
                "fecha" => $fecha,
                "status" => $status);
      die(json_encode($data));
  	}
}

if ($option=="modificarConsultar") {
	$clave = $_GET['id'];

	$claveDesencriptada = SED::decryption($clave);
  	$clave=$claveDesencriptada;

  	$sql = "SELECT * FROM productos WHERE id = $clave";
  	
  	$resultado = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_array($resultado))
    {
      $id = $data['id'];
      $nombre = $data['nombre'];
      $precio = $data['precio'];
      $descripcion = $data['descripcion'];
      $imagen = $data['imagen'];
      $categoriaid = $data['categoriaid'];
      $codigo = $data['codigo'];
      $stock = $data['stock'];
      $fecha = $data['fecha'];
      $status = $data['status'];

      $claveEncriptada = SED::encryption($id);
      $id=$claveEncriptada;
  	}

    mysqli_close($conn);  	
  	$data = array("exito" => '1',"id"=>$id,
                  "nombre" => $nombre,
                  "precio" => $precio,
                  "descripcion" => $descripcion,	                    
                  "imagen" => $imagen,	
                  "categoriaid" => $categoriaid,                                 
                  "codigo" => $codigo,
                  "stock" => $stock,
                  "fecha" => $fecha,
                  "status" => $status);
  	die(json_encode($data));
}

if ($option=="modificar") {
	
	$clave = $_POST['id'];
	$claveDesencriptada = SED::decryption($clave);
  	$clave=$claveDesencriptada;

	$nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$descripcion = $_POST['descripcion'];
	$categoriaid = $_POST['categoriaid'];
	$codigo = $_POST['codigo'];
	$stock = $_POST['stock'];
	$status = $_POST['status'];

	if ($stock<0) {
		$data = array("error" => '4');
		die(json_encode($data));
	}

  $nombre = eliminarComillas($nombre);
	$descripcion = eliminarComillas($descripcion);
	$codigo = eliminarComillas($codigo);
	$stock = eliminarComillas($stock);

	if (empty($nombre) OR empty($descripcion) OR empty($codigo) OR empty($stock)  OR empty($categoriaid)) {
		$data = array("error" => '2');
		die(json_encode($data));
	}
	
	$sql = "UPDATE productos SET nombre = '$nombre', precio = $precio, descripcion = '$descripcion', 
	         codigo = '$codigo', stock = $stock, status = $status, categoriaid= $categoriaid WHERE id = $clave";
	
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	$data = array("exito" => '1');
	die(json_encode($data));
	
	if (!mysqli_query($conn, $sql)) {          
        if(mysqli_errno($conn)==1452){
          mysqli_close($conn);
          $data = array("error" => '2');
          die(json_encode($data));  
        }
        if(mysqli_errno($conn)==1062){
          mysqli_close($conn);
          $data = array("error" => '3');
          die(json_encode($data));  
        }
    }  	
}

if ($option=="eliminar") {
	$clave = $_GET['id'];

	$claveDesencriptada = SED::decryption($clave);
  	$clave=$claveDesencriptada;

  	$sql = "UPDATE productos SET status = '2' WHERE id = $clave";  		
  
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		$data = array("exito" => '1');
		die(json_encode($data));
  	} else {
  		mysqli_close($conn);
		$data = array("error" => '1');
		die(json_encode($data));
	}
}
mysqli_close($conn);