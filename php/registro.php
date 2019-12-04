<?php
include 'conexion_db.php';
$dbcon = conexion(); 

 $nombre=$_POST['nombre'];
 $cedula=$_POST['cedula'];
 $edad=$_POST['edad'];
 $sexo=$_POST['sexo'];
 $ocupacion=$_POST['ocupacion'];
 
 
 $sql ="INSERT INTO registro (nombre , cedula, edad, sexo, ocupacion)
    VALUES ('".$nombre."', '".$cedula."','".$edad."','".$sexo."','".$ocupacion."'	);";
 
 $resultado = pg_query($dbcon, $sql);
 
?>
