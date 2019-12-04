<?php
include 'conexion_db.php'; // Se incluye el archivo de conexión a la base de datos
$dbcon = conexion(); // se crea una variable con la función definida anteriormente
header('Content-Type: application/json');

 $latitud=$_POST['latitud'];
 $longitud=$_POST['longitud'];
 $buffer=$_POST['buffer'];

 $sql= "SELECT row_to_json(fc)
 FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
 FROM (SELECT 'Feature' As type
    , ST_AsGeoJSON(lg.geom)::json As geometry
    , row_to_json((fid,dia,clase_de_sitio,arma_empleada)) As properties
   FROM (select fid,dia,clase_de_sitio,arma_empleada,geom from hurtos
where ST_Intersects(st_Transform(geom,3115),
St_Buffer(St_Transform(st_SetSRID(st_MakePoint($longitud,$latitud),4326),3115),$buffer))= true) As lg   ) As f )  As fc;
   ";

 $res = pg_query($dbcon, $sql);
 
 while($row = pg_fetch_row($res)){
	echo $row[0];
 }
 
 
 
 
 
 
?>