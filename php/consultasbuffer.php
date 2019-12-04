<?php
include 'conexion_db.php'; // Se incluye el archivo de conexión a la base de datos
$dbcon = conexion(); // se crea una variable con la función definida anteriormente
header('Content-Type: application/json');

	  $lat=$_POST['lat'];
      $lon=$_POST['lon'];
      $hora=$_POST["hora"];

 $sql= "SELECT row_to_json(fc)
 FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
 FROM (SELECT 'Feature' As type
    , ST_AsGeoJSON(lg.geom)::json As geometry
   FROM (select St_Transform (St_Buffer(St_Transform(st_SetSRID(st_MakePoint($lon,$lat),4326),3115),$hora))= true) As lg ) As f) As fc;";

 $res = pg_query($dbcon, $sql);
 
 while($row = pg_fetch_row($res)){
	echo $row[0];
 }


 
 
 
?>