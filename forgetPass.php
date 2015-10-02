<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Recuperacion de clave</title>
  <?php include "plantillas/css.php";  ?>
</head>
<body>
  <div class="container">
        <form  class="form-signin" id="login" method="post" action="envioUpdatePass.php">
            <h3>Por favor ingrese su correo electronico,  se enviara un link para restablecer su clave</h3>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Correo"  name="email" autofocus require/>
            </div>
            <div class="form-group">
            <?php if ( isset($_GET["error"]) ): ?>
                <div class="alert alert-danger"> <?php echo $_GET['error'] ?></div>
            <?php endif; ?>
                <button id="loguear" name="login" class="btn btn-lg btn-primary btn-active" type="submit">Enviar</button>
            </div>
        </form>
</div>
</body>
</html>