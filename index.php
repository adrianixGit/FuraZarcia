<?php

session_start();

$link = mysqli_connect("localhost", "root", "gitarasiema", "fura_zarcia");

if (mysqli_connect_error()) {

	die("Błąd bazy");

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Fura Żarcia</title>

	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/nivo-lightbox.css">
	<link rel="stylesheet" href="css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
	<script src="https://kit.fontawesome.com/468278cfc3.js" crossorigin="anonymous"></script>
</head>
<body data-spy="scroll" data-target="#navbar">



<!-- preloader section -->
<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>

<!-- navigation section -->
 <section class="navbar navbar-default navbar-fixed-top" role="navigation" >

 
	
	<div class="container" id="menucontainer">
	<img src="images/logofura.jpg" style="width: 80px; height:60px; "  class="img-responsive center-block" alt="team img">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			
			<!--<a href="#" class="navbar-brand text-style">FuraŻarcia</a>-->
			
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav ">
				<li><a href="#home" class="smoothscroll ">START</a></li>
				<li><a href="#gallery" class=" smoothscroll">GALERIA</a></li>
				<li><a href="#menu" class=" smoothscroll">MENU</a></li>
				<li><a href="#aktualnosci" class=" smoothscroll">AKTUALNOŚCI</a></li>
				<li><a href="#wydarzenia" class="smoothscroll">WYDARZENIA</a></li>
				<li><a href="#godziny" class=" smoothscroll">KONTAKT</a></li>
			</ul>
		</div>
	</div>
</section>


<!-- home section -->
<section id="home" >
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<!-- <img src="images/furalogo222.png" class="img-responsive center-block" alt="team img"> -->
			</div>
	</div>		
</section>

<sectio id="mobile">

	

	<img src="images/home-bg333.jpg" style="width:100%; margin-top:65px;"> 
	
</sectio>
	

<div id="social-links" class="">

	<ul class="social-icon">

		<li><a href="https://pl-pl.facebook.com/furazarcia/videos/d41d8cd9/519090792368074/" class="fa fa-facebook wow fadeInUp" data-wow-delay="0.3s"></a></li>
		<br/>
		<li><a href="https://www.instagram.com/fura_zarcia/"  class="fab fa-instagram wow fadeInUp" data-wow-delay="0.6s"></a></li>
		<br/>
		<li><a href="#lokalizacja"  class="fas fa-map-marker-alt wow fadeInUp" data-wow-delay="0.9s"></a></li>
		
		</li>
	</ul>

		<div id="zamow" class="wow fadeInUp" data-wow-delay="1.2s"><a href="https://pl-pl.facebook.com/furazarcia/videos/d41d8cd9/519090792368074/"  data-toggle="modal" data-target="#modalZamow" data-wow-delay="0.9s"><img src="images/zamowTekst3.png" style="width: 35px; margin-top:10px; margin-left:5px;"></a></div>

</div>

<!-- MODAL -->

<div class="modal fade" id="modalZamow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h2 id="exampleModalLabel">Zamów</h2>
        </button>
      </div>
      <div class="modal-body">
		  
	  	<div id="social-links-modal" class="">
		  	<ul class="social-icon-modal">
			  <li><a href="tel: +48 660 275 874 " class="fa fa-phone wow fadeInUp" data-wow-delay="0.3s"></a></li>
			  <li><a href="https://www.facebook.com/messages/furazarcia"  class="fab fa-facebook-messenger wow fadeInUp" data-wow-delay="0.5s"></a></li>
		 	</ul>  
		</div>	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
      </div>
    </div>
  </div>
</div>


<!-- gallery section -->
<section id="gallery" >
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1>Galeria</h1>
				<hr>
			</div>

			<!-- DODAWANIE ZDJEC Z BAZY -->

				<?php

					$query = 'SELECT * FROM galeria';
					$result = mysqli_query($link, $query);
					while($row = mysqli_fetch_array($result)) {

						echo '
						
						<div class="col-lg-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
						<a href="images/galeria/'.$row['zdjecie'].'" data-lightbox-gallery="zenda-gallery"><img src="images/galeria/'.$row['zdjecie'].'" alt="gallery img"></a>
						</div>

						';


					}


				?>

		</div>
	</div>
</section>


<!-- menu section -->
<section id="menu" >
	<div class="container" >
		<div class="row wow fadeInUp" data-wow-delay="0.6s">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1>Menu</h1>
				<hr>
			</div>

<?php
        

		$query = "SELECT * FROM menu";  

		$result = mysqli_query($link, $query);

		while($row = mysqli_fetch_array($result)) {
			
			echo '
			<div class="col-md-6 col-sm-6">
				<h4>'.$row['nazwa'].' | '.$row['cena'].'</h4>
			
				<h5>'.$row['sklad'].'</h5>
			</div>
			';
		}


?>
		</div>
	</div>
</section>		




<!-- aktualnosci section -->
<section id="aktualnosci" >
	<div class="container">
		<div class="row wow fadeInUp"  data-wow-delay="0.6s">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1>Aktualności</h1>
				<hr>
			</div>

			<?php

				$query = "SELECT * FROM aktualnosci";  

				$result = mysqli_query($link, $query);

				while($row = mysqli_fetch_array($result)) {
						
					echo '
					<div class="col-md-12 col-sm-12">
						<h2>'.$row['naglowek'].'</h2> 
						<span>'.$row['tresc'].'</span>
							
					</div>
						';
					}

			?>
	</div>
	
</section>



<!-- Wydarzenia section -->
<section id="wydarzenia" >
	<div class="container">
		<div class="row wow fadeInUp"  data-wow-delay="0.6s">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1>Wydarzenia</h1>
				<hr>
			</div>
			<?php

				$query = "SELECT * FROM wydarzenia";  

				$result = mysqli_query($link, $query);

				while($row = mysqli_fetch_array($result)) {
					
					echo '
					<div class="col-md-12 col-sm-12">
						<h2>'.$row['naglowek'].'</h2> 
						<span>'.$row['tresc'].'</span>
						
					</div>
					';
				}

			?>
	</div>
	
</section>


<!-- contact section -->
<section id="contact" >
	<div class="container">
		<div class="row wow fadeInUp"  data-wow-delay="0.6s" id="lokalizacja">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1>Aktulanie jestem tutaj:</h1>
				<hr>
			</div>

			<div class="col-12"> 

			<?php

				
				$query = "SELECT * FROM lokalizacja";  

				$result = mysqli_query($link, $query);

				while($row = mysqli_fetch_array($result)) {
					
					echo '
					
					<iframe src="'.$row['lokalizacja'].'" 
					width="100%" height="450" frameborder="0" style="border: #33cc33 4px dashed;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


					';
				}

			?>
			</div>
			
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>



<!-- footer section -->
<footer >
	<div class="container" id="godziny">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Kontakt</h2>
				<div class="ph">
					<p><i class="fa fa-phone"></i> Telefon</p>
					<h4>090-080-0760</h4>
				</div>
				<div class="address">
					<p><i class="fa fa-envelope"></i> E-mail</p>
					<h4>randomowyemail@gmail.com</h4>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-lg-6 wow fadeInUp" data-wow-delay="0.6s">
				<h2 class="heading">Godziny otwarcia</h2>
					<p>Poniedziałek <span>ZAMKNIĘTE</span></p>
					<p>Wtorek <span>17:00 - 20:00</span></p>
					<p>Środa <span>17:00 - 20:00</span></p>
					<p>Czwartek <span>17:00 - 20:00</span></p>
					<p>Piątek <span>17:00 - 20:00</span></p>
					<p>Sobota <span>00:00 - 22:00</span></p>
					<p>Niedziela <span>10:00 - 20:00</span></p>
			</div>
			
		</div>
	</div>
</footer>


<!-- copyright section -->
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
			<img src="images/logofura.jpg" style="width: 100px; "  class="" alt="team img">
			</div>
		</div>
	</div>
</section>

<!-- JAVASCRIPT JS FILES -->	
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.parallax.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/nivo-lightbox.min.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

<script type="text/javascript">

	

</script>


</body>
</html>