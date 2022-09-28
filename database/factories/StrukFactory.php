<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Struk>
 */
class StrukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'keterangan' => fake()->name(),
            'jumlah' => rand(0,10),
            'total' => rand(10000,50000),
            'gambar'=> "STRUK1.jpeg"
        ];
    }
}
