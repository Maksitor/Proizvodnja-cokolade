<?php

namespace App\Http\Controllers;

use App\Models\ProizvodniProces;
use Illuminate\Http\Request;

class ProizvodniProcesController extends Controller
{
    // ... postojeći kod ...
    
    /**
     * Prikaži listu proizvodnih procesa
     */
    public function index()
    {
        $procesi = ProizvodniProces::with(['proizvod', 'vrstaCokolade'])->paginate(10);
        return view('proizvodni-procesi.index', compact('procesi'));
    }

    /**
     * Prikaži formu za kreiranje novog procesa
     */
    public function create()
    {
        $proizvodi = \App\Models\Proizvod::all();
        $vrste = \App\Models\VrstaCokolade::all();
        $sirovine = \App\Models\Sirovina::all();
        
        return view('proizvodni-procesi.create', compact('proizvodi', 'vrste', 'sirovine'));
    }

    /**
     * Sačuvaj novi proizvodni proces
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'broj_serije' => 'required|string|max:50|unique:proizvodni_proces,broj_serije',
            'proizvod_id' => 'required|exists:proizvods,id',
            'vrsta_cokolade_id' => 'required|exists:vrsta_cokolades,id',
            'datum_pocetka' => 'required|date',
            'datum_zavrsetka' => 'nullable|date|after:datum_pocetka',
            'status' => 'required|in:planiran,u_toku,zavrseno',
            'kolicina_proizvedena' => 'required|integer|min:1',
            'sirovine' => 'required|array',
            'sirovine.*.sirovina_id' => 'required|exists:sirovinas,id',
            'sirovine.*.kolicina_utrosena' => 'required|numeric|min:0.01',
        ]);

        // Kreiraj proizvodni proces
        $proces = ProizvodniProces::create([
            'broj_serije' => $validated['broj_serije'],
            'proizvod_id' => $validated['proizvod_id'],
            'vrsta_cokolade_id' => $validated['vrsta_cokolade_id'],
            'datum_pocetka' => $validated['datum_pocetka'],
            'datum_zavrsetka' => $validated['datum_zavrsetka'] ?? null,
            'status' => $validated['status'],
            'kolicina_proizvedena' => $validated['kolicina_proizvedena'],
        ]);

        // Dodaj sirovine
        foreach ($request->sirovine as $sirovinaData) {
            $proces->sirovine()->attach($sirovinaData['sirovina_id'], [
                'kolicina_utrosena' => $sirovinaData['kolicina_utrosena']
            ]);
        }

        return redirect()->route('proizvodni-procesi.index')
            ->with('success', 'Proizvodni proces uspešno kreiran!');
    }

    /**
     * Prikaži formu za izmenu procesa
     */
    public function edit(ProizvodniProces $proizvodniProce)
    {
        $proizvodi = \App\Models\Proizvod::all();
        $vrste = \App\Models\VrstaCokolade::all();
        $sirovine = \App\Models\Sirovina::all();
        
        return view('proizvodni-procesi.edit', compact('proizvodniProce', 'proizvodi', 'vrste', 'sirovine'));
    }

    /**
     * Ažuriraj proizvodni proces
     */
    public function update(Request $request, ProizvodniProces $proizvodniProce)
    {
        $validated = $request->validate([
            'broj_serije' => 'required|string|max:50|unique:proizvodni_proces,broj_serije,' . $proizvodniProce->id,
            'proizvod_id' => 'required|exists:proizvods,id',
            'vrsta_cokolade_id' => 'required|exists:vrsta_cokolades,id',
            'datum_pocetka' => 'required|date',
            'datum_zavrsetka' => 'nullable|date|after:datum_pocetka',
            'status' => 'required|in:planiran,u_toku,zavrseno',
            'kolicina_proizvedena' => 'required|integer|min:1',
        ]);

        $proizvodniProce->update($validated);

        return redirect()->route('proizvodni-procesi.index')
            ->with('success', 'Proizvodni proces uspešno ažuriran!');
    }

    /**
     * Obriši proizvodni proces
     */
    public function destroy(ProizvodniProces $proizvodniProce)
    {
        $proizvodniProce->sirovine()->detach();
        $proizvodniProce->delete();

        return redirect()->route('proizvodni-procesi.index')
            ->with('success', 'Proizvodni proces uspešno obrisan!');
    }
}