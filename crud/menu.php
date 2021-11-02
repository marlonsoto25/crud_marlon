<?php
   include('funciones.php');
   session_start();
   if (!isset ($_SESSION['nusuario']))
   {
       $_SESSION['nusuario']=$_POST['usuario'];
       $_SESSION['nclave']=$_POST['clave'];
    }
   $conexion=conectar_bd('', 'sena_bd');
   $resultado=consulta($conexion,"select * from usuarios where usua_nomuser='{$_SESSION['nusuario']}' and usua_contra='{$_SESSION['nclave']}'");
?>
<!doctype html>
<html>
<head>
<title>Menu principal</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="miscss/estilos.css" rel="stylesheet">
        <script src="js/bootstrap.js"></script>
</head>
<body>
  <div id="div1" class="container">
        <br>
        <div id="div2">
            <?php if($resultado->num_rows>0) { ?> <img src="IMAGENES/banner2.png"> <?php } ?>
            
            <div id="div3" >
                  <?php
                        if($resultado->num_rows>0)
                           {
                              $fila=$resultado->fetch_object();
                               $_SESSION['tipo_usuario']=$fila->usua_tipo;
                     ?>
                                    <h1><label class="lgris">BIENVENIDO <?php echo $_SESSION['nusuario'] ?></label><h1> <br>
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='registro_aprendiz.php'" value="Registro de Aprendices">
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='consulta_aprendiz.php'" value="Consulta de Aprendices">
                                    <br>
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='modificar_aprendiz.php'" value="Actualizacion de Aprendices">
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='borrar_aprendiz.php'" value="Borrar Aprendices">
                                    <br>
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='crear_programa.php'" value="Crear Programa">
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='consultar_programa.php'" value="Consultar Programa">
                                    <br>
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='modificar_programa.php'" value="Modificar Programa">
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='borrar_programa.php'" value="Eliminar Programa">
                                    <br>
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='crear_ficha.php'" value="Crear Ficha">
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='consultar_ficha.php'" value="Consultar Ficha">
                                    <br>
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='modificar_ficha.php'" value="Modificar Ficha">
                                    <input style="width:40%;" class="btn btn-danger" type="button" onclick="location.href ='borrar_ficha.php'" value="Eliminar Ficha">
                        <?php
                            }
                            else
                           {
                              echo "usuario o clave invalido";
                           }
                           $conexion->close();
                        ?><br><br>
             </div> 
             
          </div>   
    </div>
</body>
</html>         