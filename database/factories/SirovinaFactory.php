<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SirovinaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{255}'),
            'kolicina_na_stanju' => fake()->randomFloat(2, 0, 99999999.99),
            'jedinica_mere' => fake()->regexify('[A-Za-z0-9]{10}'),
            'min_kolicina' => fake()->randomFloat(2, 0, 99999999.99),
            'cena_po_jedinici' => fake()->randomFloat(2, 0, 99999999.99),
            'status' => fake()->randomElement(["dostupno","nedostupno","kriticno"]),
        ];
    }
}
