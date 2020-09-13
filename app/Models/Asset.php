<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
                            'no_asset',
                            'nama',
                            'tgl_perolehan',
                            'jumlah','unit',
                            'tgl_service',
                            'tgl_pajak',
                            'tgl_limit',
                            'id_tipe', 'satuan'
                        ];

        public function services() {
            return $this->hasMany(Service::class, 'id_asset');
        }

                        
}
