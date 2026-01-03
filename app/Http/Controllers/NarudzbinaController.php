<?php

namespace Database\Seeders;

use App\Models\Narudzbina;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NarudzbinaSeeder extends Seeder
{
    public function run(): void
    {
        $narudzbine = [
            [
                'broj_narudzbine' => 'NAR-2024-001',
                'ime_kupca' => 'Marko Marković',
                'email' => 'marko@example.com',
                'adresa' => 'Kneza Miloša 15, Beograd',
                'telefon' => '0641234567',
                'ukupna_cena' => 598.00,
                'status' => 'dostavljena',
                'created_at' => Carbon::now()->subDays(10)
            ],
            [
                'broj_narudzbine' => 'NAR-2024-002',
                'ime_kupca' => 'Ana Anić',
                'email' => 'ana@example.com',
                'adresa' => 'Nemanjina 22, Novi Sad',
                'telefon' => '0659876543',
                'ukupna_cena' => 399.00,
                'status' => 'u_obradi',
                'created_at' => Carbon::now()->subDays(3)
            ],
            [
                'broj_narudzbine' => 'NAR-2024-003',
                'ime_kupca' => 'Jovan Jovanović',
                'email' => 'jovan@example.com',
                'adresa' => 'Vuka Karadžića 5, Niš',
                'telefon' => '0635554444',
                'ukupna_cena' => 1047.00,
                'status' => 'poslata',
                'created_at' => Carbon::now()->subDays(1)
            ]
        ];

        foreach ($narudzbine as $narudzbina) {
            Narudzbina::create($narudzbina);
        }
    }
}