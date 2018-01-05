<?php
include("config.php"); // Incluimos nuestro archivo de conexi�n con la base de datos

if(isset($_POST['submit'])) // Si el boton de "a�adir" fu� presionado ejecuta el resto del c�digo
{
    
    //////////////////////////////////

    /////////////////////////////////////

    

    $titulo = ($_POST['titulo']); // Recibimos el valor del <input name="titulo"...
    

    if(!empty($titulo)) // Comprobamos que los valores recibidos no son NULL
    {
        $query_NuevaNoticia = mysqli_query($con,"INSERT INTO imagenes SET texto = '".$titulo."'   "); // Realizamos una consulta a la base de datos para insertar la nueva notica

        if($query_NuevaNoticia)
        {
            echo 'La imagen se agrego correctamente a la base de datos.'; // Si el registro (la noticia) se insert� en la base de datos, mostramos este mensaje

            $consulta_noticias = "SELECT * FROM imagenes";
            $rs_noticias = mysqli_query($con,$consulta_noticias);
            $total = mysqli_num_rows($rs_noticias);
        }
        else
        {
            echo 'La imagen no pudo ser insertada en la base de datos'; // Si el registro (la noticia) no se insertó en la base de datos, mostramos este mensaje
        }
    }
    else
    {
        echo 'Los campos no pueden estar vacios. Rellenalos para insertar la imagen en la base de datos'; // Si los valores recibidos por los campos de texto est�n vacios, no inserta el registro y muestra este mensaje
    }
}

?>

<form action="agregarf.php" method="post" enctype="multipart/form-data"> <!-- Creamos el formulario, utilizando la etiqueta form, cuyo atributo action="" indicar� donde se procesar� el formulario -->
    Texto de la imagen: <input name="titulo" type="text" /> <br />
    Imagen : <input type="file" name="archivo" id="archivo"><br>
    Miniatura : <input type="file" name="miniatura" id="miniatura">
    <br>
     <input type="submit" name="submit" value="Agregar Imagen" />
    
</form>
<a href="galeria.php">Volver a inicio</a>


<?php

if (isset($_POST['submit'])) {
    # code...

$directorio = 'images/';
$nombre = $total.".jpg";
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio . $nombre))
{
    print "El archivo fue subido con exito.";
}
else
{
    print "Error al intentar subir el archivo.";
}


$directorio = 'images/thumbs/';
if (move_uploaded_file($_FILES['miniatura']['tmp_name'], $directorio . $nombre))
{
    print "El archivo thumbs fue subido con exito.";
}
else
{
    print "Error al intentar subir el archivo thumb.";
}


}
?>
