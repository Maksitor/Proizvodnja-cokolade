<?php

namespace App\Http\Controllers;

use App\Models\Sirovina;
use Illuminate\Http\Request;

class SirovinaController extends Controller
{
    
    public function indexPublic()
    {
        $sirovine = Sirovina::all();
        return view('sirovine.stanje', compact('sirovine'));
    }
}