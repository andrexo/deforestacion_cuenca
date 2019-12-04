<?php
include 'conexion_db.php';
$dbcon = conexion(); 

 $lat=$_POST['lat'];
 $lon=$_POST['lon'];
 $fecha=$_POST['fecha'];
 $hora=$_POST['hora'];
 $zona=$_POST['zona'];
 $descripcion=$_POST['descripcion'];
 $foto=$_POST['foto']; 

  if($foto == 'Sin Foto'){
 $nomb_img =$foto ;
 }else{
 $nomb_img= 'img/'.time().".jpg";
 
 list(, $foto) = explode(';', $foto);
 list(, $foto)      = explode(',', $foto);
 $foto = base64_decode($foto);

 file_put_contents("../".$nomb_img, $foto);
 
 }
 
 
 $sql ="INSERT INTO denuncia ( lat, lon, fecha, hora, zona, descripcion,foto,geom)
    VALUES ($lat,$lon,'".$fecha."', '".$hora."','".$zona."','".$descripcion."','".$foto."',
	ST_GeomFromText('POINT($lon $lat)',4326));";

 
 $resultado = pg_query($dbcon, $sql);
 
?>
