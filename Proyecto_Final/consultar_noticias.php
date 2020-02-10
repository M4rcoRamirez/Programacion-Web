
<?php 
require_once "biblioteca.php";
$db = conectaDB();

$dbTabla="noticias_xbox";
$dbTabla1="noticias_playstation";
$dbTabla2="noticias_nintendo";

$consulta = "SELECT * FROM $dbTabla";
$result = $db->query($consulta);
$consulta = "SELECT * FROM $dbTabla1";
$result1 = $db->query($consulta);
$consulta = "SELECT * FROM $dbTabla2";
$result2 = $db->query($consulta);

if (!$result) {
    print "    <p>Error en la consulta.</p>\n";
} else {?>

<!DOCTYPE html>
<html>
  <head>
    <title>Consultar Noticias</title>
    <link rel='stylesheet' href='stylesSuperUsuario.css'/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  </head>
  <body>
   <div class="cuerpo">
  		<div class="cabezera">
    		<p>Consulta Noticias</p>
    	</div>
   		<div class="subcabezera">
     	   <div class="regresa">
        	  <a href="SuperUsuario.html"><img src="images/back.png" width="30px" height="30px"></a>
        	</div>
        	<p>Usuario</p>
    	</div>
        <div class="cabezera">Xbox</div>
    	<?php 
            foreach ($result as $valor) {
        ?>
        <div class="acciones2">
        <?php 
                print "<p>ID:&nbsp;&nbsp;&nbsp;&nbsp;$valor[id]</p>";
                print "<p>LIKES:&nbsp;&nbsp;&nbsp;&nbsp;$valor[likes]</p>";
                print "<p>TITULO:&nbsp;&nbsp;&nbsp;&nbsp;$valor[titulo]</p>";
                print "<p>CUERPO DE NOTICA:&nbsp;&nbsp;&nbsp;&nbsp;$valor[cuerpo_noticia]</p>";
                print "<p>BREVE DESCRIPCION:&nbsp;&nbsp;&nbsp;&nbsp;$valor[descripcion]</p>";
                print "<p>AUTOR:&nbsp;&nbsp;&nbsp;&nbsp;$valor[autor]</p>";
                print "<p>FECHA:&nbsp;&nbsp;&nbsp;&nbsp;$valor[fecha_actual]</p>";
        ?>      
        </div>
        <?php
            }
        }
        ?>
        <div class="cabezera">Play Station</div>
        <?php
        if (!$result1) {
            print "    <p>Error en la consulta.</p>\n";
        }else{
            foreach ($result1 as $valor) {
        ?>
        <div class="acciones2">
        <?php
            print "<p>ID:&nbsp;&nbsp;&nbsp;&nbsp;$valor[id]</p>";
            print "<p>LIKES:&nbsp;&nbsp;&nbsp;&nbsp;$valor[likes]</p>";
            print "<h2>TITULO:&nbsp;&nbsp;&nbsp;&nbsp;$valor[titulo]</h2>";
            print "<p>CUERPO DE NOTICA:&nbsp;&nbsp;&nbsp;&nbsp;$valor[cuerpo_noticia]</p>";
            print "<p>BREVE DESCRIPCION:&nbsp;&nbsp;&nbsp;&nbsp;$valor[descripcion]</p>";
            print "<p>AUTOR:&nbsp;&nbsp;&nbsp;&nbsp;$valor[autor]</p>";
            print "<p>FECHA:&nbsp;&nbsp;&nbsp;&nbsp;$valor[fecha_actual]</p>";
        ?>
        </div>
        <?php
            }
        }
        $db = null;
        ?>
  	</div>
  	
  	<div class="cabezera">Nintendo</div>
        <?php
        if (!$result1) {
            print "    <p>Error en la consulta.</p>\n";
        }else{
        ?>
        <?php
            foreach ($result2 as $valor) {
        ?>
        <div class="acciones2">
        <?php
            print "<p>ID:&nbsp;&nbsp;&nbsp;&nbsp;$valor[id]</p>";
            print "<p>LIKES:&nbsp;&nbsp;&nbsp;&nbsp;$valor[likes]</p>";
            print "<p>TITULO:&nbsp;&nbsp;&nbsp;&nbsp;$valor[titulo]</p>";
            print "<p>CUERPO DE NOTICA:&nbsp;&nbsp;&nbsp;&nbsp;$valor[cuerpo_noticia]</p>";
            print "<p>BREVE DESCRIPCION:&nbsp;&nbsp;&nbsp;&nbsp;$valor[descripcion]</p>";
            print "<p>AUTOR:&nbsp;&nbsp;&nbsp;&nbsp;$valor[autor]</p>";
            print "<p>FECHA:&nbsp;&nbsp;&nbsp;&nbsp;$valor[fecha_actual]</p>";
        ?>
        </div>
        <?php
            }
        }
        $db = null;
        ?>
  	</div>
  </body>
</html>