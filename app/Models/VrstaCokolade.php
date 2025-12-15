<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VrstaCokolade extends Model
{
    use HasFactory;

    protected $fillable = ['naziv', 'opis'];

    // Dodaj relacije ako već nema
    public function proizvodi()
    {
        return $this->hasMany(Proizvod::class);
    }

    public function proizvodniProcesi()
    {
        return $this->hasMany(ProizvodniProces::class);
    }
}