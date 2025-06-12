<html> 
  <head> 
    <title>Baja ciudad</title> 
  </head> 
  <body> 
    <?php   include("conexion.inc"); 
    //Captura datos desde el Form anterior 
    $vCiudad = $_POST['ciudad']; 
    $vSql = "SELECT * from ciudades where ciudad = '$vCiudad'";
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link)); 
    $vLaCiudad = mysqli_fetch_assoc($vResultado); 
    if(mysqli_num_rows($vResultado) == 0){         
      echo ("Ciudad Inexistente...!!! <br>");        
      echo ("<A href='FormBajaIni.html'>Continuar</A>"); 
    } else{  //Arma la instrucción SQL y luego la ejecuta 
      $id = $vLaCiudad['idciudades'];
      $vSql = "DELETE from ciudades where idciudades = $id";
      $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link)); 
      if ($vResultado) {  
        echo ("La ciudad fue borrada con exito<br>");        
        echo ("<A href='Menu.html'>VOLVER AL  ABM</A>"); 
      }
    }
    mysqli_free_result($vResultado);
    mysqli_close($link);
    ?>
  </body>
</html>