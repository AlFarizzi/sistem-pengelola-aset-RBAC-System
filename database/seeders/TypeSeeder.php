<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asset_Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Asset_Type::create([
            "type" => "Divisi A"
        ]);
        Asset_Type::create([
            "type" => "Divisi B"
        ]);
        Asset_Type::create([
            "type" => "Divisi C"
        ]);
    }
}
