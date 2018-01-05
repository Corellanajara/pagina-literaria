<?php 
include("config.php"); // Incluimos nuestro archivo de conexión con la base de datos
if(isset($_POST['submit'])) // Si el boton de "añadir" fué presionado ejecuta el resto del código
{ 

    //////////////////////////////////
    
    /////////////////////////////////////



    $titulo = ($_POST['titulo']); // Recibimos el valor del <input name="titulo"...
    $texto = ($_POST['texto']);   // Recibimos el valor de la <textarea name="titulo"...
    $fecha = $_POST['date'];
    echo "fecha :".$fecha;
    $categoria = ($_POST['categoria']);
    if(!empty($titulo) && !empty($texto)) // Comprobamos que los valores recibidos no son NULL
    { 
        $query_NuevaNoticia = mysqli_query($con,"INSERT INTO noticias SET titulo = '".$titulo."', fecha = '".$fecha."' ,texto = '".$texto."' ,categoria = '".$categoria."'  "); // Realizamos una consulta a la base de datos para insertar la nueva notica
  
        if($query_NuevaNoticia) 
        { 
            echo 'La noticia se agrego correctamente a la base de datos.'; // Si el registro (la noticia) se insertó en la base de datos, mostramos este mensaje
            include("config.php");
            $consulta_noticias = "SELECT * FROM noticias";
            $rs_noticias = mysqli_query($con,$consulta_noticias);
            $total = mysqli_num_rows($rs_noticias);
        } 
        else 
        { 
            echo 'La noticia no pudo ser insertada en la base de datos'; // Si el registro (la noticia) no se insertó en la base de datos, mostramos este mensaje
        } 
    } 
    else 
    { 
        echo 'Los campos no pueden estar vacios. Rellenalos para insertar la noticia en la base de datos'; // Si los valores recibidos por los campos de texto están vacios, no inserta el registro y muestra este mensaje
    } 
} 
  
?> 
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script>
$( function() {
$( "#datepicker" ).datepicker({
        format: "dd/mm/yyyy",
        clearBtn: true,
        language: "es",
        autoclose: true,
        keyboardNavigation: false,
        todayHighlight: true
    });              
} );
</script>

<form action="nueva_noticia.php" method="post" enctype="multipart/form-data"> <!-- Creamos el formulario, utilizando la etiqueta form, cuyo atributo action="" indicará donde se procesará el formulario --> 
    Titulo de la nueva noticia: <input name="titulo" type="text" /> <br />    
    Imagen de la noticia<input type="file" name="archivo" id="archivo">
    <br>
    Date: <input type="text" name="date" id="datepicker">
    <p>
    <label>Categor&iacute;a 
    <select name="categoria" id="categoria">
      <option>Exposicion</option>
      <option>Evento</option>
      <option>Lanzamiento</option>
      <option>Arte</option>
      <option>Otros</option>
    </select>
    </label>
  </p>

    Texto de la noticia:  <textarea name="texto"></textarea> <br /> 
    <input type="submit" name="submit" value="Agregar noticia" />
</form>
<a href="pagina.php">Volver a inicio</a>


<?php
 
if (isset($_POST['submit'])) {
    # code...

$directorio = 'uploads/'; 
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