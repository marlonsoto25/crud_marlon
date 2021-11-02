<?php
  include('funciones.php');
  session_start();
  $vnumero=$_POST['numero'];
  $vprograf=$_POST['programa'];


  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"update fichas set ficha_numero='{$vnumero}',ficha_progra='{$vprograf}'");

  if ($miconexion->affected_rows>0)
  {
      echo "Actualizacion exitosa";
  }
?>