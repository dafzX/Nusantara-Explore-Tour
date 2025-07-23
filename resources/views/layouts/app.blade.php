<!-- /*
* Template Name: Tour
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="/assets/images/favicon.jpeg">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&family=Source+Serif+Pro:wght@400;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/assets/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/assets/fonts/icomoon/style.css">
  <link rel="stylesheet" href="/assets/fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="/assets/css/daterangepicker.css">
  <link rel="stylesheet" href="/assets/css/aos.css">
  <link rel="stylesheet" href="/assets/css/style.css">

  <title>Nusantara Explore Tour</title>
</head>

<body>


  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
    <div class="container">
      <div class="site-navigation">
        <a href="/home" class="logo m-0">Nusantara Explore Tour<span class="text-primary"></span></a>

        <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
          <li><a href="/home">Home</a></li>
          <li><a href="/service">Services</a></li>
		  <li><a href="/tour">Tour</a></li>
          <li><a href="/about">About</a></li>
          <li><a href="/contactus">Contact Us</a></li>
        </ul>

        <a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light" data-toggle="collapse" data-target="#main-navbar">
          <span></span>
        </a>

      </div>
    </div>
  </nav>

  @yield('konten')

	<div class="site-footer">
		<div class="inner first">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">About Tour</h3>
							<p>PT Nusantara Explore adalah perusahaan perjalanan wisata yang menyediakan berbagai pilihan paket tour ke destinasi terkenal di seluruh Indonesia, mulai dari Sabang hingga Merauke. Kami melayani wisata alam, budaya, sejarah, petualangan, dan edukasi.</p>
						</div>
						<div class="widget">
							<ul class="list-unstyled social">
								<!-- <li><a href="#"><span class="icon-twitter"></span></a></li> -->
								<li><a href="#"><span class="icon-instagram"></span></a></li>
								<li><a href="#"><span class="icon-facebook"></span></a></li>
								<!-- <li><a href="#"><span class="icon-linkedin"></span></a></li>
								<li><a href="#"><span class="icon-dribbble"></span></a></li>
								<li><a href="#"><span class="icon-pinterest"></span></a></li>
								<li><a href="#"><span class="icon-apple"></span></a></li>
								<li><a href="#"><span class="icon-google"></span></a></li> -->
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2 pl-lg-5">
						<div class="widget">
							<h3 class="heading">Pages</h3>
							<ul class="links list-unstyled">
								<li><a href="#">Blog</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-2">
						<div class="widget">
							<h3 class="heading">Resources</h3>
							<ul class="links list-unstyled">
								<li><a href="#">Blog</a></li>
								<li><a href="#">About</a></li>
								<li><a href="#">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">Contact</h3>
							<ul class="list-unstyled quick-info links">
								<li class="email"><a href="#">nusantaraexplore@gmail.com</a></li>
								<li class="phone"><a href="#">+62-812-3456-7890</a></li>
								<li class="address"><a href="#">Jl. Soekarno Hatta No.123, Bandar Lampung, Lampung</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>



		<div class="inner dark">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-8 mb-3 mb-md-0 mx-auto">
						<p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. Nusantara Explore.
						</p>
					</div>
					
				</div>
			</div>
		</div>
	</div>

  <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>

  <script src="/assets/js/jquery-3.4.1.min.js"></script>
  <script src="/assets/js/popper.min.js"></script>
  <script src="/assets/js/bootstrap.min.js"></script>
  <script src="/assets/js/owl.carousel.min.js"></script>
  <script src="/assets/js/jquery.animateNumber.min.js"></script>
  <script src="/assets/js/jquery.waypoints.min.js"></script>
  <script src="/assets/js/jquery.fancybox.min.js"></script>
  <script src="/assets/js/aos.js"></script>
  <script src="/assets/js/moment.min.js"></script>
  <script src="/assets/js/daterangepicker.js"></script>

  <script src="/assets/js/typed.js"></script>
  
  <script src="/assets/js/custom.js"></script>

</body>

</html>
