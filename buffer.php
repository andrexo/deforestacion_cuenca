<?php 
include 'php/conexion_db.php';
$dbcon=conexion();
//header('content-type: application/json');

$x = $_POST['x'];
$y = $_POST['y'];
$buffer = $_POST['buffer'];

		$sql= "SELECT row_to_json(fc)
 FROM ( SELECT 'FeatureCollection' As type, array_to_json(array_agg(f)) As features
 FROM (SELECT 'Feature' As type
    , ST_AsGeoJSON(lg.buffer)::json As geometry
   FROM (select st_transform(st_buffer(st_transform(st_setsrid(st_makepoint($x,$y),4326),3115),$buffer),4326) as buffer) As lg   ) As f )  As fc;

";
	 $query=pg_query($dbcon,$sql);
	 	$row=pg_fetch_row($query);
	 	echo $row[0];


 ?>