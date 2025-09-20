@extends("layouts/app")
@section("konten")

{{-- Hero Section --}}
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-2 fw-bold">Our Services</h1>
          <p class="text-white fs-5">
            Nusantara Explore Tour menghadirkan paket wisata lengkap — mulai dari tour domestik, tiket transportasi, 
            akomodasi, hingga pemandu profesional. Semua dirancang untuk menghadirkan liburan yang nyaman, aman, 
            dan penuh kenangan.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Keunggulan --}}
<div class="untree_co-section">
  <div class="container">
    <div class="row text-center g-4">
      <div class="col-6 col-md-6 col-lg-3">
        <div class="service p-4 shadow-sm rounded h-100">
          <span class="icon-paper-plane fs-1 text-primary mb-3 d-block"></span>
          <h3 class="fw-bold">Perjalanan Terbaik</h3>
          <p>Pengalaman aman, nyaman, dan menyenangkan dengan destinasi pilihan dan tim profesional.</p>
        </div>
      </div>
      <div class="col-6 col-md-6 col-lg-3">
        <div class="service p-4 shadow-sm rounded h-100">
          <span class="icon-tag fs-1 text-primary mb-3 d-block"></span>
          <h3 class="fw-bold">Destinasi Pilihan</h3>
          <p>Setiap perjalanan penuh kesan, dengan destinasi yang sesuai keinginan dan penuh cerita.</p>
        </div>
      </div>
      <div class="col-6 col-md-6 col-lg-3">
        <div class="service p-4 shadow-sm rounded h-100">
          <span class="icon-user fs-1 text-primary mb-3 d-block"></span>
          <h3 class="fw-bold">Momen Tak Terlupakan</h3>
          <p>Menciptakan momen berharga di setiap perjalanan yang akan selalu dikenang.</p>
        </div>
      </div>
      <div class="col-6 col-md-6 col-lg-3">
        <div class="service p-4 shadow-sm rounded h-100">
          <span class="icon-support fs-1 text-primary mb-3 d-block"></span>
          <h3 class="fw-bold">Dukungan 24/7</h3>
          <p>Siap membantu kapan saja, agar perjalanan Anda lancar tanpa hambatan.</p>
        </div>
      </div>
    </div>
  </div>
</div>

	<div class="untree_co-section">
		<div class="container">
			<div class="row mb-5 justify-content-center" >
				<div class="col-lg-6 text-center">
					<h2 class="section-title text-center mb-3 ">Layanan Kami</h2>
					<p>Menyediakan paket tour ke destinasi terkenal di Indonesia, mulai dari wisata alam, budaya, sejarah, petualangan, hingga edukasi. Jelajahi Indonesia bersama kami! 🌏✈️ </p>
				</div>
			</div>
			<div class="row align-items-stretch">
				<div class="col-lg-4 order-lg-1">
					<div class="h-100"><div class="frame h-100"><div class="feature-img-bg h-100" style="background-image: url('/assets/images/tumpaksewu.jpeg');"></div></div></div>
				</div>

				<div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1" >

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-house display-4 text-primary"></span>
							<h3>Resort</h3>
							<p class="mb-0">Kami menyediakan akomodasi resort yang nyaman dan fasilitas rekreasi yang lengkap.</p>
						</div>
					</div>

					<div class="feature-1 ">
						<div class="align-self-center">
							<span class="flaticon-restaurant display-4 text-primary"></span>
							<h3>Restaurants & Cafe</h3>
							<p class="mb-0">Kami menawarkan pengalaman kuliner di restoran-restoran lokal dan internasional terbaik.</p>
						</div>
					</div>

				</div>

				<div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3" >

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-mail display-4 text-primary"></span>
							<h3>Easy to Connect</h3>
							<p class="mb-0">Kami menyediakan konsultasi gratis untuk membantu Anda memilih solusi yang tepat untuk kebutuhan Anda.</p>
						</div>
					</div>

					<div class="feature-1 d-md-flex">
						<div class="align-self-center">
							<span class="flaticon-phone-call display-4 text-primary"></span>
							<h3>24/7 Support</h3>
							<p class="mb-0">Kami menyediakan layanan pelanggan 24/7 melalui call center untuk menjawab pertanyaan dan membantu kebutuhan Anda.</p>
						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	<x-section></x-section>

@endsection
