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
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

	<title>Nusantara Explore Tour</title>
</head>

<style>
	/* ==== LAYANAN KAMI ==== */
	.feature-1 {
		background: #fff;
		padding: 20px;
		margin-bottom: 20px;
		border-radius: 12px;
		box-shadow: 0 4px 12px rgba(0,0,0,0.1);
		transition: all 0.3s ease;
	}
	.feature-1:hover {
		transform: translateY(-5px);
		box-shadow: 0 8px 18px rgba(0,0,0,0.2);
	}

	/* ==== DESTINASI POPULER ==== */
	.media-thumb {
		position: relative;
		overflow: hidden;
		border-radius: 12px;
	}
	.media-thumb img {
		transition: transform 0.4s ease;
	}
	.media-thumb:hover img {
		transform: scale(1.1);
	}
	.media-thumb .media-text {
		position: absolute;
		bottom: 0;
		left: 0;
		right: 0;
		background: rgba(0,0,0,0.6);
		color: white;
		padding: 10px;
		text-align: center;
		transform: translateY(100%);
		transition: transform 0.4s ease;
	}
	.media-thumb:hover .media-text {
		transform: translateY(0);
	}

		.counter-wrap {
		text-align: center;
		background: white;
		padding: 20px;
		border-radius: 12px;
		box-shadow: 0 4px 12px rgba(0,0,0,0.05);
	}
	.counter span {
		font-size: 2rem;
		font-weight: bold;
		color: #ff5722;
	}

	/* HERO SLIDES FIX */
.slides {
    position: relative;
    width: 100%;
    height: 350px; /* Bisa sesuaikan tinggi header */
    border-radius: 12px;
    overflow: hidden;
}

.slide-img {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;     /* 🔥 gambar selalu isi penuh */
    background-position: center; /* tengah fokus */
    background-repeat: no-repeat;
    opacity: 0;
    transition: opacity 0.6s ease;
}

.slide-img.active {
    opacity: 1;
    z-index: 1;
}

/* Atur posisi tombol navigasi Owl Carousel */
.paket-slider .owl-nav {
    position: absolute;
    top: 40%;              /* posisi vertikal (tengah gambar) */
    left: 0;
    right: 0;
    width: 100%;
    display: flex;
    justify-content: space-between; /* tombol kiri & kanan */
    transform: translateY(-50%);
    pointer-events: none; /* supaya area transparan tidak menghalangi klik */
}

.paket-slider .owl-nav button {
    background: rgba(0, 0, 0, 0.5) !important; /* latar tombol semi transparan */
    color: #fff !important;
    font-size: 1.8rem !important;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: all; /* tombol tetap bisa diklik */
    transition: background 0.3s ease;
}

.paket-slider .owl-nav button:hover {
    background: rgba(0, 0, 0, 0.8) !important;
}


