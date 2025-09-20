@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tambah Paket Tour</h1>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="/paket_dashboard/tambah_paket" method="post" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Nama Paket</div>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nama_paket" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Deskripsi</div>
                            <div class="col-md-8">
                                <textarea name="deskripsi" required class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Harga Paket</div>
                            <div class="col-md-8">
                                <input class="form-control" type="number" name="harga" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Durasi Hari</div>
                            <div class="col-md-8">
                                <input class="form-control" type="number" name="durasi_hari" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Durasi Malam</div>
                            <div class="col-md-8">
                                <input class="form-control" type="number" name="durasi_malam" required>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Gambar Paket</div>
                            <div class="col-md-8">
                                <input class="form-control" type="file" name="gambar">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4">Pilih Tour</div>
                            <div class="col-md-8">
                                <select name="tour_id" class="form-control" required>
                                    <option value="">-- Pilih Tour --</option>
                                    @foreach ($tours as $tour)
                                        <option value="{{ $tour->id_tour }}">{{ $tour->nama_daerah }}</option>
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
                                        <option value="{{ $kategori->id_categories }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tipe_harga">Tipe Harga</label>
                            <select name="tipe_harga" class="form-control" required>
                                <option value="per_orang" {{ old('tipe_harga', $paket->tipe_harga ?? '') == 'per_orang' ? 'selected' : '' }}>Per Orang</option>
                                <option value="per_paket" {{ old('tipe_harga', $paket->tipe_harga ?? '') == 'per_paket' ? 'selected' : '' }}>Per Paket</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="jumlah_fix">Jumlah Orang (khusus Per Paket)</label>
                            <input type="number" name="jumlah_fix" class="form-control" value="{{ old('jumlah_fix', $paket->jumlah_fix ?? '') }}">
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col-md-4"></div>
                            <div class="col-md-8 mt-2">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="/paket_dashboard" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
