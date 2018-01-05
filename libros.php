<!DOCTYPE HTML>
<!--
	Massively by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Enrique Hasbun</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		
		<link rel="stylesheet" href="cardgrid/css/style.css">
		
								
	</head>
	<body class="is-loading">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">


				
					<div id="intro" class="bgimg">
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
							<li class="active"><a href="libros.html">Libros</a></li>
							<li><a href="poema.php">Poemas</a></li>
						</ul>
						<ul class="icons">
							<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							

						</ul>
					</nav>

				<!-- Main -->


					<div id="main">
						<div class="cards">
							<?php 
							include("config.php"); 


							$libros = mysqli_query($con,"SELECT * FROM libros order by fecha DESC "); // Ejecutamos la consulta

    						while($row=mysqli_fetch_array($libros))
    						{




							echo '
							<table>
							<tr>
								<td>'.$row["titulo"].'</td>
								
								
							</tr>
							<tr>
								<td><img src="libros/'.$row["id"].'.jpg" width="298" height="359" /></td>
							</tr>
							<tr>
								<td>'.$row["texto"].'</td>
							</tr>
							
							</table>
						  ';
						  }
					?>


						  </div>



								
					</div>

				<!-- Footer -->
					

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