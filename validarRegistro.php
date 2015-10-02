


<?php
  require 'DBManager.php';
  if ( $_POST['password1'] == $_POST['password2'] AND $_POST['password1'] != null AND $_POST['password2'] != null ):

    $idd = $miConexion->lastid('destinatario');
    $idd++;
    $pass = $t_hasher->HashPassword($_POST['password1']);
    $depend = strtoupper($_POST['txtdependencia']);
    $user = strtoupper($_POST['username']);
    $respon = strtoupper($_POST['txtnombre']);
    $email = strtolower($_POST['email']);
    $values_dest = "$idd, '{$depend}', '{$user}', '{$pass}', '{$respon}', '{$email}', 1";
    var_dump($values_dest);
    $insert = $miConexion->insert('destinatario',$values_dest);
    echo $insert;
    $cryptEmail = $t_hasher->HashPassword($email);
    $cryptID = $t_hasher->HashPassword($idd);
    header("location: http://desarrollo1.itfip.edu.co/PQRSDF/envioActivacion.php?email={$cryptEmail}&id={$cryptID}");
  else:
      header('location: http://desarrollo1.itfip.edu.co/PQRSDF/registroUser.php?error= las claves no coinciden.');

  endif;
 ?>