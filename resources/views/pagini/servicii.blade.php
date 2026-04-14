@extends('layouts.app')
@section('title', 'Servicii Profesionale Piscine — Piscineromania')
@section('description', 'Servicii complete pentru piscine: repornire sezon, intretinere periodica, depanare urgenta, renovare si tratament apa. Echipa specializata la dispozitia dumneavoastra.')

@section('content')

<div style="background: linear-gradient(135deg, var(--navy) 0%, #0d3059 100%); color:#fff; padding:64px 72px 56px;">
    <div style="max-width:700px;">
        <div style="display:flex; align-items:center; gap:8px; margin-bottom:16px; font-size:12px; opacity:0.7; font-family:'Outfit',sans-serif;">
            <a href="{{ route('home') }}" style="color:#fff; text-decoration:none;">Acasa</a>
            <span>/</span><span>Servicii</span>
        </div>
        <h1 style="font-size:clamp(2rem,4vw,2.75rem); font-weight:800; font-family:'Outfit',sans-serif; line-height:1.1; margin-bottom:16px;">Servicii profesionale<br>pentru piscina ta</h1>
        <p style="font-size:15px; opacity:0.8; line-height:1.7; font-family:'Nunito',sans-serif;">Echipa noastra de tehnicieni specializati este la dispozitia ta pentru orice tip de interventie, de la pornirea de sezon pana la urgente tehnice.</p>
    </div>
</div>

