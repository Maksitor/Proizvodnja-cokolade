@extends('layouts.app')

@section('title', 'Početna')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Dobrodošli u Chocolate Factory</h3>
            </div>
            <div class="card-body text-center py-5">
                <h1 class="display-1 mb-4">🍫</h1>
                <h2 class="mb-4" style="color: #5d4037;">Proizvodnja i prodaja premium čokolade</h2>
                <p class="lead mb-5">Naša fabrika proizvodi najkvalitetniju čokoladu od odabranih sirovina uz pažljivu kontrolu kvaliteta.</p>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3" style="font-size: 3rem;">🛒</div>
                                <h5 class="card-title">Naručite čokoladu</h5>
                                <p class="card-text">Izaberite iz našeg asortimana i naručite online. Brza dostava.</p>
                                <a href="/naruci" class="btn btn-primary mt-2">Naručite sada</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3" style="font-size: 3rem;">📊</div>
                                <h5 class="card-title">Pratite proizvodnju</h5>
                                <p class="card-text">Pratite stanje sirovina i tok proizvodnih serija u realnom vremenu.</p>
                                <a href="/sirovine/stanje" class="btn btn-primary mt-2">Stanje sirovina</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center">
                                <div class="mb-3" style="font-size: 3rem;">⚙️</div>
                                <h5 class="card-title">Proizvodni procesi</h5>
                                <p class="card-text">Pogledajte aktivne proizvodne serije i njihov status.</p>
                                <a href="/proizvodni-procesi" class="btn btn-primary mt-2">Serije</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0">Brze informacije</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    use App\Models\Proizvod;
                                    use App\Models\Sirovina;
                                    use App\Models\ProizvodniProces;
                                @endphp
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Aktivni proizvodi:</span>
                                        <span class="badge bg-primary">{{ Proizvod::where('status', 'active')->count() }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Sirovine na stanju:</span>
                                        <span class="badge bg-primary">{{ Sirovina::count() }}</span>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>Aktivne serije:</span>
                                        <span class="badge bg-primary">{{ ProizvodniProces::where('status', 'u_toku')->count() }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-info text-white">
                                <h5 class="mb-0">Kritične sirovine</h5>
                            </div>
                            <div class="card-body">
                                @php
                                    $kriticne = Sirovina::where('status', 'kriticno')->get();
                                @endphp
                                @if($kriticne->count() > 0)
                                    <div class="alert alert-warning">
                                        <strong>Upozorenje!</strong> Neke sirovine su na kritičnom nivou:
                                        <ul class="mb-0 mt-2">
                                            @foreach($kriticne as $sirovina)
                                                <li>{{ $sirovina->naziv }} ({{ $sirovina->kolicina_na_stanju }} {{ $sirovina->jedinica_mere }})</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @else
                                    <p class="text-success mb-0">Sve sirovine su na zadovoljavajućem nivou.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection