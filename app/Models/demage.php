<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demage extends Model
{
    use HasFactory;
    protected $fillable = ['demage'];
    
    public function service() {
        return $this->hasOne(Service::class, 'id_jenis');
    }

}
