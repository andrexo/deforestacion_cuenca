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
	  include 'php/conexion_db.php';
	  $conexion = pg_connect("host='localhost' port=5432 dbname=SIG3 user=postgres password=p"); 
      $sql = "SELECT * FROM registro ";
      $result = pg_query($sql);
      
        $total = pg_num_rows($result);
        if($total > 0) {
          ?>
          <table class="table table-striped">
              <thead>
              <h3>Tabla de denuncias</h3>
              <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Edad</th>
				  <th>Sexo</th>
				  <th>Ocupación</th>

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