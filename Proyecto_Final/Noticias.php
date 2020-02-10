<!DOCTYPE html>
<html>
  <head>
    <html lang="es">
    <title>Mi Pagina de Noticias</title>
    <link rel='stylesheet' href='js/bootstrap.js'/>
    <link rel='stylesheet' href='js/bootstrap.min.js'/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel='stylesheet' href='styles.css'/>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script>
    var current = 0;
    var imagenes = new Array();
     
    $(document).ready(function() {
        var numImages = 6;
        if (numImages <= 3) {
            $('.right-arrow').css('display', 'none');
            $('.left-arrow').css('display', 'none');
        }
     
        $('.left-arrow').on('click',function() {
            if (current > 0) {
                current = current - 1;
            } else {
                current = numImages - 3;
            }
     
            $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);
     
            return false;
        });
     
        $('.left-arrow').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });
     
        $('.right-arrow').on('hover', function() {
            $(this).css('opacity','0.5');
        }, function() {
            $(this).css('opacity','1');
        });
     
        $('.right-arrow').on('click', function() {
            if (numImages > current + 3) {
                current = current+1;
            } else {
                current = 0;
            }
     
            $(".carrusel").animate({"left": -($('#product_'+current).position().left)}, 600);
     
            return false;
        }); 
     });
    </script>

<?php 
require_once "biblioteca.php";
$db = conectaDB();

$dbTabla1 = "noticias_xbox";
$dbTabla2 = "noticias_playstation";
$dbTabla3 = "noticias_nintendo";

$count1 = 0;
$count2 = 0;
$count3 = 0;

$consulta1 = "SELECT * FROM $dbTabla1 ORDER BY likes DESC";
$result1 = $db->query($consulta1);
$consulta2 = "SELECT * FROM $dbTabla2 ORDER BY likes DESC";
$result2 = $db->query($consulta2);
$consulta3 = "SELECT * FROM $dbTabla3 ORDER BY likes DESC";
$result3 = $db->query($consulta3);

$consulta_f = "SELECT * FROM $dbTabla1 ORDER BY fecha_actual DESC";
$result_f1 = $db->query($consulta_f);
$consulta_f = "SELECT * FROM $dbTabla2 ORDER BY fecha_actual DESC";
$result_f2 = $db->query($consulta_f);
$consulta_f = "SELECT * FROM $dbTabla3 ORDER BY fecha_actual DESC";
$result_f3 = $db->query($consulta_f);


