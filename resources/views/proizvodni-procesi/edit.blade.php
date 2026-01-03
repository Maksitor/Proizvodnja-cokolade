@extends('layouts.app')

@section('title', 'Izmeni proizvodni proces')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Izmeni proizvodni proces: {{ $proizvodniProce->broj_serije }}</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('proizvodni-procesi.update', $proizvodniProce->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="broj_serije" class="form-label">Broj serije *</label>
                            <input type="text" class="form-control @error('broj_serije') is-invalid @enderror" 
                                   id="broj_serije" name="broj_serije" 
                                   value="{{ old('broj_serije', $proizvodniProce->broj_serije) }}" required>
                            @error('broj_serije')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="proizvod_id" class="form-label">Proizvod *</label>
                            <select class="form-select @error('proizvod_id') is-invalid @enderror" 
                                    id="proizvod_id" name="proizvod_id" required>
                                <option value="">-- Izaberite proizvod --</option>
                                @foreach($proizvodi as $proizvod)
                                    <option value="{{ $proizvod->id }}" 
                                            {{ (old('proizvod_id', $proizvodniProce->proizvod_id) == $proizvod->id) ? 'selected' : '' }}>
                                        {{ $proizvod->naziv }}
                                    </option>
                                @endforeach
                            </select>
                            @error('proizvod_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="vrsta_cokolade_id" class="form-label">Vrsta čokolade *</label>
                            <select class="form-select @error('vrsta_cokolade_id') is-invalid @enderror" 
                                    id="vrsta_cokolade_id" name="vrsta_cokolade_id" required>
                                <option value="">-- Izaberite vrstu --</option>
                                @foreach($vrste as $vrsta)
                                    <option value="{{ $vrsta->id }}" 
                                            {{ (old('vrsta_cokolade_id', $proizvodniProce->vrsta_cokolade_id) == $vrsta->id) ? 'selected' : '' }}>
                                        {{ $vrsta->naziv }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vrsta_cokolade_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="datum_pocetka" class="form-label">Datum početka *</label>
                            <input type="date" class="form-control @error('datum_pocetka') is-invalid @enderror" 
                                   id="datum_pocetka" name="datum_pocetka" 
                                   value="{{ old('datum_pocetka', $proizvodniProce->datum_pocetka->format('Y-m-d')) }}" required>
                            @error('datum_pocetka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="datum_zavrsetka" class="form-label">Datum završetka</label>
                            <input type="date" class="form-control @error('datum_zavrsetka') is-invalid @enderror" 
                                   id="datum_zavrsetka" name="datum_zavrsetka" 
                                   value="{{ old('datum_zavrsetka', $proizvodniProce->datum_zavrsetka ? $proizvodniProce->datum_zavrsetka->format('Y-m-d') : '') }}">
                            @error('datum_zavrsetka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select @error('status') is-invalid @enderror" 
                                    id="status" name="status" required>
                                <option value="planiran" {{ (old('status', $proizvodniProce->status) == 'planiran') ? 'selected' : '' }}>Planirano</option>
                                <option value="u_toku" {{ (old('status', $proizvodniProce->status) == 'u_toku') ? 'selected' : '' }}>U toku</option>
                                <option value="zavrseno" {{ (old('status', $proizvodniProce->status) == 'zavrseno') ? 'selected' : '' }}>Završeno</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="kolicina_proizvedena" class="form-label">Količina proizvedena (kom) *</label>
                            <input type="number" class="form-control @error('kolicina_proizvedena') is-invalid @enderror" 
                                   id="kolicina_proizvedena" name="kolicina_proizvedena" 
                                   value="{{ old('kolicina_proizvedena', $proizvodniProce->kolicina_proizvedena) }}" min="1" required>
                            @error('kolicina_proizvedena')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success btn-lg">
                            Sačuvaj izmene
                        </button>
                        <a href="{{ route('proizvodni-procesi.index') }}" class="btn btn-outline-secondary">
                            Otkaži
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection