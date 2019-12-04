<?php 

  //Archivo de funciones

include 'conexion_db.php';
$dbcon = conexion(); 
   session_start();
   
   
   $peticion = isset($_POST['peticion']) ? $_POST['peticion'] : null;  
   $parametros = isset($_POST['parametros']) ? $_POST['parametros'] : null;  
   
   switch($peticion)
   {
		//Caso para validar el login y el password
		case 'valida-login':
		{
			$login = $parametros['login'];
			$password = $parametros['password'];
			
			$sql="select correo,contrasena,id_rol,id_usuario from usuario where correo='$login'  and contrasena = '$password';";
			$query = pg_query($dbcon,$sql);
			// si se obtiene mas de un registro en el select
			$row=pg_fetch_row($query);
			if($row>1)
			{
				echo "ENTRAR";
				$_SESSION["rol"] = $row[2];
				$_SESSION["iduser"] = $row[3];
			}else
			{
				echo "NOVALIDO";
			}
			break;
		}
		

     }
?>