<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Poemas</title>
	
</head>
<body>
	












<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Massively by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/noscript.css" />
							
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->
					<div id="intro">
						<p style="font-size: 80px">Enrique Hasbún</p>
						<p>Escritor - Poeta - 
Dramaturgo.</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="poema.php" class="logo">Vive La Poesía</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li ><a href="index.html">Biografia</a></li>
							<li><a href="pagina.php">Noticias</a></li>
							<li><a href="galeria.php">Galeria</a></li>
							<li><a href="libros.php">Libros</a></li>
							<li class="active"><a href="poema.php">Poemas</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							

						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						
							
									<?php 
error_reporting(E_ALL ^ E_NOTICE);
include ("config.php");

	 ?>
<?php 
$url = "poema.php";

$consulta_noticias = "SELECT * FROM poemas";

$rs_noticias = mysqli_query( $con,$consulta_noticias);

$num_total_registros = mysqli_num_rows($rs_noticias);


if ($num_total_registros > 0) {
	//Limito la busqueda
	$TAMANO_PAGINA = 4;
        $pagina = false;

	//examino la pagina a mostrar y el inicio del registro a mostrar
        if (isset($_GET["pagina"]))
            $pagina = $_GET["pagina"];
        
	if (!$pagina) {
		$inicio = 0;
		$pagina = 1;
	}
	else {
		$inicio = ($pagina - 1) * $TAMANO_PAGINA;
	}
	//calculo el total de paginas
	$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA);

	

	$query_noticias = mysqli_query($con,"SELECT * FROM poemas order by fecha DESC LIMIT ".$inicio."," . $TAMANO_PAGINA); // Ejecutamos la consulta
    $limite = 100; // Número de carácteres a mostrar antes de el "Leer más"
    while($row=mysqli_fetch_array($query_noticias))
{
?>
<article class="post featured">
<?php
echo "<br><h2>"; 
echo $row['titulo']; 
echo "<br></h2>";  
echo '<img src="poemas/'.$row['id'].'.jpg" height="800" width="600" > ';				
echo "<br>"; 
echo $row['texto'];
echo "<br>";
echo "<br>";
?>
</article>
<?php 
    } 

	echo '<p>';
		
	if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="images/izq.png" height="42" width="42" border="0"></a>';
		for ($i=1;$i<=$total_paginas;$i++) {
			if ($pagina == $i)
				//si muestro el �ndice de la p�gina actual, no coloco enlace
				echo $pagina;
			else
				//si el �ndice no corresponde con la p�gina mostrada actualmente,
				//coloco el enlace para ir a esa p�gina
				echo '  <a href="'.$url.'?pagina='.$i.'">'.$i.'</a>  ';
		}
		if ($pagina != $total_paginas)
			echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="images/der.png" height="42" width="42" border="0"></a>';
	}
	echo '</p>';
	
}
 ?>

								


					</div>
				<!-- Copyright -->
					<div id="copyright">
						<ul><li><h3>&copy; Cristopher Orellana</h3></li></ul>
						Design: HTML5 UP
					</div>

			</div>
			
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			
	</body>
</html>



