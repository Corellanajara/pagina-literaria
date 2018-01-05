<!DOCTYPE HTML>
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
						<h1>Enrique hasbún</h1>
						<p>Poesía, Literatura y otros.</p>
						<ul class="actions">
							<li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
						</ul>
					</div>

				<!-- Header -->
					<header id="header">
						<a href="index.html" class="logo">Vive Poesía</a>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li ><a href="index.html">Biografia</a></li>
							<li class="active"><a href="pagina.php">Noticias</a></li>
							<li><a href="#">Galeria</a></li>
							<li><a href="#">Libros</a></li>
							<li><a href="poemas.php">Poemas</a></li>
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
include_once("config.php");

if(isset($_GET['noticia'])) 
{ 
    if(!empty($_GET['noticia'])) // Si el valor de "noticia" no es NULL, continua con el proceso
    { 
        $id_noticia = (int) mysql_real_escape_string($_GET['noticia']);
        $query_noticias = mysql_query("SELECT titulo, fecha, texto FROM poema WHERE id = '".$id_noticia."' LIMIT 1"); // Ejecutamos la consulta
        if(mysql_num_rows($query_noticias) > 0) // Si existe la noticia, la muestra
        { 
            while($columna = mysql_fetch_assoc($query_noticias)) // Realizamos un bucle que muestre todas las noticias, utilizando while.
            { 
                echo ' 
                <table> 
                    <tr> 
                        <td>'.$columna['titulo'].'</td>
                        <td>'.$columna['fecha'].'</td>
          	          </tr> 
                    <tr> 
                        <td>'.$columna['texto'].'</td>
                    </tr> 
                    <tr> 
                        <td><a href="pagina.php">Atrás</a></td> 
                    </tr> 
                </table> 
                '; 
            } 
        } 
        else 
        { 
            echo 'La noticia que solicitas, no existe.'; // Si no, muestra un error
        } 
    } 
    else 
    { 
        echo 'Debes seleccionar una noticia.'; // Si GET no recibe ningún valor, muestra un error
    } 
} else{
$url = "pagina.php";

$consulta_noticias = "SELECT * FROM poema";
$rs_noticias = mysql_query($consulta_noticias, $con);
$num_total_registros = mysql_num_rows($rs_noticias);
//Si hay registros
if ($num_total_registros > 0) {
	//Limito la busqueda
	$TAMANO_PAGINA = 1;
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

	

	$query_noticias = mysql_query("SELECT * FROM poema order by fecha DESC LIMIT ".$inicio."," . $TAMANO_PAGINA); // Ejecutamos la consulta
    $limite = 100; // Número de carácteres a mostrar antes de el "Leer más"
    while($columna = mysql_fetch_assoc($query_noticias)) // Realizamos un bucle que muestre todas las noticias, utilizando while.
    { 
        echo ' 
        <table> 
            <tr> 
                <td colspan="2"><h2>'.$columna['titulo'].'</h2></td> 
                <td><small>'.$columna['fecha'].'</small></td> 
            </tr> 
            <tr> 
                <td colspan="2">'.substr($columna['texto'], 0, $limite).' [...]</td> <!-- Utilizamos la función substr para mostrar un determinado número de carácteres. Ver Ver http://www.php.net/manual/es/function.substr.php --> 
            
                <td colspan="2"><a href="?noticia='.$columna['id'].'">Leer más</a></td> <!-- Incluimos un enlace para leer la noticia entera --> 
            </tr> 
            
        </table> 
        '; 
    } 

	echo '<p>';
		
	if ($total_paginas > 1) {
		if ($pagina != 1)
			echo '<a href="'.$url.'?pagina='.($pagina-1).'"><img src="images/izq.gif" border="0"></a>';
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
			echo '<a href="'.$url.'?pagina='.($pagina+1).'"><img src="images/der.gif" border="0"></a>';
	}
	echo '</p>';
	
}
}
?>
<br>
<a href="nueva_noticia.php">Agregar nuevo poema</a>

								


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




