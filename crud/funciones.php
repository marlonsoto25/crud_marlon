<?php
 function conectar_bd($clave,$basedatos)
  {
       $miconexion=new mysqli('localhost', 'root', '', 'sena_bd');
  
       if ($miconexion->connect_error)
       {
          die('Error de conexion (' . $miconexion->connect_error . ')'. $mysqli->$miconexion->connect_error);
        }
     return $miconexion;
   }
  
 function consulta($miconexion,$consulta_sql)
   {
        $resultado=$miconexion->query($consulta_sql);

        if(!$resultado)
        {
             echo 'no se pudo ejecutar la  consulta: ' . $miconexion->error;
            exit;
        }

    return $resultado;
     }
?>