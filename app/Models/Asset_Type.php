<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset_Type extends Model
{
    use HasFactory;
    protected $fillable = ['type'];
    public function assets() {
        return $this->hasMany(Asset::class, 'id_tipe');
    }
}
