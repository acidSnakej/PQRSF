<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>pruebaValidcacion</title>
</head>
<body>
      <?php
		require 'DBManager.php';
		$correo = $_GET['correo'];

            $query=$miConexion->verificationPassword('mensaje','id',$correo);

		$lel = " id = ". $query;
            echo $lel;
		$lol = 2;
		$lyl = "estado_id = ".$lol;
		$prueba = $miConexion->updateState('mensaje', $lyl ,$lel);
		var_dump($prueba);


       ?>
      </a>
</body>
</html>