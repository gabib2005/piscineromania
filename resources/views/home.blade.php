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
        'piscine'              => '<path d="M2 12s3-4 10-4 10 4 10 4-3 4-10 4-10-4-10-4z"/><circle cx="12" cy="12" r="2"/>',
        'pompe-recirculare'    => '<circle cx="12" cy="12" r="4"/><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>',
        'filtre-filtrare'      => '<path d="M22 3H2l8 9.46V19l4 2v-8.54L22 3z"/>',
        'chimicale-piscine'    => '<path d="M9 3h6M10 3v5l-4 6a4 4 0 008 0l-4-6V3"/>',
        'electroliza-ph'       => '<path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/>',
        'pompe-de-caldura'     => '<path d="M14 14.76V3.5a2.5 2.5 0 00-5 0v11.26a4.5 4.5 0 105 0z"/>',
        'incalzire-apa'        => '<path d="M12 2c0 6-4 8-4 13a4 4 0 008 0c0-5-4-7-4-13z"/><path d="M8 22h8"/>',
        'iluminat-piscine'     => '<circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/>',
        'skimmere-prize'       => '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M3 9h18M9 21V9"/>',
        'conducte-fitinguri'   => '<path d="M4 9h16M4 15h16M10 3L8 21M16 3l-2 18"/>',
        'acoperitori-folii'    => '<path d="M2 20h20M4 20V8l8-6 8 6v12"/><path d="M9 20v-8h6v8"/>',
        'constructie-piscine'  => '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>',
        'saune-spa'            => '<path d="M12 22V12M8 22V15M16 22V15M4 6c0-1.1.9-2 2-2h12a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/>',
        'accesorii-piscine'    => '<path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>',
        'pompe-submersibile'   => '<path d="M12 2v14M5 9l7 7 7-7"/><path d="M5 19h14"/>',
        'automatizare'         => '<circle cx="12" cy="12" r="3"/><path d="M12 1v4M12 19v4M4.22 4.22l2.83 2.83M16.95 16.95l2.83 2.83M1 12h4M19 12h4M4.22 19.78l2.83-2.83M16.95 7.05l2.83-2.83"/>',
        'scalatoare'           => '<path d="M2 20h20M6 20V4M10 20v-8M14 20v-4M18 20v-2"/>',
        'curatare-piscine'     => '<path d="M3 12h18M9 12V6a3 3 0 016 0v6M5 20a7 7 0 0014 0"/>',
        'piese-de-schimb'      => '<path d="M11 4a7 7 0 107 7M11 4v7l4 2"/>',
    ];
    $defaultIcon = '<circle cx="12" cy="12" r="5"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2"/>';
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
