<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <?php include "plantillas/css.php"; ?>
</head>
<body>

<div class="container">
        <form  class="form-signin" id="login" method="post" action="prueba.php">
            <h1>Usuario</h1>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" required name="username" />
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required  />
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Dependence"    name = "dependence" required>
            </div>
            <div class="form-group">
            <?php if ( isset($_GET["error"]) ): ?>
                <div id="error" class="alert alert-danger "> <?php echo $_GET['error'] ?></div>
            <?php endif; ?>
                <button id="loguear" name="login" class="btn btn-lg btn-primary btn-active" type="submit">Iniciar Sesion</button>
                <a href="#">Olvidaste tu contraseña?</a>
            </div>
        </form>
</div>
</body>
</html>