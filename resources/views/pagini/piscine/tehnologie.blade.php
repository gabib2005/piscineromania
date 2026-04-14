@extends('layouts.app')
@section('title', 'Tehnologie Piscine — Filtrare, Incalzire, Tratament')
@section('description', 'Sisteme tehnice pentru piscine: filtrare, incalzire, tratament apa, iluminare si jocuri acvatice. Solutii de ultima generatie.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        <a href="{{ route('page.piscine') }}">Piscine rezidentiale</a>
        <span>/</span>
        Tehnologie
    </div>
    <h1>Tehnologie pentru piscine</h1>
    <p>Automatizare completa, filtrare inteligenta si sisteme de tratament de ultima generatie. Descoperiti toate categoriile tehnologice disponibile.</p>
</div>

<div class="pr-page-content">
    <div class="pr-overview-grid">
        @foreach($tehnologiiList as $item)
        <a href="{{ route('page.piscine.tehnologie.detail', $item['slug']) }}" class="pr-overview-card">
            <img src="{{ $item['photos'][0]['url'] }}" alt="{{ $item['name'] }}" loading="lazy">
            <div class="pr-overview-card-body">
                <h3>{{ $item['name'] }}</h3>
                <span class="pr-btn-sm">Detalii &rarr;</span>
            </div>
        </a>
        @endforeach
    </div>
</div>

<div class="pr-page-cta">
    <div>
        <h3>Doriti un audit al sistemelor existente?</h3>
        <p>Va oferim o evaluare gratuita si recomandari pentru modernizarea instalatiilor.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
