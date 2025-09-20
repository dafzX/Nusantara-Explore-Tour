<!DOCTYPE html>
<html>
<head>
    <title>Laporan Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th {
            background-color: #f2f2f2;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
        td.num {
            text-align: right;
        }
    </style>
</head>
<body onload="window.print()">

    <h2>Laporan Booking</h2>
    <table>
        <thead>
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
                    <td class="num">{{ $booking->jumlah_orang }}</td>
                    <td>{{ $booking->paket->category->nama_kategori ?? '-' }}</td>
                    <td class="num">Rp {{ number_format($booking->paket->harga ?? 0, 0, ',', '.') }}</td>
                    <td class="num">
                        @if($booking->paket->tipe_harga == 'per_orang')
                            Rp {{ number_format($booking->jumlah_orang * ($booking->paket->harga ?? 0), 0, ',', '.') }}
                        @else
                            Rp {{ number_format($booking->paket->harga ?? 0, 0, ',', '.') }}
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        <tfoot>
            <tr>
                <th colspan="8" style="text-align: right;">Total Penghasilan</th>
                <th colspan="2" class="num">Rp {{ number_format($total_penghasilan, 0, ',', '.') }}</th>
            </tr>
        </tfoot>
    </table>

</body>
</html>
