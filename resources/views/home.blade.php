@extends('layouts/app')
@section('konten')
<!-- ===== HERO / SLIDER ===== -->
<div class="hero hero-inner" style="margin-bottom: 150px;">
	<div class="container">
        <div class="row align-items-center g-3">
            <div class="col-lg-7">
                <div class="intro-wrap">
					<h1 class="mb-5"><span class="d-block">Nikmati Perjalanan</span> Anda Di <span class="typed-words"></span></h1>
                    <p id="location-description" class="text-white" style="font-size: 1.2rem;"></p>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="slides">
                    @foreach($sliders as $index => $item)
                        <div class="slide-img {{ $index === 0 ? 'active' : '' }}"
                            style="background-image: url('{{ asset('assets/images/' . $item->gambar) }}')"
                            data-daerah="{{ $item->nama_daerah }}"
                            data-deskripsi="{{ $item->deskripsi }}">
                        </div>
                    @endforeach
                </div>
            </div>
		</div>
    </div>
</div>

<!-- ===== PAKET TOUR ===== -->
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-7">
                <h2 class="text-center mb-3">Paket Tour Kami</h2>
                <p>Pilih paket wisata terbaik dengan harga terjangkau dan layanan premium. Kami siap menemani liburan impian Anda! ✈️🌏</p>
            </div>
        </div>

        <!-- Slider -->
        <div class="owl-carousel paket-slider">
            @foreach($paketTour as $paket)
            <div class="item">
                <div class="card shadow-sm border-0 h-100">
                    <!-- Gambar -->
                    <img src="{{ asset('assets/images/' . ($paket->gambar ?? 'default.jpg')) }}" 
                        class="card-img-top" 
                        alt="{{ $paket->nama_paket }}" 
                        style="height:250px; object-fit:cover; border-top-left-radius: .5rem; border-top-right-radius: .5rem;"
                        loading="lazy">
                    
                    <!-- Isi Card -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">{{ $paket->nama_paket }}</h5>

                        <p class="text-secondary mb-2" style="font-size: 0.9rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                            {{ $paket->deskripsi ?? 'Tidak ada deskripsi.' }}
                        </p>

                        <p class="mb-1">
                            <span class="badge bg-info text-dark">{{ $paket->category->nama_kategori ?? 'Tanpa Kategori' }}</span>
                        </p>

                        <p class="fw-bold text-success mb-2">Rp {{ number_format($paket->harga, 0, ',', '.') }}</p>

                        <a href="{{ route('paket.detail', $paket->id_paket) }}" class="btn btn-sm btn-primary mt-auto">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- ===== LAYANAN KAMI ===== -->
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-7">
                <h2 class="text-center mb-3">Layanan Kami</h2>
                <p>Menyediakan paket tour ke destinasi terkenal di Indonesia, mulai dari wisata alam, budaya, sejarah, petualangan, hingga edukasi. Jelajahi Indonesia bersama kami!</p>
            </div>
            
        </div>
        <div class="row align-items-stretch">
            <div class="col-lg-4 order-lg-1">
                <div class="h-100">
                    <div class="frame h-100">
                        <div class="feature-img-bg h-100" style="background-image: url('/assets/images/tumpaksewu.jpeg');"></div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <span class="flaticon-house display-4 text-primary"></span>
                        <h3>Resort</h3>
                        <p class="mb-0">Akomodasi resort yang nyaman dengan fasilitas rekreasi lengkap.</p>
                    </div>
                </div>

                <div class="feature-1">
                    <div class="align-self-center">
                        <span class="flaticon-restaurant display-4 text-primary"></span>
                        <h3>Restaurants & Cafe</h3>
                        <p class="mb-0">Nikmati kuliner khas lokal maupun internasional terbaik.</p>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">
                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <span class="flaticon-mail display-4 text-primary"></span>
                        <h3>Easy to Connect</h3>
                        <p class="mb-0">Konsultasi gratis untuk membantu Anda memilih solusi perjalanan.</p>
                    </div>
                </div>

                <div class="feature-1 d-md-flex">
                    <div class="align-self-center">
                        <span class="flaticon-phone-call display-4 text-primary"></span>
                        <h3>24/7 Support</h3>
                        <p class="mb-0">Layanan pelanggan selalu siap 24 jam untuk kebutuhan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== COUNTER ===== -->
