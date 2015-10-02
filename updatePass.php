<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Activacion cuenta</title>
</head>
<body>
  <div class="container">
        <?php $correo = $_GET['correo']; ?>
        <form  class="form-signin" id="login" method="post" action=' <?php echo "validarUpdatePass.php?correo={$correo}" ?>'>
            <h3>Recuperacion de clave</h3>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="clave nueva"  name="password1" autofocus require/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirmar clave" name="password2" required  />
            </div>
            <div class="form-group">
            <?php if ( isset($_GET["error"]) ): ?>
                <div class="alert alert-danger"> <?php echo $_GET['error'] ?></div>
            <?php endif; ?>
                <button id="loguear" name="login" class="btn btn-lg btn-primary btn-active" type="submit">Recuperar clave</button>
            </div>
        </form>
</div>
</body>
</html>