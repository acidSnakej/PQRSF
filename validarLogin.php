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