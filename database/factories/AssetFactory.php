<?php

namespace Database\Factories;

use App\Models\Asset;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AssetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Asset::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "no_asset" => "ASSET-".\Str::random(5),
            "nama" => $this->faker->name(),
            "tgl_perolehan" => $this->faker->dateTimeBetween('-10 days','now'),
            "tgl_service" => $this->faker->dateTimeBetween('now', '+10 days'),
            "tgl_pajak" => $this->faker->dateTimeBetween('+2 years', '+5 years'),
            "tgl_limit" => $this->faker->dateTimeBetween('+2 years', '+5 years'),
            "id_tipe" => rand(1,3),
            "jumlah" => rand(1,10),
            "satuan" => "unit"
        ];
    }
}
