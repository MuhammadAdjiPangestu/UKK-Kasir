<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'product_id', 'quantity', 'harga']; // Ubah 'id_user' menjadi 'user_id'

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Sesuaikan dengan nama foreign key jika berbeda
    }

    public function product()
    {
        return $this->belongsTo(Minuman::class, 'product_id');
    }
}
