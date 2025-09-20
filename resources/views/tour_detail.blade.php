@extends("layouts/app")

@section("konten")

{{-- Hero Section --}}
<section class="hero hero-inner position-relative" 
    style="font-family: 'Poppins', sans-serif; background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('assets/images/' . $tour->gambar) }}') center/cover no-repeat;">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center text-white">
                <div class="intro-wrap" data-aos="fade-up" data-aos-duration="800">
                    
                    {{-- Badge Lokasi --}}
                    <span class="badge bg-light text-dark px-3 py-2 mb-3 shadow-sm d-inline-flex align-items-center" style="font-size: 0.95rem;">
                        <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                        <strong>{{ $tour->daerah->nama_daerah ?? 'Lokasi Tidak Diketahui' }}</strong>
                    </span>
                    
                    {{-- Judul Tempat --}}
                    <h1 class="mb-3 fw-bold display-4" style="letter-spacing: 1px;">
                        {{ $tour->nama_tempat }}
                    </h1>
                    
                    {{-- Subjudul --}}
                    <p class="lead text-white-50 fst-italic">
                        Destinasi wisata dengan pesona unik dan pengalaman tak terlupakan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Detail Section --}}
<section class="untree_co-section py-5" style="font-family: 'Poppins', sans-serif;">
    <div class="container">
        <div class="row gy-5 align-items-center">

            {{-- Gambar --}}
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="800">
                <div class="shadow-lg rounded-4 overflow-hidden">
                    <img src="{{ asset('assets/images/' . $tour->gambar) }}" alt="{{ $tour->nama_tempat }}" class="img-fluid w-100">
                </div>
            </div>

            {{-- Info --}}
            <div class="col-lg-5" data-aos="fade-left" data-aos-duration="800">
                <h2 class="fw-bold mb-4 border-bottom pb-2">Deskripsi</h2>
                <p class="text-secondary">{{ $tour->deskripsi }}</p>

                <div class="mt-4">
                    <h5 class="fw-bold mb-1">Harga</h5>
                    <p class="text-primary fs-3 fw-bold mb-3">Rp {{ number_format($tour->harga, 0, ',', '.') }}</p>
                </div>

<a href="{{ url('/booking?tour_id=' . $tour->id_tour) }}" 
   class="btn btn-primary btn-lg mt-4 shadow-sm px-4 py-2">
   <i class="bi bi-cart-plus me-2"></i> Pesan Sekarang
</a>

            </div>

        </div>
    </div>
</section>

<div class="py-5 cta-section">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2 class="mb-2 text-white">Memungkinkan Anda Menjelajahi yang Terbaik. Hubungi Kami Sekarang</h2>
                <p class="mb-4 lead text-white text-white-opacity">Ingin liburan seru dan tak terlupakan? Tim kami siap membantu Anda 24/7! Konsultasikan rencana perjalanan Anda, dapatkan penawaran terbaik, dan klaim diskon spesial hingga 20% hari ini juga. Jangan ragu—hubungi kami sekarang lewat WhatsApp, telepon, atau email untuk mulai merencanakan petualangan impian Anda bersama Nusantara Explore Tour!</p>
                <p class="mb-0"><a href="/booking" class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
