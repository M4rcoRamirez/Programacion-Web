
<?php 
require_once "conexionBD.php";
$db = conectaDB();

$dbTabla="noticias_xbox";


$consulta = "SELECT * FROM $dbTabla";
$result = $db->query($consulta);


if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
} else {?>

<!DOCTYPE html>
<html>
  <head>
    <title>Eliminar Noticias Xbox</title>
    <link rel='stylesheet' href='stylesSuperUsuario.css'/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  </head>
  <body>
   <div class="cuerpo">
  		<div class="cabezera">
    		<p>Eliminar Noticias</p>
    	</div>
   		<div class="subcabezera">
     	   <div class="regresa">
        	  <a href="Eliminar.html"><img src="images/back.png" width="30px" height="30px"></a>
        	</div>
        	<p>Usuario</p>
    	</div>
        <div class="cabezera">Xbox</div>
    	<?php 
            foreach ($result as $valor) {
        ?>
        <div class="acciones2">
        <?php 
                print "<p>TITULO:&nbsp;&nbsp;&nbsp;&nbsp;$valor[titulo]</p>";
                print "<p>AUTOR:&nbsp;&nbsp;&nbsp;&nbsp;$valor[autor] / $valor[fecha_actual]</p>";
                print "<a class=\"btn btn-primary\" href=\"eliminar_xbox.php?id=$valor[id]\">Eliminar Noticia</a>";
        ?>  
        </div>
        <?php
            }
        }
        ?>
  	</div>
  </body>
</html>