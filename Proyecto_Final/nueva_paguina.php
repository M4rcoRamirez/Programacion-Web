<?php
require_once "biblioteca.php";
$db = conectaDB();
$id = $_REQUEST["id"];
$tabla = $_REQUEST["tabla"];

$consulta = "SELECT * FROM $tabla WHERE id = $id";
$result = $db->query($consulta);

$consulta = "SELECT * FROM comentarios ORDER BY fecha DESC";
$result_comentarios = $db->query($consulta);

if(!$result){
    print "<a>Error en la cunsulta</a>";
}else{?>


<!DOCTYPE html>
<html>
  <head>
    <title>General</title>
    <link rel='stylesheet' href='styles.css'/>
    <link rel='stylesheet' href='stylesSuperUsuario.css'/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  </head>
  <body>
  <div class="cuerpo">
    
    <div class="cabezerachiquita">
      <a href="Xbox.php">Xbox</a>
      <a href="PlayStation.php">Play Station</a>
      <a href="Nintendo.php">Nintendo</a>
    </div>

    <?php 
    foreach($result as $valor){
    ?>
    <div class = "vacio" ></div>
    <div class = "noticia_general">
      
      <?php
        $likes = $valor["likes"];
        $titulo = $valor["titulo"];
        print "<h1>$titulo</h1>";
        $autor = $valor["autor"];
        $fecha = $valor["fecha_actual"];
        print "<p>$autor / $fecha</p>";
        $descripcion = $valor["descripcion"];
        print "<p>$descripcion</p>";
        $img = $valor["nombreimg"];
        $ruta = $valor["ruta"];
        print "<img src=\"$ruta\" height = 300px";
        $cuerpo = $valor["cuerpo_noticia"];
        print "<p>$cuerpo</p>";
        
        print"<a href=\"insertar_like.php?id=$id & tabla=$tabla & like=$likes\" class=\"btn btn-primary\">Likes: $likes</a>";
      ?>
      
      </div>
    </div>
    <div class = "vacio" ></div>
    <?php 
        }
    ?>
    
<?php print" <form method=\"post\" class=\"acciones2\" action=\"nueva_paguina2.0.php?id=$id & tabla=$tabla\">"; ?>
    	<div class="auxiliar_acciones">
    		<textarea class="form-control" name="comentario" required rows="7" cols="5" placeholder="Agregar un comentario."></textarea>
    	</div>
    	<div class="auxiliar_acciones">
    		<p>Nombre: <input class="form-control" type="text" name="nombre" required  ></p>
        </div>
    	<div class="auxiliar_acciones_aceptar_cancelar">
    	    <input class="btn btn-primary" type="submit" value="Aceptar">
    	</div>
</form>

<?php 
foreach($result_comentarios as $valor){
?>
<div class="acciones2">
<?php 
    $nombre = $valor["nombre"];
    $fecha = $valor["fecha"];
    print"<h5>$nombre / $fecha</h5>";
    $comentario = $valor["comentario"];
    print"<p>$comentario</p>"; 
?>
</div>
<?php    
}
?>
    <div class="cabezerachiquita">
        <center><p>Contactanos borntoplay@dulalay.com o a al telefono: 953 532 2931 <br>  BornToPlay es una marca registrada de Dulalay Inc S.A de C.V Todos los derechos reservados©</p></center>
    </div>
<?php 
}
?>
  </div>
  </body>
</html>