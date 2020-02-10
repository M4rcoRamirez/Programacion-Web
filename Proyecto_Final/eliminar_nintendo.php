<?php
require_once "conexionBD.php";
$db = conectaDB();

$dbTabla="noticias_nintendo";
$id = $_REQUEST["id"];

$consulta = "DELETE FROM $dbTabla
    WHERE id=:id";
$result = $db->prepare($consulta);
if ($result->execute([":id" => $id])) {
    header("Location:mostrar_nintendo.php");
} else {
    print " <p>Error al eliminar el registro.</p>\n";
    print " <a href=\"mostrar_nintendo.php\"> Regresar </a>";
    print "\n";
}

?>