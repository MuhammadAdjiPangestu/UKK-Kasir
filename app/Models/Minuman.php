<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minuman extends Model
{
    use HasFactory;

    protected $table = 'minuman';
    // protected $guarded = ['id'];
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nama', 'harga', 'keterangan', 'foto',
    ];

    public function orders()
{
    return $this->hasMany(Order::class);
}
   // Untuk mengambil URL gambar
// public function getFotoUrlAttribute()
// {
//     return asset('storage/' . $this->foto);
// }
}

