<?php 
require_once "biblioteca.php";
$db = conectaDB();

$dbTabla="noticias_playstation";
$count = 0;

$consulta = "SELECT * FROM $dbTabla";
$result = $db->query($consulta);


?>

<!DOCTYPE html>
<html>
  <head>
    <title>Noticias Play Station</title>
    <link rel='stylesheet' href='styles.css'/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
  </head>
  <body>
   <div class="cuerpo">
  		<div class="cabezera">
    		<p> Noticias Play Station </p>
    	</div>
    	<div class="cabezerachiquita">
    	     <div class="regresa">
        	  <a href="Noticias.php
        	  "><img src="images/back.png" width="30px" height="30px"></a>
        	</div>
          <a href="Xbox.php">Xbox</a>
          <a href="PlayStation.php">Play Station</a>
          <a href="Nintendo.php">Nintendo</a>
        </div>
    <?php
    
    $consulta = "SELECT * FROM $dbTabla ORDER BY likes DESC";
    $result = $db->query($consulta);
    $i=0;
    foreach ($result as $valor) {
        $array[$i]["ruta"] = $valor["ruta"];
        $array[$i]["id"] = $valor["id"];
        $array[$i]["titulo"] = $valor["titulo"];
        $array[$i]["likes"] = $valor["likes"];
        $array[$i]["descripcion"] = $valor["descripcion"];
        $array[$i]["cuerpo_noticia"] = $valor["cuerpo_noticia"];
        $array[$i]["autor"] = $valor["autor"];
        $array[$i]["fecha"] = $valor["fecha_actual"];
        $i = $i + 1; 
    }
    $count = $i;
    //print"$count";
    ?>
    
    <?php
        $consulta = "SELECT * FROM $dbTabla WHERE likes = (SELECT MAX(likes)  FROM $dbTabla)";
        $result = $db->query($consulta);
        /*foreach($result as $valor) {
            print "<h1>$valor[titulo]</h1>";
        }*/
    ?>
   <div class="vacio"></div>	
      <div class="acciones">
          
        <div class="cuadro">
          <div class="cuadro_princ">
            <div class="card bg-dark text-white">
            <?php 
                $ruta = $array[0]["ruta"];
            ?>
              <img src="<?php print"$ruta"; ?>" class="card-img" height="480px" width="720px">
              <div class="card-img-overlay">
                <?php
                    $id = $array[0]["id"];
                    $cadena = $array[0]["titulo"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=$dbTabla \"><h1>$cadena</h1></a>";
                ?>
              </div>
            </div>
          </div>
          
          <div class="cuadro_sec">
            <div class="noticia_paraseccion">
                <div class="card bg-dark text-white">
                <?php 
                    $ruta = $array[1]["ruta"];
                ?>
                  <img src="<?php print"$ruta"; ?>" class="card-img" height="240px" width="390px">
                  <div class="card-img-overlay">
                    <?php
                        $id = $array[1]["id"];
                        $cadena = $array[1]["titulo"];
                        print "<a href=\"nueva_paguina.php?id=$id & tabla=$dbTabla \"><h3>$cadena</h3></a>";
                    ?>
                  </div>
                </div>
            </div>
            <div class="noticia_paraseccion">
                <div class="card bg-dark text-white">
                <?php 
                    $ruta = $array[2]["ruta"];
                ?>
                  <img src="<?php print"$ruta"; ?>" class="card-img" height="240px" width="390px">
                  <div class="card-img-overlay">
                    <?php
                        $id = $array[2]["id"];
                    $cadena = $array[2]["titulo"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=$dbTabla \"><h3>$cadena</h3></a>";
                    ?>
                  </div>
                </div>
            </div>
          </div>
        </div>
        
        <div class="vacio"></div>

        <div class="noticia_particionado">
            <?php
            for ($i = 3 ; $i < $count ; $i++){
            ?>
          <div class="noticia_particionado_dentro">
                <div class="card bg-dark text-white">
                <?php 
                    $ruta = $array[$i]["ruta"];
                ?>
                  <img src="<?php print"$ruta"; ?>" class="card-img" height="280px" width="373px">
                  <div class="card-img-overlay">
                    <?php
                        $id = $array[$i]["id"];
                        $cadena = $array[$i]["titulo"];
                        print "<a href=\"nueva_paguina.php?id=$id & tabla=$dbTabla \"><h3>$cadena</h3></a>";
                    ?>
                  </div>
                </div>
          </div>
            <?php
            }
            ?>
        </div>


        <div class="vacio">
          
        </div>
    <?php
        $db = null;
    ?> 
      </div>
      
       <div class="cabezerachiquita">
            
            <center><p>Contactanos borntoplay@dulalay.com o a al telefono: 953 532 2931 <br>  BornToPlay es una marca registrada de Dulalay Inc S.A de C.V Todos los derechos reservados©</p></center>
        </div>
      
  	</div>
  </body>
</html>
