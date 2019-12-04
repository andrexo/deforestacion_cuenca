<?php
include 'conexion_db.php'; // Se incluye el archivo de conexión a la base de datos
$dbcon = conexion(); // se crea una variable con la función definida anteriormente
header('Content-Type: application/json');

 $latitud=$_POST['latitud'];
 $longitud=$_POST['longitud'];
 $hurtos=$_POST['hurtos'];

 $sql= "SELECT row_to_json(fc)
 FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
 FROM (SELECT 'Feature' As type
    , ST_AsGeoJSON(lg.geom)::json As geometry
    , row_to_json((fid,dia,clase_de_sitio,arma_empleada)) As properties
   FROM ( select fid,dia,clase_de_sitio,arma_empleada,geom, st_Distance(st_transform
(ST_SetSRID(ST_MakePoint( $longitud, $latitud),4326),3115),st_transform(geom,3115)) as dist
from hurtos order by dist asc limit $hurtos
) As lg   ) As f )  As fc;
   ";

 $res = pg_query($dbcon, $sql);
 
 while($row = pg_fetch_row($res)){
	echo $row[0];
 }
 
 
 
 
 
 
?>