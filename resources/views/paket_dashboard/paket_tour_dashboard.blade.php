@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Paket Tour</h1>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('paket.tambah') }}" class="btn btn-primary my-3">Tambah</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gambar Paket</th>
                        <th>Nama Paket</th>
                        <th>Durasi</th>
                        <th>Tipe Harga</th>   <!-- th baru -->
                        <th>Jumlah Fix</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Daftar Tour</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($paket as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            @if($item->gambar)
                                <img src="{{ asset('assets/images/' . $item->gambar) }}" width="100">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $item->nama_paket }}</td>
                        <td>{{ $item->durasi_hari }} Hari {{ $item->durasi_malam }} Malam</td>
                        <td>
                            @if($item->tipe_harga === 'per_orang')
                                Per Orang
                            @else
                                Fix
                            @endif
                        </td>
                        <td>
                            @if($item->tipe_harga === 'per_paket')
                                {{ $item->jumlah_fix }} Orang
                            @else
                                -
                            @endif
                        </td>
                        <td>Rp.{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>{{ Str::limit($item->deskripsi, 100) }}</td>
                        <td>
                            @if($item->tour)
                                <span class="badge bg-info">{{ $item->tour->nama_daerah }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($item->category)
                                <span class="badge bg-success">{{ $item->category->nama_kategori }}</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route('paket.ubah', $item->id_paket) }}">Ubah</a>
                            <a href="{{ route('paket.hapus', $item->id_paket) }}" 
                               onclick="return confirm('Yakin mau hapus paket ini?')" 
                               class="btn btn-danger btn-sm">Hapus</a>
                            <!-- Tombol Kelola Itinerary -->
                            <a href="{{ route('itinerary.index', $item->id_paket) }}" class="btn btn-warning btn-sm mt-1">Kelola Itinerary</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
