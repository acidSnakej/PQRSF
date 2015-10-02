<?php 

session_start();

echo 'Bienvenido a la pagina pruebaBandeja';

echo "<br/>".$_SESSION['color'];
echo "<br/>".$_SESSION['animal'];
echo "<br/>".date ('Y m d H:i:s', $_SESSION['time']);

echo '<br/><a href="prueba.php">prueba.php<a/>';


 ?>