<?php
   $con = pg_connect("host=localhost port=5432 dbname=SIG3 user=postgres password=p");;
   if (!$con){die('ERROR DE CONEXION CON CON BASE DE DATOS: ' .  pg_last_error());} 


 $correo=$_POST['correo'];
 $contrasena=$_POST['contrasena'];
 $id_rol=$_POST['id_rol'];
 $id_usuario=$_POST['id_usuario'];

 
 $sql ="INSERT INTO usuario ( correo, contrasena, id_rol, id_usuario)
    VALUES ('".$correo."','".$contrasena."','".$id_rol."', '".$id_usuario."');";
	
	echo $sql;

 
 $resultado = pg_query($con, $sql);
 
?>
