<?php
	require("php/connection.php");
	session_start();
	$islogin = false;
	if(isset($_SESSION["userid"]) && isset( $_SESSION["pass"])){
		global $islogin;
		$userid = $_SESSION["userid"];
		$query = "SELECT * FROM anggota WHERE id_anggota= '$userid'";
		$login =  query($query);
		$user = mysqli_fetch_assoc($login);
		if(password_verify($_SESSION["pass"], $user["password"])){
			$islogin  = true;
		}else{
			var_dump($user);
		}
	}


?>

<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Title -->
        <title>PlecitPlus</title>
		
		<!-- Favicon -->
        <link rel="icon" href="img/favicon.png">
		<link rel="stylesheet" href="css/main.css">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="css/nice-select.css">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="css/icofont.css">
		<!-- Slicknav -->
		<link rel="stylesheet" href="css/slicknav.min.css">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="css/owl-carousel.css">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="css/datepicker.css">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="css/animate.min.css">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="css/magnific-popup.css">
		
		<!-- Medipro CSS -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">
		
    </head>
    <body>
	
		<!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="loader-outter"></div>
                <div class="loader-inner"></div>

                <div class="indicator"> 
                    <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <!-- End Preloader -->
		
		<!-- Get Pro Button -->
		
	
		<!-- Header Area -->
		<header class="header" >
			<!-- Topbar -->
			
			<!-- End Topbar -->
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class=" logobox col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo pt-2">
									<a href="index.html">PLECIT<span>PLUS</span></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li><a href="#">Home </a></li>
											<li><a href="#">Tabungan </a></li>
											<li><a href="#">Pinjaman </a></li>
											
											<li><a href="contact.html">Contact Us</a></li>
										</ul>
									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>

							<?php if(!$islogin) : ?>
							<div class="col-lg-2 col-12">
								<div class="get-quote ms-5">
									<a href="login.php" class="btn">Login</a>
								</div>
							</div>
							<?php else : ?>
								<div class="col-lg-2 col-12">
								<div class="get-quote ms-5">
									<a href="dashboard.php" class="btn"><?= $user["nama"]?></a>
								</div>
							</div>
							<?php endif ?>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!-- End Header Area -->
		
			<!-- Pricing Table -->
			<section class="pricing-table section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Jenis Pinjaman</h2>
							<img src="img/section-img.png" alt="#">
							<p>kami menyediakan jenis pinjaman yang dapat anda pilih sesuai kebutuhan anda</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont-book"></i>
								</div>
								<h4 class="title">Pinjaman Pelajar</h4>
								
							</div>
							<!-- Table List -->
							<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Bunga sebesar 5%</li>
								<li><i class="icofont icofont-ui-check"></i>Mulai dari 500.000	</li>
								<li><i class="icofont icofont-ui-check"></i>Maksimal hingga 2 juta</li>
								<li><i class="icofont icofont-ui-check"></i>cicilan mulai dari 200.000</li>
							</ul>
							<a href="member/pengajuan_pinjaman.php?kategori=pelajar" class="table-bottom btn">
								pinjaman pelajar
							</a>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
								<i class="icofont-home"></i>
								</div>
								<h4 class="title">Pinjaman KPR</h4>
								
							</div>
							<!-- Table List -->
							<ul class="table-list">
								<li><i class="icofont icofont-ui-check"></i>Bunga sebesar 7%</li>
								<li><i class="icofont icofont-ui-check"></i>Mulai dari 1 juta	</li>
								<li><i class="icofont icofont-ui-check"></i>Maksimal hingga 10 juta</li>
								<li><i class="icofont icofont-ui-check"></i>cicilan mulai dari 1000.000</li>
							</ul>
							<a href="member/pengajuan_pinjaman.php?kategori=keluarga" class="table-bottom btn">
								pinjaman pelajar
							</a>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
								<i class="icofont-cart"></i>
								</div>
								<h4 class="title">Pinjaman Bisnis</h4>
								
							</div>
							<!-- Table List -->
							<ul class="table-list">
							<li><i class="icofont icofont-ui-check"></i>Bunga sebesar 10%</li>
								<li><i class="icofont icofont-ui-check"></i>Mulai dari 5 juta	</li>
								<li><i class="icofont icofont-ui-check"></i>Maksimal hingga 20 juta</li>
								<li><i class="icofont icofont-ui-check"></i>cicilan mulai dari 2000.000</li>
							</ul>
							<a href="member/pengajuan_pinjaman.php?kategori=bisnis" class="table-bottom btn">
								pinjaman pelajar
							</a>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
				</div>	
			</div>	
		</section>	
		<!-- /End Newsletter Area -->
		
		<!-- Footer Area -->
		<footer id="footer" class="footer ">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>About Us</h2>
								<p>Lorem ipsum dolor sit am consectetur adipisicing elit do eiusmod tempor incididunt ut labore dolore magna.</p>
								<!-- Social -->
								<ul class="social">
									<li><a href="#"><i class="icofont-facebook"></i></a></li>
									<li><a href="#"><i class="icofont-google-plus"></i></a></li>
									<li><a href="#"><i class="icofont-twitter"></i></a></li>
									<li><a href="#"><i class="icofont-vimeo"></i></a></li>
									<li><a href="#"><i class="icofont-pinterest"></i></a></li>
								</ul>
								<!-- End Social -->
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer f-link">
								<h2>Quick Links</h2>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Home</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>About Us</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Services</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Our Cases</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Other Links</a></li>	
										</ul>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<ul>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Consuling</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Finance</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Testimonials</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>FAQ</a></li>
											<li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Contact Us</a></li>	
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Open Hours</h2>
								<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>
								<ul class="time-sidual">
									<li class="day">Monday - Fridayp <span>8.00-20.00</span></li>
									<li class="day">Saturday <span>9.00-18.30</span></li>
									<li class="day">Monday - Thusday <span>9.00-15.00</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<div class="single-footer">
								<h2>Newsletter</h2>
								<p>subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
								<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
									<input name="email" placeholder="Email Address" class="common-input" onfocus="this.placeholder = ''"
										onblur="this.placeholder = 'Your email address'" required="" type="email">
									<button class="button"><i class="icofont icofont-paper-plane"></i></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Footer Top -->
			<!-- Copyright -->
			<div class="copyright">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-12">
							<div class="copyright-content">
								<p>© Copyright 2018  |  All Rights Reserved by <a href="https://www.wpthemesgrid.com" target="_blank">wpthemesgrid.com</a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Copyright -->
		</footer>
		<!--/ End Footer Area -->
		
		<!-- jquery Min JS -->
        <script src="js/jquery.min.js"></script>
		<!-- jquery Migrate JS -->
		<script src="js/jquery-migrate-3.0.0.js"></script>
		<!-- jquery Ui JS -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- Easing JS -->
        <script src="js/easing.js"></script>
		<!-- Color JS -->
		<script src="js/colors.js"></script>
		<!-- Popper JS -->
		<script src="js/popper.min.js"></script>
		<!-- Bootstrap Datepicker JS -->
		<script src="js/bootstrap-datepicker.js"></script>
		<!-- Jquery Nav JS -->
        <script src="js/jquery.nav.js"></script>
		<!-- Slicknav JS -->
		<script src="js/slicknav.min.js"></script>
		<!-- ScrollUp JS -->
        <script src="js/jquery.scrollUp.min.js"></script>
		<!-- Niceselect JS -->
		<script src="js/niceselect.js"></script>
		<!-- Tilt Jquery JS -->
		<script src="js/tilt.jquery.min.js"></script>
		<!-- Owl Carousel JS -->
        <script src="js/owl-carousel.js"></script>
		<!-- counterup JS -->
		<script src="js/jquery.counterup.min.js"></script>
		<!-- Steller JS -->
		<script src="js/steller.js"></script>
		<!-- Wow JS -->
		<script src="js/wow.min.js"></script>
		<!-- Magnific Popup JS -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- Counter Up CDN JS -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/bootstrap.min.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>
    </body>
</html>