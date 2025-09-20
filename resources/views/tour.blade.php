@extends("layouts/app")
@section("konten")

<style>
  body {
    font-family: 'Poppins', sans-serif;
  }

  .card-custom {
    transition: all 0.3s ease;
    border-radius: 1rem;
    border: 1px solid #e5e9f2; /* clean look */
  }

  .card-custom:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
  }

  /* Harga */
  .price-text {
    font-size: 1.1rem;
    font-weight: 600;
    color: #0d6efd;
  }

  /* Badge kategori */
  .badge-custom {
    background: linear-gradient(135deg, #0d47a1, #1976d2);
    font-size: 0.75rem;
    padding: 6px 12px;
    border-radius: 12px;
    color: #fff;
  }

  /* Tombol custom biru tua */
  .btn-custom-primary {
    border: 1px solid #0d47a1;
    color: #0d47a1;
    font-weight: 600;
    transition: all 0.3s ease;
  }

  .btn-custom-primary:hover {
    background-color: #0d47a1;
    color: #fff;
    box-shadow: 0 4px 12px rgba(13, 71, 161, 0.3);
  }

  /* Spasi section */
  .section-block {
    padding-top: 4rem;
    padding-bottom: 4rem;
  }

  /* Card body lebih lega */
.card-body {
  padding: 1rem 1.2rem;
}

/* Judul paket */
.card-body h5 {
  font-size: 1rem;
  line-height: 1.4;
  min-height: 42px; /* biar sejajar meski judul beda panjang */
}

/* Harga */
.price-text {
  font-size: 1.05rem;
  font-weight: 600;
  color: #0d6efd;
  margin-bottom: 0.8rem;
}

/* Perbesar dropdown kategori */
.form-select {
  padding: 0.6rem 1.2rem;
  font-size: 0.95rem;
  border-radius: 50rem; /* biar tetap rounded-pill */
}

.search-group > * {
  margin: 0.3rem; /* jarak tipis antar elemen */
}

</style>

{{-- Hero Section --}}
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-8 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-3">Paket Tour</h1>
          <p class="lead text-white">
            Dari wisata alam, budaya, hingga petualangan seru – semua sudah kami siapkan untuk liburan tak terlupakan.  
            Pilih paket yang sesuai, nikmati pengalaman bersama <strong>Nusantara Explore Tour</strong>.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Search Bar --}}
<div class="container my-5">
  <form method="GET" action="{{ route('paket.index') }}">
    <div class="d-flex flex-wrap justify-content-center search-group">
      {{-- Input teks pencarian --}}
      <div class="flex-grow-1" style="min-width:250px;max-width:400px;">
        <input type="text" name="search" class="form-control rounded-pill px-3 shadow-sm"
               placeholder="Cari tour (contoh: Maluku, Bali, Lombok)"
               value="{{ request('search') }}">
      </div>

      {{-- Dropdown kategori --}}
      <div style="min-width:180px;">
        <select name="kategori" class="form-select rounded-pill shadow-sm">
          <option value="">Semua Kategori</option>
          @foreach($categories as $category)
            <option value="{{ $category->nama_kategori }}" 
              {{ request('kategori') == $category->nama_kategori ? 'selected' : '' }}>
              {{ $category->nama_kategori }}
            </option>
          @endforeach
        </select>
      </div>

      {{-- Tombol cari --}}
      <div>
        <button type="submit" class="btn btn-custom-primary rounded-pill px-4 shadow-sm">
          <i class="bi bi-search me-1"></i> Cari
        </button>
      </div>

    </div>
  </form>
</div>


{{-- Paket Tour --}}
<div class="container section-block">

  @if($paketGrouped->isEmpty())
    <div class="text-center py-5">
      <h4 class="text-muted">😢 Tour tidak ditemukan</h4>
      <p>Coba gunakan kata kunci lain seperti <em>Bali</em> atau <em>Lombok</em>.</p>
    </div>
  @else
    @foreach($paketGrouped as $durasi => $pakets)
      <div class="mb-5">
        <h2 class="section-title text-center d-block w-100 mb-5">
          Paket {{ $durasi }}
        </h2>
        <div class="row g-4">
          @forelse($pakets as $paket)
            <div class="col-lg-3 col-md-4 col-sm-6">
              <div class="card card-custom h-100 shadow-sm border-0">
                <img src="{{ asset('assets/images/' . $paket->gambar) }}" 
                     class="card-img-top" 
                     alt="{{ $paket->nama_paket }}" 
                     style="height:220px;object-fit:cover;border-top-left-radius:1rem;border-top-right-radius:1rem;">

                <div class="card-body d-flex flex-column text-start">
                  <h5 class="fw-semibold">{{ $paket->nama_paket }}</h5>

                  @if($paket->category)
                    <span class="badge badge-custom mb-2">
                      {{ $paket->category->nama_kategori }}
                    </span>
                  @endif

                  <p class="price-text mb-3">
                    Rp {{ number_format($paket->harga, 0, ',', '.') }}
                  </p>

                  <a href="{{ route('paket.detail', $paket->id_paket) }}" 
                    class="btn btn-custom-primary btn-sm mt-auto rounded-pill">
                    Lihat Detail
                  </a>
                </div>
              </div>
            </div>
          @empty
            <div class="col-12">
              <p class="text-center text-muted">Belum ada paket untuk {{ $durasi }}</p>
            </div>
          @endforelse
        </div>
      </div>
    @endforeach
  @endif

</div>

@endsection
