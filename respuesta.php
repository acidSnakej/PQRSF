 <!DOCTYPE html>
 <html lang="en">
 <head>
	<meta charset="UTF-8">
	<title>Respuestas</title>
	<?php include "plantillas/css.php"; ?>
	<?php include "plantillas/environment.php" ?>
 </head>
 <body>
	<?php
		require 'DBManager.php';
		require  'phpmailer/PHPMailerAutoload.php';
		$miConexion->restriction();
		$mensaje = $_GET['mensaje'];
		$id = $miConexion->verificationPassword('mensaje','id',$mensaje);
		$query1 = $miConexion->linkupMensaje($id);
		while ($data = mysqli_fetch_object($query1) ):
		$correo = $t_hasher->HashPassword($data->correo);
		$id = $t_hasher->HashPassword($data->id);
	?>
	<div class="container">
	<center><h2>Datos de usuario</h2></center>
	<form action='<?php echo "prueba_envioEmail.php?correo={$correo}&id={$id}" ?>' method="POST">
		<table class="table table-hover">
			<thead>
				<tr id="color">
					<th>ITFIP</th>
					<th>Informacion</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>Nombres</th>
					<td><?php echo $data->nombre ?> <?php echo $data->apellido ?></td>
				</tr>
				<tr>
					<th>Correo</th>
					<td><?php echo $data->correo ?></td>
				</tr>
				<tr>
					<th>Tipo Usuario</th>
					<td><?php echo $data->user ?></td>
				</tr>
				<tr>
					<th>PQRS - Asunto</th>
					<td><?php echo $data->descripcion ?></td>
				</tr>
				<tr>
					<th>Mensaje</th>
					<td><?php echo $data->asunto ?></td>
				</tr>
			</tbody>
		<?php endwhile; ?>
		</table>
  </div>
  <div class="container">
		<textarea name="cajaRespuesta" id="caja">Escriba su respuesta</textarea>
			<button id="button">Enviar</button>
	</form>
  </div>
 </body>
 </html>