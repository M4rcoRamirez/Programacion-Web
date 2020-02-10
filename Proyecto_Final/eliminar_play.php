<?php
require_once "conexionBD.php";
$db = conectaDB();

$dbTabla="noticias_playstation";
$id = $_REQUEST["id"];

$consulta = "DELETE FROM $dbTabla
    WHERE id=:id";
$result = $db->prepare($consulta);
if ($result->execute([":id" => $id])) {
    header("Location:mostrar_playstation.php");
} else {
    print " <p>Error al eliminar el registro.</p>\n";
    print " <a href=\"mostrar_playstation.php\"> Regresar </a>";
    print "\n";
}

?>