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

/* ==== RESPONSIVE INVOICE ==== */
@media (max-width: 768px) {
    .invoice-container {
        padding: 20px;
        margin: 20px auto;
    }

    /* Header: logo + teks jadi kolom */
    .invoice-header {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
    }
    .invoice-header img {
        height: 50px;
        margin-bottom: 10px;
    }
    .invoice-header > div:last-child {
        text-align: left !important;
        margin-top: 10px;
    }

    /* Table teks lebih kecil */
    .table th, .table td {
        font-size: 13px;
        padding: 6px 8px;
    }

    /* Footer tanda tangan vertikal */
    .invoice-footer {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 30px;
    }
    .signature {
        width: 100%;
    }

    /* Tombol aksi */
    .no-print .btn {
        width: 100%;
        font-size: 14px;
    }
}

@media (max-width: 480px) {
    .invoice-container {
        padding: 15px;
    }

    .table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }

    h4, h5 {
        font-size: 14px;
    }

    .invoice-header img {
        height: 40px;
    }

    .fst-italic {
        font-size: 11px;
    }
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.invoice-container {
    max-width: 900px;
    margin: 50px auto;
    padding: 40px 40px; /* Lebih luas supaya tidak mepet */
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.invoice-header {
    border-bottom: 2px solid #0d6efd;
    padding-bottom: 15px;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.invoice-header img {
    margin-right: 15px;
    height: 70px;
}

.table th, .table td {
    vertical-align: middle;
    padding: 8px 12px; /* Lebih lega */
}

.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
}

.invoice-summary {
    margin-top: 25px;
}

.invoice-footer {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
}

.signature {
    width: 45%;
    text-align: center;
}

.fst-italic {
    font-style: italic;
    font-size: 13px;
}

/* ===== PRINT STYLES ===== */
@media print {
    body {
        background: #fff;
        margin: 0;
        padding: 0;
    }

    .invoice-container {
        box-shadow: none;
        border: none;
        margin: 0 auto;
        padding: 30px; /* Tambah padding saat print */
        width: 100%;
    }

    .no-print {
        display: none !important;
    }

    .table th, .table td {
        font-size: 12px;
        padding: 6px 10px;
    }

    h4, h5 {
        font-size: 16px;
    }

    .signature {
        font-size: 12px;
    }
}

</style>
<body>

	@yield('konten')

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
			var images = slides.find('img');

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
					$('.slides img').removeClass('active');
					$('.slides img[data-id="'+arrayPos+'"]').addClass('active');

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
		
		$(document).ready(function(){
		$('.paket-slider').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
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
		});
	</script>

	<script src="/assets/js/custom.js"></script>

</body>

</html>
