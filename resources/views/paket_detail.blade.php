@extends("layouts/app")

@section("konten")

{{-- Hero Section --}}
<section class="hero hero-inner position-relative d-flex align-items-center"
    style="min-height: 70vh; background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('assets/images/' . $paket->gambar) }}') center/cover no-repeat;">
    <div class="container text-center text-white">
        <div class="intro-wrap" data-aos="fade-up" data-aos-duration="800">
            <h1 class="fw-bold display-3 mb-3">{{ $paket->nama_paket }}</h1>
            <!-- <p class="lead text-white-50 fst-italic px-lg-5">
                {{ $paket->deskripsi ?? 'Nikmati pengalaman tak terlupakan bersama paket wisata kami.' }}
            </p> -->
        </div>
    </div>
</section>

{{-- Detail Paket Section --}}
<section class="untree_co-section py-5">
    <div class="container">
        <div class="row g-5 align-items-start">

            {{-- Gambar Paket --}}
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="800">
                <div class="shadow-lg rounded-4 overflow-hidden hover-scale">
                    <img src="{{ asset('assets/images/' . $paket->gambar) }}" 
                         alt="{{ $paket->nama_paket }}" 
                         class="img-fluid w-100">
                </div>
            </div>

            {{-- Info Paket --}}
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="800">
                <div class="bg-white p-4 rounded-4 shadow-sm">

                    {{-- Deskripsi Umum --}}
                    <h2 class="fw-bold mb-3 border-bottom pb-2">Deskripsi</h2>
                    <p class="text-secondary">{{ $paket->deskripsi }}</p>

                    {{-- Itinerary --}}
                    <div class="mt-4">
                        <h2 class="fw-bold mb-3 border-bottom pb-2">Rangkaian Perjalanan</h2>
                        @if($paket->itineraries->count() > 0)
                            @foreach($paket->itineraries as $itinerary)
                                <div class="mb-3">
                                    <h5 class="fw-bold text-primary">Day {{ $itinerary->day }} - {{ $itinerary->judul }}</h5>
                                    <p class="text-secondary">{{ $itinerary->deskripsi }}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="text-secondary">Tidak ada itinerary yang tersedia untuk paket ini.</p>
                        @endif
                    </div>

                    {{-- Harga --}}
                    <div class="mt-4 mb-3">
                        <h5 class="fw-bold mb-1">Harga</h5>
                        <p class="text-success fs-3 fw-bold mb-0">Rp {{ number_format($paket->harga, 0, ',', '.') }}</p>
                    </div>

                    {{-- Tombol Booking --}}
                    <a href="{{ route('booking.create', $paket->id_paket) }}" 
                       class="btn btn-primary btn-lg shadow-sm mt-3 w-100">
                       <i class="bi bi-cart-plus me-2"></i> Pesan Sekarang
                    </a>

                </div>
            </div>

        </div>
    </div>
</section>

{{-- Custom CSS --}}
<style>
.hover-scale img {
    transition: transform 0.4s ease;
}
.hover-scale img:hover {
    transform: scale(1.05);
}
</style>

@endsection
