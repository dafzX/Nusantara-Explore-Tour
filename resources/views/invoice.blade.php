@extends('layouts.invoices')

@section('konten')
<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

.invoice-container {
    max-width: 900px;
    margin: 50px auto;
    padding: 40px;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.invoice-header {
    border-bottom: 2px solid #0d6efd;
    padding-bottom: 15px;
    margin-bottom: 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.invoice-header img {
    margin-right: 15px;
    height: 70px;
}

.table th, .table td {
    vertical-align: middle;
    padding: 8px 12px;
}

.table-bordered th, .table-bordered td {
    border: 1px solid #dee2e6;
}

.invoice-summary {
    margin-top: 25px;
}

.invoice-footer {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
    gap: 20px;
}

.signature {
    width: 45%;
    text-align: center;
}

.fst-italic {
    font-style: italic;
    font-size: 13px;
}

/* ===== RESPONSIVE FIX ===== */
@media (max-width: 768px) {
    .invoice-container {
        width: 95%;
        padding: 20px;
        margin: 15px auto;
    }

    .invoice-header {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .invoice-header img {
        height: 50px;
        margin: 0 auto;
    }

    .invoice-header > div {
        text-align: center !important;
        width: 100%;
    }

    .table {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }

    .table th, .table td {
        font-size: 13px;
        padding: 6px 8px;
        white-space: nowrap;
    }

    .invoice-footer {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .signature {
        width: 100%;
    }

    .no-print .btn {
        width: 100%;
        margin-bottom: 10px;
    }
}

@media (max-width: 480px) {
    .invoice-container {
        padding: 15px;
    }

    h4, h5 {
        font-size: 14px;
    }

    .invoice-header img {
        height: 40px;
    }

    .fst-italic {
        font-size: 11px;
    }
}

/* ===== PRINT STYLES ===== */
@media print {
    body {
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
        background: #fff !important;
    }

    .invoice-container {
        box-shadow: none;
        border: none;
        margin: 0 auto;
        padding: 30px;
        width: 100%;
        line-height: 1.4; /* biar ada jarak antar teks */
    }

    .no-print {
        display: none !important;
    }

    /* Header */
    .invoice-header {
        display: table !important;
        width: 100% !important;
        margin-bottom: 20px !important; /* kasih jarak bawah */
    }

    .invoice-header > div {
        display: table-cell !important;
        vertical-align: top !important; /* ubah dari middle -> top */
        text-align: left !important;
    }

    .invoice-header img {
        height: 60px !important;
        margin-right: 15px !important;
    }

    .invoice-header h4, 
    .invoice-header p {
        margin: 0;
        padding: 0;
        line-height: 1.3; /* biar rapi */
    }

    /* Section spacing */
    h5 {
        margin-top: 15px !important;
        margin-bottom: 8px !important;
    }

    table {
        margin-bottom: 15px !important;
    }

    .invoice-footer {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: flex-start !important;
        gap: 20px !important;
        page-break-inside: avoid; /* biar gak kepotong halaman */
        margin-top: 50px !important;
    }

    .invoice-footer .signature {
        width: 45% !important;
        text-align: center !important;
    }

    .signature {
        font-size: 12px;
        padding-top: 40px; /* biar ada ruang tanda tangan */
    }
}

</style>

<div class="invoice-container" id="invoice-area">
    {{-- Header --}}
    <div class="invoice-header">
        <div style="display:flex; align-items:center; flex-wrap:wrap; justify-content:center;">
            <img src="{{ asset('assets/images/favicon.jpeg') }}" alt="Logo Nusantara Explore">
            <div>
                <h4>Nusantara Explore</h4>
                <p>Jl. Soekarno Hatta No.123, Bandar Lampung</p>
                <p>Email: nusantaraexplore@gmail.com | Telp: +62-812-3456-7890</p>
            </div>
        </div>
        <div style="text-align:right;">
            <h5>Invoice #{{ $invoice->invoice_number }}</h5>
            <p>Tanggal: {{ $invoice->created_at->format('d M Y') }}</p>
        </div>
    </div>

    {{-- Data Pemesan --}}
    <h5>Data Pemesan</h5>
    <table class="table table-borderless">
        <tr>
            <td style="width:150px;">Nama</td>
            <td>: {{ $invoice->booking->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: {{ $invoice->booking->email }}</td>
        </tr>
        <tr>
            <td>No Telepon</td>
            <td>: {{ $invoice->booking->no_telepon }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $invoice->booking->alamat ?? '-' }}</td>
        </tr>
    </table>

    {{-- Detail Paket --}}
    <h5>Detail Paket</h5>
    <table class="table table-borderless">
        <tr>
            <td style="width:150px;">Nama Paket</td>
            <td>: {{ $invoice->booking->paket?->nama_paket ?? $invoice->booking->tour->nama_tempat }}</td>
        </tr>
        <tr>
            <td>Kategori Paket</td>
            <td>: {{ $invoice->booking->paket?->category?->nama_kategori ?? 'Tidak ada kategori' }}</td>
        </tr>
        <tr>
            <td>Destinasi</td>
            <td>: {{ $invoice->booking->paket?->tour?->nama_daerah ?? 'Tidak ada destinasi' }}</td>
        </tr>
        <tr>
            <td>Tanggal Perjalanan</td>
            <td>: {{ $invoice->booking->tanggal_waktu }}</td>
        </tr>
        <tr>
            <td>Jumlah Orang</td>
            <td>: {{ $invoice->booking->jumlah_orang }}</td>
        </tr>
        <tr>
            <td>Harga Satuan</td>
            <td>: Rp {{ number_format($invoice->booking->paket?->harga ?? 0, 0, ',', '.') }}</td>
        </tr>
    </table>


    {{-- Ringkasan Pembayaran --}}
    <h5>Ringkasan Pembayaran</h5>
    <table class="table table-bordered invoice-summary fw-bold">
        <tr>
            <td>Total Bayar</td>
            <td>Rp {{ number_format($invoice->total_amount, 0, ',', '.') }}</td>
        </tr>
        <tr>
            <td>Status Pembayaran</td>
            <td id="payment-status">
                @if($invoice->booking->status == 'cancelled')
                    <span class="badge bg-danger">Cancelled</span>
                @else
                    {{ $invoice->payment_status_display }}
                @endif
            </td>
        </tr>
    </table>

    {{-- Footer --}}
    <div class="invoice-footer">
        <div class="signature">
            <p>Pemesan</p>
            <br><br>
            <p>_________________________</p>
        </div>
        <div class="signature">
            <p>Perwakilan Nusantara Explore</p>
            <br><br>
            <p>_________________________</p>
        </div>
    </div>
    <p class="fst-italic text-center mt-3">
        Dengan menandatangani invoice ini, kedua belah pihak menyetujui detail pesanan dan pembayaran yang tercantum.
    </p>

    {{-- Tombol --}}
    <div class="mt-3 no-print text-center">
        <form id="pay-button" action="{{ route('invoice.pay', $invoice->id) }}" method="POST" style="{{ $invoice->payment_status != 'unpaid' ? 'display:none;' : '' }}">
            @csrf
            <button type="submit" class="btn btn-success mb-2">💳 Bayar Sekarang</button>
        </form>

        <button id="print-button" class="btn btn-primary mb-2" onclick="window.print()" style="{{ $invoice->payment_status == 'paid' ? '' : 'display:none;' }}">🖨 Cetak Invoice</button>

        <a href="/" class="btn btn-danger mb-2">Kembali ke Beranda</a>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
function checkInvoiceStatus() {
    $.get("{{ route('invoice.show_status', $invoice->id) }}", function(data) {
        if(data.status !== "{{ $invoice->payment_status }}") {
            $("#payment-status").text(data.status_display);

            if(data.status === 'paid') {
                $("#pay-button").hide();
                $("#print-button").show();
            }
        }
    });
}
setInterval(checkInvoiceStatus, 5000);
</script>
@endsection
