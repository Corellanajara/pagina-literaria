<?php 
include("database.php"); // Incluimos nuestro archivo de conexión con la base de datos
  
$query_MostrarTitulos = mysql_query("SELECT id, titulo, fecha FROM ".$db_table.""); // Ejecutamos la consulta
  
while($columna_MostrarTitulos = mysql_fetch_assoc($query_MostrarTitulos)) // Realizamos un bucle que muestre todas las noticias, utilizando while.
{ 
    echo '<a href="?noticia='.$columna_MostrarTitulos['id'].'">'.$columna_MostrarTitulos['titulo'].' / '.$columna_MostrarTitulos['fecha'].'</a> <br />';   // Mostramos un enlace para modificar cada noticia
} 
  
if(isset($_POST['modificar'])) // Si el boton de "modificar" fúe presionado ejecuta el resto del código
{ 
    $id = (int) mysql_real_escape_string($_POST['id']);
    $titulo = mysql_real_escape_string($_POST['titulo']);
    $texto = mysql_real_escape_string($_POST['texto']);
  
    $query_modificar = mysql_query("UPDATE ".$db_table." SET titulo = '".$titulo."', fecha = NOW(), texto = '".$texto."' WHERE id = '".$id."'"); // Ejecutamos la consulta para actualizar el registro en la base de datos
  
    if($query_modificar) 
    { 
        echo 'La noticia se modificó corectamente'; // Si la consulta se ejecutó bien, muestra este mensaje
    } 
    else 
    { 
        echo 'La noticia no se modificó'; // Si la consulta no se ejecutó bien, muestra este mensaje
    } 
} 
  
if(isset($_GET['noticia'])) 
{ 
    $id_noticia = (int) mysql_real_escape_string($_GET['noticia']); // Recibimos el id de la noticia por medio de GET
    $query_NoticiaCompleta = mysql_query("SELECT id, titulo, texto FROM ".$db_table." WHERE id = '".$id_noticia."' LIMIT 1"); // Ejecutamos la consulta
    $columna_MostrarNoticia = mysql_fetch_assoc($query_NoticiaCompleta);
    echo ' 
    <form action="modificar_noticia.php" method="post"> <!-- Creamos el formulario, utilizando la etiqueta form, cuyo atributo action="" indicará donde se procesará el formulario --> 
        Título de la noticia: <input name="titulo" type="text" value="'.$columna_MostrarNoticia['titulo'].'" /> <br />
        Texto de la noticia:  <textarea name="texto">'.$columna_MostrarNoticia['texto'].'</textarea> <br />
  
        <input type="hidden" name="id" value="'.$columna_MostrarNoticia['id'].'" /> <!-- Creamos un campo de texto oculto para pasar el id de la noticia --> 
        <input type="submit" name="modificar" value="Modificar noticia" />
    </form> 
    '; 
} 
?>
<a href="pagina.php">Volver a inicio</a>