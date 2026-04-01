@extends('layouts.app')
@section('title', $product->name)
@section('description', Str::limit(strip_tags($product->description ?? ''), 160))

{{-- Variabilele se definesc ÎNAINTE de orice @section, în scope-ul global al view-ului --}}
@php
    $mainImg   = asset('images/products/' . $product->code . '.png');
    $extraImgs = collect();
    for ($i = 2; $i <= 5; $i++) {
        if (file_exists(public_path('images/products/' . $product->code . '_' . $i . '.png'))) {
            $extraImgs->push(asset('images/products/' . $product->code . '_' . $i . '.png'));
        }
    }
@endphp

@section('meta')
<script type="application/ld+json">{"@@context":"https://schema.org/","@@type":"Product","name":"{{ addslashes($product->name) }}","sku":"{{ $product->code }}"}</script>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Breadcrumb --}}
    <nav class="text-xs sm:text-sm text-gray-500 mb-4 sm:mb-6 flex flex-wrap gap-1 items-center">
        <a href="{{ route('home') }}" class="hover:text-[#00b4d8]">Acasă</a>
        <span class="mx-1">/</span>
        <a href="{{ route('shop.index') }}" class="hover:text-[#00b4d8]">Produse</a>
        <span class="mx-1">/</span>
        @if(isset($category))
        <a href="{{ route('shop.category', $category->slug) }}" class="hover:text-[#00b4d8]">{{ $category->name }}</a>
        <span class="mx-1">/</span>
        @endif
        <span class="text-gray-800">{{ Str::limit($product->name, 50) }}</span>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

        {{-- Galerie imagini --}}
        <div x-data="{ activeImage: '{{ $mainImg }}' }">
            <div class="bg-white rounded-xl border border-gray-100 overflow-hidden aspect-square mb-4">
                <img :src="activeImage" alt="{{ $product->name }}"
                     class="w-full h-full object-contain p-2 sm:p-6"
                     onerror="this.style.opacity='0.2'">
            </div>
            @if($extraImgs->count())
            <div class="grid grid-cols-5 gap-1 sm:gap-2">
                <button type="button" @click="activeImage = '{{ $mainImg }}'"
                        class="border-2 rounded-lg overflow-hidden aspect-square transition-colors"
                        :class="activeImage === '{{ $mainImg }}' ? 'border-[#00b4d8]' : 'border-gray-100 hover:border-gray-300'">
                    <img src="{{ $mainImg }}" alt="" class="w-full h-full object-contain p-1">
                </button>
                @foreach($extraImgs as $extraUrl)
                <button type="button" @click="activeImage = '{{ $extraUrl }}'"
                        class="border-2 rounded-lg overflow-hidden aspect-square transition-colors"
                        :class="activeImage === '{{ $extraUrl }}' ? 'border-[#00b4d8]' : 'border-gray-100 hover:border-gray-300'">
                    <img src="{{ $extraUrl }}" alt="" class="w-full h-full object-contain p-1">
                </button>
                @endforeach
            </div>
            @endif
        </div>

        {{-- Info produs --}}
        <div x-data="{ quantity: 1, adding: false }"
             @cart-done.document="adding = false">

            <p class="text-sm text-gray-400 mb-2">
                Cod: <span class="font-mono font-medium text-gray-600">{{ $product->code }}</span>
            </p>
            <h1 class="text-2xl md:text-3xl font-bold text-[#0a2540] mb-4 leading-tight" style="font-family:'Outfit',sans-serif">
                {{ $product->name }}
            </h1>

            @if($product->category)
            <p class="text-sm text-gray-500 mb-4">
                Categorie:
                <a href="{{ route('shop.category', $product->category->slug) }}" class="text-[#00b4d8] hover:underline">
                    {{ $product->category->name }}
                </a>
            </p>
            @endif

            {{-- Stock --}}
            <div class="mb-6">
                @if($product->stock_status === 'in_stock')
                <span class="inline-flex items-center gap-1 bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                    În stoc
                </span>
                @else
                <span class="inline-flex items-center gap-1 bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                    La comandă — 3-5 zile lucrătoare
                </span>
                @endif
            </div>

            {{-- Preț --}}
            <div class="bg-gray-50 rounded-xl p-5 mb-6">
                <div class="flex items-baseline gap-3">
                    <span class="text-3xl font-bold text-[#0a2540]">{{ number_format($product->price, 2, ',', '.') }} Lei</span>
                    <span class="text-sm text-gray-400">fără TVA</span>
                </div>
                <p class="text-sm text-gray-500 mt-1">
                    {{ number_format($product->price_with_tax, 2, ',', '.') }} Lei
                    <span class="text-gray-400">cu TVA 19%</span>
                </p>
            </div>

            {{-- Cantitate + Coș --}}
            <div class="flex items-center gap-4 mb-6">
                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                    <button type="button" @click="quantity = Math.max(1, quantity - 1)"
                            class="px-4 py-3 text-gray-600 hover:bg-gray-50 transition-colors font-bold">−</button>
                    <input type="number" x-model="quantity" min="1" max="99"
                           class="w-16 text-center py-3 border-0 focus:outline-none text-sm font-medium">
                    <button type="button" @click="quantity = Math.min(99, quantity + 1)"
                            class="px-4 py-3 text-gray-600 hover:bg-gray-50 transition-colors font-bold">+</button>
                </div>
                <button type="button"
                        @click="adding = true; addToCart({{ $product->id }}, quantity)"
                        :disabled="adding"
                        class="flex-1 bg-[#0a2540] text-white py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors disabled:opacity-50 text-sm">
                    <span x-show="!adding">Adaugă în coș</span>
                    <span x-show="adding">Se adaugă...</span>
                </button>
            </div>

            <p class="text-xs text-gray-400">
                Livrare gratuită pentru comenzi peste {{ number_format(env('SHIPPING_FREE_THRESHOLD', 800), 0, ',', '.') }} Lei
            </p>
        </div>
    </div>

    {{-- Descriere --}}
    @if($product->description)
    <div class="mt-12 bg-white rounded-xl border border-gray-100 p-8">
        <h2 class="text-xl font-semibold text-[#0a2540] mb-4" style="font-family:'Outfit',sans-serif">Descriere produs</h2>
        <div class="prose prose-sm max-w-none text-gray-600">
            {!! nl2br(e($product->description)) !!}
        </div>
    </div>
    @endif

    {{-- Produse similare --}}
    @if($related->count())
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-[#0a2540] mb-6" style="font-family:'Outfit',sans-serif">Produse similare</h2>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($related as $rel)
                @include('components.product-card', ['product' => $rel])
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection

@section('scripts')
<script>
function addToCart(productId, quantity) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
        },
        body: JSON.stringify({ product_id: productId, quantity: quantity || 1 })
    })
    .then(function(r) { return r.json(); })
    .then(function(d) {
        if (d.success) {
            window.dispatchEvent(new Event('cart-updated'));
            var t = document.createElement('div');
            t.className = 'fixed bottom-4 right-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 text-sm';
            t.textContent = d.message || 'Produs adăugat în coș';
            document.body.appendChild(t);
            setTimeout(function() { t.remove(); }, 3000);
        }
    })
    .catch(function() {})
    .finally(function() {
        document.dispatchEvent(new Event('cart-done'));
    });
}
</script>
@endsection
