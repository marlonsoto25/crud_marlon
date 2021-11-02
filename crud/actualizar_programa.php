<?php
  include('funciones.php');
  session_start();
  $vide=$_SESSION['ide1'];
  $vnombre=$_POST['nombre'];
  $vtipo=$_POST['tipos'];


  $miconexion=conectar_bd('', 'sena_bd');
  $resultado=consulta($miconexion,"update programa set progra_nombre='{$vnombre}',progra_tipo='{$vtipo}'");

  if ($miconexion->affected_rows>0)
   {
     echo "Actualizacion exitosa";
    }
?>