<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Activacion cuenta</title>
</head>
<body>
      <?php
    require 'DBManager.php';
    $correo = $_GET['correo'];


    $query=$miConexion->verificationPassword('destinatario','id',$correo);
    $lel = " id = ". $query;
            echo $lel;
    $lol = 2;
    $lyl = " activacion = ".$lol;
    $prueba = $miConexion->updateState('destinatario', $lyl ,$lel);
    var_dump($prueba);


       ?>
      </a>
</body>
</html>