@extends('layouts.app')
@section('konten')

<!-- Hero Section -->
<section class="hero hero-inner position-relative d-flex align-items-center"
         style="background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url('{{ asset('assets/images/' . $paket->gambar) }}') center/cover no-repeat; min-height: 40vh;">
    <div class="container text-center text-white">
        <div class="intro-wrap px-lg-5" data-aos="fade-up" data-aos-duration="800">
            <h1 class="fw-bold display-5 mb-3">Booking Paket Tour</h1>
            <p class="lead fst-italic">
                Pesan paket wisata impian Anda dengan mudah dan cepat bersama <strong>Nusantara Explore</strong>.
            </p>
        </div>
    </div>
</section>

<!-- Booking Section -->
<section class="untree_co-section py-5" style="background-color: #f9f9f9;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6" data-aos="fade-left">

                {{-- Tampilkan pesan sukses --}}
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{-- Tampilkan pesan error dari validasi Laravel --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Tampilkan error khusus misal minimal orang --}}
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form class="p-4 shadow bg-white rounded" method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <input type="hidden" name="paket_id" value="{{ $paket->id_paket }}">
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="no_telepon" class="form-control" 
                            placeholder="Nomor Telepon (WA aktif)" 
                            value="{{ old('no_telepon') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat lengkap Anda" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Perjalanan</label>
                        <input type="date" name="tanggal_waktu" class="form-control" value="{{ old('tanggal_waktu') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Paket Tour</label>
                        <input type="text" class="form-control" value="{{ $paket->nama_paket }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jumlah Orang</label>
                        
                        @if($paket->tipe_harga === 'per_orang')
                            @php
                                // Jika kategori corporate, minimal 10 orang
                                $minOrang = ($paket->category->nama_kategori === 'Corporate') ? 10 : 1;
                            @endphp
                            <input type="number" name="jumlah_orang" class="form-control" 
                                min="{{ $minOrang }}" 
                                value="{{ old('jumlah_orang') ?? $minOrang }}" 
                                required>
                            @if($paket->category->nama_kategori === 'Corporate')
                                <small class="text-muted">Minimal 10 orang untuk paket Corporate.</small>
                            @endif
                        @else
                            <input type="number" class="form-control" value="{{ $paket->jumlah_fix }} Orang" readonly>
                            <input type="hidden" name="jumlah_orang" value="{{ $paket->jumlah_fix }}">
                        @endif
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan / Permintaan Khusus</label>
                        <textarea name="message" class="form-control" rows="3" placeholder="Tulis pesan Anda...">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2">Pesan Sekarang</button>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection

{{-- Tambahan CSS --}}
<style>
.hero-inner .intro-wrap {
    max-width: 700px; /* Batas lebar hero agar tidak terlalu panjang */
    margin: 0 auto;
}
</style>
