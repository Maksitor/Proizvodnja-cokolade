<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProizvodniProcesFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'serijski_broj' => fake()->regexify('[A-Za-z0-9]{50}'),
            'proizvod_id' => fake()->word(),
            'kolicina_proizvoda' => fake()->numberBetween(-10000, 10000),
            'datum_pocetka' => fake()->date(),
            'datum_zavrsetka' => fake()->date(),
            'status' => fake()->randomElement(["planiran","u_toku","zavrsen","otkazan"]),
            'napomena' => fake()->text(),
        ];
    }
}
