<?php 
include("database.php"); // Incluimos nuestro archivo de conexión con la base de datos
  
$query_MostrarTitulos = mysql_query("SELECT id, titulo, fecha FROM ".$db_table.""); // Ejecutamos la consulta
  
while($columna_MostrarTitulos = mysql_fetch_assoc($query_MostrarTitulos)) // Realizamos un bucle que muestre los títulos de las noticias, utilizando while.
{ 
    echo $columna_MostrarTitulos['titulo'].' - <a href="?noticia='.$columna_MostrarTitulos['id'].'">Eliminar</a> <br />';  // Mostramos el titulo y un enlace para eliminar la noticia
} 
  
if(isset($_GET['noticia'])) 
{ 
    $id = (int) mysql_real_escape_string($_GET['noticia']);
  
    $query_eliminar = mysql_query("DELETE FROM ".$db_table." WHERE id = '".$id."'"); // Ejecutamos la consulta para eliminar el registro de la base de datos
  
    if($query_eliminar) 
    { 
        echo 'La noticia se eliminó corectamente'; // Si la consulta se ejecutó bien, muestra este mensaje
    } 
    else 
    { 
        echo 'La noticia no se eliminó'; // Si la consulta no se ejecutó bien, muestra este mensaje
    } 
} 
?>
<a href="pagina.php">Volver a inicio</a>