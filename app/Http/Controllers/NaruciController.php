<?php

namespace App\Http\Controllers;

use App\Models\Proizvod;
use App\Models\Narudzbina;
use Illuminate\Http\Request;

class NaruciController extends Controller
{
    public function create()
    {
        $proizvodi = Proizvod::where('status', 'active')->get();
        return view('naruci.create', compact('proizvodi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ime_kupca' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'telefon' => 'required|string|max:20',
            'proizvod_id' => 'required|exists:proizvods,id',
            'kolicina' => 'required|integer|min:1|max:100',
            'adresa' => 'required|string|max:500',
            'napomena' => 'nullable|string|max:1000',
        ]);

        // Pronađi proizvod
        $proizvod = Proizvod::findOrFail($validated['proizvod_id']);
        
        // Izračunaj ukupnu cenu
        $ukupnaCena = $proizvod->cena * $validated['kolicina'];
        
        // Generiši broj narudžbine
        $brojNarudzbine = 'NAR-' . date('Ymd') . '-' . str_pad(Narudzbina::count() + 1, 4, '0', STR_PAD_LEFT);
        
        // Kreiraj narudžbinu
        $narudzbina = Narudzbina::create([
            'broj_narudzbine' => $brojNarudzbine,
            'ime_kupca' => $validated['ime_kupca'],
            'email' => $validated['email'],
            'telefon' => $validated['telefon'],
            'adresa' => $validated['adresa'],
            'ukupna_cena' => $ukupnaCena,
            'status' => 'kreirana',
        ]);

        return redirect()->route('naruci.create')
            ->with('success', 'Narudžbina je uspešno kreirana!')
            ->with('narudzbina_broj', $brojNarudzbine)
            ->with('ukupna_cena', number_format($ukupnaCena, 2) . ' RSD');
    }
}