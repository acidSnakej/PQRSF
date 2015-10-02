<?php
session_start();
require 'DBManager.php';
$miConexion->restriction();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>BandejaEntrada</title>
  <?php include "plantillas/css.php"; ?>
</head>
<body>
<div class="container" id="bandejaEntrada">
	<table class="table table-hover">
		<p>Bienvenido, <?php echo $_SESSION['nombre']; ?></p>
		<a href="logout.php"><button name="login" class="btn btn-lg btn-primary btn-active" type="submit">Salir</button></a>
		<center><h2>RECEPCION DE PQRSD</h2></center>
		<thead>
			<tr id="color">
				<th>No. </th>
				<th>Nombre </th>
				<th>Mensaje </th>
				<th>PQRS</th>
				<th>Destinatario</th>
				<th>Estado</th>
				<th>Fecha</th>
			</tr>
		</thead>

		<?php
			$query = $miConexion->linkupMensaje();
			$i=0;
			while ($data = mysqli_fetch_object($query) ):
			$i++;
			?>
			<tbody>
				<tr>
					<td><?php echo $i; ?></td>
						<?php
							$id = $data->id;
							$hash = $t_hasher->HashPassword($id);
						?>
					<td><a href=" <?php echo"respuesta.php?mensaje={$hash}" ?>"><?php echo $data->nombre ?> <?php echo $data->apellido ?></a></td>
					<td><?php echo $data->asunto ?></td>
					<td><?php echo $data->descripcion ?></td>
					<td><?php echo $data->dependencia ?></td>
					<td><?php echo $data->estado ?></td>
					<td><?php echo $data->fecha_mensaje ?></td>
				</tr>
			</tbody>
		<?php endwhile ?>
	</table>
</div>

<?php include "plantillas/footer.php";?>
</body>
</html>
