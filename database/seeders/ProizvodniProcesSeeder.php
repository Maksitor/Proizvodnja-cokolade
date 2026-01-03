<?php

namespace Database\Seeders;

use App\Models\ProizvodniProces;
use App\Models\Proizvod;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProizvodniProcesSeeder extends Seeder
{
    public function run(): void
    {
        $proizvodi = Proizvod::all();

        $procesi = [
            [
                'serijski_broj' => 'SER-2024-001',
                'proizvod_id' => $proizvodi->where('naziv', 'Mlečna čokolada 100g')->first()->id,
                'kolicina_proizvoda' => 500,
                'datum_pocetka' => Carbon::now()->subDays(5),
                'datum_zavrsetka' => Carbon::now()->subDays(1),
                'status' => 'zavrsen',
                'napomena' => 'Serija uspešno završena, kvalitet odličan'
            ],
            [
                'serijski_broj' => 'SER-2024-002',
                'proizvod_id' => $proizvodi->where('naziv', 'Tamna čokolada 85% 100g')->first()->id,
                'kolicina_proizvoda' => 300,
                'datum_pocetka' => Carbon::now()->subDays(2),
                'datum_zavrsetka' => null,
                'status' => 'u_toku',
                'napomena' => 'U toku je kaljenje čokolade'
            ],
            [
                'serijski_broj' => 'SER-2024-003',
                'proizvod_id' => $proizvodi->where('naziv', 'Čokolada sa lešnikom 150g')->first()->id,
                'kolicina_proizvoda' => 400,
                'datum_pocetka' => Carbon::now()->addDays(2),
                'datum_zavrsetka' => null,
                'status' => 'planiran',
                'napomena' => 'Čeka se isporuka lešnika'
            ]
        ];

        foreach ($procesi as $proces) {
            ProizvodniProces::create($proces);
        }
    }
}