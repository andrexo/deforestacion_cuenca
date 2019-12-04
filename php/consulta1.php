<?php
// http://programarenphp.wordpress.com


/******** CONECTAR CON BASE DE DATOS **************** */ 
/******** Recuerda cambiar por tus datos ***********/  
   $con = pg_connect("host=localhost port=5433 dbname=proyecto user=postgres password=p");;
   if (!$con){die('ERROR DE CONEXION CON CON BASE DE DATOS: ' .  pg_last_error());} 
/* ********************************************** */

//ejecutamos la consulta
$sql = "SELECT COUNT(fid) FROM hurtos WHERE ST_intersects((SELECT geom from barrios WHERE  barrios.barrio='".$_POST['codigo']."'),hurtos.geom)=TRUE;";

$result = pg_query ($sql);
// verificamos que no haya error 
if (! $result){
   echo "La consulta SQL contiene errores.". pg_last_error();
   exit();
}else {
    echo "<table border='1'><tr><td>Cantidad de robos presentados en el barrio</td>
         </tr><tr>";
//obtenemos los datos resultado de la consulta 
    while ($row = pg_fetch_row($result)){
	echo "<td>".$row[0]."</td><td>".$row[1]."</td>
              <td>".$row[2]."</td>";
    }
    echo "</tr></table>";
 }
?>  