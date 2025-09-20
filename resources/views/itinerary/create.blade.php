@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Itinerary Paket: {{ $paket->nama_paket }}</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('itinerary.store', $paket->id_paket) }}" method="post">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4">Day</div>
                    <div class="col-md-8">
                        <input type="number" name="day" class="form-control" placeholder="Masukkan Day (contoh: 1)" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Judul Kegiatan</div>
                    <div class="col-md-8">
                        <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Kegiatan" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea name="deskripsi" class="form-control" rows="5" placeholder="Masukkan Deskripsi Kegiatan" required></textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="{{ route('itinerary.index', $paket->id_paket) }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