<div class="untree_co-section count-numbers py-5">
    <div class="container">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter"><span data-number="{{ $jumlah_booking }}">0</span></div>
                    <span class="caption">Jumlah Booking</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter"><span data-number="{{ $jumlah_categories }}">0</span></div>
                    <span class="caption">Jumlah Kategori Tour</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter"><span data-number="{{ $jumlah_tour }}">0</span></div>
                    <span class="caption">Jumlah Tempat Wisata</span>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                <div class="counter-wrap">
                    <div class="counter"><span data-number="{{ $jumlah_paket }}">0</span></div>
                    <span class="caption">Jumlah Paket Tour</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== WHY CHOOSE US ===== -->
<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-7">
                <h2 class="mb-3">Kenapa Memilih Nusantara Explore Tour?</h2>
                <p>Kami bukan sekadar agen perjalanan, tapi sahabat perjalanan Anda. Berikut alasan kenapa ribuan wisatawan percaya pada kami:</p>
            </div>
        </div>
        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-4 shadow-sm rounded bg-white h-100">
                    <span class="flaticon-tourism display-4 text-primary mb-3"></span>
                    <h5>Destinasi Lengkap</h5>
                    <p class="mb-0">Jelajahi wisata alam, budaya, sejarah, hingga kuliner di seluruh Indonesia.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 shadow-sm rounded bg-white h-100">
                    <span class="flaticon-team display-4 text-primary mb-3"></span>
                    <h5>Guide Berpengalaman</h5>
                    <p class="mb-0">Pemandu wisata ramah, profesional, dan siap menemani perjalanan Anda.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 shadow-sm rounded bg-white h-100">
                    <span class="flaticon-wallet display-4 text-primary mb-3"></span>
                    <h5>Harga Terjangkau</h5>
                    <p class="mb-0">Paket hemat dengan layanan premium tanpa biaya tersembunyi.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-4 shadow-sm rounded bg-white h-100">
                    <span class="flaticon-shield display-4 text-primary mb-3"></span>
                    <h5>Aman & Nyaman</h5>
                    <p class="mb-0">Keamanan perjalanan terjamin dengan mitra terpercaya.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== TIPS PERJALANAN ===== -->
<div class="untree_co-section bg-light">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-7">
        <h2 class="mb-3">Tips Liburan</h2>
        <p>Persiapan sederhana bisa membuat perjalanan lebih nyaman dan berkesan.</p>
      </div>
    </div>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded bg-white h-100">
          <h5>Bawa Barang Secukupnya</h5>
          <p class="mb-0">Hindari membawa terlalu banyak barang agar perjalanan lebih fleksibel.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded bg-white h-100">
          <h5>Selalu Sediakan Obat</h5>
          <p class="mb-0">Jaga kesehatan dengan membawa obat pribadi atau vitamin.</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="p-4 shadow-sm rounded bg-white h-100">
          <h5>Gunakan Pakaian Nyaman</h5>
          <p class="mb-0">Sesuaikan pakaian dengan destinasi wisata agar lebih nyaman.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ===== FAQ ===== -->
<div class="untree_co-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center">
                <h2 class="mb-3">FAQ (Pertanyaan Umum)</h2>
                <p>Masih bingung? Berikut beberapa pertanyaan yang sering ditanyakan wisatawan sebelum berangkat:</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="faq-item">
                    <h6>Bagaimana cara melakukan booking?</h6>
                    <p>Cukup pilih paket tour favorit Anda, klik tombol "Detail", lalu ikuti proses pemesanan di halaman booking.</p>
                </div>
                <div class="faq-item">
                    <h6>Metode pembayaran apa yang tersedia?</h6>
                    <p>Kami menerima transfer bank, kartu kredit, dan e-wallet populer di Indonesia.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="faq-item">
                    <h6>Apakah bisa custom itinerary?</h6>
                    <p>Tentu! Anda dapat menghubungi tim kami untuk menyesuaikan perjalanan sesuai kebutuhan.</p>
                </div>
                <div class="faq-item">
                    <h6>Apakah harga sudah termasuk akomodasi?</h6>
                    <p>Ya, semua paket tour sudah termasuk akomodasi, transportasi, dan tiket masuk destinasi wisata.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<x-section></x-section>
@endsection
