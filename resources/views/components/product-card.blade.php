<div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow overflow-hidden group"
     x-data="{ adding: false }">
    <a href="{{ route('shop.show', [$product->category?->slug ?? 'produs', $product->slug]) }}" class="block">
        <div class="aspect-square bg-gray-50 overflow-hidden">
            <img src="{{ asset('images/products/' . $product->code . '.png') }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-contain p-3 group-hover:scale-105 transition-transform duration-300"
                 loading="lazy"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
            <div style="display:none; width:100%; height:100%; align-items:center; justify-content:center; color:#b8eaf4">
                <svg width="56" height="56" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 24 24"><rect x="2" y="8" width="20" height="12" rx="3"/><circle cx="12" cy="14" r="2"/></svg>
            </div>
        </div>
        <div class="p-4">
            <p class="text-xs text-gray-400 mb-1">Cod: {{ $product->code }}</p>
            <h3 class="text-sm font-semibold text-[#0a2540] line-clamp-2 leading-tight mb-2">{{ $product->name }}</h3>
            <div class="flex items-center gap-2 mb-3">
                @if($product->stock_status === 'in_stock')
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">În stoc</span>
                @else
                    <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">La comandă 3-5 zile</span>
                @endif
            </div>
            <div class="flex items-end justify-between">
                <div>
                    <p class="text-lg font-bold text-[#0a2540]">{{ number_format($product->price, 2, ',', '.') }} Lei</p>
                    <p class="text-xs text-gray-400">{{ number_format($product->price_with_tax, 2, ',', '.') }} Lei cu TVA</p>
                </div>
            </div>
        </div>
    </a>
    <div class="px-4 pb-4">
        <button @click="adding = true; addToCart({{ $product->id }})"
                :disabled="adding"
                class="w-full bg-[#0a2540] text-white py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors disabled:opacity-50">
            <span x-show="!adding">🛒 Adaugă în coș</span>
            <span x-show="adding">Se adaugă...</span>
        </button>
    </div>
</div>
