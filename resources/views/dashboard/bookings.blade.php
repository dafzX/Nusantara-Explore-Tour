@extends('layouts.dashboard') 

@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Daftar Booking</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Booking</li>
    </ol>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Booking
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Customer</th>
                        <th>Paket Tour</th>
                        <th>Tanggal Booking</th>
                        <th>Tanggal Perjalanan</th>
                        <th>Status Booking</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($bookings as $b)
                        <tr>    
                            <td>{{ $b->nama_lengkap }}</td>
                            <td>{{ $b->paket ? $b->paket->nama_paket : '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($b->created_at)->format('d M Y H:i') }}</td>
                            <td>{{ \Carbon\Carbon::parse($b->tanggal_waktu)->format('d M Y') }}</td>
                            <td>
                                @if($b->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($b->status == 'confirmed')
                                    <span class="badge bg-success">Confirmed</span>
                                @elseif($b->status == 'cancelled')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if($b->invoice)
                                    @if($b->invoice->payment_status == 'paid')
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif($b->invoice->payment_status == 'pending' && !$b->invoice->admin_confirm)
                                        <span class="badge bg-secondary">Menunggu Konfirmasi</span>
                                    @elseif($b->invoice->payment_status == 'pending' && $b->invoice->admin_confirm)
                                        <span class="badge bg-success">Lunas</span>
                                    @elseif($b->invoice->payment_status == 'expired')
                                        <span class="badge bg-danger">Expired</span>
                                    @else
                                        <span class="badge bg-danger">Belum Bayar</span>
                                    @endif
                                @else
                                    <span class="badge bg-danger">Belum Bayar</span>
                                @endif
                            </td>
                            <td>
                                @if($b->status == 'pending')
                                    <form action="{{ route('dashboard.bookings.confirm', $b->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                    </form>

                                    <form action="{{ route('dashboard.bookings.reject', $b->id) }}" method="POST" style="display:inline-block; margin-left:5px;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
                                    </form>
                                @elseif($b->status == 'confirmed')
                                    <button class="btn btn-secondary btn-sm" disabled>Sudah Konfirmasi</button>
                                @elseif($b->status == 'cancelled')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada booking</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
