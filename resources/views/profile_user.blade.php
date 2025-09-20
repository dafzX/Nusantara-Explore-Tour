@extends('layouts.app')
@section('konten')

{{-- Bagian header dengan background gradien atau gambar --}}
<div style="color: white; padding: 100px 0 60px; text-align: center;" class="hero hero-inner">
    <h1 class="fw-bold mb-1">Profil Saya</h1>
    <p class="mb-0">Selamat datang, {{ $user->name }}!</p>
</div>

<div class="container py-5" style="margin-top: -40px;"> 
    {{-- Card profil --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="mb-1"><strong>Nama:</strong> {{ $user->name }}</h5>
            <p class="mb-0"><strong>Email:</strong> {{ $user->email }}</p>
        </div>
    </div>

    <h3 class="mb-3 text-secondary">Riwayat Booking</h3>
    @if($bookings->isEmpty())
        <div class="alert alert-info">Belum ada riwayat booking.</div>
    @else
        <div class="table-responsive shadow-sm rounded">
            <table class="table table-bordered table-hover align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Nama Paket</th>
                        <th>Tanggal</th>
                        <th>Tempat Wisata</th>
                        <th>Kategori</th>
                        <th>Jumlah Orang</th>
                        <th>Harga Satuan</th>
                        <th>Total Pembayaran</th>
                        <th>Invoice</th>
                        <th>Status Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $index => $booking)
                    <tr onclick="window.location='{{ route('invoice', $booking->invoice->id) }}'" style="cursor:pointer;">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $booking->paket ? $booking->paket->nama_paket : '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($booking->tanggal_waktu)->format('d-m-Y') }}</td>
                        <td>{{ $booking->paket && $booking->paket->tour ? $booking->paket->tour->nama_daerah : '-' }}</td>
                        <td>{{ $booking->paket && $booking->paket->category ? $booking->paket->category->nama_kategori : '-' }}</td>
                        <td>{{ $booking->jumlah_orang }}</td>
                        <td>
                            @if($booking->paket)
                                Rp.{{ number_format($booking->paket->harga, 0, ',', '.') }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($booking->invoice)
                                Rp.{{ number_format($booking->invoice->total_amount, 0, ',', '.') }}
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>{{ $booking->invoice->invoice_number ?? '-' }}</td>
                        <td>
                            @if($booking->invoice)
                                @if($booking->status === 'cancelled')
                                    <span class="badge bg-danger">Ditolak Admin</span>
                                @elseif($booking->invoice->payment_status === 'paid')
                                    <span class="badge bg-success">Lunas</span>
                                @else
                                    <span class="badge bg-warning text-dark">Belum Lunas</span>
                                @endif
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
