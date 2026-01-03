@extends('layouts.app')

@section('title', 'Pocetna')
@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Premium Cokolada</h1>
            <p class="lead mb-4 mx-auto" style="max-width: 700px; font-size: 1.2rem;">
                Nasa fabrika proizvodi najkvalitetniju cokoladu koristeci tradicionalne 
                metode i vrhunske sirovine iz celog sveta.
            </p>
            <div class="mt-5">
                <a href="/naruci" class="btn btn-primary btn-lg me-3">
                    <i class="fas fa-shopping-cart me-2"></i> Naruci odmah
                </a>
                <a href="/sirovine/stanje" class="btn btn-outline-light btn-lg">
                    <i class="fas fa-chart-line me-2"></i> Proveri stanje
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="mb-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="mb-3" style="color: var(--primary-brown);">Nasi proizvodi i usluge</h2>
                    <p class="text-muted">Pruzamo vam potpuno iskustvo od proizvodnje do dostave</p>
                </div>
            </div>
            
            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-shopping-bag"></i>
                            </div>
                            <h4 class="card-title mb-3">Online narucivanje</h4>
                            <p class="card-text text-muted">
                                Brzo i jednostavno narucite nase proizvode direktno sa sajta.
                                Selektujte kolicinu i vrstu cokolade po vasem izboru.
                            </p>
                            <a href="/naruci" class="btn btn-outline-primary mt-2">Naruci</a>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 2 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <h4 class="card-title mb-3">Transparentnost proizvodnje</h4>
                            <p class="card-text text-muted">
                                Pratite stanje sirovina u realnom vremenu i budite u toku 
                                sa svim proizvodnim procesima nase fabrike.
                            </p>
                            <a href="/sirovine/stanje" class="btn btn-outline-primary mt-2">Stanje sirovina</a>
                        </div>
                    </div>
                </div>
                
                <!-- Feature 3 -->
                <div class="col-md-4">
                    <div class="card h-100 border-0">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="fas fa-industry"></i>
                            </div>
                            <h4 class="card-title mb-3">Proizvodni procesi</h4>
                            <p class="card-text text-muted">
                                Pracenje aktivnih proizvodnih serija, njihovog statusa 
                                i planiranje novih proizvodnih ciklusa.
                            </p>
                            <a href="/proizvodni-procesi" class="btn btn-outline-primary mt-2">Proizvodne serije</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="my-5 py-4">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 style="color: var(--primary-brown);">Nasi rezultati u brojkama</h3>
                    <p class="text-muted">Statistika koja pokazuje nasu efikasnost i kvalitet</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Vrste cokolade</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">12</div>
                        <div class="stat-label">Sirovine na stanju</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Aktivne serije</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-number">142</div>
                        <div class="stat-label">Narudzbine ove godine</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Warning Section -->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="alert alert-warning-custom p-4">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-exclamation-triangle fa-2x" style="color: #ffb300;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="alert-heading mb-2">Kriticno stanje sirovina</h5>
                                <p class="mb-2">Neke od nasih sirovina su na kriticnom nivou i zahtevaju hitno narucivanje:</p>
                                <ul class="mb-0">
                                    <li><strong>Mleko u prahu:</strong> Trenutno 80kg (minimum 100kg)</li>
                                    <li><strong>Kakao prah:</strong> Trenutno 150kg (minimum 200kg)</li>
                                </ul>
                                <a href="/sirovine/stanje" class="btn btn-warning btn-sm mt-3">
                                    <i class="fas fa-exclamation-circle me-1"></i> Detaljniji pregled
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="my-5 py-4">
        <div class="container">
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 style="color: var(--primary-brown);">Sta kazu nasi klijenti</h3>
                    <p class="text-muted">Iskustva zadovoljnih kupaca</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0">Marko Petrovic</h6>
                                    <small class="text-muted">Restoran "Slatkis"</small>
                                </div>
                            </div>
                            <p class="mb-0">"Najkvalitetnija cokolada na trzistu! Redovno narucujemo za nas restoran."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0">Ana Nikolic</h6>
                                    <small class="text-muted">Slatkarnica "Medenjak"</small>
                                </div>
                            </div>
                            <p class="mb-0">"Transparentnost proizvodnje je ono sto nas je privuklo. Znamo sta kupujemo."</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="mb-0">Ivan Jovanovic</h6>
                                    <small class="text-muted">Hotel "Grand"</small>
                                </div>
                            </div>
                            <p class="mb-0">"Brza dostava i konstantan kvalitet. Preporucujemo svima koji cene dobar proizvod."</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection