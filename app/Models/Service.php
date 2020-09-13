<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "jenis", 'detail', 'harga', 'id_asset', 'id_user', 'status', 'km_asset'
    ];


    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }

    public function asset() {
        return $this->belongsTo(Asset::class,'id_asset');
    }

}
