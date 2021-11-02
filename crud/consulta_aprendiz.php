<!doctype html>
<html>
<head>
    <title>consulta de aprendiz</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
</head>
<body>
   <div id="consulta" class="container">
     <br>
     <div id="div2">
       <div id="div4">
             <form name="formulario" role="form" method="POST">
              <div class="col-md-12">
                <strong class="lgris">ingrese criterio de busqueda</strong>
                <br><br>
                <div class="form-row">
                    <div class="form-group col-md-3">
                     <input class="form-control" type="number" name="numid" min="9999" max="9999999999999" value="" placeholder="IDENTIFICACION"/>
                    </div>
                    <div class="form-group col-md-3">
                     <input class="form-control" style="text-transform: uppercase;" type="text" name="nombres" value="" placeholder="nombres"/>
                    </div>
                    <div class="form-group col-md-3">
                     <input class="form-control" style="text-transform: uppercase;" type="text" name="apellidos" value="" placeholder="apellidos"/>
                    </div>
                    <div class="form-group col-md-3">
                     <input class="btn btn-primary" type="submit" value="consultar">
                     <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
                    </div>
                 </div>
                <br>
              </div>
            </form>
            <br>
        </div>
        <div id="divconsulta2">
        <?php
        if ($_SERVER['REQUEST_METHOD']==='POST')
        {
          include('funciones.php');

          $vnumid=$_POST['numid'];
          $vnombres=$_POST['nombres'];
          $vapellidos=$_POST['apellidos'];
          $miconexion=conectar_bd('localhost', '', 'sena_bd');
          $resultado=consulta($miconexion,"select * from aprendices where trim(apre_numid) like '%{$vnumid}%' and (trim(apre_nombres) like '%{$vnombres}%' and trim(apre_apellidos) like '%{$vapellidos}%')");  
          if ($resultado->num_rows>0)
            {
              while ($fila = $resultado->fetch_object())
                {
                  echo $fila->apre_id." ".$fila->apre_tipoid." ".$fila->apre_numid." ".$fila->apre_nombres." ".$fila->apre_apellidos." ".$fila->apre_direccion." ".$fila->apre_telefono." ".$fila->apre_ficha."<br>";
                }
            }
          else{
            echo "no existen registros";
          }
          $miconexion->close();
        }?>
        </div>
       </div>
    </div>
</body>
</html>