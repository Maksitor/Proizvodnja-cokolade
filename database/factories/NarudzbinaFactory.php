<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NarudzbinaFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'broj_narudzbine' => fake()->regexify('[A-Za-z0-9]{50}'),
            'ime_kupca' => fake()->regexify('[A-Za-z0-9]{100}'),
            'email' => fake()->safeEmail(),
            'adresa' => fake()->text(),
            'telefon' => fake()->regexify('[A-Za-z0-9]{20}'),
            'ukupna_cena' => fake()->randomFloat(2, 0, 99999999.99),
            'status' => fake()->randomElement(["kreirana","potvrdjena","u_obradi","poslata","dostavljena"]),
        ];
    }
}
