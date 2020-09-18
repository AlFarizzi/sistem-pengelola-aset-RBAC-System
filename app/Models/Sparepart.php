<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'nama',
        'harga',
        'jumlah',
        'total',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }
}
