<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>

  
</body>
</html>
<form name="form1" method="post" action="">
  <label>T&iacute;tulo
  <input name="titulo" type="text" id="titulo" size="60">
  </label>
  <br />    <br />    
    Imagen de la noticia<input type="file" name="archivo" id="archivo">
    <br>
  <p>
    <label>Categor&iacute;a
    <select name="categoria" id="categoria">
      <option>Deporte</option>
      <option>Ciencia</option>
      <option>Entretenimiento</option>
    </select>
    </label>
  </p>
  <p>
    <label>Noticia <br>
    <textarea name="noticia" cols="60" rows="5" id="noticia"></textarea>
    </label>
  </p>

  <p>
    <label>
    <input name="guardar" type="submit" id="guardar" value="Agregar">
    </label>
  </p>
</form>
<a href="pagina.php">ir a inicio</a>
<?php 
include 'config.php';
$consulta_noticias = "SELECT * FROM noticias";
$rs_noticias = mysqli_query( $con,$consulta_noticias);
$total = mysqli_num_rows($rs_noticias);
?>

<?php 

if ($_POST['guardar'] && $_POST['titulo']) {
$enviar = "INSERT INTO noticias (titulo,categoria,fecha,noticia) values ('".$_POST['titulo']."','".$_POST['categoria']."','".time()."','".$_POST['noticia']."')";

if (@mysql_query($enviar)) { echo "La noticia fue publicada con éxito"; }else{
  echo " no salio bien la wea";
}
}
?>

<?php
 
if (isset($_POST['guardar'])) {
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