if(!$result1 or !$result2 or !$result3){
    print "Error en la consulta";
}else{
    $i = 0;
    foreach($result1 as $valor){
        $array1[$i]["id"] = $valor["id"];
        $array1[$i]["titulo"] = $valor["titulo"];
        $array1[$i]["descripcion"] = $valor["descripcion"];
        $array1[$i]["ruta"] = $valor["ruta"];
        $i = $i + 1;
    }
    $count1 = $i;
    $i = 0;
    foreach($result2 as $valor){
        $array2[$i]["id"] = $valor["id"];
        $array2[$i]["titulo"] = $valor["titulo"];
        $array2[$i]["descripcion"] = $valor["descripcion"];
        $array2[$i]["ruta"] = $valor["ruta"];
        $i = $i + 1;
    }
    $count2 = $i;
    $i = 0;
    foreach($result3 as $valor){
        $array3[$i]["id"] = $valor["id"];
        $array3[$i]["titulo"] = $valor["titulo"];
        $array3[$i]["descripcion"] = $valor["descripcion"];
        $array3[$i]["ruta"] = $valor["ruta"];
        $i = $i + 1;
    }
    $count13 = $i;
    
    //--------------------------------------
    $i = 0;
    foreach($result_f1 as $valor){
        $actual1[$i]["id"] = $valor["id"];
        $actual1[$i]["titulo"] = $valor["titulo"];
        $actual1[$i]["fecha"] = $valor["fecha_actual"];
        $i = $i + 1;
    }
    $i = 0;
    foreach($result_f2 as $valor){
        $actual2[$i]["id"] = $valor["id"];
        $actual2[$i]["titulo"] = $valor["titulo"];
        $actual2[$i]["fecha"] = $valor["fecha_actual"];
        $i = $i + 1;
    }
    $i = 0;
    foreach($result_f3 as $valor){
        $actual3[$i]["id"] = $valor["id"];
        $actual3[$i]["titulo"] = $valor["titulo"];
        $actual3[$i]["fecha"] = $valor["fecha_actual"];
        $i = $i + 1;
    }
    
?>

  </head>
  <body>
    <div class="cuerpo">
        <div class="cabezera">
            <div class="dentro-cabezera">
                <div class="paratitle">
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="Noticias.php">Videojuegos Dulalay</a>&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </div>
            <img src="images/todo.jpg" height="300px">
            </div>

        </div>
        <div class="cabezerachiquita">
            <a href="SuperUsuario.html">Administrador&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|</a>
            <a href="Xbox.php">Xbox</a>
            <a href="PlayStation.php">Play Station</a>
            <a href="Nintendo.php">Nintendo</a>
        </div>
        <div class="acciones">
            <div class=vacio></div>
            <div class="noticias_destacado">
                <div class="destacado">
                    <div class="destacado_ayuda1">Lo Destacado</div>
                    <div class="destacado_ayuda2"></div>
                </div>
                <?php 
                for($i = 0 ; $i <3 ; $i++){
                ?>
                
                <div class="noticia">
                    <?php 
                    $cadena =  $array1[$i]["titulo"];
                    $id = $array1[$i]["id"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=noticias_xbox \"><h1>$cadena</h1></a>";
                    $cadena =  $array1[$i]["ruta"];
                    print "<img src = \"$cadena\" height=\"450px\">";
                    $cadena =  $array1[$i]["descripcion"];
                    print "<p>$cadena</p>";
                    ?>
                </div>
                <div class="vacio"></div>
                <?php
                    
                    }
                ?>
            
                <?php 
                for($i = 0 ; $i <3 ; $i++){
                ?>
                
                <div class="noticia">
                    <?php 
                    $cadena =  $array2[$i]["titulo"];
                    $id = $array2[$i]["id"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=noticias_playstation \"><h1>$cadena</h1></a>";
                    $cadena =  $array2[$i]["ruta"];
                    print "<img src = \"$cadena\" height=\"300px\">";
                    $cadena =  $array2[$i]["descripcion"];
                    print "<p>$cadena</p>";
                    ?>
                </div>
                <div class="vacio"></div>
                <?php
                    
                    }
                ?>
                
                <?php 
                for($i = 0 ; $i <3 ; $i++){
                ?>
                
                <div class="noticia">
                    <?php 
                    $cadena =  $array3[$i]["titulo"];
                    $id = $array3[$i]["id"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=noticias_nintendo \"><h1>$cadena</h1></a>";
                    $cadena =  $array3[$i]["ruta"];
                    print "<img src = \"$cadena\" height=\"300px\">";
                    $cadena =  $array3[$i]["descripcion"];
                    print "<p>$cadena</p>";
                    ?>
                </div>
                <div class="vacio"></div>
                <?php
                    
                    }
                ?>
            
            </div>

            <div class="noticias_nuevo">
                <div class="destacado">
                    <div class="destacado_ayuda1">Lo Nuevo</div>
                    <div class="destacado_ayuda2"></div>
                </div>
                <?php 
                for($i=0 ; $i<2 ; $i++){
                ?>   
                <div class="noticia2">
                    <?php
                    $fecha = $actual1[$i]["fecha"];
                    print "<p>FECHA: $fecha</p>";
                    $id = $actual1[$i]["id"];
                    $cadena = $actual1[$i]["titulo"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=noticias_xbox \"><h5>$cadena</h5></a>";
                    ?>
                </div>
                <?php 
                }
                for($i=0 ; $i<2 ; $i++){
                ?>   
                <div class="noticia2">
                    <?php
                    $fecha = $actual2[$i]["fecha"];
                    print "<p>FECHA: $fecha</p>";
                    $id = $actual2[$i]["id"];
                    $cadena = $actual2[$i]["titulo"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=noticias_playstation \"><h5>$cadena</h5></a>";
                    ?>
                </div>
                <?php 
                }
                for($i=0 ; $i<2 ; $i++){
                ?>   
                <div class="noticia2">
                    <?php
                    $fecha = $actual3[$i]["fecha"];
                    print "<p>FECHA: $fecha</p>";
                    $id = $actual3[$i]["id"];
                    $cadena = $actual3[$i]["titulo"];
                    print "<a href=\"nueva_paguina.php?id=$id & tabla=noticias_nintendo \"><h5>$cadena</h5></a>";
                    ?>
                </div>
                <?php 
                }
                ?>
            </div>

<?php 
}
?>


        </div>

         <div class="cabezerachiquita">
            <center><p>Contactanos borntoplay@dulalay.com o a al telefono: 953 532 2931  BornToPlay es una marca registrada de Dulalay Inc S.A de C.V Todos los derechos reservados©</p></center>
        </div>

    </div>
  </body>
</html>