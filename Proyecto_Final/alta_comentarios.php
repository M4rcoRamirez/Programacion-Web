
<?php 
require_once "conexionBD.php";
$db = conectaDB();


$nombre = $_REQUEST["nombre"];
$comentario = $_REQUEST["comentario"];
$fecha=date("Y-m-d H:i:s");


 $consulta = "INSERT INTO comentarios
 (nombre, comentario, fecha)
  VALUES (:nombre, :comentario, :fecha)";
    
  
$result = $db->prepare($consulta);

if ($result->execute([":nombre" => $nombre, ":comentario" => $comentario, ":fecha" => $fecha])) {
    header("Location:nueva_paguina.php");
}

?>
