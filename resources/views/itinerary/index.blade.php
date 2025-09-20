@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Itinerary Paket: {{ $paket->nama_paket }}</h1>

    <a href="{{ route('itinerary.create', $paket->id_paket) }}" class="btn btn-primary my-3">Tambah Day</a>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Day</th>
                <th>Judul Kegiatan</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paket->itineraries as $index => $itinerary)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>Day {{ $itinerary->day }}</td>
                <td>{{ $itinerary->judul }}</td>
                <td>{{ Str::limit($itinerary->deskripsi, 100) }}</td>
                <td>
                    <a href="{{ route('itinerary.edit', $itinerary->id_itinerary) }}" class="btn btn-info btn-sm">Edit</a>

                    <form action="{{ route('itinerary.destroy', $itinerary->id_itinerary) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin mau hapus Day ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('paket.dashboard') }}" class="btn btn-secondary mt-3">Kembali ke Paket</a>
</div>
@endsection
