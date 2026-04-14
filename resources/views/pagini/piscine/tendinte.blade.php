@extends('layouts.app')
@section('title', 'Tendinte in design piscine 2025-2026')
@section('description', 'Descopera cele mai noi tendinte in design-ul piscinelor rezidentiale: materiale, forme, culori si functionalitati de ultima generatie.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        <a href="{{ route('page.piscine') }}">Piscine rezidentiale</a>
        <span>/</span>
        Tendinte
    </div>
    <h1>Tendinte in design-ul piscinelor</h1>
    <p>Cele mai recente tendinte in arhitectura piscinelor rezidentiale. Forme organice, materiale naturale si automatizare totala definesc piscinele moderne.</p>
</div>

<div class="pr-page-content">

    <div class="pr-full-image">
        <img src="https://picsum.photos/seed/modernpool/1200/675" alt="Tendinte moderne piscine 2025" loading="lazy">
        <div class="pr-full-image-overlay"></div>
        <div class="pr-full-image-caption">Designul modern al piscinelor in 2025-2026</div>
    </div>

    <div style="margin: 32px 0; max-width: 760px;">

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Minimalismul si formele curate</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">In 2025, tendinta dominanta in designul piscinelor este minimalismul. Liniile drepte, unghiurile clare si absenta elementelor decorative superficiale creeaza un aspect sofisticat si contemporan. Materiale precum betonul lustruit, piatra naturala si otelul inoxidabil sunt alegeri predilecte pentru constructori si arhitecti.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Integrarea in peisaj — biophilic design</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">Un alt trend major este integrarea piscinei in peisajul natural al gradinii. Piscinele care par a curge natural din decorul inconjurator, cu margini de piatra naturala, vegetatie acvatica si cascade incorporate, creeaza o senzatie de resort privat. Biophilic design-ul propune conexiunea dintre omul modern si natura.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Automatizare si control smart</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">Controlul piscinei prin smartphone, comenzi vocale si sisteme AI de management al chimiei apei transforma modul in care interactionam cu piscina. Senzorii inteligenti ajusteaza automat pH-ul, clorul si temperatura, reducand consumul de chimicale si energie cu pana la 40%.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Sustenabilitate si eco-design</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0;">Ingrijorarea pentru mediu se reflecta si in industria piscinelor. Pompele de caldura cu eficienta ridicata, colectoarele solare, sistemele de recuperare a apei de ploaie si filtrele naturale cu plante sunt solutii din ce in ce mai populare la clientii preocupati de amprenta ecologica.</p>

    </div>

</div>

<div class="pr-page-cta">
    <div>
        <h3>Vreti o piscina la ultimele standarde?</h3>
        <p>Proiectam piscine moderne cu cele mai recente tehnologii si materiale.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
