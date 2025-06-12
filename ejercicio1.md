Consulta a una base de datos: 
Para comenzar la comunicación con un servidor de base de datos MySQL, es necesario abrir una conexión a ese servidor. Para inicializar esta conexión, PHP ofrece la función  mysqli_connect().
Todos sus parámetros son opcionales, pero hay tres de ellos que generalmente son necesarios:
<br>
•	$hostname es un nombre de servidor (dato que debemos consultar en nuestra cuenta de hosting). <br>
•	$nombreUsuario es el nombre de usuario de base de datos, nombre que habremos especificado al crear la base de datos (si no lo hemos hecho, puede ser root). <br>
•	$contraseña es la contraseña de acceso para el usuario de base de datos, contraseña que habremos especificado al crear la base de datos. <br>
Una vez abierta la conexión, se debe seleccionar una base de datos para su uso, mediante la función  mysqli_select_db().
Esta función debe pasar como parámetro :
<br>
•	$nombreConexion el nombre de la conexión será el que hayamos obtenido previamente con la funcion mysqli_connect(). <br>
•	$nombreBaseDatos es el nombre con el que hemos llamado a la base de datos al crearla. <br>
La función mysqli_query () se utiliza para ejecutar una consulta a la base de datos que queramos y requiere como parámetros:
<br>
•	$nombreConexion el nombre de la conexión será el que hayamos obtenido previamente con la funcion mysqli_connect(). <br>
•	$query es la consulta en lenguaje sql. <br>
La cláusula or die() se utiliza para  capturar errores, y la función mysqli_error ($link) se puede usar para devolver el último mensaje de error para la llamada más reciente a una función de MySQLi que puede haberse ejecutado correctamente o haber fallado. Parámetro: $link : un identificador de enlace devuelto por mysqli_connect(). Los posibles valores devueltos son: una cadena que describe el error o una cadena vacía si no ha ocurrido error alguno.
Si la función mysqli_query() es exitosa, el conjunto resultante retornado se almacena en una variable, por ejemplo $vResult, y a continuación se puede ejecutar el siguiente código (explicarlo):
`php
<?php 
while ($fila = mysqli_fetch_array($vResultado))  { 
?> 
<tr> 
<td><?php echo ($fila[0]); ?></td> 
<td><?php echo ($fila[1]); ?></td> 
<td><?php echo ($fila[2']); ?></td> 
</tr>   
<tr> 
<td colspan="5"> 
<?php 
} 
mysqli_free_result($vResultado); 
mysqli_close($link); 
?>
`
Aqui while ($fila = mysqli_fetch_array($vResultado))  se indica que mientras haya una fila que traer entrara al while, $file= mysqli_fetch_array($vResultado) indica que los valores existentes en la fila se introduzcan en un array cuyos índices en principio pueden ser tanto asociativos (el nombre de la columna) como numéricos (empezando por cero).  
Luego se van a mostrar en formato de tabla los valores que se guardaron en el array $fila utilizando el índice numérico. 
Cuando se completa la query se utiliza la función  mysqli_free_result($vResultado)que libera la memoria asociada a un objeto de resultado en PHP, que se crea después de ejecutar una consulta SQL con mysqli_query() o mysqli_real_query(). Esto es crucial para evitar que la memoria se acumule innecesariamente, especialmente cuando se procesan grandes conjuntos de datos. 
Por ultimo, se utiliza mysqli_close($link) para cerrar la conexión con la base de datos. 