</style>
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
		<a href="/home" class="logo m-0">Nusantara Explore Tour</a>
		
		<!-- NAV MENU -->
		<ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
			<li class="{{ request()->is('home') ? 'active' : '' }}"><a href="{{ url('/home') }}">Home</a></li>
			<li><a href="{{ url('/service') }}">Services</a></li>
			<li><a href="{{ url('/tour') }}">Tour</a></li>
			<li><a href="{{ url('/about') }}">About</a></li>
			<li><a href="{{ url('/contactus') }}">Contact Us</a></li>

			@if(session()->has('id'))
			<li class="has-children">
				<a href="#"><i class="bi bi-person-circle"></i> Hi, {{ session('name') ?? 'User' }}</a>
				<ul class="dropdown">
				<li><a href="{{ url('/profile') }}">Profile</a></li>
				<li><a href="{{ url('/logout') }}">Logout</a></li>
				</ul>
			</li>
			@else
			<li><a href="{{ url('/login') }}">Login</a></li>
			@endif
		</ul>

		<!-- HAMBURGER (selalu tampil di layar kecil) -->
		<a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
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
					
					<!-- About -->
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">About Tour</h3>
							<p>
								PT Nusantara Explore adalah perusahaan perjalanan wisata yang menyediakan berbagai pilihan paket tour ke destinasi terkenal di seluruh Indonesia, mulai dari Sabang hingga Merauke. Kami melayani wisata alam, budaya, sejarah, petualangan, dan edukasi.
							</p>
						</div>
						<div class="widget">
							<ul class="list-unstyled social">
								<li><a href="https://instagram.com" target="_blank"><span class="icon-instagram"></span></a></li>
								<li><a href="https://facebook.com" target="_blank"><span class="icon-facebook"></span></a></li>
							</ul>
						</div>
					</div>

					<!-- Pages -->
					<div class="col-md-6 col-lg-2 pl-lg-5">
						<div class="widget">
							<h3 class="heading">Pages</h3>
							<ul class="links list-unstyled">
								<li><a href="/home">Home</a></li>
								<li><a href="/about">About</a></li>
								<li><a href="/contactus">Contact</a></li>
								<li><a href="/service">Services</a></li>
								<li><a href="/tour">Tours</a></li>
							</ul>
						</div>
					</div>

					<!-- Resources -->
					<div class="col-md-6 col-lg-2">
						<div class="widget">
							<h3 class="heading">Resources</h3>
							<ul class="links list-unstyled">
								<li><a href="/tour">Tour Packages</a></li>
								<li><a href="/booking">Booking</a></li>
								<li><a href="/invoice/1">Invoice</a></li>
							</ul>
						</div>
					</div>

					<!-- Contact -->
					<div class="col-md-6 col-lg-4">
						<div class="widget">
							<h3 class="heading">Contact</h3>
							<ul class="list-unstyled quick-info links">
								<li class="email"><a href="mailto:nusantaraexplore@gmail.com">nusantaraexplore@gmail.com</a></li>
								<li class="phone"><a href="tel:+6281234567890">+62-812-3456-7890</a></li>
								<li class="address">
									<a href="https://www.google.com/maps/place/Jl.+Soekarno+Hatta+No.123,+Sepang+Jaya,+Kec.+Kedaton,+Kota+Bandar+Lampung,+Lampung+35136"
									target="_blank">
										Jl. Soekarno Hatta No.123, Bandar Lampung, Lampung
									</a>
								</li>
							</ul>
						</div>
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
	<script>
		$(function() {
			var slides = $('.slides');
			var images = slides.find('.slide-img');

			var daerahList = images.map(function() {
				return $(this).data('daerah');
			}).get();

			var descriptions = {};
			images.each(function() {
				descriptions[$(this).data('daerah')] = $(this).data('deskripsi');
			});

			images.each(function(i) {
				$(this).attr('data-id', i + 1);
			});

			var typed = new Typed('.typed-words', {
				strings: daerahList.map(d => d + "."),
				typeSpeed: 80,
				backSpeed: 80,
				backDelay: 4000,
				startDelay: 1000,
				loop: true,
				showCursor: true,
				preStringTyped: (arrayPos, self) => {
					arrayPos++;
					$('.slides .slide-img').removeClass('active');
					$('.slides .slide-img[data-id="'+arrayPos+'"]').addClass('active');

					const currentPlace = self.strings[arrayPos - 1].replace('.', '');
					let desc = descriptions[currentPlace] || '';

					// Batasi deskripsi maksimal 150 karakter
					const maxLength = 150;
					if(desc.length > maxLength) {
						desc = desc.substring(0, maxLength) + '...';
					}

					$('#location-description').text(desc);
				}
			});
		});
		
		$('.paket-slider').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		navText: ["<", ">"], // 🔥 tombol kiri kanan
		dots:false,
		autoplay:true,
		autoplayTimeout:4000,
		responsive:{
			0:{items:1},
			576:{items:2},
			768:{items:3},
			992:{items:4}
		}
		});
	</script>

	<script src="/assets/js/custom.js"></script>

</body>

</html>
