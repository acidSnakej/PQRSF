<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>PQRSDF ITFIP</title>
<link rel="stylesheet" href="jquery/jquery-ui.min.css">
<?php include "plantillas/css.php"; ?>
</head>
<body>
<div class="container" id="contenedor">
    <form role = "form-horizontal" action="validarFormulario.php" method="post" id="formulario">
    <h1 id="tituloFormulario">Formulario Prueba 1</h1>
       <div class="form-group">
          <?php
           require("DBManager.php");
           $query2 = $miConexion->query("destinatario","*");
           $query1 = $miConexion->query("pqrsdf","*");
           $query3 = $miConexion->query("tipouser", "*");
          ?>
              <label for="opciones" class="opciones">Selecciona una opcion por favor</label>
              <select name="perfil" class="form-control" id="opciones">
              <?php while ( $data = mysqli_fetch_object($query3)): ?>
                <option value="<?php echo $data->id ?>"> <?php echo $data->user ?></option>
              <?php endwhile; ?>
          </select>
       </div>
       <div class="form-group">
              <label for="pqrs" class="opciones">Selecciona la PQRS que deseas realizar</label>
              <select name="PQRS" class="form-control" id="pqrs">
              <?php   while ( $data = mysqli_fetch_object($query1)) : ?>
                  <option value=" <?php  echo $data->id ?>">  <?php echo   $data->descripcion ?></option>
               <?php    endwhile ;
               ?>
              </select>
       </div>
         <div class="form-group">
              <label for="pqrs" class="opciones">Selecciona la dependencia</label>
              <select name="Destinatario" class="form-control" id="pqrs">
              <?php   while ( $data = mysqli_fetch_object($query2)) : ?>
                  <option value=" <?php  echo $data->id ?>">  <?php echo   $data->dependencia ?></option>
               <?php    endwhile;
               ?>
              </select>
       </div>
      <div class="form-group">
              <label for="anonimo" class="anonimato" id="anonimatoColor">Desea realizar su PQRS de manera anomina</label>
              <select name="anonimo" id="anonimo" class="form-control">
                      <option value="0">No</option>
                      <option value="1">Si</option>
              </select>
      </div>
      <div class="form-group">
            <label for="nombre" class="opcionesVar">Nombre</label>
            <input type="text" class="form-control" name="txtnombre" id="nombre"  placeholder="Ingresa tu nombre por favor" required	>
      </div>
      <div class="form-group">
            <label for="apellido" class="opcionesVar">Apellido</label>
            <input type="text" class="form-control" name="txtapellido" id="apellido" placeholder="Ingresa tu apellido por favor" required>
      </div>
      <div class="form-group">
            <label for="documento" class="opcionesVar">Número documento de identidad</label>
            <input type="number" class="form-control" name="numdocumento" id="documento" placeholder="Ingresa tu numero de documento por favor" required>
      </div>
      <div class="form-group">
            <label for="telefono" class="opcionesVar">Número de télefono</label>
            <input type="number" class="form-control" name="numtelefono" id="telefono" placeholder="Ingresa un numero de contacto por favor" required>
      </div>
      <div class="form-group">
            <label for="email" class="opcionesVar">Correo Electronico</label>
            <input type="email" class="form-control" name="email" id="email"  placeholder="Ingresa  tu correo aqui" required>
      </div>
            <div class="form-group">
            <label for="cajaComentario" class="opciones">Escribe aqui tu PQRS</label>
            <textarea name ="cajatexto" class="form-control" rows="3" required></textarea>
      </div>
      <div class="form-group">
                  <button type="submit" class="btn btn-primary btn active">Enviar</button>
      </div>
      </form>
</div>

<?php include "plantillas/footer.php";?>
<script src='//vws.responsivevoice.com/v/e?key=uaIIFycV'></script>
  </body>
</html>