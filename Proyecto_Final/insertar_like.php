<?php 
require_once "biblioteca.php";
$db = conectaDB();
$id = $_REQUEST["id"];
$tabla = $_REQUEST["tabla"];
$like = $_REQUEST["like"];
$like =$like+1;

$consulta = "UPDATE $tabla SET likes = $like WHERE id = $id";
$result = $db->query($consulta);

header("Location:https://prograwebpw.000webhostapp.com/NuevoNoticias/nueva_paguina.php?id=$id & tabla=$tabla")
?>