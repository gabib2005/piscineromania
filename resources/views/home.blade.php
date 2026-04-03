@extends('layouts.app')
@section('title', 'PiscineRomania — Echipamente profesionale piscine')
@section('description', 'Peste 3.400 de produse pentru piscine: pompe, filtre, chimicale, pompe de căldură. Distribuitor Aquashop.hu în România.')

@section('content')

{{-- ════ HERO ════ --}}
<div class="pr-hero">

    {{-- STÂNGA --}}
    <div class="pr-hero-left">
        <div class="pr-hero-content">
            <div class="pr-eyebrow">Catalog profesional 2026</div>
            <h1 class="pr-hero-h1">Echipamente<br>pentru piscina <em>ta</em></h1>
            <p class="pr-hero-desc">Tot ce ai nevoie pentru o piscină perfectă — de la skimmere la pompe de căldură inverter. Calitate dovedită, prețuri competitive.</p>
            <div class="pr-hero-actions">
                <a href="{{ route('shop.index') }}" class="pr-btn-primary">Explorează catalogul</a>
                <a href="{{ route('shop.search') }}" class="pr-btn-outline">Cerere ofertă</a>
            </div>
            <div class="pr-hero-stats">
                <div>
                    <div class="pr-stat-num">3.400+</div>
                    <div class="pr-stat-lbl">Produse</div>
                </div>
                <div>
                    <div class="pr-stat-num">19</div>
                    <div class="pr-stat-lbl">Categorii</div>
                </div>
                <div>
                    <div class="pr-stat-num">24h</div>
                    <div class="pr-stat-lbl">Livrare</div>
                </div>
                <div>
                    <div class="pr-stat-num">10+</div>
                    <div class="pr-stat-lbl">Ani exp.</div>
                </div>
            </div>
        </div>
    </div>

    {{-- DREAPTA — fotografie piscină --}}
    <div class="pr-hero-right">
        <img class="pool-photo"
             src="https://images.unsplash.com/photo-1575429198097-0414ec08e8cd?w=1200&q=85&fit=crop&crop=center"
             alt="Piscine & echipamente profesionale"
             loading="eager"
             onerror="this.src='https://images.unsplash.com/photo-1576013551627-0cc20b96c2a7?w=1200&q=85&fit=crop'">
        <div class="pr-photo-badge">
            <div class="pr-photo-badge-title">Produse NOI 2026</div>
            <div class="pr-photo-badge-sub">150 produse noi</div>
        </div>
    </div>

</div>

{{-- ════ CATEGORII ════ --}}
<section class="pr-section">
    <div class="pr-section-header">
        <div>
            <div class="pr-section-lbl">Categorii</div>
            <h2 class="pr-section-h2">Găsește ce ai nevoie</h2>
        </div>
        <a href="{{ route('shop.index') }}" class="pr-see-all">Toate categoriile</a>
    </div>

    @php
    $catIcons = [
        'piscine'                 => '<path d="M2 15c2.5 0 2.5-2 5-2s2.5 2 5 2 2.5-2 5-2 2.5 2 5 2"/><path d="M2 19c2.5 0 2.5-2 5-2s2.5 2 5 2 2.5-2 5-2 2.5 2 5 2"/><path d="M8 15V8a4 4 0 018 0v7"/>',
        'pompe-recirculare'       => '<path d="M21 12a9 9 0 11-9-9"/><polyline points="21 3 21 12 12 12"/>',
        'filtre-si-filtrare'      => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
        'chimicale-si-tratamente' => '<line x1="9" y1="3" x2="15" y2="3"/><path d="M10 3v5.5L6 15a3 3 0 002.68 4h6.64A3 3 0 0018 15l-4-6.5V3"/>',
        'incalzire-apa'           => '<path d="M14 14.76V3.5a2.5 2.5 0 00-5 0v11.26a4.5 4.5 0 105 0z"/>',
        'iluminat-si-accesorii'   => '<line x1="9" y1="18" x2="15" y2="18"/><line x1="10" y1="22" x2="14" y2="22"/><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0018 8 6 6 0 006 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 018.91 14z"/>',
        'scari-si-platforme'      => '<line x1="8" y1="2" x2="8" y2="22"/><line x1="16" y1="2" x2="16" y2="22"/><line x1="8" y1="7" x2="16" y2="7"/><line x1="8" y1="12" x2="16" y2="12"/><line x1="8" y1="17" x2="16" y2="17"/>',
        'curatare-si-aspiratoare' => '<path d="M3 15h12a3 3 0 010 6H3v-6z"/><line x1="15" y1="18" x2="21" y2="18"/><line x1="19" y1="12" x2="21" y2="10"/><line x1="17" y1="10" x2="19" y2="8"/>',
        'folie-si-etansare'       => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/>',
        'automatizare-si-control' => '<rect x="9" y="9" width="6" height="6" rx="1"/><path d="M9 3v2M15 3v2M9 19v2M15 19v2M3 9h2M3 15h2M19 9h2M19 15h2"/>',
        'saune-si-spa'            => '<path d="M8 6c0 2.5 2 3.5 2 6M12 4c0 3 2 4.5 2 7M16 6c0 2.5 2 3.5 2 6"/><rect x="3" y="15" width="18" height="7" rx="2"/>',
        'furtunuri-si-racorduri'  => '<path d="M4 9h4v6H4a2 2 0 010-6z"/><path d="M20 9h-4v6h4a2 2 0 000-6z"/><rect x="8" y="7" width="8" height="10" rx="2"/>',
        'pompe-submersibile'      => '<line x1="12" y1="2" x2="12" y2="14"/><polyline points="8 10 12 14 16 10"/><rect x="4" y="17" width="16" height="5" rx="2"/>',
        'hidromasaj-si-jacuzzi'   => '<circle cx="7" cy="12" r="2"/><circle cx="13" cy="8" r="2"/><circle cx="18" cy="13" r="2"/><path d="M2 20c2.5 0 2.5-2 5-2s2.5 2 5 2 2.5-2 5-2 2.5 2 5 2"/>',
        'pompe-de-caldura'        => '<circle cx="12" cy="12" r="4"/><path d="M12 2v3M12 19v3M4.93 4.93l2.12 2.12M16.95 16.95l2.12 2.12M2 12h3M19 12h3M4.93 19.07l2.12-2.12M16.95 7.05l2.12-2.12"/>',
        'acoperitori-si-prelate'  => '<path d="M3 12l9-9 9 9"/><path d="M5 10v10a1 1 0 001 1h12a1 1 0 001-1V10"/><line x1="2" y1="21" x2="22" y2="21"/>',
        'robinete-si-vane'        => '<line x1="2" y1="12" x2="22" y2="12"/><polygon points="8 8 16 16 16 8 8 16"/><line x1="12" y1="5" x2="12" y2="8"/><line x1="10" y1="5" x2="14" y2="5"/>',
        'masurare-si-testare'     => '<polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/>',
        'diverse'                 => '<path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
    ];
    $defaultIcon = '<circle cx="12" cy="12" r="4"/><path d="M12 2v3M12 19v3M4.93 4.93l2.12 2.12M16.95 16.95l2.12 2.12M2 12h3M19 12h3M4.93 19.07l2.12-2.12M16.95 7.05l2.12-2.12"/>';
    @endphp

    <div class="pr-categories-grid">
        @foreach($categories as $category)
        <a href="{{ route('shop.category', $category->slug) }}" class="pr-cat-card">
            <div class="pr-cat-icon">
                <svg viewBox="0 0 24 24">
                    {!! $catIcons[$category->slug] ?? $defaultIcon !!}
                </svg>
            </div>
            <span class="pr-cat-name">{{ $category->name }}</span>
            <span class="pr-cat-count">{{ $category->products_count }} produse</span>
        </a>
        @endforeach
    </div>
