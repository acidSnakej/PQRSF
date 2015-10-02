 <?php
          require 'DBManager.php';
          if (isset($_POST['login']) )
          {
		$query = $miConexion->query('destinatario','id, pass');
		$idCrypt = $miConexion->verificationPassword('destinatario','id',$_GET['correo']);
		while ($data = mysqli_fetch_object($query) ):
			if ($data->id == $idCrypt)
			{
				if ($_POST['password1'] == $_POST['password2'])
				{
					$id = " id = ". $idCrypt;
					$newPass = $t_hasher->HashPassword($_POST['password1']);
					$cols = " pass = ". " '$newPass' ";
					$updatePass = $miConexion->updateState('destinatario', $cols, $id);
				}
			}
		endwhile;
          }
       ?>
