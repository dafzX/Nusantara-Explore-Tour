@extends("layouts/app")

@section("konten")

{{-- Hero Section --}}
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-8 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-3 text-white fw-bold" data-aos="fade-up">Tentang Kami</h1>
                    <p class="text-white-50 lead" data-aos="fade-up" data-aos-delay="100">
                        <strong>Nusantara Explore Tour</strong> adalah perusahaan wisata yang siap membawa Anda menjelajahi keindahan Indonesia, dari Sabang hingga Merauke. 
                        Kami menyediakan paket wisata alam, budaya, sejarah, edukasi, hingga petualangan—dengan layanan profesional dan harga yang bersahabat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- About Section --}}
<div class="untree_co-section py-5">
    <div class="container">
        <div class="row gy-5 align-items-center">
            
            {{-- Image Slider --}}
            <div class="col-lg-7" data-aos="fade-right">
                <div class="owl-single dots-absolute owl-carousel">
                    <img src="/assets/images/rinjani.jpeg" class="img-fluid rounded-4 shadow-lg" alt="Gunung Rinjani">
                    <img src="/assets/images/gunungbromo.jpeg" class="img-fluid rounded-4 shadow-lg" alt="Gunung Bromo">
                    <img src="/assets/images/bali.jpg" class="img-fluid rounded-4 shadow-lg" alt="Bali">
                    <img src="/assets/images/papua.jpg" class="img-fluid rounded-4 shadow-lg" alt="Papua">
                    <img src="/assets/images/surabaya.jpg" class="img-fluid rounded-4 shadow-lg" alt="Surabaya">
                </div>
            </div>

            {{-- Text Content --}}
            <div class="col-lg-5 ps-lg-5" data-aos="fade-left">
                <h2 class="section-title mb-4 fw-bold">Mengapa Memilih Kami?</h2>
                <p>
                    Dengan pengalaman dan jaringan luas, PT Nusantara Explore menghadirkan perjalanan yang aman, nyaman, dan penuh cerita. 
                    Kami mengerti bahwa setiap perjalanan adalah pengalaman yang unik—oleh karena itu, kami selalu memberikan sentuhan personal di setiap paket wisata.
                </p>
                <ul class="list-unstyled two-col clearfix">
                    <li>Paket Wisata Domestik</li>
                    <li>Open Trip Nasional</li>
                    <li>Custom Trip</li>
                    <li>Pemesanan Tiket Transportasi</li>
                    <li>Akomodasi Hotel & Resort</li>
                    <li>Transportasi Wisata</li>
                    <li>Pemandu Wisata Tersertifikasi</li>
                    <li>Asuransi Perjalanan</li>
                    <li>Layanan Pelanggan 24/7</li>
                    <li>Kuliner & Restoran Lokal</li>
                </ul>
            </div>

        </div>
    </div>
</div>

<x-section></x-section>

@endsection
