<?php 
require_once "biblioteca.php";
$db = conectaDB();
$id = $_REQUEST["id"];
$tabla = $_REQUEST["tabla"];
$nombre = $_REQUEST["nombre"];
$comentario = $_REQUEST["comentario"];
date_default_timezone_set('America/Mexico_City');
$fecha=date("Y-m-d H:i:s");

$consulta = "INSERT INTO comentarios(nombre,comentario,fecha) VALUES('$nombre','$comentario','$fecha')";
$result = $db->query($consulta);

header("Location:https://prograwebpw.000webhostapp.com/NuevoNoticias/nueva_paguina.php?id=$id & tabla=$tabla")
?>