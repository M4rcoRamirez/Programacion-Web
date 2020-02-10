
<?php 
require_once "conexionBD.php";
$db = conectaDB();

$id = $_REQUEST["id"];
$titulo = $_REQUEST["titulo"];
$autor = $_REQUEST["autor"];
$descripcion = $_REQUEST["descripcion"];
$cuerpo_noticia = $_REQUEST["noticia"];

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Resgistro de noticia</title>
   <link rel='stylesheet' href='js/bootstrap.js'/>
    <link rel='stylesheet' href='js/bootstrap.min.js'/>
    <link rel="stylesheet" href='css/bootstrap.css'/>
    <link rel='stylesheet' href='styles_alta.css'/>
  </head>
  <body>
    <div class="cuerpo">
      <p></p>
      <div class="subcabezera">
        <div class="regresa">
          <a href="SuperUsuario.html"><img src="images/back.png" width="30px" height="30px"></a>
        </div>
      </div>
      <div class="acciones">
          
          <?php
          $consulta = "UPDATE noticias_playstation SET titulo = '$titulo', autor = '$autor', descripcion = '$descripcion', cuerpo_noticia = '$cuerpo_noticia' WHERE id = $id";
            $result = $db->query($consulta);
            if(!$result){ ?>
            <div class="IngresaNuevaPregunta">
            <p>La noticia se actualizó correctamente</p>
            </div>
            
            <div class="IngresaNuevaPregunta">
            <a href=SuperUsuario.html> Regresar a Pagina de Administrador</a>
            </div>
            
            <div class="IngresaNuevaPregunta">
            <a href=modificar_play.php> Modificar mas noticias</a>
            </div>
            
       <?php     
        }else{
        ?>
        
        <div class="IngresaNuevaPregunta">
            <p>Error al modificar la noticia.</p>
        </div>
        
        <div class="IngresaNuevaPregunta">
            <a href=SuperUsuario.html> Regresar a Pagina de Administrador</a>
        </div>
            
        <div class="IngresaNuevaPregunta">
            <a href=modificar_play.php> Modificar mas noticias</a>
        </div>
        <?php
            }
        ?>
           
      </div>
    </div>
    
  </body>
</html>