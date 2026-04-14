@extends('layouts.app')
@section('title', 'Renovare Piscine — Modernizare & Reabilitare')
@section('description', 'Servicii complete de renovare si modernizare piscine. De la inlocuirea revêtimentului la upgrade-ul sistemelor tehnice.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        <a href="{{ route('page.piscine') }}">Piscine rezidentiale</a>
        <span>/</span>
        Renovari
    </div>
    <h1>Renovare si modernizare piscine</h1>
    <p>Transformam piscina veche intr-un spatiu modern si eficient. De la inlocuirea revêtimentului la upgrade-ul complet al sistemelor tehnice.</p>
</div>

<div class="pr-page-content">

    <div class="pr-full-image">
        <img src="https://picsum.photos/seed/mosaic-pool/1200/600" alt="Piscina renovata cu mozaic" loading="lazy">
        <div class="pr-full-image-overlay"></div>
        <div class="pr-full-image-caption">Piscina renovata cu mozaic premium</div>
    </div>

    <div style="max-width: 760px; margin-top: 32px;">

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">De ce sa renovati piscina?</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">O piscina veche de 10-15 ani poate prezenta probleme structurale, etansare deficienta sau sisteme tehnice uzate care consuma exagerat energie. Renovarea completa sau partiala rezolva toate aceste probleme si poate transforma complet aspectul piscinei la o fractiune din costul construirii uneia noi.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Ce lucrari includem?</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">Serviciile noastre de renovare cuprind: inlocuire revêtiment (folie PVC, mozaic ceramic, vopsea epoxidica), modernizare sisteme de filtrare si pompe, instalare incalzire, upgrade iluminare LED, adaugare automatizare completa si reparatii structurale. Fiecare proiect este evaluat individual si adaptat nevoilor clientului.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Garantie si materiale premium</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 32px;">Folosim exclusiv materiale certificate, cu garantie de 5-10 ani. Echipa noastra de tehnicieni specializati executa toate lucrarile cu precizie, respectand toate normele tehnice si de siguranta.</p>

    </div>

    <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 8px;">
        @foreach([
            ['Evaluare', 'Inspectie completa a piscinei: structura, etansare, sisteme tehnice. Identificam toate problemele si prioritatile.', '01'],
            ['Proiect', 'Plan detaliat cu lucrari necesare, materiale selectate, termene si deviz transparent cu costuri complete.', '02'],
            ['Executie', 'Lucrari executate de echipa specializata cu materiale premium. Testare completa si predare cu garantie.', '03'],
        ] as [$titlu, $desc, $nr])
        <div style="background: white; border-radius: 12px; padding: 24px; border: 1px solid var(--gray-light); border-top: 3px solid var(--aqua);">
            <div style="font-family:'Outfit',sans-serif; font-size: 2rem; font-weight: 800; color: var(--aqua-mid); margin-bottom: 12px;">{{ $nr }}</div>
            <h3 style="font-family:'Outfit',sans-serif; font-size: 1rem; font-weight: 700; color: var(--navy); margin: 0 0 8px;">{{ $titlu }}</h3>
            <p style="font-family:'Nunito',sans-serif; font-size: 13px; color: var(--gray); line-height: 1.6; margin: 0;">{{ $desc }}</p>
        </div>
        @endforeach
    </div>

</div>

<div class="pr-page-cta">
    <div>
        <h3>Solicitati un deviz gratuit!</h3>
        <p>Trimiteti-ne foto cu piscina si va facem o estimare rapida in 24 ore.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
