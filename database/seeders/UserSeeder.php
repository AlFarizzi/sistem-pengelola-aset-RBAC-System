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
            "jk" => "Laki - Laki",
            "no_hp" => "081256785546",
            "alamat" => "Bumi",
            "email" => "admin@gmail.com",
            "level" => "admin",
            "nik" => "0090",
        ]);
        $user->assignRole('admin');

        $user = User::create([
            "username" => "karyawan",
            "password" => bcrypt('karyawan'),
            "nama" => "fariz-karyawan",
            "jk" => "Laki - Laki",
            "no_hp" => "081256785546",
            "alamat" => "Bumi",
            "email" => "karyawan@gmail.com",
            "level" => "karyawan",
            "nik" => "0091",
        ]);
        $user->assignRole('karyawan');

        $user = User::create([
            "username" => "pimpinan",
            "password" => bcrypt('pimpinan'),
            "nama" => "fariz-pimpinan",
            "jk" => "Laki - Laki",
            "no_hp" => "081256785546",
            "alamat" => "Bumi",
            "email" => "pimpinan@gmail.com",
            "level" => "pimpinan",
            "nik" => "0092",
        ]);
        $user->assignRole('pimpinan');

        $user = User::create([
            "username" => "keuangan",
            "password" => bcrypt('keuangan'),
            "nama" => "fariz-keuangan",
            "jk" => "Laki - Laki",
            "no_hp" => "081256785546",
            "alamat" => "Bumi",
            "email" => "keuangan@gmail.com",
            "level" => "keuangan",
            "nik" => "0092",
        ]);
        $user->assignRole('keuangan');

    }

    
}
