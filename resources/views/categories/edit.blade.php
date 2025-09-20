@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Ubah Kategori</h1>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('categories.update', $category->id_categories) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="{{ $category->nama_kategori }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_kategori" class="form-control" rows="5">{{ $category->deskripsi_kategori }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('categories.index') }}" class="btn btn-danger">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
