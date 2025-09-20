@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tour Categories</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('categories.create') }}" class="btn btn-primary my-3">Tambah Kategori</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($categories as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->deskripsi_kategori }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="{{ route('categories.edit', $item->id_categories) }}">Ubah</a>
                        <form action="{{ route('categories.destroy', $item->id_categories) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau hapus kategori ini?')" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
