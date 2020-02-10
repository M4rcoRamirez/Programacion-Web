<?php
require_once "conexionBD.php";
$db = conectaDB();

$dbTabla="noticias_xbox";
$id = $_REQUEST["id"];

$consulta = "DELETE FROM $dbTabla
    WHERE id=:id";
$result = $db->prepare($consulta);
if ($result->execute([":id" => $id])) {
    header("Location:mostrar_xbox.php");
} else {
    print " <p>Error al eliminar el registro.</p>\n";
    print " <a href=\"mostrar_xbox.php\"> Regresar </a>";
    print "\n";
}

?>