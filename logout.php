<?php
require 'DBManager.php';
$miConexion->restriction();
session_destroy();
header("location: http://desarrollo1/PQRSDF/login.php");
?>
