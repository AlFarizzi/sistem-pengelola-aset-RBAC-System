<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_asset',
        'id_user',
        'id_jenis',
        'id_status',
        'harga',
        'detail','uuid'
    ];


    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }

    public function demage() {
        return $this->belongsTo(demage::class, 'id_jenis');
    }

    public function users() {
        return $this->hasMany(User::class, 'id_user');
    }

    public function asset() {
        return $this->belongsTo(Asset::class, 'id_asset');
    }

}
