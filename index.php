
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
	
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			
			<!--<a href="#" class="navbar-brand text-style">FuraŻarcia</a>-->
			<img src="images/furalogo.png" style="width: 50px; height:100%; margin-top:5px; margin-bottom:5px; opacity:0.8;"  class="img-responsive center-block" alt="team img">
		</div>
		<div class="collapse navbar-collapse" id="navbar">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothscroll">START</a></li>
				<li><a href="#gallery" class=" smoothscroll">GALERIA</a></li>
				<li><a href="#menu" class=" smoothscroll">MENU</a></li>
				<li><a href="#team" class="smoothscroll">AKTUALNOŚCI I WYDARZENIA</a></li>
				<li><a href="#contact" class=" smoothscroll">KONTAKT</a></li>
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

	<img src="images/home-bg333.jpg" style="width:100%;">
	
</sectio>
	

<div id="social-links" class="social-links-style">

	<ul class="social-icon">

		<li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="0.3s"></a></li>
		<br/>
		<li><a href="#" class="fa fa-instagram wow fadeInUp" data-wow-delay="0.6s"></a></li>
		</br>
		<li><a href="#" class="fab fa-facebook-messenger wow fadeInUp" data-wow-delay="0.9s"></a></li>
		
	</ul>

</div>


<!-- gallery section -->
<section id="gallery" >
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1>Galeria</h1>
				<hr>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<a href="images/food1.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food1.jpg" alt="gallery img"></a>
				
				<a href="images/food2.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food2.jpg" alt="gallery img"></a>
				
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<a href="images/food3.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food3.jpg" alt="gallery img"></a>

				<a href="images/food4.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food4.jpg" alt="gallery img"></a>
				
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<a href="images/food5.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food5.jpg" alt="gallery img"></a>
				
				<a href="images/food6.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food6.jpg" alt="gallery img"></a>
					
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<a href="images/food7.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food7.jpg" alt="gallery img"></a>

				<a href="images/food8.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food8.jpg" alt="gallery img"></a>
				
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<a href="images/food9.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food9.jpg" alt="gallery img"></a>

				<a href="images/food10.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food10.jpg" alt="gallery img"></a>
				
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<a href="images/food11.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food11.jpg" alt="gallery img"></a>

				<a href="images/food12.jpg" data-lightbox-gallery="zenda-gallery"><img src="images/food12.jpg" alt="gallery img"></a>
				
			</div>
		</div>
	</div>
</section>


<!-- menu section -->
<section id="menu" >
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Menu</h1>
				<hr>
			</div>

<?php
        $link = mysqli_connect("localhost", "root", "gitarasiema", "fura_zarcia");

		if (mysqli_connect_error()) {

			die("Błąd bazy");

		}

		$query = "SELECT * FROM menu";  

		$result = mysqli_query($link, $query);

		while($row = mysqli_fetch_array($result)) {
			
			echo '
			<div class="col-md-6 col-sm-6">
				<h4>'.$row['nazwa'].' ................ <span>'.$row['cena'].'</span></h4>
				<h5>'.$row['sklad'].'</h5>
			</div>
			';
		}


?>
		</div>
	</div>
</section>		


<!-- team section -->
<section id="team">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Aktualności i wydarzenia</h1>
				<hr>
			</div>
		<!-- 	<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<img src="images/team1.jpg" class="img-responsive center-block" alt="team img">
				<h4>Thanya</h4>
				<h3>Main Chef</h3>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<img src="images/team2.jpg" class="img-responsive center-block" alt="team img">
				<h4>Lynda</h4>
				<h3>Pizza Specialist</h3>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<img src="images/team3.jpg" class="img-responsive center-block" alt="team img">
				<h4>Jenny Ko</h4>
				<h3>New Baker</h3>
			</div>
		</div> -->
	</div>
</section>


<!-- contact section -->
<section id="contact" >
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1 class="heading">Aktulanie jestem tutaj:</h1>
				<hr>
			</div>

			<div class="col-12"> 
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155798.00058415037!2d16.761584517776623!3d52.40044577036019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470444d2ece10ab7%3A0xa4ea31980334bfd1!2zUG96bmHFhA!5e0!3m2!1spl!2spl!4v1598343255851!5m2!1spl!2spl" 
			width="100%" height="450" frameborder="0" style="border: black 4px dashed;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
			<!--<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
				<form action="#" method="post">
					<div class="col-md-6 col-sm-6">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
				  </div>
					<div class="col-md-6 col-sm-6">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email">
				  </div>
					<div class="col-md-12 col-sm-12">
						<textarea name="message" rows="8" class="form-control" id="message" placeholder="Message"></textarea>
					</div>
					<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="make a reservation">
					</div>
				</form>
			</div>-->
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>



<!-- footer section -->
<footer >
	<div class="container">
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

</body>
</html>