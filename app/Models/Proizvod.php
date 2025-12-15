<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proizvod extends Model
{
    use HasFactory;

    protected $fillable = [
        'naziv',
        'opis',
        'cena',
        'status',
        'vrsta_cokolade_id'
    ];

    // Dodaj relaciju ako već nema
    public function vrstaCokolade()
    {
        return $this->belongsTo(VrstaCokolade::class);
    }

    public function proizvodniProcesi()
    {
        return $this->hasMany(ProizvodniProces::class);
    }
}