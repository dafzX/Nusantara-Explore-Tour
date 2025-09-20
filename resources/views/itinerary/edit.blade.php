@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah Itinerary Paket: {{ $itinerary->paket->nama_paket }}</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('itinerary.update', $itinerary->id_itinerary) }}" method="post">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-4">Day</div>
                    <div class="col-md-8">
                        <input type="number" name="day" class="form-control" value="{{ old('day', $itinerary->day) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Judul Kegiatan</div>
                    <div class="col-md-8">
                        <input type="text" name="judul" class="form-control" value="{{ old('judul', $itinerary->judul) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $itinerary->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('itinerary.index', $itinerary->paket_id) }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
