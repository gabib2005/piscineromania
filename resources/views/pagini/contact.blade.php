@extends('layouts.app')
@section('title', 'Contact — PiscineRomania')

@section('content')
<div style="background: linear-gradient(135deg, var(--navy) 0%, #163560 100%); color:#fff; padding:56px 72px 48px;">
    <div style="max-width:1280px; margin:0 auto;">
        <h1 style="font-size:clamp(1.75rem,3.5vw,2.5rem); font-weight:800; font-family:'Outfit',sans-serif; margin-bottom:12px;">Contactati-ne</h1>
        <p style="font-size:15px; opacity:0.8; font-family:'Nunito',sans-serif;">Suntem disponibili sa raspundem la orice intrebare despre produsele si serviciile noastre.</p>
    </div>
</div>

<div style="max-width:1280px; margin:0 auto; padding:56px 72px;">
    <div style="display:grid; grid-template-columns:1fr 380px; gap:64px; align-items:start;">

        {{-- Formular contact --}}
        <div style="background:#fff; border-radius:20px; padding:40px; box-shadow:0 4px 24px rgba(10,37,64,0.08); border:1px solid var(--gray-light);">
            <h2 style="font-size:1.2rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Trimite-ne un mesaj</h2>
            <p style="font-size:13px; color:var(--gray); margin-bottom:28px; font-family:'Nunito',sans-serif;">Completati formularul si va vom raspunde in maxim 24 de ore lucratoare.</p>

            @if(session('success'))
            <div style="background:#d1fae5; border:1px solid #6ee7b7; border-radius:10px; padding:14px 18px; margin-bottom:24px; font-size:14px; color:#065f46; font-family:'Nunito',sans-serif;">
                {{ session('success') }}
            </div>
            @endif

            <form method="POST" action="{{ route('page.contact.submit') }}" style="display:flex; flex-direction:column; gap:20px;">
                @csrf

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); margin-bottom:6px; font-family:'Outfit',sans-serif;">Nume complet *</label>
                        <input type="text" name="nume" value="{{ old('nume') }}" placeholder="Ion Popescu"
                            style="width:100%; border:1.5px solid {{ $errors->has('nume') ? '#f87171' : 'var(--gray-light)' }}; border-radius:10px; padding:11px 14px; font-size:14px; color:var(--navy); background:#f8fafc; font-family:'Nunito',sans-serif; box-sizing:border-box; outline:none; transition:border-color .2s;"
                            onfocus="this.style.borderColor='var(--aqua)'" onblur="this.style.borderColor='var(--gray-light)'">
                        @error('nume')<p style="color:#ef4444; font-size:11px; margin-top:4px; font-family:'Outfit',sans-serif;">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); margin-bottom:6px; font-family:'Outfit',sans-serif;">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="ion@email.com"
                            style="width:100%; border:1.5px solid {{ $errors->has('email') ? '#f87171' : 'var(--gray-light)' }}; border-radius:10px; padding:11px 14px; font-size:14px; color:var(--navy); background:#f8fafc; font-family:'Nunito',sans-serif; box-sizing:border-box; outline:none;"
                            onfocus="this.style.borderColor='var(--aqua)'" onblur="this.style.borderColor='var(--gray-light)'">
                        @error('email')<p style="color:#ef4444; font-size:11px; margin-top:4px; font-family:'Outfit',sans-serif;">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); margin-bottom:6px; font-family:'Outfit',sans-serif;">Telefon</label>
                        <input type="tel" name="telefon" value="{{ old('telefon') }}" placeholder="+40 7XX XXX XXX"
                            style="width:100%; border:1.5px solid var(--gray-light); border-radius:10px; padding:11px 14px; font-size:14px; color:var(--navy); background:#f8fafc; font-family:'Nunito',sans-serif; box-sizing:border-box; outline:none;"
                            onfocus="this.style.borderColor='var(--aqua)'" onblur="this.style.borderColor='var(--gray-light)'">
                    </div>
                    <div>
                        <label style="display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); margin-bottom:6px; font-family:'Outfit',sans-serif;">Subiect *</label>
                        <select name="subiect"
                            style="width:100%; border:1.5px solid {{ $errors->has('subiect') ? '#f87171' : 'var(--gray-light)' }}; border-radius:10px; padding:11px 14px; font-size:14px; color:var(--navy); background:#f8fafc; font-family:'Nunito',sans-serif; box-sizing:border-box; outline:none; cursor:pointer;">
                            <option value="">Alege subiectul...</option>
                            <option value="Consultanta piscine" {{ old('subiect') === 'Consultanta piscine' ? 'selected' : '' }}>Consultanta piscine</option>
                            <option value="Oferta de pret" {{ old('subiect') === 'Oferta de pret' ? 'selected' : '' }}>Oferta de pret</option>
                            <option value="Service si intretinere" {{ old('subiect') === 'Service si intretinere' ? 'selected' : '' }}>Service si intretinere</option>
                            <option value="Renovare piscina" {{ old('subiect') === 'Renovare piscina' ? 'selected' : '' }}>Renovare piscina</option>
                            <option value="Produse si stoc" {{ old('subiect') === 'Produse si stoc' ? 'selected' : '' }}>Produse si stoc</option>
                            <option value="Comanda existenta" {{ old('subiect') === 'Comanda existenta' ? 'selected' : '' }}>Comanda existenta</option>
                            <option value="Altele" {{ old('subiect') === 'Altele' ? 'selected' : '' }}>Altele</option>
                        </select>
                        @error('subiect')<p style="color:#ef4444; font-size:11px; margin-top:4px; font-family:'Outfit',sans-serif;">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label style="display:block; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); margin-bottom:6px; font-family:'Outfit',sans-serif;">Mesaj *</label>
                    <textarea name="mesaj" rows="5" placeholder="Descrieti solicitarea dumneavoastra..."
                        style="width:100%; border:1.5px solid {{ $errors->has('mesaj') ? '#f87171' : 'var(--gray-light)' }}; border-radius:10px; padding:11px 14px; font-size:14px; color:var(--navy); background:#f8fafc; font-family:'Nunito',sans-serif; box-sizing:border-box; outline:none; resize:vertical; min-height:120px;"
                        onfocus="this.style.borderColor='var(--aqua)'" onblur="this.style.borderColor='var(--gray-light)'">{{ old('mesaj') }}</textarea>
                    @error('mesaj')<p style="color:#ef4444; font-size:11px; margin-top:4px; font-family:'Outfit',sans-serif;">{{ $message }}</p>@enderror
                </div>

                <button type="submit"
                    style="background:linear-gradient(135deg, var(--navy), #163560); color:#fff; border:none; border-radius:12px; padding:14px 28px; font-size:15px; font-weight:700; font-family:'Outfit',sans-serif; cursor:pointer; transition:opacity .2s; letter-spacing:0.3px;">
                    Trimite mesajul
                </button>
            </form>
        </div>

        {{-- Info colateral --}}
        <div style="display:flex; flex-direction:column; gap:24px;">

            <div style="background:#fff; border-radius:16px; padding:28px; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light);">
                <h3 style="font-size:14px; font-weight:700; color:var(--navy); margin-bottom:16px; font-family:'Outfit',sans-serif; text-transform:uppercase; letter-spacing:0.8px;">Date de contact</h3>
                <div style="display:flex; flex-direction:column; gap:16px;">
                    <div style="display:flex; gap:12px; align-items:flex-start;">
                        <div style="width:36px; height:36px; background:var(--aqua-light); border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div>
                            <p style="font-size:11px; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); font-family:'Outfit',sans-serif; margin-bottom:3px;">Email</p>
                            <a href="mailto:contact@piscineromania.ro" style="font-size:14px; color:var(--navy); text-decoration:none; font-family:'Nunito',sans-serif; font-weight:600;">contact@piscineromania.ro</a>
                        </div>
                    </div>
                    <div style="display:flex; gap:12px; align-items:flex-start;">
                        <div style="width:36px; height:36px; background:var(--aqua-light); border-radius:8px; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <svg width="16" height="16" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.67A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7a2 2 0 011.72 2z"/></svg>
                        </div>
                        <div>
                            <p style="font-size:11px; text-transform:uppercase; letter-spacing:0.8px; color:var(--gray); font-family:'Outfit',sans-serif; margin-bottom:3px;">Telefon</p>
                            <a href="tel:+40745104024" style="font-size:14px; color:var(--navy); text-decoration:none; font-family:'Nunito',sans-serif; font-weight:600;">+40745104024</a>
                        </div>
                    </div>
                </div>
            </div>

            <div style="background:#fff; border-radius:16px; padding:28px; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light);">
                <h3 style="font-size:14px; font-weight:700; color:var(--navy); margin-bottom:16px; font-family:'Outfit',sans-serif; text-transform:uppercase; letter-spacing:0.8px;">Program</h3>
                <div style="display:flex; flex-direction:column; gap:8px;">
                    @foreach([['Luni — Vineri', '09:00 — 18:00'], ['Sambata', '09:00 — 13:00'], ['Duminica', 'Inchis']] as [$zi,$ora])
                    <div style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid var(--gray-light); font-family:'Nunito',sans-serif; font-size:14px;">
                        <span style="color:var(--gray);">{{ $zi }}</span>
                        <span style="color:{{ $ora === 'Inchis' ? '#e53e3e' : 'var(--navy)' }}; font-weight:600;">{{ $ora }}</span>
                    </div>
                    @endforeach
                </div>
            </div>

            <div style="background:linear-gradient(135deg, var(--aqua-light), #e0f4fc); border-radius:16px; padding:28px;">
                <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">
                    <strong style="color:var(--navy); font-family:'Outfit',sans-serif;">Timp de raspuns:</strong><br>
                    Va raspundem in maxim 24 de ore in zilele lucratoare. Pentru urgente tehnice, mentionati in mesaj.
                </p>
            </div>
        </div>

    </div>
</div>
@endsection