<div style="max-width:1100px; margin:0 auto; padding:56px 72px;">

    {{-- Titlu sectiune --}}
    <div style="display:flex; align-items:flex-start; gap:16px; margin-bottom:48px;">
        <div style="flex-shrink:0; width:5px; height:64px; background:var(--aqua); border-radius:4px; margin-top:4px;"></div>
        <div>
            <h2 style="font-size:1.5rem; font-weight:800; color:var(--navy); font-family:'Outfit',sans-serif; margin-bottom:8px;">Profesionisti la dispozitia dumneavoastra</h2>
            <p style="font-size:15px; color:var(--gray); font-style:italic; font-family:'Nunito',sans-serif; line-height:1.7;">
                Intretinerea corecta a piscinei este cheia unui sezon fara probleme. Oferim servicii complete, preventive si curative, adaptate fiecarui tip de bazin.
            </p>
        </div>
    </div>

    {{-- 3 coloane servicii --}}
    <div style="display:grid; grid-template-columns:repeat(3,1fr); gap:32px; margin-bottom:56px;">

        {{-- Serviciu 1: Repornire --}}
        <div style="text-align:center; padding:32px 20px;">
            <div style="width:64px; height:64px; margin:0 auto 20px; display:flex; align-items:center; justify-content:center;">
                <svg width="52" height="52" fill="none" stroke="var(--aqua)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M12 2a10 10 0 100 20A10 10 0 0012 2z"/>
                    <path d="M12 8v4l3 3"/>
                    <path d="M7 3.34A9.97 9.97 0 002 12c0 5.52 4.48 10 10 10"/>
                    <path d="M17 3.34A9.97 9.97 0 0122 12c0 5.52-4.48 10-10 10"/>
                </svg>
            </div>
            <h3 style="font-size:15px; font-weight:700; color:var(--navy); margin-bottom:12px; font-family:'Outfit',sans-serif;">Repornire si pregatire pentru iarna</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.7; font-family:'Nunito',sans-serif;">
                Inchidem sezonul cu protejarea corecta a sistemelor contra inghetului si deschidem sezonul cu curatare, reglaj chimic si verificarea intregii instalatii hidraulice.
            </p>
        </div>

        {{-- Serviciu 2: Monitorizare --}}
        <div style="text-align:center; padding:32px 20px; border-left:1px solid var(--gray-light); border-right:1px solid var(--gray-light);">
            <div style="width:64px; height:64px; margin:0 auto 20px; display:flex; align-items:center; justify-content:center;">
                <svg width="52" height="52" fill="none" stroke="var(--aqua)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <rect x="2" y="3" width="20" height="14" rx="2"/>
                    <path d="M8 21h8M12 17v4"/>
                    <path d="M7 8h10M7 11h7"/>
                </svg>
            </div>
            <h3 style="font-size:15px; font-weight:700; color:var(--navy); margin-bottom:12px; font-family:'Outfit',sans-serif;">Monitorizare si intretinere</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.7; font-family:'Nunito',sans-serif;">
                Vizite periodice de intretinere, testarea parametrilor chimici ai apei, curatarea filtrelor, aspirarea fundului si a peretilor. Abonamente sezoniere disponibile.
            </p>
        </div>

        {{-- Serviciu 3: Asistenta --}}
        <div style="text-align:center; padding:32px 20px;">
            <div style="width:64px; height:64px; margin:0 auto 20px; display:flex; align-items:center; justify-content:center;">
                <svg width="52" height="52" fill="none" stroke="var(--aqua)" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M12 2v2M12 20v2M20 12h2M2 12h2M19.07 19.07l-1.41-1.41M4.93 19.07l1.41-1.41"/>
                    <path d="M12 6a6 6 0 016 6"/>
                </svg>
            </div>
            <h3 style="font-size:15px; font-weight:700; color:var(--navy); margin-bottom:12px; font-family:'Outfit',sans-serif;">Asistenta si depanare</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.7; font-family:'Nunito',sans-serif;">
                Interventii rapide pentru pompe defecte, scurgeri, probleme de filtrare sau chimia apei. Diagnosticare la fata locului si remediere in aceeasi zi, acolo unde este posibil.
            </p>
        </div>

    </div>

    {{-- Servicii suplimentare --}}
    <div style="background: var(--aqua-light); border-radius:16px; padding:40px; margin-bottom:48px;">
        <h2 style="font-size:1.25rem; font-weight:800; color:var(--navy); font-family:'Outfit',sans-serif; margin-bottom:28px; text-align:center;">Servicii complete disponibile</h2>
        <div style="display:grid; grid-template-columns:repeat(2,1fr); gap:16px;">
            @php
            $serviciiLista = [
                ['icon'=>'🔧', 'text'=>'Curatare mecanica si chimica a piscinei'],
                ['icon'=>'💧', 'text'=>'Reglaj si tratament chimic al apei'],
                ['icon'=>'⚙️', 'text'=>'Service pompe, filtre si automatizari'],
                ['icon'=>'🌡️', 'text'=>'Instalare si service pompe de caldura'],
                ['icon'=>'💡', 'text'=>'Instalare si service iluminat LED'],
                ['icon'=>'🏗️', 'text'=>'Renovare si reabilitare piscine vechi'],
                ['icon'=>'🏊', 'text'=>'Aplicare folie mozaic si finisaje'],
                ['icon'=>'📋', 'text'=>'Consultanta tehnica gratuita'],
            ];
            @endphp
            @foreach($serviciiLista as $item)
            <div style="display:flex; align-items:center; gap:12px; padding:12px 16px; background:#fff; border-radius:10px;">
                <span style="font-size:20px;">{{ $item['icon'] }}</span>
                <span style="font-size:13px; color:var(--navy); font-family:'Nunito',sans-serif; font-weight:600;">{{ $item['text'] }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <hr style="border:none; border-top:1px solid var(--gray-light); margin-bottom:48px;">

    {{-- Sectiunea Contactati-ne --}}
    <div style="text-align:center;">
        <h3 style="font-size:1.25rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Contactati-ne</h3>
        <p style="color:var(--gray); margin-bottom:36px; font-family:'Nunito',sans-serif; font-size:15px;">Suntem disponibili de luni pana vineri, intre 09:00 si 18:00.</p>

        <div style="display:flex; justify-content:center; gap:64px; flex-wrap:wrap;">
            {{-- Email --}}
            <div style="display:flex; flex-direction:column; align-items:center; gap:12px;">
                <div style="width:56px; height:56px; background:var(--aqua-light); border-radius:50%; display:flex; align-items:center; justify-content:center;">
                    <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <div>
                    <p style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:var(--gray); font-weight:700; font-family:'Outfit',sans-serif; margin-bottom:4px;">Email</p>
                    <a href="mailto:contact@piscineromania.ro" style="font-size:15px; font-weight:600; color:var(--navy); text-decoration:none; font-family:'Outfit',sans-serif;">contact@piscineromania.ro</a>
                </div>
            </div>

            {{-- Telefon --}}
            <div style="display:flex; flex-direction:column; align-items:center; gap:12px;">
                <div style="width:56px; height:56px; background:var(--aqua-light); border-radius:50%; display:flex; align-items:center; justify-content:center;">
                    <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7a2 2 0 011.72 2z"/>
                    </svg>
                </div>
                <div>
                    <p style="font-size:11px; text-transform:uppercase; letter-spacing:1px; color:var(--gray); font-weight:700; font-family:'Outfit',sans-serif; margin-bottom:4px;">Telefon</p>
                    <a href="tel:+40745104024" style="font-size:15px; font-weight:600; color:var(--navy); text-decoration:none; font-family:'Outfit',sans-serif;">+40745104024</a>
                </div>
            </div>
        </div>

        <div style="margin-top:36px;">
            <a href="{{ route('page.contact') }}" class="pr-btn-primary">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                Trimite o cerere de servicii
            </a>
        </div>
    </div>

</div>
@endsection
