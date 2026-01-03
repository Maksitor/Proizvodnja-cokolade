@extends('layouts.app')

@section('title', 'Naručivanje proizvoda')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Naručite našu čokoladu</h3>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        <h5>Uspešno ste naručili!</h5>
                        <p class="mb-0">Broj vaše narudžbine: <strong>{{ session('narudzbina_broj') }}</strong></p>
                        <p class="mb-0">Ukupna cena: <strong>{{ session('ukupna_cena') }} RSD</strong></p>
                        <p class="mb-0">Status: <span class="badge bg-info">kreirana</span></p>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('naruci.store') }}" id="narudzbinaForm">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="ime_kupca" class="form-label">Ime i prezime *</label>
                            <input type="text" class="form-control @error('ime_kupca') is-invalid @enderror" 
                                   id="ime_kupca" name="ime_kupca" value="{{ old('ime_kupca') }}" required>
                            @error('ime_kupca')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email adresa *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                   id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="telefon" class="form-label">Telefon *</label>
                            <input type="text" class="form-control @error('telefon') is-invalid @enderror" 
                                   id="telefon" name="telefon" value="{{ old('telefon') }}" required>
                            @error('telefon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="proizvod_id" class="form-label">Izaberite proizvod *</label>
                            <select class="form-select @error('proizvod_id') is-invalid @enderror" 
                                    id="proizvod_id" name="proizvod_id" required>
                                <option value="">-- Izaberite čokoladu --</option>
                                @foreach($proizvodi as $proizvod)
                                    <option value="{{ $proizvod->id }}" 
                                            data-cena="{{ $proizvod->cena }}"
                                            {{ old('proizvod_id') == $proizvod->id ? 'selected' : '' }}>
                                        {{ $proizvod->naziv }} - {{ number_format($proizvod->cena, 2) }} RSD
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
                            <label for="kolicina" class="form-label">Količina (komada) *</label>
                            <input type="number" class="form-control @error('kolicina') is-invalid @enderror" 
                                   id="kolicina" name="kolicina" min="1" value="{{ old('kolicina', 1) }}" required>
                            @error('kolicina')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-6 mb-3">
                            <label for="ukupna_cena" class="form-label">Ukupna cena</label>
                            <input type="text" class="form-control" id="ukupna_cena" readonly value="0.00 RSD">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="adresa" class="form-label">Adresa za dostavu *</label>
                        <textarea class="form-control @error('adresa') is-invalid @enderror" 
                                  id="adresa" name="adresa" rows="3" required>{{ old('adresa') }}</textarea>
                        @error('adresa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="napomena" class="form-label">Napomena (opciono)</label>
                        <textarea class="form-control" id="napomena" name="napomena" rows="2">{{ old('napomena') }}</textarea>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">
                            Pošaljite narudžbinu
                        </button>
                        <a href="/" class="btn btn-outline-secondary">Nazad na početnu</a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="card mt-4">
            <div class="card-header">
                <h5 class="mb-0">Dostupni proizvodi</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach($proizvodi as $proizvod)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <h6 class="card-title">{{ $proizvod->naziv }}</h6>
                                    <p class="card-text text-success fw-bold">{{ number_format($proizvod->cena, 2) }} RSD</p>
                                    <p class="card-text small">{{ Str::limit($proizvod->opis, 80) }}</p>
                                    <span class="badge bg-success">Aktivno</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const proizvodSelect = document.getElementById('proizvod_id');
    const kolicinaInput = document.getElementById('kolicina');
    const ukupnaCenaInput = document.getElementById('ukupna_cena');
    
    function calculateTotal() {
        const selectedOption = proizvodSelect.options[proizvodSelect.selectedIndex];
        const cena = selectedOption ? parseFloat(selectedOption.getAttribute('data-cena')) : 0;
        const kolicina = parseInt(kolicinaInput.value) || 0;
        const ukupno = cena * kolicina;
        
        ukupnaCenaInput.value = ukupno.toFixed(2) + ' RSD';
    }
    
    proizvodSelect.addEventListener('change', calculateTotal);
    kolicinaInput.addEventListener('input', calculateTotal);
    
    // Initial calculation
    calculateTotal();
});
</script>
@endsection
@endsection