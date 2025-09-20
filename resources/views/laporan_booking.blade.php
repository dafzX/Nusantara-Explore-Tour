@extends('layouts.dashboard')

@section('konten')
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-4">Laporan Booking</h2>

    {{-- Form filter tanggal --}}
    <form method="GET" action="{{ route('laporan.booking') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="tanggal_awal" class="form-label">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{ request('tanggal_awal') }}">
        </div>
        <div class="col-md-4">
            <label for="tanggal_akhir" class="form-label">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control" value="{{ request('tanggal_akhir') }}">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-primary me-2">Filter</button>
            <a href="{{ route('laporan.booking') }}" class="btn btn-secondary me-2">Reset</a>
            <a href="{{ route('laporan.booking.cetak', [
                    'tanggal_awal' => request('tanggal_awal'),
                    'tanggal_akhir' => request('tanggal_akhir')
                ]) }}" target="_blank" class="btn btn-success">Cetak</a>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-light">
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Destinasi</th>
                    <th>Tanggal</th>
                    <th>Jumlah Orang</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Total</th>
                    <th>Pesan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $i => $booking)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $booking->nama_lengkap }}</td>
                    <td>{{ $booking->email }}</td>
                    <td>{{ $booking->paket->tour->nama_daerah ?? '-' }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->tanggal_waktu)->format('d-m-Y') }}</td>
                    <td class="text-right">{{ $booking->jumlah_orang }}</td>
                    <td>{{ $booking->paket->category->nama_kategori ?? '-' }}</td>
                    <td class="text-right">Rp {{ number_format($booking->paket->harga ?? 0, 0, ',', '.') }}</td>
                    <td class="text-right">Rp {{ number_format($booking->jumlah_orang * ($booking->paket->harga ?? 0), 0, ',', '.') }}</td>
                    <td>{{ $booking->message ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8" class="text-right">Total Penghasilan</th>
                    <th colspan="2" class="text-right">Rp {{ number_format($total_penghasilan, 0, ',', '.') }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection
