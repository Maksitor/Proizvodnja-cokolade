<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sirovina extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv',
        'kolicina_na_stanju',
        'jedinica_mere',
        'min_kolicina',
        'cena_po_jedinici',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'kolicina_na_stanju' => 'decimal:2',
            'min_kolicina' => 'decimal:2',
            'cena_po_jedinici' => 'decimal:2',
        ];
    }
}
