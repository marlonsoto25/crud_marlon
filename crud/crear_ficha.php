<!DOCTYPE html>
<html lang="es">
<head>
    <title>crear fichas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
</head>
<body>
    <div id="div1" class="container">
      <br>
        <div id="div2">
            <?php session_start();  if(! empty($_SESSION['tipo_usuario']))  { ?> <img src="IMAGENES/banner3.png"> <?php }  ?>
            <div id="div3" >
                <?php
                if($_SESSION['tipo_usuario']=='ADMINISTRADOR')
                {
              ?>
                 <form id="formulario" role="form" method="post" action="guardado_ficha.php">
                        <div class="col-md-12">
                           <strong class="lgris">ingrese los datos </strong>
                           <br>
                            <label class="lgris">numero de fichas</label>
                             <input class="form-control" style="text-transform: uppercase;" type="number" name="numero" value="" placeholder="numero" required/>

                            <label class="lgris">programa de la ficha</label>
                            <div class="form-group col-xs-2">
                                      <?php

                                         include('funciones.php');
                                             $miconexion=conectar_bd('','sena_bd');
                                             $consulta = "SELECT * FROM programa";
                                             $resultado = mysqli_query ($miconexion, $consulta) or die (mysqli_error($miconexion));
                                
                                        ?>
                                          <select class="form-control" name="programa">
                                             <option value="" selected></option>
                                             <?php while ($opcion = $resultado -> fetch_object()) { ?>
                                             <option value="<?php echo $opcion->progra_id;?>"><?php echo $opcion->progra_nombre;?></option>
                                             <?php } ?>
                                          </select>
                                   </div>              
                                    <br>
                                    <input class="btn btn-primary" type="submit" value="Guardar">
                                    <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
                            </div>
                             
                 </form>
             <?php
               }
                else
                {
                   echo "no tiene permisos para realizar esta accion";
                } 
             ?>
             <br>
            </div>
        </div>
    </div> 
</body>
</html>