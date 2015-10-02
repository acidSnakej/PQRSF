 <?php
	session_start();
      require 'DBManager.php';
      $login = $_POST["login"];
      if( isset($_POST['login']) )
      {

            $user = strtoupper($_POST['username']);
            $dependence = strtoupper($_POST['dependence']);
            $password = $_POST['password'];
            $query = $miConexion->query('destinatario','user, pass, responsable,id');
            while ($data = mysqli_fetch_object($query) ):
			echo $data->user;
                  $veriticationPass = $t_hasher->CheckPassword($password,$data->pass);
                  if($veriticationPass == 1 AND $data->user == $user):
                        echo 'Existe el usuario y el pass';
                        $_SESSION['nombre'] = $data->responsable;
                        $_SESSION['usuario'] = $data->user;
                        $_SESSION['user_id'] = $data->id;
                        header('location:http://desarrollo1.itfip.edu.co/PQRSDF/destinatario.php ');
                  else:
				header('location:http://desarrollo1.itfip.edu.co/PQRSDF/destinatario.php?error=Clave o usuario incorrecto ');
                  endif;
            endwhile;
       }
      else
      {
            echo 'algo anda mal';
      }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Document</title>
      <?php include "plantillas/css.php" ?>
</head>
<body>
<div class="container" id="mensajerepuesta">
<div class="alert alert-info" id="azul">
      <center><h1>ITFIP</h1>
      <h1>Bienvenido a las PQRSDF</h1></center>
      <center><p>Hola, señor usuario aqui le enviamos  la respuesta a su solicitud:</p>
      <p>Gracias por utilizar este medio de solicitudes, esperamos que hayas quedado satisfecho con esta respuesta; si es asi 
      por favor dar click en el siguiente enlace:</p></center>
</div>
</div>
</body>
</html>