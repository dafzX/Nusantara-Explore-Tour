@extends('layouts/dashboard')
@section('konten')
<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Kartu Statistik -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Jumlah Tour: {{ $jumlah_tour }}</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Jumlah Pesan/Booking: {{ $jumlah_pesan }}</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Jumlah Paket Tour: {{ $jumlah_paket }}</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Booking Confirmed: {{ $jumlah_booking_confirmed }}</div>
            </div>
        </div>
    </div>

    <!-- Chart: Jumlah Booking per Paket -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-chart-bar me-1"></i>
            Jumlah Booking per Paket
        </div>
        <div class="card-body">
            <canvas id="bookingChart" width="100%" height="40"></canvas>
        </div>
    </div>

    <!-- Tabel Booking Terbaru -->
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            5 Booking Terbaru
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama User</th>
                        <th>Paket</th>
                        <th>Tanggal Booking</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($booking_terbaru as $booking)
                    <tr>
                        <td>{{ $booking->nama_lengkap }}</td>
                        <td>{{ $booking->paket->nama_paket ?? '-' }}</td>
                        <td>{{ $booking->tanggal_waktu }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bookingChart').getContext('2d');
    const chartData = @json($chartData);
    const labels = chartData.map(item => item.nama_paket);
    const data = chartData.map(item => item.jumlah_booking);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Booking',
                data: data,
                backgroundColor: 'rgba(54, 162, 235, 0.7)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>
@endsection
