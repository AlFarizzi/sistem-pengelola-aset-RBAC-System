<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "username" => "admin",
            "password" => bcrypt('admin'),
            "nama" => "fariz-admin",
            "no_hp" => "081256785546",
            "alamat" => "Bumi",
            "email" => "admin@gmail.com",
            "nik" => "0090",
        ]);
        $user->assignRole('admin');

        $user = User::create([
            "username" => "karyawan",
            "password" => bcrypt('karyawan'),
            "nama" => "fariz-karyawan",
            "no_hp" => "081256785547",
            "alamat" => "Bumi",
            "email" => "karyawan@gmail.com",
            "nik" => "0091",
        ]);
        $user->assignRole('karyawan');

        $user = User::create([
            "username" => "pimpinan",
            "password" => bcrypt('pimpinan'),
            "nama" => "fariz-pimpinan",
            "no_hp" => "081256785548",
            "alamat" => "Bumi",
            "email" => "pimpinan@gmail.com",
            "nik" => "0092",
        ]);
        $user->assignRole('pimpinan');

        $user = User::create([
            "username" => "keuangan",
            "password" => bcrypt('keuangan'),
            "nama" => "fariz-keuangan",
            "no_hp" => "081256785549",
            "alamat" => "Bumi",
            "email" => "keuangan@gmail.com",
            "nik" => "0093",
        ]);
        $user->assignRole('keuangan');

    }

    
}
