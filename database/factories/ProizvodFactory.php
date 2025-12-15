<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{255}'),
            'opis' => fake()->text(),
            'cena' => fake()->randomFloat(2, 0, 99999999.99),
            'vrsta_cokolade_id' => fake()->word(),
            'status' => fake()->randomElement(["draft","active","archived"]),
            'slika' => fake()->regexify('[A-Za-z0-9]{255}'),
        ];
    }
}
