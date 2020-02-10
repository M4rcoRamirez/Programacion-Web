
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
    <title>Modificar Noticias Xbox</title>
    <link rel='stylesheet' href='stylesSuperUsuario.css'/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  </head>
  <body>
   <div class="cuerpo">
  		<div class="cabezera">
    		<p>Modificar Noticias</p>
    	</div>
   		<div class="subcabezera">
     	   <div class="regresa">
        	  <a href="modificar_noticia.html"><img src="images/back.png" width="30px" height="30px"></a>
        	</div>
        	<p>Usuario</p>
    	</div>
        <div class="cabezera">Xbox</div>
    	<?php 
            foreach ($result as $valor) {
                $id = $valor["id"];
               
        ?>
        <div class="acciones2">
            
        <?php print" <form action=\"accion_modificar_xbox.php?id=$id\" method=\"post\" class=\"acciones2\"> "; ?>
    	<div class="auxiliar_acciones">
    		<p>Titulo de la Noticia: <input class="form-control" type="text" name="titulo" value='<?php print "$valor[titulo]"?>' required  placeholder="...">* Campo requerido</p>
    	</div>

    	<div class="auxiliar_acciones">
    		<p>Autor: <input class="form-control" type="text" name="autor" value='<?php print "$valor[autor]"?>' required  placeholder="StarGreen333.">* Campo requerido</p>
    	</div>


    	<div class="auxiliar_acciones">
    		<p>Breve descripcion de la noticia: <input class="form-control" type="text" name="descripcion" value='<?php print "$valor[descripcion]"?>' required placeholder="descripcion.">* Campo requerido</p>
    	</div>

        <?php 
        $cuerpo = $valor["cuerpo_noticia"];
        
        ?>
    	<div class="auxiliar_acciones">
    		<p>Noticia Completa: <textarea class="form-control" name="noticia" rows="12" cols="100"><?php print "$cuerpo";?></textarea>* Campo requerido</p>
    	</div>
    	<div class="auxiliar_acciones_aceptar_cancelar">
    		<input class="btn btn-primary" type="submit" value="Aceptar">
            <a class="btn btn-primary" href="Ingresar.html">Cancelar</a>
    	</div>
    </form>
            
                  
        </div>
        <?php
            }
        }
        ?>
  	</div>
  </body>
</html>