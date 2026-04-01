@extends('layouts.app')
@section('title', 'Toate produsele')
@section('main-class', 'shop-main')

@section('content')
<div class="shop-page-outer">
    {{-- Breadcrumb --}}
    <nav class="text-sm text-gray-500 shop-breadcrumb px-4 sm:px-6 lg:px-8 pt-4 pb-2 flex-shrink-0">
        <a href="{{ route('home') }}" class="hover:text-[#00b4d8]">Acasă</a>
        <span class="mx-2">/</span>
        <span class="text-gray-800 font-medium">Produse</span>
    </nav>

    <div class="shop-page-inner px-4 sm:px-6 lg:px-8 pb-4">
        {{-- Sidebar filters --}}
        <aside class="shop-sidebar w-full lg:w-64 flex-shrink-0" x-data="{ sidebarOpen: false }">
            <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden w-full flex items-center justify-between bg-white rounded-xl border border-gray-100 p-4 mb-3 text-sm font-medium text-[#0a2540]">
                <span>Filtre & Categorii</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" :class="sidebarOpen ? 'rotate-180' : ''"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <form method="GET" action="{{ route('shop.index') }}" id="filterForm" x-show="sidebarOpen || window.innerWidth >= 1024" x-cloak>
                <div class="bg-white rounded-xl border border-gray-100 p-5 space-y-6">
                    <h3 class="font-semibold text-[#0a2540]" style="font-family:'Outfit',sans-serif">Filtrare</h3>

                    {{-- Categories --}}
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Categorii</h4>
                        <ul class="space-y-1">
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('shop.category', $cat->slug) }}"
                                   class="flex items-center justify-between text-sm py-1 px-2 rounded hover:bg-gray-50 text-gray-600 hover:text-[#0a2540] transition-colors">
                                    <span>{{ $cat->name }}</span>
                                    <span class="text-xs text-gray-400">{{ $cat->products_count }}</span>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Price --}}
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Preț (Lei)</h4>
                        <div class="flex gap-2">
                            <input type="number" name="pret_min" placeholder="Min" value="{{ request('pret_min') }}"
                                   class="w-full border border-gray-200 rounded px-2 py-1 text-sm focus:outline-none focus:border-[#00b4d8]">
                            <input type="number" name="pret_max" placeholder="Max" value="{{ request('pret_max') }}"
                                   class="w-full border border-gray-200 rounded px-2 py-1 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                    </div>

                    {{-- Stock --}}
                    <div>
                        <h4 class="text-sm font-medium text-gray-700 mb-3">Disponibilitate</h4>
                        <label class="flex items-center gap-2 text-sm cursor-pointer">
                            <input type="radio" name="stoc" value="" {{ !request('stoc') ? 'checked' : '' }}> Toate
                        </label>
                        <label class="flex items-center gap-2 text-sm cursor-pointer mt-2">
                            <input type="radio" name="stoc" value="in_stock" {{ request('stoc') === 'in_stock' ? 'checked' : '' }}> În stoc
                        </label>
                        <label class="flex items-center gap-2 text-sm cursor-pointer mt-2">
                            <input type="radio" name="stoc" value="on_order" {{ request('stoc') === 'on_order' ? 'checked' : '' }}> La comandă
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-[#0a2540] text-white py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors">
                        Aplică filtre
                    </button>
                    @if(request()->hasAny(['pret_min','pret_max','stoc']))
                    <a href="{{ route('shop.index') }}" class="block text-center text-sm text-red-500 hover:text-red-700">Resetează filtrele</a>
                    @endif
                </div>
            </form>
        </aside>

        {{-- Products --}}
        <div class="shop-products-col flex-1 flex flex-col min-w-0">
            {{-- Sort & count — FIX, nu scrollează --}}
            <div class="flex items-center justify-between mb-4 flex-shrink-0">
                <p class="text-sm text-gray-500">{{ $products->total() }} produse găsite</p>
                <select name="sort" form="filterForm" onchange="document.getElementById('filterForm').submit()"
                        class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                    <option value="relevance" {{ request('sort','relevance') === 'relevance' ? 'selected' : '' }}>Relevanță</option>
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
                    <div class="text-5xl mb-4">🔍</div>
                    <p class="text-lg">Nu am găsit produse cu aceste filtre.</p>
                    <a href="{{ route('shop.index') }}" class="mt-4 inline-block text-[#00b4d8] hover:underline">Resetează filtrele</a>
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
    })
    .then(r => r.json())
    .then(d => {
        if (d.success) {
            window.dispatchEvent(new Event('cart-updated'));
            // Toast notification
            const toast = document.createElement('div');
            toast.className = 'fixed bottom-4 right-4 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50 text-sm';
            toast.textContent = d.message;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }
    })
    .catch(() => {})
    .finally(() => { /* reset button state handled by Alpine */ });
}
</script>
@endsection
