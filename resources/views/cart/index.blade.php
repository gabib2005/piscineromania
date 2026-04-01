@extends('layouts.app')
@section('title', 'Coș de cumpărături')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-[#0a2540] mb-8" style="font-family:'Outfit',sans-serif">🛒 Coșul meu</h1>

    @if($items->isEmpty())
    <div class="text-center py-20 text-gray-400">
        <div class="text-6xl mb-6">🛒</div>
        <p class="text-xl mb-6">Coșul tău este gol.</p>
        <a href="{{ route('shop.index') }}" class="bg-[#0a2540] text-white px-8 py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors">
            Continuă cumpărăturile
        </a>
    </div>
    @else
    <div class="flex flex-col-reverse lg:flex-row gap-6 lg:gap-8">
        {{-- Items --}}
        <div class="flex-1 space-y-4">
            @foreach($items as $item)
            <div class="bg-white rounded-xl border border-gray-100 p-5 flex items-center gap-5"
                 x-data="{ quantity: {{ $item->quantity }}, updating: false }">
                {{-- Image --}}
                <a href="{{ route('shop.show', [$item->product->category?->slug ?? 'produs', $item->product->slug]) }}" class="flex-shrink-0">
                    <img src="{{ asset('images/products/' . $item->product->code . '.png') }}"
                         alt="{{ $item->product->name }}"
                         class="w-16 h-16 sm:w-20 sm:h-20 object-contain rounded-lg bg-gray-50 p-1"
                         onerror="this.style.opacity='0.2'">
                </a>
                {{-- Info --}}
                <div class="flex-1 min-w-0">
                    <p class="text-xs text-gray-400">{{ $item->product->code }}</p>
                    <a href="{{ route('shop.show', [$item->product->category?->slug ?? 'produs', $item->product->slug]) }}"
                       class="font-medium text-[#0a2540] hover:text-[#00b4d8] transition-colors line-clamp-2 text-sm">
                        {{ $item->product->name }}
                    </a>
                    <p class="text-sm text-gray-500 mt-1">{{ number_format($item->product->price, 2, ',', '.') }} Lei / buc</p>
                </div>
                {{-- Quantity --}}
                <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="quantity = Math.max(0, quantity - 1); updateCart({{ $item->product_id }}, quantity)"
                            class="px-3 py-3 text-gray-600 hover:bg-gray-50 font-bold min-w-[44px]">−</button>
                    <span class="w-10 text-center text-sm font-medium" x-text="quantity"></span>
                    <button @click="quantity = Math.min(99, quantity + 1); updateCart({{ $item->product_id }}, quantity)"
                            class="px-3 py-3 text-gray-600 hover:bg-gray-50 font-bold min-w-[44px]">+</button>
                </div>
                {{-- Subtotal --}}
                <div class="text-right min-w-[80px]">
                    <p class="font-bold text-[#0a2540]" x-text="({{ $item->product->price }} * quantity).toFixed(2).replace('.', ',') + ' Lei'"></p>
                </div>
                {{-- Remove --}}
                <button onclick="removeFromCart({{ $item->product_id }})"
                        class="text-red-400 hover:text-red-600 transition-colors ml-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
            @endforeach
        </div>

        {{-- Summary --}}
        <div class="w-full lg:w-80 flex-shrink-0">
            <div class="bg-white rounded-xl border border-gray-100 p-6 sticky top-20">
                <h2 class="font-semibold text-[#0a2540] text-lg mb-5" style="font-family:'Outfit',sans-serif">Sumar comandă</h2>
                <div class="space-y-3 text-sm">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal (fără TVA)</span>
                        <span>{{ number_format($totals['subtotal'], 2, ',', '.') }} Lei</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>TVA 19%</span>
                        <span>{{ number_format($totals['tax'], 2, ',', '.') }} Lei</span>
                    </div>
                    <div class="flex justify-between text-gray-600">
                        <span>Transport</span>
                        @if($totals['shipping'] == 0)
                            <span class="text-green-600 font-medium">Gratuit 🎉</span>
                        @else
                            <span>{{ number_format($totals['shipping'], 2, ',', '.') }} Lei</span>
                        @endif
                    </div>
                    <div class="border-t border-gray-100 pt-3 flex justify-between font-bold text-[#0a2540] text-base">
                        <span>Total</span>
                        <span>{{ number_format($totals['total'], 2, ',', '.') }} Lei</span>
                    </div>
                </div>

                @auth
                <a href="{{ route('order.checkout') }}"
                   class="block w-full mt-6 bg-[#0a2540] text-white py-3 rounded-xl text-center font-semibold hover:bg-[#00b4d8] transition-colors">
                    Finalizează comanda →
                </a>
                @else
                <a href="{{ route('login') }}"
                   class="block w-full mt-6 bg-[#0a2540] text-white py-3 rounded-xl text-center font-semibold hover:bg-[#00b4d8] transition-colors">
                    Autentifică-te pentru a comanda
                </a>
                @endauth

                <a href="{{ route('shop.index') }}" class="block text-center text-sm text-gray-500 hover:text-[#00b4d8] mt-3 transition-colors">
                    ← Continuă cumpărăturile
                </a>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
function updateCart(productId, quantity) {
    fetch('{{ route("cart.update") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify({ product_id: productId, quantity: quantity })
    }).then(r => r.json()).then(d => {
        if (d.success) {
            window.dispatchEvent(new Event('cart-updated'));
            if (quantity === 0) window.location.reload();
        }
    });
}

function removeFromCart(productId) {
    fetch('{{ route("cart.remove") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify({ product_id: productId })
    }).then(r => r.json()).then(d => {
        if (d.success) { window.location.reload(); }
    });
}
</script>
@endsection
