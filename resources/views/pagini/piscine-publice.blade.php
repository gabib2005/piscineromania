@extends('layouts.app')
@section('title', 'Piscine Publice — Strand, Bazin Public')
@section('description', 'Proiectare si constructie piscine publice, bazine acoperite, strand-uri si complexe acvatice. Solutii complete pentru investitori si autoritati locale.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        Piscine publice
    </div>
    <h1>Piscine publice</h1>
    <p>Proiectam si construim piscine publice de toate tipurile: strand-uri, bazine acoperite, complexe acvatice si piscine pentru hoteluri si pensiuni.</p>
</div>

<div class="pr-page-content" x-data="{ open: false, activeImg: '' }">

    {{-- Foto principala strand — centrata --}}
    <div style="display:flex; justify-content:center; width:100%; margin-bottom:32px;">
        <div style="width:100%; max-width:860px; border-radius:20px; overflow:hidden; cursor:pointer; position:relative; aspect-ratio:16/7; box-shadow:0 8px 32px rgba(10,37,64,0.15);"
             @click="activeImg='https://picsum.photos/seed/outdoor-strand-pool-summer/1200/525'; open=true;">
            <img src="https://picsum.photos/seed/outdoor-strand-pool-summer/1200/525"
                 alt="Strand bazin public"
                 style="width:100%; height:100%; object-fit:cover; transition:transform 0.4s;"
                 onmouseover="this.style.transform='scale(1.03)'" onmouseout="this.style.transform='scale(1)'">
            <div style="position:absolute;inset:0;background:linear-gradient(to top, rgba(10,37,64,0.45) 0%, transparent 60%);"></div>
            <div style="position:absolute;bottom:20px;left:24px;right:24px; display:flex; align-items:flex-end; justify-content:space-between;">
                <p style="color:#fff; font-family:'Outfit',sans-serif; font-size:14px; font-weight:600; margin:0; text-shadow:0 2px 8px rgba(0,0,0,0.5);">Complex acvatic public cu facilitati complete</p>
                <div style="background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:40px;height:40px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                    <svg width="17" height="17" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                </div>
            </div>
        </div>
    </div>

    {{-- Grid 3 poze — centrat --}}
    <div style="display:flex; justify-content:center; width:100%; margin-bottom:40px;">
        <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:16px; width:100%; max-width:860px;">

            <div style="border-radius:14px; overflow:hidden; cursor:pointer; aspect-ratio:4/3; position:relative; box-shadow:0 2px 12px rgba(10,37,64,0.08);"
                 @click="activeImg='https://picsum.photos/seed/olympic-pool-public/800/600'; open=true;">
                <img src="https://picsum.photos/seed/olympic-pool-public/800/600" alt="Bazin olimpic"
                     style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                     onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position:absolute;bottom:8px;right:8px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:30px;height:30px;display:flex;align-items:center;justify-content:center;">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                </div>
            </div>

            <div style="border-radius:14px; overflow:hidden; cursor:pointer; aspect-ratio:4/3; position:relative; box-shadow:0 2px 12px rgba(10,37,64,0.08);"
                 @click="activeImg='https://picsum.photos/seed/hotel-pool-luxury/800/600'; open=true;">
                <img src="https://picsum.photos/seed/hotel-pool-luxury/800/600" alt="Piscina hotel"
                     style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                     onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position:absolute;bottom:8px;right:8px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:30px;height:30px;display:flex;align-items:center;justify-content:center;">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                </div>
            </div>

            <div style="border-radius:14px; overflow:hidden; cursor:pointer; aspect-ratio:4/3; position:relative; box-shadow:0 2px 12px rgba(10,37,64,0.08);"
                 @click="activeImg='https://picsum.photos/seed/aquatic-center-children/800/600'; open=true;">
                <img src="https://picsum.photos/seed/aquatic-center-children/800/600" alt="Complex acvatic copii"
                     style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                     onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position:absolute;bottom:8px;right:8px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:30px;height:30px;display:flex;align-items:center;justify-content:center;">
                    <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                </div>
            </div>

        </div>
    </div>

    {{-- Lightbox centrat --}}
    <div x-show="open" x-cloak @keydown.escape.window="open=false"
         style="position:fixed;inset:0;z-index:9999;">
        <div style="position:absolute;inset:0;background:rgba(0,0,0,0.92);" @click="open=false"></div>
        <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;padding:24px;pointer-events:none;">
            <img :src="activeImg" style="max-height:85vh;max-width:90vw;border-radius:10px;object-fit:contain;box-shadow:0 20px 60px rgba(0,0,0,0.5);pointer-events:auto;">
        </div>
        <button @click="open=false" style="position:absolute;top:20px;right:20px;background:rgba(255,255,255,0.18);border:none;color:#fff;width:44px;height:44px;border-radius:50%;font-size:22px;cursor:pointer;display:flex;align-items:center;justify-content:center;z-index:1;">&#215;</button>
    </div>

    <div style="max-width:760px; margin:0 auto;">
        <h2 style="font-family:'Outfit',sans-serif; font-size:1.3rem; color:var(--navy); margin:0 0 16px; border-left:4px solid var(--aqua); padding-left:16px;">Expertiza in piscine publice</h2>
        <p style="font-family:'Nunito',sans-serif; font-size:15px; color:#374151; line-height:1.8; margin:0 0 24px;">Piscinele publice reprezinta o investitie majora care necesita materiale de inalta rezistenta si sisteme tehnice capabile sa faca fata unui numar mare de utilizatori zilnici. Suntem partenerul de incredere pentru investitori, primarii si operatori de complexe turistice.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size:1.3rem; color:var(--navy); margin:0 0 16px; border-left:4px solid var(--aqua); padding-left:16px;">Tipuri de piscine publice</h2>
        <p style="font-family:'Nunito',sans-serif; font-size:15px; color:#374151; line-height:1.8; margin:0 0 24px;">Strand-uri cu bazine multiple (competitie, inot liber, copii, hidromasaj), piscine acoperite cu utilizare tot anul, bazine pentru hoteluri de 3–5 stele, piscine terapeutice si complexe acvatice cu tobogane.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size:1.3rem; color:var(--navy); margin:0 0 16px; border-left:4px solid var(--aqua); padding-left:16px;">Sisteme tehnice pentru uz intensiv</h2>
        <p style="font-family:'Nunito',sans-serif; font-size:15px; color:#374151; line-height:1.8; margin:0;">Implementam solutii comerciale cu pompe industriale, statii de dozare automate, sisteme UV si ozon, monitorizare continua a calitatii apei si respectarea stricta a normativelor sanitare in vigoare.</p>
    </div>

</div>

<div class="pr-page-cta">
    <div>
        <h3>Aveti un proiect de piscina publica?</h3>
        <p>Contactati-ne pentru consultanta tehnica si un studiu de fezabilitate.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
