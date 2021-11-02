<?php
  include('funciones.php');
     $vnumero=$_POST['numero'];
     $vprograma=$_POST['programa'];


     $miconexion=conectar_bd('', 'sena_bd');
     $resultado=consulta($miconexion,"insert into fichas (ficha_numero,ficha_progra) values ('{$vnumero}','{$vprograma}')");

    if ($resultado)
      {
        echo "Guardado exitoso";
      }
?>
