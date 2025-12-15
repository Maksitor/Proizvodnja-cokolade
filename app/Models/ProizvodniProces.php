<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProizvodniProces extends Model
{
    use HasFactory;

    protected $table = 'proizvodni_proces';

    protected $fillable = [
        'broj_serije',
        'proizvod_id',
        'vrsta_cokolade_id',
        'datum_pocetka',
        'datum_zavrsetka',
        'status',
        'kolicina_proizvedena'
    ];

    protected $casts = [
        'datum_pocetka' => 'datetime',
        'datum_zavrsetka' => 'datetime',
    ];

    // DODAJ OVE RELACIJE:
    
    /**
     * Relacija sa proizvodom
     */
    public function proizvod()
    {
        return $this->belongsTo(Proizvod::class);
    }

    /**
     * Relacija sa vrstom čokolade
     */
    public function vrstaCokolade()
    {
        return $this->belongsTo(VrstaCokolade::class);
    }

    /**
     * Relacija sa sirovinama (many-to-many)
     */
    public function sirovine()
    {
        return $this->belongsToMany(Sirovina::class, 'proizvodni_proces_sirovina')
                    ->withPivot('kolicina_utrosena')
                    ->withTimestamps();
    }
}