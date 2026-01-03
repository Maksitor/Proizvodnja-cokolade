@extends('layouts.app')

@section('title', 'Stanje sirovina')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-0">Stanje sirovina u magacinu</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Naziv sirovine</th>
                                <th>Količina na stanju</th>
                                <th>Jedinica mere</th>
                                <th>Minimalna količina</th>
                                <th>Cena po jedinici</th>
                                <th>Status</th>
                                <th>Vrednost zaliha</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalVrednost = 0; @endphp
                            @foreach($sirovine as $sirovina)
                                @php 
                                    $vrednost = $sirovina->kolicina_na_stanju * $sirovina->cena_po_jedinici;
                                    $totalVrednost += $vrednost;
                                    
                                    // Odredi status boju
                                    $statusClass = '';
                                    if($sirovina->status == 'dostupno') $statusClass = 'bg-success';
                                    elseif($sirovina->status == 'nedostupno') $statusClass = 'bg-warning text-dark';
                                    else $statusClass = 'bg-danger';
                                    
                                    // Proveri da li je ispod minimuma
                                    $isLow = $sirovina->kolicina_na_stanju < $sirovina->min_kolicina;
                                @endphp
                                <tr class="{{ $isLow ? 'table-warning' : '' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $sirovina->naziv }}
                                        @if($isLow)
                                            <span class="badge bg-danger ms-2">Nisko!</span>
                                        @endif
                                    </td>
                                    <td>{{ number_format($sirovina->kolicina_na_stanju, 2) }}</td>
                                    <td>{{ $sirovina->jedinica_mere }}</td>
                                    <td>{{ number_format($sirovina->min_kolicina, 2) }}</td>
                                    <td>{{ number_format($sirovina->cena_po_jedinici, 2) }} RSD</td>
                                    <td>
                                        <span class="badge {{ $statusClass }}">
                                            @if($sirovina->status == 'dostupno') Dostupno
                                            @elseif($sirovina->status == 'nedostupno') Nedostupno
                                            @else Kritično
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ number_format($vrednost, 2) }} RSD</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-secondary">
                                <td colspan="7" class="text-end"><strong>Ukupna vrednost zaliha:</strong></td>
                                <td><strong>{{ number_format($totalVrednost, 2) }} RSD</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="row mt-4">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="text-success">Dostupno</h5>
                                <h3>{{ $sirovine->where('status', 'dostupno')->count() }}</h3>
                                <p class="mb-0">sirovina</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="text-warning">Nedostupno</h5>
                                <h3>{{ $sirovine->where('status', 'nedostupno')->count() }}</h3>
                                <p class="mb-0">sirovina</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="text-danger">Kriticno</h5>
                                <h3>{{ $sirovine->where('status', 'kriticno')->count() }}</h3>
                                <p class="mb-0">sirovina</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection