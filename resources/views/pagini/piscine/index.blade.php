@extends('layouts.app')
@section('title', 'Piscine — Proiectare & Constructie')

@section('content')
<div style="background: linear-gradient(135deg, var(--aqua) 0%, var(--navy) 100%); color:#fff; padding: 72px 72px 64px; position:relative; overflow:hidden;">
    <div style="max-width:700px; position:relative; z-index:1;">
        <p style="font-size:12px; font-weight:700; text-transform:uppercase; letter-spacing:2px; opacity:0.7; margin-bottom:12px; font-family:'Outfit',sans-serif;">Piscineromania</p>
        <h1 style="font-size:clamp(2rem,4vw,3rem); font-weight:800; font-family:'Outfit',sans-serif; line-height:1.1; margin-bottom:20px;">
            Piscina perfecta <br>pentru casa ta
        </h1>
        <p style="font-size:16px; opacity:0.85; line-height:1.7; margin-bottom:32px; font-family:'Nunito',sans-serif;">
            De la design la constructie, oferim solutii complete pentru piscine de toate tipurile. Consultanta gratuita, materiale premium, echipa cu experienta.
        </p>
        <div style="display:flex; gap:16px; flex-wrap:wrap;">
            <a href="{{ route('page.contact') }}" style="background:#fff; color:var(--navy); padding:14px 28px; border-radius:50px; font-weight:700; font-size:14px; text-decoration:none; font-family:'Outfit',sans-serif; transition:opacity .2s;">
                Solicita consultanta gratuita
            </a>
            <a href="{{ route('shop.category', 'piscine') }}" style="border:2px solid rgba(255,255,255,0.5); color:#fff; padding:12px 28px; border-radius:50px; font-weight:600; font-size:14px; text-decoration:none; font-family:'Outfit',sans-serif; transition:opacity .2s;">
                Produse piscine
            </a>
        </div>
    </div>
    <div style="position:absolute; right:-80px; top:-80px; width:420px; height:420px; background:rgba(255,255,255,0.04); border-radius:50%;"></div>
    <div style="position:absolute; right:60px; bottom:-40px; width:200px; height:200px; background:rgba(255,255,255,0.06); border-radius:50%;"></div>
</div>

{{-- Sectiuni --}}
<div style="max-width:1280px; margin:0 auto; padding:56px 72px;">
    <h2 style="font-size:1.6rem; font-weight:800; color:var(--navy); font-family:'Outfit',sans-serif; margin-bottom:8px;">Descopera sectiunile noastre</h2>
    <p style="color:var(--gray); margin-bottom:40px; font-family:'Nunito',sans-serif;">Informatii complete despre designul, tehnologia si intretinerea piscinei tale.</p>

    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(280px,1fr)); gap:24px;">

        <a href="{{ route('page.piscine.concepte') }}" style="display:block; background:#fff; border-radius:16px; padding:28px; text-decoration:none; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light); transition:transform .2s, box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(10,37,64,0.07)'">
            <div style="width:48px; height:48px; background:var(--aqua-light); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
            </div>
            <h3 style="font-size:1rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Concepte</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">Piscine cu skimmer, infinity, inox, cu pereti din sticla si multe altele.</p>
        </a>

        <a href="{{ route('page.piscine.tendinte') }}" style="display:block; background:#fff; border-radius:16px; padding:28px; text-decoration:none; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light); transition:transform .2s, box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(10,37,64,0.07)'">
            <div style="width:48px; height:48px; background:var(--aqua-light); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            </div>
            <h3 style="font-size:1rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Tendinte</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">Filtrare, incalzire, iluminare si jocuri acvatice — tot ce e nou in lumea piscinelor.</p>
        </a>

        <a href="{{ route('page.piscine.culoarea-apei') }}" style="display:block; background:#fff; border-radius:16px; padding:28px; text-decoration:none; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light); transition:transform .2s, box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(10,37,64,0.07)'">
            <div style="width:48px; height:48px; background:var(--aqua-light); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2z"/><path d="M12 6v6l4 2"/></svg>
            </div>
            <h3 style="font-size:1rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Culoarea apei</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">Chimia apei, revêtiment si tratamente pentru o apa albastra, transparenta si sanatoasa.</p>
        </a>

        <a href="{{ route('page.piscine.tehnologie') }}" style="display:block; background:#fff; border-radius:16px; padding:28px; text-decoration:none; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light); transition:transform .2s, box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(10,37,64,0.07)'">
            <div style="width:48px; height:48px; background:var(--aqua-light); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93l-1.41 1.41M4.93 4.93l1.41 1.41M12 2v2M12 20v2M20 12h2M2 12h2M19.07 19.07l-1.41-1.41M4.93 19.07l1.41-1.41"/></svg>
            </div>
            <h3 style="font-size:1rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Tehnologie</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">Automatizare, sisteme inteligente de filtrare si control al calitatii apei.</p>
        </a>

        <a href="{{ route('page.piscine.renovari') }}" style="display:block; background:#fff; border-radius:16px; padding:28px; text-decoration:none; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light); transition:transform .2s, box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(10,37,64,0.07)'">
            <div style="width:48px; height:48px; background:var(--aqua-light); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <h3 style="font-size:1rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Renovari</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">Modernizam si renovam orice tip de piscina existenta, de la revêtiment la tehnica.</p>
        </a>

        <a href="{{ route('page.piscine.servicii') }}" style="display:block; background:#fff; border-radius:16px; padding:28px; text-decoration:none; box-shadow:0 2px 12px rgba(10,37,64,0.07); border:1px solid var(--gray-light); transition:transform .2s, box-shadow .2s;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 8px 32px rgba(10,37,64,0.12)'" onmouseout="this.style.transform='';this.style.boxShadow='0 2px 12px rgba(10,37,64,0.07)'">
            <div style="width:48px; height:48px; background:var(--aqua-light); border-radius:12px; display:flex; align-items:center; justify-content:center; margin-bottom:16px;">
                <svg width="24" height="24" fill="none" stroke="var(--aqua)" stroke-width="1.5" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg>
            </div>
            <h3 style="font-size:1rem; font-weight:700; color:var(--navy); margin-bottom:8px; font-family:'Outfit',sans-serif;">Servicii</h3>
            <p style="font-size:13px; color:var(--gray); line-height:1.6; font-family:'Nunito',sans-serif;">Intretinere, service, repornire sezoniera si asistenta tehnica profesionala.</p>
        </a>

    </div>
</div>
@endsection
