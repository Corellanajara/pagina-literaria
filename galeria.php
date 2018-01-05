<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Galeria</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Responsive Image Gallery with jQuery" />
        <meta name="keywords" content="jquery, carousel, image gallery, slider, responsive, flexible, fluid, resize, css3" />
    <meta name="author" content="Codrops" />
    <link rel="shortcut icon" href="favicon.ico"> 
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
      <link rel="stylesheet" href="assets/css/main.css" />
      <link rel="stylesheet" href="assets/css/noscript.css" />
    <link rel="stylesheet" type="text/css" href="source/css/style.css" />
    <link rel="stylesheet" type="text/css" href="source/css/elastislide.css" />
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow&v1' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css' />
    
    <noscript>
      <style>
        .es-carousel ul{
          display:block;
        }
      </style>
    </noscript>

    <script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">  
      <div class="rg-image-wrapper">

        {{if itemsCount > 1}}
          <div class="rg-image-nav">
            <a href="#" class="rg-image-nav-prev">Previous Image</a>
            <a href="#" class="rg-image-nav-next">Next Image</a>
          </div>
        {{/if}}

        <div class="rg-image"></div>
        <div class="rg-loading"></div>
        <div class="rg-caption-wrapper">
          <div class="rg-caption" style="display:none;">
            <p></p>
          </div>
        </div>
      </div>
    </script>

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

          <!-- Nav -->
          <nav id="nav">
            <ul class="links">
              <li ><a href="index.html">Biografia</a></li>
              <li ><a href="pagina.php">Noticias</a></li>
              <li class="active"><a href="#">Galeria</a></li>
              <li><a href="libros.php">Libros</a></li>
              <li><a href="poema.php">Poemas</a></li>
            </ul>
            <ul class="icons">
              <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
              <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
              <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
              

            </ul>
          </nav>
          <div id="main">
        <center>
               <div class="w3-content w3-display-container">

          <div class="container">
            <div class="header">
              
              <div class="clr"></div>
            </div><!-- header -->
            
            <div class="content">
              
              <div id="rg-gallery" class="rg-gallery">
                <div class="rg-thumbs">
                  <!-- Elastislide Carousel Thumbnail Viewer -->
                  <div class="es-carousel-wrapper">
                    <div class="es-nav">
                      <span class="es-nav-prev">Previous</span>
                      <span class="es-nav-next">Next</span>
                    </div>
                    <div class="es-carousel">
                      <ul>
                        
                        <?php 
                        include("config.php");
                        $query = mysqli_query($con,"SELECT * FROM imagenes"); // Ejecutamos la consulta
                    
                      while($row=mysqli_fetch_array($query))
                      {
                        echo '<li>
                        <a href="#"><img src="images/thumbs/'.$row["id"].'.jpg" data-large="images/'.$row["id"].'.jpg" alt="image0'.$row["id"].'" data-description="'.$row["texto"].'" />
                        </a>
                              </li>';
                          } 
                        
                         ?>
                        
                      </ul>
                    </div>
                  </div>
                  <!-- End Elastislide Carousel Thumbnail Viewer -->
                </div><!-- rg-thumbs -->
        </div><!-- rg-gallery -->
      </div>
  </center> 
      </div><!-- content -->


        <!-- Copyright -->
          <div id="copyright">
            <ul><li><h3>&copy; Cristopher Orellana</h3></li></ul>
            
          </div>

      </div>

    </div><!-- container -->

    <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery.scrollex.min.js"></script>
      <script src="assets/js/jquery.scrolly.min.js"></script>
      <script src="assets/js/skel.min.js"></script>
      <script src="assets/js/util.js"></script>
      <script src="assets/js/main.js"></script>
    

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="source/js/jquery.tmpl.min.js"></script>
    <script type="text/javascript" src="source/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="source/js/jquery.elastislide.js"></script>
    <script type="text/javascript" src="source/js/gallery.js"></script>
    </body>
</html>