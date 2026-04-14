@extends('layouts.app')
@section('title', 'Culoarea Apei in Piscina')
@section('description', 'Descoperi factorii care influenteaza culoarea apei in piscine si cum sa obtineti o apa albastra, transparenta si sanatoasa.')

@section('content')

<div class="pr-page-hero">
    <div class="pr-breadcrumb">
        <a href="{{ route('home') }}">Acasa</a>
        <span>/</span>
        <a href="{{ route('page.piscine') }}">Piscine rezidentiale</a>
        <span>/</span>
        Culoarea apei
    </div>
    <h1>Culoarea apei in piscina</h1>
    <p>Apa albastra, transparenta si sanatoasa este cartea de vizita a oricarei piscine. Aflati ce factori influenteaza culoarea si cum sa obtineti rezultatul perfect.</p>
</div>

<div class="pr-page-content">

    @php
    $waterPhotos = [
        ['url' => 'https://picsum.photos/seed/turquoise-pool/600/400', 'alt' => 'Apa turquoise piscina', 'desc' => 'Turquoise — culoarea clasica a piscinelor cu folie alba'],
        ['url' => 'https://picsum.photos/seed/blue-pool/600/400', 'alt' => 'Apa albastra piscina', 'desc' => 'Albastru pur — mozaic albastru cobalt sau folie albastra'],
        ['url' => 'https://picsum.photos/seed/crystal-pool/600/400', 'alt' => 'Apa cristal piscina', 'desc' => 'Cristal clar — piscina cu fund alb si apa perfecta'],
        ['url' => 'https://picsum.photos/seed/green-pool/600/400', 'alt' => 'Apa laguna piscina', 'desc' => 'Laguna verde — revêtiment cu mozaic verde-albastra'],
    ];
    @endphp

    <div style="margin: 8px 0 24px;">
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 16px;">
            @foreach($waterPhotos as $i => $photo)
            <div style="border-radius: 12px; overflow: hidden; position: relative;">
                <img src="{{ $photo['url'] }}" alt="{{ $photo['alt'] }}" loading="lazy" style="width:100%; aspect-ratio:3/2; object-fit:cover; display:block;">
                <div style="position:absolute;bottom:0;left:0;right:0;background:linear-gradient(to top, rgba(10,37,64,0.7) 0%, transparent 60%);padding:12px 16px;">
                    <span style="color:white; font-family:'Outfit',sans-serif; font-weight:600; font-size:14px;">{{ ['Turquoise', 'Albastru pur', 'Cristal clar', 'Laguna verde'][$i] }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div style="max-width: 760px; margin-top: 32px;">
        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">De ce conteaza culoarea apei?</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">Culoarea apei dintr-o piscina este influentata de mai multi factori: tipul si culoarea revêtimentului interior (folie, vopsea, mozaic), adancimea bazinului, calitatea si chimia apei, dar si lumina solara. O piscina bine intretinuta va prezenta intotdeauna o apa albastra-turcoaz, fara turbiditate sau culori nedorite.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Factori care influenteaza culoarea</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">Revêtimentul interior (folie PVC, mozaic, vopsea epoxidica) este cel mai important factor vizual. Culorile deschise (alb, bej, bleu) produc o apa de culoare albastra deschis, in timp ce revêtimentele inchise creeaza o apa mai adanca, de tip laguna. Adancimea piscinei amplifica efectul de culoare — piscinele mai adanci apar mai inchise la culoare.</p>

        <h2 style="font-family:'Outfit',sans-serif; font-size: 1.3rem; color: var(--navy); margin: 0 0 16px; border-left: 4px solid var(--aqua); padding-left: 16px;">Chimia apei si influenta sa</h2>
        <p style="font-family:'Nunito',sans-serif; font-size: 15px; color: #374151; line-height: 1.8; margin: 0 0 24px;">Un pH intre 7.2 si 7.4 asigura o apa transparenta si confortabila. Apa verzuie sau tulbure indica o proliferare algala sau un dezechilibru al tratamentului, in timp ce apa rosiatica poate semnala un exces de fier sau mangan. Diagnosticarea rapida si tratamentul corect sunt esentiale pentru o apa sanatoasa.</p>
    </div>

</div>

<div class="pr-page-cta">
    <div>
        <h3>Probleme cu culoarea apei?</h3>
        <p>Expertii nostri analizeaza apa si recomanda tratamentul potrivit.</p>
    </div>
    <a href="{{ route('page.contact') }}" class="pr-btn-primary">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
        Detalii gratuit
    </a>
</div>

@endsection
