
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="archivo" id="archivo">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html> 

<?php
 
if (isset($_POST['submit'])) {
	# code...

$directorio = 'uploads/'; 
$nombre = " n1.jpg";
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