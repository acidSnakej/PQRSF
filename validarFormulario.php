<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <?php include "plantillas/css.php"; ?>
</head>
<body>
      <?php
      require'DBManager.php';
      require 'phpmailer/PHPMailerAutoload.php';
      if ($_POST['anonimo'] == 1)
      {
            $id_mensaje = $miConexion->lastid('mensaje');
            $id_mensaje++;
            $values_Mensaje = "$id_mensaje, '{$_POST['cajatexto']}', ' ". date("Y-m-d G:i:s") ." ' , 1, 1, {$_POST['PQRS']}, '{$_POST['perfil']}' , {$_POST['Destinatario']}";
            $insert = $miConexion->insert('mensaje',$values_Mensaje);
            if ($insert):
			echo 'Los datos se han guardado correctamente';
            else:
			echo 'Fallo en el registro de datos';
            endif;
      }

      else
      {
		$personaEmail = $_POST['email'];
           $emailCorrect = $miConexion->verificationEmail($personaEmail);
           if (!is_null($emailCorrect) ):
			$id_mensaje = $miConexion->lastid('mensaje');
			$id_mensaje++;
			$values_Mensaje = "$id_mensaje, '{$_POST['cajatexto']}', ' ". date("Y-m-d G:i:s") ." ' , $emailCorrect, 1,{$_POST['PQRS']},  {$_POST['perfil']},{$_POST['Destinatario']}";
			$miConexion->insert('mensaje',$values_Mensaje);
			echo 'Se encontro el correo en la base de datos, se han guardado correctamente los datos.';

		else:
			$id_persona = $miConexion->lastid('persona');
			$id_persona++;
			$personaEmail = strtolower($_POST['email']);
			$values_persona = "$id_persona, '{$_POST['txtnombre']}','{$_POST['txtapellido']}', '{$personaEmail}',  '{$_POST['numdocumento']}', '{$_POST['numtelefono']}' ";
			$miConexion->insert('persona',$values_persona);
			$id_mensaje = $miConexion->lastid('mensaje');
			$id_mensaje++;
			$values_Mensaje = "$id_mensaje, '{$_POST['cajatexto']}', ' ". date("Y-m-d G:i:s") ." ' , $id_persona, 1,{$_POST['PQRS']},  {$_POST['perfil']},{$_POST['Destinatario']}";
			$miConexion->insert('mensaje',$values_Mensaje);
			echo 'No se encuentra el correo en la base de datos, se ha creado un nuevo registro y se han guardado la informacion correctamente';
		endif;
      }
       ?>
       <br>
       <br>
<div class="form-group">
    <a href="destinatario.php"><button type="submit" class="btn btn-primary btn active">Bandeja de entrada mensaje</button></a>
</div>
</body>
</html>
