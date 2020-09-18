<?php

namespace Database\Seeders;

use App\Models\demage;
use Illuminate\Database\Seeder;

class DemageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        demage::create([
            "demage" => "ringan"
        ]);
        demage::create([
            "demage" => "berat"
        ]);
    }
}
