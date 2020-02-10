
<?php 
require_once "conexionBD.php";
$db = conectaDB();

date_default_timezone_set('America/Mexico_City');
$fecha_actual=date("Y-m-d H:i:s");

$titulo = $_REQUEST["titulo"];
$autor = $_REQUEST["autor"];
$menu_eleccion_tipo = $_REQUEST["menu_eleccion_tipo"];
$descripcion = $_REQUEST["descripcion"];
$cuerpo_noticia = $_REQUEST["noticia"];
$likes = 0;
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));


if ($menu_eleccion_tipo==1) {
	if(isset($_FILES['imagen'])){
        $nombreImg=$_FILES['imagen']['name'];
        $ruta=$_FILES['imagen']['tmp_name'];
        $destino="images/".$nombreImg;
        if(copy($ruta,$destino)){
            $consulta = "INSERT INTO noticias_xbox
            (likes, titulo, cuerpo_noticia, descripcion, autor, fecha_actual, nombreimg, ruta)
            VALUES (:likes, :titulo, :cuerpo_noticia, :descripcion,:autor, :fecha_actual, '$nombreImg','$destino')";
    
        }
    
    }
}

else if ($menu_eleccion_tipo==2) {
    if(isset($_FILES['imagen'])){
        $nombreImg=$_FILES['imagen']['name'];
        $ruta=$_FILES['imagen']['tmp_name'];
        $destino="images/".$nombreImg;
        if(copy($ruta,$destino)){
            $consulta = "INSERT INTO noticias_playstation
            (likes, titulo, cuerpo_noticia, descripcion, autor, fecha_actual, nombreimg, ruta)
            VALUES (:likes, :titulo, :cuerpo_noticia, :descripcion,:autor, :fecha_actual, '$nombreImg','$destino')";
    
        }
    
    }
	
}

else if ($menu_eleccion_tipo==3) {
	if(isset($_FILES['imagen'])){
    $nombreImg=$_FILES['imagen']['name'];
    $ruta=$_FILES['imagen']['tmp_name'];
    $destino="images/".$nombreImg;
    if(copy($ruta,$destino)){
        $consulta = "INSERT INTO noticias_nintendo
    (likes, titulo, cuerpo_noticia, descripcion, autor, fecha_actual, nombreimg, ruta)
    VALUES (:likes, :titulo, :cuerpo_noticia, :descripcion,:autor, :fecha_actual, '$nombreImg','$destino')";

    }

}

}
$result = $db->prepare($consulta);
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Resgistro de noticia</title>
   <link rel='stylesheet' href='js/bootstrap.js'/>
    <link rel='stylesheet' href='js/bootstrap.min.js'/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
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
            if($result->execute([":likes" => $likes, ":titulo" => $titulo, ":cuerpo_noticia" => $cuerpo_noticia, ":descripcion" => $descripcion, ":autor" => $autor, ":fecha_actual" => $fecha_actual])){ ?>
            <div class="IngresaNuevaPregunta">
            <p>Registro creado correctamente</p>
            </div>
            
            <div class="IngresaNuevaPregunta">
            <a href=SuperUsuario.html> Regresar a Pagina de Administrador</a>
            </div>
            
            <div class="IngresaNuevaPregunta">
            <a href=Ingresar.html> Ingresar mas noticias</a>
            </div>
            
       <?php     
        }else{
        ?>
        
        <div class="IngresaNuevaPregunta">
            <p>Error al crear el registro.</p>
        </div>
        
        <div class="IngresaNuevaPregunta">
            <a href=SuperUsuario.html> Regresar a Pagina de Administrador</a>
        </div>
            
        <div class="IngresaNuevaPregunta">
            <a href=Ingresar.html> Ingresar mas noticias</a>
        </div>
        <?php
            }
        ?>
           
      </div>
    </div>
    
  </body>
</html>