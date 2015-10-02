<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <?php include "plantillas/css.php" ?>
</head>
<body>
  <div class="container" >
  <form action="validarRegistro.php" method="post" id="registro">
   <h1>Registro de usuarios</h1>
            <?php if ( isset($_GET["error"]) ): ?>
                <div id="loguear" class="alert alert-danger"> <?php echo $_GET['error'] ?></div>
            <?php endif; ?>
      <div class="form-group">
            <label for="nombre" class="opcion">Nombre completo</label>
            <input type="text" class="form-control" name="txtnombre" id="nombre"  placeholder="Ingresa tu nombre completo" >
      </div>
      <div class="form-group">
            <label for="dependencia" class="opcion">Dependencia</label>
            <input type="text" class="form-control" name="txtdependencia" placeholder="ingrese tu dependencia">
      </div>
      <div class="form-group">
      <label for="nombre" class="opcion">Usuario</label>
                <input type="text" class="form-control" placeholder="ingrese tu usuario" name="username" />
            </div>
    <div class="form-group">
        <label for="pass " class="opcion">Contraseña</label>
         <input type="password" class="form-control" placeholder="ingrese tu contraseña" name="password1" />

    </div>
     <div class="form-group">
        <label for="pass " class="opcion">Confirmar contraseña</label>
         <input type="password" class="form-control" placeholder="confirmar contraseña" name="password2"   />

    </div>
    <div class="form-group">
            <label for="email" class="opcion">Correo Electronico</label>
            <input type="email" class="form-control" name="email" id="email"  placeholder="Ingresa  tu correo ">
      </div>
    <div class="form-group">
                  <button type="submit" class="btn btn-primary btn active">Enviar</button>
      </div>
  </form>

  </div>
</body>
</html>