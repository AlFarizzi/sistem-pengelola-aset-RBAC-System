<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "jenis" => $this->faker->randomElement($array = array('Berat','Ringan')),
            "detail" => $this->faker->paragraph(1),
            "harga" => rand(100000,5000000),
            "id_asset" => rand(1,20),
            "id_user" => rand(5,25),
            "status" => $this->faker->randomElement($array = array('Konfirmasi','Belum Konfirmasi')),
            "km_asset" => rand(5000,9999999)
        ];
    }
}
