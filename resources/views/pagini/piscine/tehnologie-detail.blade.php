@extends('layouts.app')
@section('title', $tehnologie['name'] . ' — Tehnologie Piscine')
@section('description', $tehnologie['description'])

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        <a href="{{ route('page.piscine') }}">Piscine rezidentiale</a>
        <span>/</span>
        <a href="{{ route('page.piscine.tehnologie') }}">Tehnologie</a>
        <span>/</span>
        {{ $tehnologie['name'] }}
    </div>
    <h1>{{ $tehnologie['name'] }}</h1>
    <p>Galerie foto si informatii despre sistemele de {{ strtolower($tehnologie['name']) }} pentru piscine. Click pe orice fotografie pentru detalii.</p>
</div>

<div class="pr-page-content">

    <x-photo-lightbox :photos="$tehnologie['photos']" :title="$tehnologie['name']" />

    <div style="margin-top: 24px; padding: 24px; background: white; border-radius: 12px; border: 1px solid var(--gray-light);">
        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.25rem; color: var(--navy); margin: 0 0 12px;">Despre sistemele de {{ $tehnologie['name'] }}</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: var(--gray); line-height: 1.75; margin: 0;">{{ $tehnologie['description'] }}</p>
    </div>

</div>

<div class="pr-page-cta">
    <div>
        <h3>Doriti o oferta pentru sistemul de {{ strtolower($tehnologie['name']) }}?</h3>
        <p>Contactati-ne pentru detalii tehnice si un deviz personalizat.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
