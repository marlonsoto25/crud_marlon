<!DOCTYPE html>
<html>
  <head>
    <title>Eliminacion De Fichas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="miscss/estilos.css" rel="stylesheet"/>
    <script src="js/bootstrap.js"></script>
  </head>
  <body>
    <div id="divconsulta" class="container">
       <br>
       <div id="div2">
          <div id="div4">
            <form name="formulario" role="form" method="post">
              <div class="col-md-12">
                <strong class="lgris">Ingrese criterio de busqueda</strong>
                <br><br>
                <div class="form-row">
                 <div class="form-group col-md-5">
                 <input class="form-control" type="number" name="numero" min="9999" max="9999999999" value="" placeholder="Numero" required/>
                 </div>
                   <div class="form-group col-md-3">
                   <input class="btn btn-primary" type="submit" value="Eliminar" >
                   <input style="width: 30%;" class="btn btn-primary" type="button" onclick="location.href ='menu.php'" value="volver">
                   </div>
                </div>
                <br>
              </div>
            </form>
            <br>
          </div>

          <div id="divconsulta">
          <?php
          if ($_SERVER['REQUEST_METHOD']==='POST')
          {
              include('funciones.php');
              $vnombre=$_POST['numero'];
              $miconexion=conectar_bd('', 'sena_bd');
              $resultado=consulta($miconexion,"select * from fichas where ficha_numero='{$vnumero}'");
              $resultado2=consulta($miconexion,"delete from fichas where ficha_numero='{$vnumero}'");
              if($resultado->num_rows>0)
              {
                  $fila = $resultado->fetch_object();
                  echo $fila->ficha_numero." ".$fila->ficha_progra."<br>";
                  if($resultado2)
                  echo "<br> Datos borrados exitosamente";
              }
            else{
                echo "No existen registros";
                }
            $miconexion->close();
          }?>
          </div>
       </div>
    </div>
  </body>
</html>