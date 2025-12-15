<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VrstaCokoladeFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'naziv' => fake()->regexify('[A-Za-z0-9]{100}'),
            'procenat_kakaa' => fake()->numberBetween(-10000, 10000),
            'opis' => fake()->text(),
        ];
    }
}
