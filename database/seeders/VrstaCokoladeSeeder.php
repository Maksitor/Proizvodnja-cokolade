<?php

namespace Database\Seeders;

use App\Models\VrstaCokolade;
use Illuminate\Database\Seeder;

class VrstaCokoladeSeeder extends Seeder
{
    public function run(): void
    {
        $vrste = [
            [
                'naziv' => 'Mlečna čokolada',
                'procenat_kakaa' => 30,
                'opis' => 'Kremasta tekstura, savršena za dnevnu potrošnju'
            ],
            [
                'naziv' => 'Tamna čokolada',
                'procenat_kakaa' => 70,
                'opis' => 'Intenzivan ukus, manje šećera'
            ],
            [
                'naziv' => 'Extra tamna',
                'procenat_kakaa' => 85,
                'opis' => 'Za prave ljubitelje čokolade'
            ],
            [
                'naziv' => 'Bela čokolada',
                'procenat_kakaa' => 0,
                'opis' => 'Bez kakao mase, samo kakao puter'
            ]
        ];

        foreach ($vrste as $vrsta) {
            VrstaCokolade::create($vrsta);
        }
    }
}