<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;
     protected $fillable = ['id', 'user_id', 'tanggal_transaksi', 'metode_pembayaran'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Sesuaikan dengan nama foreign key jika berbeda
    }

    public function details(){
        return $this->hasMany(detail_transaksi::class);
    }

}

