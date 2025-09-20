@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Tour</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="/tour_dashboard/tour_tambah" class="btn btn-primary my-3">Tambah</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <tr>
                    <th>No</th>
                    <th>Gambar Tempat</th>
                    <th>Nama Daerah</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
                @foreach ($data as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ asset('assets/images/' . $item->gambar) }}" width="100">
                    </td>
                    <td>{{ $item->nama_daerah }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('tour.ubah', $item->id_tour) }}">Ubah</a>
                        <a href="{{ route('tour.hapus', $item->id_tour) }}" 
                        onclick="return confirm('Yakin mau hapus?')" 
                        class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection