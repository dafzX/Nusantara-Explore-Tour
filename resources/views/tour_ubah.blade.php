@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Tour</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('tour.update', $tour->id_tour) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-4">Nama Daerah</div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nama_daerah" value="{{ $tour->nama_daerah }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">Gambar Tempat</div>
                            <div class="col-md-8">
                                <input class="form-control" type="file" name="gambar_tempat">
                                @if($tour->gambar)
                                    <p class="mt-2">Gambar saat ini:</p>
                                    <img src="{{ asset('assets/images/'.$tour->gambar) }}" width="200" alt="Gambar saat ini">
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4">Deskripsi</div>
                            <div class="col-md-8">
                                <textarea name="deskripsi" required class="form-control" rows="5">{{ $tour->deskripsi }}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 mt-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="/tour_dashboard" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
