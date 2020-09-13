<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20 ; $i++) { 
            $user = User::create([
                "username" => \Str::random(5).'-'.'karyawan',
                "password" => bcrypt('karyawan'),
                "nama" => \Str::random(5).'-'.'karyawan',
                "jk" => "Laki - Laki",
                "no_hp" => "081256785546",
                "alamat" => "Bumi",
                "email" => \Str::random(5)."@gmail.com",
                "level" => "karyawan",
                "nik" => "0090",
            ]);
            $user->assignRole('karyawan');
        }
    }
}