</section>

{{-- ════ PRODUSE RECOMANDATE ════ --}}
@if($featuredProducts->count())
<section class="pr-section pr-products-section">
    <div class="pr-section-header">
        <div>
            <div class="pr-section-lbl">Selecție</div>
            <h2 class="pr-section-h2">Produse recomandate</h2>
        </div>
        <a href="{{ route('shop.index') }}" class="pr-see-all">Vezi toate →</a>
    </div>
    <div class="pr-products-grid">
        @foreach($featuredProducts as $product)
        @php
            $imgPath = 'images/products/' . $product->code . '.png';
            $imgUrl = file_exists(public_path($imgPath)) ? asset($imgPath) : null;
        @endphp
        <a href="{{ route('shop.show', $product->slug) }}" class="pr-product-card">
            <div class="pr-product-img">
                @if($imgUrl)
                <img src="{{ $imgUrl }}" alt="{{ $product->name }}" loading="lazy">
                @else
                <svg width="64" height="64" fill="none" stroke="#b8eaf4" stroke-width="1" viewBox="0 0 24 24"><rect x="2" y="8" width="20" height="12" rx="3"/><circle cx="12" cy="14" r="2"/></svg>
                @endif
                @if($product->is_new ?? false)
                <div class="pr-product-badge new">NOU</div>
                @elseif($product->is_featured)
                <div class="pr-product-badge">Top</div>
                @endif
            </div>
            <div class="pr-product-info">
                <div class="pr-product-cat">{{ $product->category->name ?? '' }}</div>
                <div class="pr-product-name">{{ $product->name }}</div>
                <div class="pr-product-footer">
                    <div class="pr-product-price">
                        @if($product->price > 0)
                            {{ number_format($product->price_with_tax, 2, ',', '.') }} Lei
                        @else
                            Preț la cerere
                        @endif
                    </div>
                    <button class="pr-add-btn" onclick="event.preventDefault(); addToCart({{ $product->id }})">+</button>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

{{-- ════ AVANTAJE ════ --}}
<section class="pr-section">
    <div class="pr-features-grid">
        <div class="pr-feature">
            <div class="pr-feature-icon">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </div>
            <div class="pr-feature-title">Livrare rapidă</div>
            <div class="pr-feature-text">Livrare gratuită pentru comenzi peste 800 RON în toată România.</div>
        </div>
        <div class="pr-feature">
            <div class="pr-feature-icon">
                <svg viewBox="0 0 24 24"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/></svg>
            </div>
            <div class="pr-feature-title">Garanție produse</div>
            <div class="pr-feature-text">Toate produsele sunt garantate și certificate conform standardelor EU.</div>
        </div>
        <div class="pr-feature">
            <div class="pr-feature-icon">
                <svg viewBox="0 0 24 24"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
            <div class="pr-feature-title">Suport tehnic</div>
            <div class="pr-feature-text">Echipa noastră tehnică te ajută să alegi produsul potrivit.</div>
        </div>
        <div class="pr-feature">
            <div class="pr-feature-icon">
                <svg viewBox="0 0 24 24"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </div>
            <div class="pr-feature-title">Retur 30 zile</div>
            <div class="pr-feature-text">Nu ești mulțumit? Returnezi în 30 de zile fără întrebări.</div>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
function addToCart(productId) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify({ product_id: productId, quantity: 1 })
    })
    .then(r => r.json())
    .then(d => {
        if(d.success) window.dispatchEvent(new Event('cart-updated'));
    });
}
</script>
@endsection
