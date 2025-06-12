<html> 
  <head> 
    <title>Alta Usuario</title> 
  </head> 
  <body> 
    <?php   include("conexion.inc"); 
    //Captura datos desde el Form anterior 
    $vCiudad = $_POST['Nom']; 
    $vPais = $_POST['pais']; 
    $vHabitantes = $_POST['habitantes']; 
    $vSuperficie = $_POST['superficie']; 
    if ($_POST['tieneMetro'] == 'si') {
      $vTieneMetro = 1;
    } else{
      $vTieneMetro = 0;
    }
    //Arma la instrucción SQL y luego la ejecuta 
    $vSql = "SELECT ciudad FROM ciudades WHERE ciudad='$vCiudad'"; 
    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link)); 
    $vExisteCiudad = mysqli_fetch_assoc($vResultado); 
    //$vExisteCiudad = mysqli_result($vResultado, 0); esta funcion no se usa es por si no tenes algo actualizado

    if ($vExisteCiudad['ciudad'] == $vCiudad){        
      echo ("La ciudad ya Existe<br>");        
      echo ("<A href='Menu.html'>VOLVER AL  ABM</A>"); 
      } else { 
         $vSql = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro)  values ('$vCiudad','$vPais', '$vHabitantes', '$vSuperficie', '$vTieneMetro')";        
        mysqli_query($link, $vSql) or die (mysqli_error($link));       
        echo("La ciudad fue Registrado<br>");        
        echo ("<A href='Menu.html'>VOLVER AL MENU</A>");  
      // Liberar conjunto de resultados  
      mysqli_free_result($vResultado);} 
      // // Cerrar la conexion 
      mysqli_close($link);  
      ?>
    </body>
  </html> 