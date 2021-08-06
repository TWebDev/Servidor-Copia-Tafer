<?php 
require_once('../../tools/sed.php');
require_once('../../tools/mypathdb.php'); 

if (isset($_POST['idProductoImagen'])  AND isset($_POST['ProductoCodigo'])) { 
    $codigo = $_POST['ProductoCodigo'];    
    $cantidadImagenes = count($_FILES["archivo"]["name"]);

    if($cantidadImagenes>5){         
      $data = array("error" => '1');
      die(json_encode($data));     
    }
  
    for($x=0; $x<count($_FILES["archivo"]["name"]); $x++)
    {      
       $archivo = $_FILES['archivo']['name'][$x];
       if (isset($archivo) && $archivo != "") {
        
          $tipo = $_FILES['archivo']['type'][$x];;
          $tamano = $_FILES['archivo']['size'][$x];;
          $temp = $_FILES['archivo']['tmp_name'][$x];;
          
           if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
              echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
              - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
           }
           else {                 
              switch ($tipo) 
                  {
                  case "image/jpeg":
                      $tipo = "jpg";
                      break;
                  case "image/png":
                      $tipo = "png";
                      break;
                  case "image/gif":
                      $tipo = "gif";
                      break;
                  }
                  $archivo = $codigo."_".$x.".".$tipo;               
                

            if (move_uploaded_file($temp, '../../img/productos/'.$archivo)) { 
                chmod('../../img/productos/'.$archivo, 0777);
                
                $clave = $_POST['idProductoImagen'];
                $claveDesencriptada = SED::decryption($clave);
                $clave=$claveDesencriptada;
                if(!empty($clave))
                    {                            
                      switch ($x) 
                          {
                          case 0:
                              $sql = "UPDATE productos SET imagen = '$archivo' WHERE id = $clave";                              
                              break;
                          case 1:
                              $sql = "UPDATE productos SET imagen2 = '$archivo' WHERE id = $clave";                              
                              break;
                          case 2:
                              $sql = "UPDATE productos SET imagen3 = '$archivo' WHERE id = $clave";                              
                              break;
                          case 3:
                              $sql = "UPDATE productos SET imagen4 = '$archivo' WHERE id = $clave";                              
                              break;
                          case 4:
                              $sql = "UPDATE productos SET imagen5 = '$archivo' WHERE id = $clave";                              
                              break;
                          }

                        if (mysqli_query($conn, $sql)) {
                        } else {
                          echo '<div><b>Ocurrió algún error al actualizar el registro. No pudo guardarse.</b></div>';
                        }
                    }    
            }
            else {
               $data = array("error" => '2');
               die(json_encode($data));     
            }
          }
       }              
    }
    mysqli_close($conn);
    $data = array("exito" => '1');
    die(json_encode($data));     
}