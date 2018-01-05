<form action="subirimagen.php" method="post" enctype="multipart/form-data"> <!-- Creamos el formulario, utilizando la etiqueta form, cuyo atributo action="" indicará donde se procesará el formulario --> 
    Título de la imagen: <input name="titulo" type="text" /> <br />    
    Imagen<input type="file" name="archivo" id="archivo">
    <br>    
    <input type="submit" name="submit" value="Añadir imagen" />
</form>
<a href="pagina.php">Volver a inicio</a>

<?php
include("config.php");




if (isset($_POST['submit'])) {
    # code...
$titulo = $_POST['titulo'];

$query_NuevaImagen = mysqli_query($con,"INSERT INTO imagenes (texto) values ('".$titulo."')   "); // Realizamos una consulta a la base de datos para insertar la nueva notica
  
        if($query_NuevaImagen) 
        { 
            echo 'La noticia se añadió correctamente a la base de datos.'; // Si el registro (la noticia) se insertó en la base de datos, mostramos este mensaje
            
            $consulta = "SELECT * FROM imagenes";
            $rs_noticias = mysqli_query( $con,$consulta);
            $total = mysqli_num_rows($rs_noticias);
        } else{
        	echo "no se pudo por alguna razon";
        }



$directorio = 'imagenes/'; 
$nombre = $total.".jpg";
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio . $nombre)) 
{ 
    print "El archivo fue subido con éxito."; 
} 
else 
{ 
    print "Error al intentar subir el archivo."; 
} 


}
?>