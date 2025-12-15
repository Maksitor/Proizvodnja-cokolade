@extends('layouts.app')

@section('title', 'Kreiraj proizvodni proces')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Kreiraj novi proizvodni proces</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('proizvodni-procesi.store') }}">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="broj_serije" class="form-label">Broj serije *</label>
                            <input type="text" class="form-control @error('broj_serije') is-invalid @enderror" 
                                   id="broj_serije" name="broj_serije" value="{{ old('broj_serije') }}" required>
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
                                            {{ old('proizvod_id') == $proizvod->id ? 'selected' : '' }}>
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
                                            {{ old('vrsta_cokolade_id') == $vrsta->id ? 'selected' : '' }}>
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
                                   value="{{ old('datum_pocetka', date('Y-m-d')) }}" required>
                            @error('datum_pocetka')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-3 mb-3">
                            <label for="datum_zavrsetka" class="form-label">Datum završetka</label>
                            <input type="date" class="form-control @error('datum_zavrsetka') is-invalid @enderror" 
                                   id="datum_zavrsetka" name="datum_zavrsetka" 
                                   value="{{ old('datum_zavrsetka') }}">
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
                                <option value="planiran" {{ old('status') == 'planiran' ? 'selected' : '' }}>Planirano</option>
                                <option value="u_toku" {{ old('status') == 'u_toku' ? 'selected' : '' }}>U toku</option>
                                <option value="zavrseno" {{ old('status') == 'zavrseno' ? 'selected' : '' }}>Završeno</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label for="kolicina_proizvedena" class="form-label">Količina proizvedena (kom) *</label>
                            <input type="number" class="form-control @error('kolicina_proizvedena') is-invalid @enderror" 
                                   id="kolicina_proizvedena" name="kolicina_proizvedena" 
                                   value="{{ old('kolicina_proizvedena', 100) }}" min="1" required>
                            @error('kolicina_proizvedena')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Ukupna cena</label>
                            <input type="text" class="form-control" id="ukupna_cena" readonly value="0.00 RSD">
                        </div>
                    </div>
                    
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Sirovine za proizvodnju</h5>
                        </div>
                        <div class="card-body">
                            <div id="sirovine-container">
                                <div class="sirovina-item row mb-3">
                                    <div class="col-md-5">
                                        <label class="form-label">Sirovina</label>
                                        <select class="form-select sirovina-select" name="sirovine[0][sirovina_id]" required>
                                            <option value="">-- Izaberite sirovinu --</option>
                                            @foreach($sirovine as $sirovina)
                                                <option value="{{ $sirovina->id }}" 
                                                        data-cena="{{ $sirovina->cena_po_jedinici }}">
                                                    {{ $sirovina->naziv }} ({{ $sirovina->jedinica_mere }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Količina utrošena</label>
                                        <input type="number" step="0.01" min="0.01" 
                                               class="form-control kolicina-input" 
                                               name="sirovine[0][kolicina_utrosena]" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Cena</label>
                                        <input type="text" class="form-control cena-input" readonly>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end">
                                        <button type="button" class="btn btn-danger btn-remove" style="display: none;">
                                            X
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="dodaj-sirovinu" class="btn btn-sm btn-outline-success mt-2">
                                + Dodaj sirovinu
                            </button>
                        </div>
                    </div>
                    
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success btn-lg">
                            Sačuvaj proces
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

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    let sirovineCounter = 1;
    
    // Dodaj novu sirovinu
    document.getElementById('dodaj-sirovinu').addEventListener('click', function() {
        const container = document.getElementById('sirovine-container');
        const newItem = container.firstElementChild.cloneNode(true);
        
        // Resetuj vrednosti
        newItem.querySelector('.sirovina-select').selectedIndex = 0;
        newItem.querySelector('.kolicina-input').value = '';
        newItem.querySelector('.cena-input').value = '';
        
        // Ažuriraj imena
        newItem.querySelector('.sirovina-select').name = `sirovine[${sirovineCounter}][sirovina_id]`;
        newItem.querySelector('.kolicina-input').name = `sirovine[${sirovineCounter}][kolicina_utrosena]`;
        
        // Prikaži dugme za brisanje
        newItem.querySelector('.btn-remove').style.display = 'block';
        
        container.appendChild(newItem);
        sirovineCounter++;
        
        // Dodaj event listener za novu sirovinu
        dodajEventListeners(newItem);
    });
    
    // Funkcija za dodavanje event listenera
    function dodajEventListeners(item) {
        const select = item.querySelector('.sirovina-select');
        const kolicinaInput = item.querySelector('.kolicina-input');
        const cenaInput = item.querySelector('.cena-input');
        
        function calculate() {
            const selectedOption = select.options[select.selectedIndex];
            const cena = selectedOption ? parseFloat(selectedOption.getAttribute('data-cena')) : 0;
            const kolicina = parseFloat(kolicinaInput.value) || 0;
            const ukupno = cena * kolicina;
            
            cenaInput.value = ukupno.toFixed(2) + ' RSD';
            calculateTotal();
        }
        
        select.addEventListener('change', calculate);
        kolicinaInput.addEventListener('input', calculate);
        
        // Dugme za brisanje
        const removeBtn = item.querySelector('.btn-remove');
        removeBtn.addEventListener('click', function() {
            item.remove();
            calculateTotal();
        });
    }
    
    // Dodaj event listener za prvu sirovinu
    dodajEventListeners(document.querySelector('.sirovina-item'));
    
    // Izračunaj ukupnu cenu
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll('.cena-input').forEach(input => {
            const value = parseFloat(input.value) || 0;
            total += value;
        });
        
        document.getElementById('ukupna_cena').value = total.toFixed(2) + ' RSD';
    }
});
</script>
@endsection
@endsection