@extends('layouts.app')

@section('title', 'Proizvodni procesi')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Proizvodni procesi</h3>
                <a href="{{ route('proizvodni-procesi.create') }}" class="btn btn-success">
                    + Novi proces
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Broj serije</th>
                                <th>Proizvod</th>
                                <th>Vrsta čokolade</th>
                                <th>Datum početka</th>
                                <th>Datum završetka</th>
                                <th>Količina</th>
                                <th>Status</th>
                                <th>Akcije</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($procesi as $proces)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <strong>{{ $proces->broj_serije }}</strong>
                                    </td>
                                    <td>{{ $proces->proizvod->naziv ?? 'N/A' }}</td>
                                    <td>{{ $proces->vrstaCokolade->naziv ?? 'N/A' }}</td>
                                    <td>{{ $proces->datum_pocetka->format('d.m.Y.') }}</td>
                                    <td>
                                        @if($proces->datum_zavrsetka)
                                            {{ $proces->datum_zavrsetka->format('d.m.Y.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $proces->kolicina_proizvedena }} kom</td>
                                    <td>
                                        @if($proces->status == 'zavrseno')
                                            <span class="badge bg-success">Završeno</span>
                                        @elseif($proces->status == 'u_toku')
                                            <span class="badge bg-warning text-dark">U toku</span>
                                        @else
                                            <span class="badge bg-info">Planirano</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('proizvodni-procesi.show', $proces->id) }}" 
                                           class="btn btn-sm btn-info">
                                            Detalji
                                        </a>
                                        <a href="{{ route('proizvodni-procesi.edit', $proces->id) }}" 
                                           class="btn btn-sm btn-warning">
                                            Izmeni
                                        </a>
                                        <form action="{{ route('proizvodni-procesi.destroy', $proces->id) }}" 
                                              method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" 
                                                    onclick="return confirm('Da li ste sigurni?')">
                                                Obriši
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">Nema proizvodnih procesa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                @if($procesi->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $procesi->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection