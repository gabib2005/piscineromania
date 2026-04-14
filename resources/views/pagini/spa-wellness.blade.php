@extends('layouts.app')
@section('title', 'SPA & Wellness — Relaxare Completa')
@section('description', 'Experiente de wellness complete: hamam, dusuri emotionale, dusuri Vichy, fotolii de relaxare. Creati-va sanctuarul personal de relaxare.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        SPA & Wellness
    </div>
    <h1>SPA &amp; Wellness</h1>
    <p>Experiente de wellness complete — de la hamam traditional si dusuri emotionale la fotolii de relaxare premium. Creati-va sanctuarul personal de relaxare.</p>
</div>

<div class="pr-page-content" x-data="{ open: false, activeImg: '' }">

    {{-- Grid 2×2 centrat --}}
    <div style="display:flex; justify-content:center; width:100%;">
        <div style="display:grid; grid-template-columns:repeat(2, minmax(0, 400px)); gap:32px;">

            {{-- Hamam --}}
            <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 16px rgba(10,37,64,0.08); border:1px solid var(--gray-light);">
                <div style="aspect-ratio:4/3; overflow:hidden; cursor:pointer; position:relative;"
                     @click="activeImg='https://picsum.photos/seed/hamam-mosaic-spa/800/600'; open=true;">
                    <img src="https://picsum.photos/seed/hamam-mosaic-spa/800/600" alt="Hamam traditional"
                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                         onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;bottom:10px;right:10px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                    </div>
                </div>
                <div style="padding:20px 24px 24px;">
                    <h3 style="font-family:'Outfit',sans-serif; font-size:1rem; font-weight:700; color:var(--navy); margin:0 0 8px;">Hamam</h3>
                    <p style="font-family:'Nunito',sans-serif; font-size:13px; color:var(--gray); line-height:1.6; margin:0 0 16px;">Baia turca traditionala cu abur umed, mozaic si marmura. Detoxifiere si relaxare profunda la temperaturi de 40–50°C.</p>
                    <a href="{{ route('page.spa.detail', 'hamam') }}" style="font-size:13px; font-weight:700; color:var(--aqua); text-decoration:none; font-family:'Outfit',sans-serif;">Detalii &rarr;</a>
                </div>
            </div>

            {{-- Dusuri emotionale --}}
            <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 16px rgba(10,37,64,0.08); border:1px solid var(--gray-light);">
                <div style="aspect-ratio:4/3; overflow:hidden; cursor:pointer; position:relative;"
                     @click="activeImg='https://picsum.photos/seed/emotion-shower-spa/800/600'; open=true;">
                    <img src="https://picsum.photos/seed/emotion-shower-spa/800/600" alt="Dusuri emotionale"
                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                         onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;bottom:10px;right:10px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                    </div>
                </div>
                <div style="padding:20px 24px 24px;">
                    <h3 style="font-family:'Outfit',sans-serif; font-size:1rem; font-weight:700; color:var(--navy); margin:0 0 8px;">Dusuri emotionale</h3>
                    <p style="font-family:'Nunito',sans-serif; font-size:13px; color:var(--gray); line-height:1.6; margin:0 0 16px;">Experiente senzoriale cu apa, lumina, aroma si sunet — de la ploaia tropicala la cascada alpina. Ideal pentru centre spa.</p>
                    <a href="{{ route('page.spa.detail', 'dusuri-emotionale') }}" style="font-size:13px; font-weight:700; color:var(--aqua); text-decoration:none; font-family:'Outfit',sans-serif;">Detalii &rarr;</a>
                </div>
            </div>

            {{-- Dusuri Vichy --}}
            <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 16px rgba(10,37,64,0.08); border:1px solid var(--gray-light);">
                <div style="aspect-ratio:4/3; overflow:hidden; cursor:pointer; position:relative;"
                     @click="activeImg='https://picsum.photos/seed/vichy-shower-professional/800/600'; open=true;">
                    <img src="https://picsum.photos/seed/vichy-shower-professional/800/600" alt="Dusuri Vichy"
                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                         onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;bottom:10px;right:10px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                    </div>
                </div>
                <div style="padding:20px 24px 24px;">
                    <h3 style="font-family:'Outfit',sans-serif; font-size:1rem; font-weight:700; color:var(--navy); margin:0 0 8px;">Dusuri Vichy</h3>
                    <p style="font-family:'Nunito',sans-serif; font-size:13px; color:var(--gray); line-height:1.6; margin:0 0 16px;">Tehnica terapeutica cu multiple jeturi de apa termala pe masa de masaj. Originara din Franta, combinata cu aromoterapie.</p>
                    <a href="{{ route('page.spa.detail', 'dusuri-vichy') }}" style="font-size:13px; font-weight:700; color:var(--aqua); text-decoration:none; font-family:'Outfit',sans-serif;">Detalii &rarr;</a>
                </div>
            </div>

            {{-- Fotolii relaxare --}}
            <div style="background:#fff; border-radius:16px; overflow:hidden; box-shadow:0 2px 16px rgba(10,37,64,0.08); border:1px solid var(--gray-light);">
                <div style="aspect-ratio:4/3; overflow:hidden; cursor:pointer; position:relative;"
                     @click="activeImg='https://picsum.photos/seed/relax-spa-lounge-chair/800/600'; open=true;">
                    <img src="https://picsum.photos/seed/relax-spa-lounge-chair/800/600" alt="Fotolii relaxare"
                         style="width:100%; height:100%; object-fit:cover; transition:transform 0.35s;"
                         onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                    <div style="position:absolute;bottom:10px;right:10px;background:rgba(0,0,0,0.45);color:#fff;border-radius:50%;width:34px;height:34px;display:flex;align-items:center;justify-content:center;">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
                    </div>
                </div>
                <div style="padding:20px 24px 24px;">
                    <h3 style="font-family:'Outfit',sans-serif; font-size:1rem; font-weight:700; color:var(--navy); margin:0 0 8px;">Fotolii de relaxare</h3>
                    <p style="font-family:'Nunito',sans-serif; font-size:13px; color:var(--gray); line-height:1.6; margin:0 0 16px;">Fotolii ergonomice cu masaj, incalzire si cromoterapie. De la zero-gravity la capsule de flotare pentru recuperare totala.</p>
                    <a href="{{ route('page.spa.detail', 'fotolii-relaxare') }}" style="font-size:13px; font-weight:700; color:var(--aqua); text-decoration:none; font-family:'Outfit',sans-serif;">Detalii &rarr;</a>
                </div>
            </div>

        </div>
    </div>

    {{-- Lightbox simplu — fix centrat --}}
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
        <h3>Proiectati zona dvs. de wellness!</h3>
        <p>Va ajutam sa creati spatiul perfect de relaxare si recuperare.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
