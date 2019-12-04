<?php

  
   $con = pg_connect("host=localhost port=5432 dbname=SIG3 user=postgres password=p");;
   if (!$con){die('ERROR DE CONEXION CON CON BASE DE DATOS: ' .  pg_last_error());} 



$sql = "SELECT ST_area((Select geom from proy where mpio_cnm_1='".$_POST['municipio']."' LIMIT 1) )*100000";



$result = pg_query ($sql);

if (! $result){
   echo "La consulta SQL contiene errores.". pg_last_error();
   exit();
}else { 
    while ($row = pg_fetch_row($result)){
	echo "".$row[0]."".$row[1]."".$row[2]."";
    }
    echo "";
 }
?>  