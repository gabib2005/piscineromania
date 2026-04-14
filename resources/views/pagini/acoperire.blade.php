@extends('layouts.app')
@section('title', 'Acoperire Piscine — Protectie & Siguranta')
@section('description', 'Solutii de acoperire piscine: prelate izoterme, prelate de securitate si acoperiri retractabile. Protectie completa pentru piscina dvs.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        Acoperire
    </div>
    <h1>Acoperire piscine</h1>
    <p>Protejati piscina cu sistemul potrivit — de la prelate izoterme pentru economie de energie, la acoperiri de securitate pentru familii cu copii.</p>
</div>

<div class="pr-page-content" x-data="{ open: false, activeImg: '' }">

    <div style="display:flex; justify-content:center; width:100%;">
        <div style="display:grid; grid-template-columns:repeat(2, minmax(0, 400px)); gap:32px;">

            @foreach($acopeririList as $item)
            <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 16px rgba(10,37,64,0.08); border:1px solid var(--gray-light);">
                <div style="aspect-ratio:4/3; overflow:hidden; cursor:pointer; position:relative;"
                     @click="activeImg='{{ $item['photos'][0]['url'] }}'; open=true;">
                    <img src="{{ $item['photos'][0]['url'] }}" alt="{{ $item['name'] }}"
                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                         onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;bottom:10px;right:10px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                    </div>
                </div>
                <div style="padding:20px 24px 24px;">
                    <h3 style="font-family:'Outfit',sans-serif; font-size:1rem; font-weight:700; color:var(--navy); margin:0 0 8px;">{{ $item['name'] }}</h3>
                    <p style="font-family:'Nunito',sans-serif; font-size:13px; color:var(--gray); line-height:1.6; margin:0 0 16px;">{{ Str::limit($item['description'], 110) }}</p>
                    <a href="{{ route('page.acoperire.detail', $item['slug']) }}" style="font-size:13px; font-weight:700; color:var(--aqua); text-decoration:none; font-family:'Outfit',sans-serif;">Detalii &rarr;</a>
                </div>
            </div>
            @endforeach

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

</div>

<div class="pr-page-cta">
    <div>
        <h3>Nu stiti ce sistem vi se potriveste?</h3>
        <p>Va ajutam sa alegeti acoperirea potrivita pentru dimensiunile piscinei si nevoile dvs.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
