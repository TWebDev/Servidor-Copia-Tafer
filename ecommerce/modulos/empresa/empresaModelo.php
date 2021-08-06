<?php
require_once('../../tools/mypathdb.php');
require_once('../../tools/sed.php');
require_once('../../tools/eliminarComillas.php');
session_start();

$option = $_GET['option'];
if ($option == "incluir") {
	$nombre = $_POST['nombre'];
	$telefono = $_POST['telefono'];
	$ciudad = $_POST['ciudad'];
	$pais = $_POST['pais'];


	$validanombre = preg_match('/^[a-zA-ZñÑáéíóúü0-9 ]+$/', $_POST['nombre']);
	if ($validanombre == 0) {
		$data = array("error" => '3');
		die(json_encode($data));
	}
	$telefono = eliminarComillas($telefono);
	$ciudad = eliminarComillas($ciudad);
	$pais = eliminarComillas($pais);


	if (empty($nombre) or empty($telefono) or empty($ciudad) or empty($pais)) {
		$data = array("error" => '2');
		die(json_encode($data));
	}

	$nombre = ucwords(strtolower($nombre));
	$ciudad = ucwords(strtolower($ciudad));
	$pais = ucwords(strtolower($pais));


	$sql = "INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `fecha`, `status`) VALUES (NULL, '$nombre', '$descripcion', NOW(), $status)";
	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);
		$data = array("exito" => '1');
		die(json_encode($data));
	} else {
		$data = array("error" => '1');
		die(json_encode($data));
	}
}

if ($option == "consultar") {
	$clave = $_GET['id'];
	$claveDesencriptada = SED::decryption($clave);
	$clave = $claveDesencriptada;

	$sql = "SELECT * FROM categorias WHERE id = $clave";
	$resultado = mysqli_query($conn, $sql);
	while ($data = mysqli_fetch_array($resultado)) {
		$id = $data['id'];
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$fecha = $data['fecha'];
		$status = $data['status'];
		$idEmpresa = $data['idEmpresa'];
	}

	if (!isset($status)) {
		$data = array("error" => '2');
		die(json_encode($data));
	}

	if ($status == 2) {
		$data = array("error" => '1');
		die(json_encode($data));
	}

	if ($status != 2) {
		$data = array(
			"exito" => '1',
			"id" => $id,
			"nombre" => $nombre,
			"descripcion" => $descripcion,
			"fecha" => $fecha,
			"status" => $status,
			"idEmpresa" => $idEmpresa
		);

		die(json_encode($data));
	}
}

if ($option == "modificarConsultar") {
	$clave = $_GET['id'];

	$claveDesencriptada = SED::decryption($clave);
	$clave = $claveDesencriptada;

	$sql = "SELECT * FROM categorias WHERE id = $clave";
	$resultado = mysqli_query($conn, $sql);
	while ($data = mysqli_fetch_array($resultado)) {
		$id = $data['id'];
		$nombre = $data['nombre'];
		$descripcion = $data['descripcion'];
		$fecha = $data['fecha'];
		$status = $data['status'];
		$claveEncriptada = SED::encryption($id);
		$id = $claveEncriptada;
	}

	mysqli_close($conn);
	$data = array(
		"exito" => '1',
		"id" => $id,
		"nombre" => $nombre,
		"descripcion" => $descripcion,
		"fecha" => $fecha,
		"status" => $status
	);

	die(json_encode($data));
}

if ($option == "modificar") {

	$clave = $_POST['id'];
	$claveDesencriptada = SED::decryption($clave);
	$clave = $claveDesencriptada;

	$nombre = $_POST['nombre'];
	$descripcion = $_POST['descripcion'];
	$status = $_POST['status'];

	$validanombre = preg_match('/^[a-zA-ZñÑáéíóúü ]+$/', $_POST['nombre']);

	if ($validanombre == 0) {
		$data = array("error" => '3');
		die(json_encode($data));
	}

	$descripcion = eliminarComillas($descripcion);

	if (empty($nombre) or empty($descripcion)) {
		$data = array("error" => '3');
		die(json_encode($data));
	}

	$sql = "UPDATE categorias SET nombre = '$nombre', descripcion = '$descripcion', status = $status WHERE id = $clave";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
	$data = array("exito" => '1');
	die(json_encode($data));
}

function borrarImagenCategoria($rutaDirectorio)
{
	if (unlink($rutaDirectorio)) {
		// file was successfully deleted
	} else {
		// there was a problem deleting the file
	}
}

if ($option == "eliminar") {
	$clave = $_GET['id'];
	$imagen = "";

	$claveDesencriptada = SED::decryption($clave);
	$clave = $claveDesencriptada;

	$sql = "SELECT * FROM categorias WHERE id = $clave";
	$resultado = mysqli_query($conn, $sql);
	while ($data = mysqli_fetch_array($resultado)) {
		$imagen = $data['imagen'];
	}

	$sql = "UPDATE categorias SET status = '2' WHERE id = $clave";

	if (mysqli_query($conn, $sql)) {
		mysqli_close($conn);

		//Borrar el directorio y el contenido
		$directorio = !empty(($_SESSION['directorio'])) ? $_SESSION['directorio'] : '';
		if ($imagen != '') {
			$rutaDirectorio = '../../img/' . $directorio . '/' . 'categorias/' . $imagen;
			borrarImagenCategoria($rutaDirectorio);
		}

		$data = array("exito" => '1');
		die(json_encode($data));
	} else {
		$data = array("error" => '1');
		die(json_encode($data));
	}
}
mysqli_close($conn);
