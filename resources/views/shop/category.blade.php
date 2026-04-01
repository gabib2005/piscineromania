@extends('layouts.app')
@section('title', $category->name)
@section('main-class', 'shop-main')

@section('content')
<div class="shop-page-outer">
    {{-- Header categorie fix --}}
    <div class="flex-shrink-0 px-4 sm:px-6 lg:px-8 pt-4 pb-2">
        <nav class="text-sm text-gray-500 mb-2">
            <a href="{{ route('home') }}" class="hover:text-[#00b4d8]">Acasă</a>
            <span class="mx-2">/</span>
            <a href="{{ route('shop.index') }}" class="hover:text-[#00b4d8]">Produse</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">{{ $category->name }}</span>
        </nav>
        <h1 class="text-2xl font-bold text-[#0a2540]" style="font-family:'Outfit',sans-serif">
            {{ $category->icon ? $category->icon . ' ' : '' }}{{ $category->name }}
        </h1>
        <p class="text-gray-500 text-sm mt-1">{{ $products->total() }} produse disponibile</p>
    </div>

    <div class="shop-page-inner px-4 sm:px-6 lg:px-8 pb-4">
        <aside class="shop-sidebar lg:w-64 flex-shrink-0">
            <form method="GET" id="filterForm">
                <div class="bg-white rounded-xl border border-gray-100 p-5 space-y-6">
                    <h3 class="font-semibold text-[#0a2540]">Alte categorii</h3>
                    <ul class="space-y-1">
                        @foreach($categories as $cat)
                        <li>
                            <a href="{{ route('shop.category', $cat->slug) }}"
                               class="flex items-center justify-between text-sm py-1 px-2 rounded transition-colors
                                      {{ $cat->id === $category->id ? 'bg-[#00b4d8] text-white' : 'hover:bg-gray-50 text-gray-600' }}">
                                <span>{{ $cat->name }}</span>
                                <span class="text-xs opacity-70">{{ $cat->products_count }}</span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Preț (Lei)</h4>
                        <div class="flex gap-2">
                            <input type="number" name="pret_min" placeholder="Min" value="{{ request('pret_min') }}"
                                   class="w-full border border-gray-200 rounded px-2 py-1 text-sm focus:outline-none focus:border-[#00b4d8]">
                            <input type="number" name="pret_max" placeholder="Max" value="{{ request('pret_max') }}"
                                   class="w-full border border-gray-200 rounded px-2 py-1 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                    </div>
                    <button type="submit" class="w-full bg-[#0a2540] text-white py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors">
                        Filtrează
                    </button>
                </div>
            </form>
        </aside>

        <div class="shop-products-col flex-1 flex flex-col min-w-0">
            {{-- Sort & count — FIX --}}
            <div class="flex items-center justify-between mb-4 flex-shrink-0">
                <p class="text-sm text-gray-500">{{ $products->total() }} produse</p>
                <select name="sort" form="filterForm" onchange="document.getElementById('filterForm').submit()"
                        class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                    <option value="relevance">Relevanță</option>
                    <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Preț crescător</option>
                    <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Preț descrescător</option>
                    <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Alfabetic A-Z</option>
                </select>
            </div>

            {{-- Grid produse — SCROLL doar aici --}}
            <div id="products-scroll" class="flex-1 pr-1">
                @if($products->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
                    @foreach($products as $product)
                        @include('components.product-card', ['product' => $product])
                    @endforeach
                </div>
                <div class="mt-8">{{ $products->links() }}</div>
                @else
                <div class="text-center py-16 text-gray-400">
                    <div class="text-5xl mb-4">📦</div>
                    <p>Nu există produse în această categorie.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

function addToCart(productId) {
    fetch('{{ route("cart.add") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify({ product_id: productId, quantity: 1 })
    }).then(r => r.json()).then(d => {
        if (d.success) {
            window.dispatchEvent(new Event('cart-updated'));
            const t = document.createElement('div');
            t.className = 'fixed bottom-4 right-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 text-sm';
            t.textContent = d.message;
            document.body.appendChild(t);
            setTimeout(() => t.remove(), 3000);
        }
    });
}
</script>
@endsection
