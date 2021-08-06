<?php
require_once('../../tools/sed.php');
require_once('../../tools/mypathdb.php');
//Si se quiere subir una imagen
if(isset($_POST['subir'])){
    //Recogemos el archivo enviado por el formulario
    $archivo = $_FILES['archivo']['name'];

     //Si el arcivo tiene algo y es diferente de vacio
     if (isset($archivo) && $archivo != "") {
          //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
        //Se comprueba si el archivo a cargar es correcto conservando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 20000000))) {
            echo '<div><b>Error. La  extensión o el tamaño de los archivos no es correcta.</br>
            - Se permirten archivos .gif, .jpg, .png, y de 200 kb como máximo.</b></div>'; 
        }
        else {
                //Si la imagen es correcta en el tamaño y tipo
                //Se intenta subir al servidor.
                if (move_uploaded_file($temp, '../../img/categorias/'.$archivo)) {
                    //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                chmod('../../img/categorias/'.$archivo, 0777);
                //Mostramos el mensaje de que se ha subido con éxito
                echo '<div><b>Se ha subido correctamente la imagen.</b></div>';

                $clave = $_POST['idCategoriaImagen'];

                //Desencriptar la clave
                $claveDesencriptada = SED::decryption($clave);
                $clave = $claveDesencriptada;

                if (!empty($clave)) 
                {
                    $sql = "UPDATE categorias SET imagen = '$archivo' WHERE id = $clave";

                    if (mysqli_query($conn, $sql)) {
                        //Los datos se han modificado correctamente
                        mysqli_close($conn);
                        header("Location: index.php");
                    }else {
                        echo'<div><b> Ocurrió algún error al actualizar el registro. No pudo guardarse.</b></div>';
                    }
                }
                //Mostramos la imagen subida
                echo '<p><img src="../../img/categorias/'.$archivo.'"></p>';
            }else{
            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            echo '<div><b>Ocurrio algún error al subir el archivo. No pudo guardarse.</b></div>';
        }
     }
    
    }
}