<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bukti_pembayaran extends Model
{
    use HasFactory;

    protected $table = 'bukti_pembayarans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'order_id', 'tipe_pembayaran', 'status_pembayaran', 'total_bayar', 'waktu_pembayaran','transaction_type', 'transaction_id', 'status_message', 'signature_key', 'reference_id', 'merchant_id', 'expiry_time'];

    public function notif()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

}
