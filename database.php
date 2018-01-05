<?php 
// Realizamos la conexión con la base de datos 
  
$db_host = "localhost";                    // Servidor donde está alojada la base de datos
$db_name = "CatBank";                    // Nombre de la base de datos
$db_user = "root";                    // Usuario de la base de datos
$db_password = "";                // Contraseña de la base de datos
$db_table = "noticia";           // Nombre de la tabla de la base de datos
$conexion = mysqli_connect($db_host, $db_user, $db_password) or die("No se ha podido realizar la conexión con la base de datos. Error: ".mysql_error());
mysqli_select_db( $conexion,$db_name); 
  
?>