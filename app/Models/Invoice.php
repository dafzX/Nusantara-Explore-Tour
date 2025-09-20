<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'invoice_number',
        'booking_id',
        'total_amount',
        'payment_status',
        'admin_confirm', // tambahkan
    ];

    // Relasi ke booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Attribute untuk menampilkan status dengan admin confirm
    public function getPaymentStatusDisplayAttribute()
    {
        if ($this->payment_status == 'paid' && $this->admin_confirm) {
            return 'Selesai';
        }

        switch ($this->payment_status) {
            case 'unpaid':
                return 'Belum Bayar';
            case 'pending':
                return 'Menunggu Konfirmasi';
            case 'paid':
                return 'Lunas';
            case 'expired':
                return 'Expired';
            default:
                return ucfirst($this->payment_status);
        }
    }
}
