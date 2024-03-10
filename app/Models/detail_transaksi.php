<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_transaksi extends Model
{
    use HasFactory;
    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id';
    protected $fillable = ['quantity', 'harga', 'user_id', 'order_id', 'product_id']; // Ubah 'id_user' menjadi 'user_id'

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Sesuaikan dengan nama foreign key jika berbeda
    }

    public function product()
    {
        return $this->belongsTo(Minuman::class, 'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
