<?php
include("config.php"); // Incluimos nuestro archivo de conexi�n con la base de datos

if(isset($_POST['submit'])) // Si el boton de "a�adir" fu� presionado ejecuta el resto del c�digo
{
    
    //////////////////////////////////

    /////////////////////////////////////

    

    $titulo = ($_POST['titulo']); // Recibimos el valor del <input name="titulo"...
    $texto = ($_POST['texto']);   // Recibimos el valor de la <textarea

    if(!empty($titulo) && !empty($texto)) // Comprobamos que los valores recibidos no son NULL
    {
        $query_NuevaNoticia = mysqli_query($con,"INSERT INTO poemas SET titulo = '".$titulo."', fecha = NOW(),texto = '".$texto."'   "); // Realizamos una consulta a la base de datos para insertar la nueva notica

        if($query_NuevaNoticia)
        {
            echo 'El poema se agrego correctamente a la base de datos.'; // Si el registro (la noticia) se insert� en la base de datos, mostramos este mensaje

            $consulta_noticias = "SELECT * FROM poemas";
            $rs_noticias = mysqli_query($con,$consulta_noticias);
            $total = mysqli_num_rows($rs_noticias);
        }
        else
        {
            echo 'El poema no pudo ser insertada en la base de datos'; // Si el registro (la noticia) no se insertó en la base de datos, mostramos este mensaje
        }
    }
    else
    {
        echo 'Los campos no pueden estar vacios. Rellenalos para insertar el poema en la base de datos'; // Si los valores recibidos por los campos de texto est�n vacios, no inserta el registro y muestra este mensaje
    }
}

?>

<form action="agregarp.php" method="post" enctype="multipart/form-data"> <!-- Creamos el formulario, utilizando la etiqueta form, cuyo atributo action="" indicar� donde se procesar� el formulario -->
    Titulo del Poema: <input name="titulo" type="text" /> <br />
    Imagen del Poema  <input type="file" name="archivo" id="archivo">
    <br>

    Texto:  <textarea name="texto"></textarea> <br />
    <input type="submit" name="submit" value="Agregar Poema" />
</form>
<a href="poema.php">Volver a inicio</a>


<?php

if (isset($_POST['submit'])) {
    # code...

$directorio = 'poemas/';
$nombre = $total.".jpg";
if (move_uploaded_file($_FILES['archivo']['tmp_name'], $directorio . $nombre))
{
    print "El archivo fue subido con exito.";
}
else
{
    print "Error al intentar subir el archivo.";
}


}
?>
