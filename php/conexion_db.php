<?php
function conexion(){
$host = 'localhost';
$port = '5432';
$base_datos = 'SIG3';
$usuario = 'postgres';
$pass = 'p';
$conexion = pg_connect("host=$host port=$port dbname=$base_datos user=$usuario password=$pass");
return($conexion);
}
?>
