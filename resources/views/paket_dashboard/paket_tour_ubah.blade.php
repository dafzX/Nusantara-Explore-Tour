@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah Paket Tour</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('paket.update', $paket->id_paket) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4">Nama Paket</div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea name="deskripsi" class="form-control" rows="5" required>{{ old('deskripsi', $paket->deskripsi) }}</textarea>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Harga Paket</div>
                    <div class="col-md-8">
                        <input class="form-control" type="number" name="harga" value="{{ old('harga', $paket->harga) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Durasi Hari</div>
                    <div class="col-md-8">
                        <input class="form-control" type="number" name="durasi_hari" value="{{ old('durasi_hari', $paket->durasi_hari) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Durasi Malam</div>
                    <div class="col-md-8">
                        <input class="form-control" type="number" name="durasi_malam" value="{{ old('durasi_malam', $paket->durasi_malam) }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Gambar Paket</div>
                    <div class="col-md-8">
                        @if($paket->gambar)
                            <img src="{{ asset('assets/images/' . $paket->gambar) }}" width="150" class="mb-2">
                        @endif
                        <input class="form-control" type="file" name="gambar">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Pilih Tour</div>
                    <div class="col-md-8">
                        <select name="tour_id" class="form-control" required>
                            <option value="">-- Pilih Tour --</option>
                            @foreach ($tours as $tour)
                                <option value="{{ $tour->id_tour }}" {{ $paket->tour_id == $tour->id_tour ? 'selected' : '' }}>
                                    {{ $tour->nama_daerah }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Pilih Kategori</div>
                    <div class="col-md-8">
                        <select name="kategori_id" class="form-control" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $kategori)
                                <option value="{{ $kategori->id_categories }}" {{ $paket->kategori_id == $kategori->id_categories ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Tipe Harga</div>
                    <div class="col-md-8">
                        <select name="tipe_harga" class="form-control" required>
                            <option value="per_orang" {{ $paket->tipe_harga == 'per_orang' ? 'selected' : '' }}>Per Orang</option>
                            <option value="per_paket" {{ $paket->tipe_harga == 'per_paket' ? 'selected' : '' }}>Per Paket</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4">Jumlah Orang (khusus Per Paket)</div>
                    <div class="col-md-8">
                        <input type="number" name="jumlah_fix" class="form-control" value="{{ old('jumlah_fix', $paket->jumlah_fix ?? '') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-4"></div>
                    <div class="col-md-8 mt-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('paket.dashboard') }}" class="btn btn-danger">Kembali</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
