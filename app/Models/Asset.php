<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
                            'id_tipe',
                            'id_user',
                            'plat_nomor',
                            'nama_asset',
                            'tgl_perolehan',
                            'tgl_service',
                            'tgl_pajak'
                        ];

                        public function service() {
                            return $this->hasMany(Service::class,'id_asset');
                        }

                        
}
