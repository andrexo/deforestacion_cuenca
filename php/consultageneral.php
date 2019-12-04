<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">        
      <title>Resultado de Busqueda</title>
      <link rel="stylesheet" href="css/bootstra337.css">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="container">

<?php

/******** CONECTAR CON BASE DE DATOS **************** */ 
/******** Recuerda cambiar por tus datos ***********/  
   $con = pg_connect("host=localhost port=5432 dbname=SIG3 user=postgres password=p");;
   if (!$con){die('ERROR DE CONEXION CON CON BASE DE DATOS: ' .  pg_last_error());} 
/* ********************************************** */

//ejecutamos la consulta
$sql = $_POST['codigo8'];

$result = pg_query ($sql);
// verificamos que no haya error 
        if($result > 0) {
          ?>
          <table class="table table-striped">
              <thead>
              <h3>Tabla de denuncias</h3>
              <tr>
                  <th>Columna 1</th>
                  <th>Columna 2</th>
                  <th>Columna 3</th>
				  <th>Columna 4</th>
				  <th>Columna 5</th>
				  <th>Columna 6</th>
				  <th>Columna 7</th>
				  <th>Columna 8</th>
              </tr>
            <tr>
              </thead>
              <tbody>
              <?php
              while ($row = pg_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo "$row[0]"; ?></td>
                  <td><?php echo "$row[1]"; ?></td>
                  <td><?php echo "$row[2]"; ?></td>
                  <td><?php echo "$row[3]"; ?></td>
				  <td><?php echo "$row[4]"; ?></td>
				  <td><?php echo "$row[5]"; ?></td>
				  <td><?php echo "$row[6]"; ?></td>
				  <td><?php echo "$row[7]"; ?></td>
                </tr>
              <?php
              }
              ?>
              </tbody>
          </table>
          <?php
        } else {
          echo "No se encontraron resultados";
        }
?>

      </div>
  </body>
</html>  