@extends('layouts.app')
@section('title', 'Căutare: ' . $q)

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-[#0a2540] mb-2" style="font-family:'Outfit',sans-serif">
        Rezultate căutare: "{{ $q }}"
    </h1>
    @if(is_object($products) && method_exists($products, 'total'))
    <p class="text-gray-500 mb-8">{{ $products->total() }} produse găsite</p>
    @endif

    @if(is_object($products) && $products->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        @foreach($products as $product)
            @include('components.product-card', ['product' => $product])
        @endforeach
    </div>
    <div class="mt-8">{{ $products->links() }}</div>
    @elseif(strlen($q) >= 2)
    <div class="text-center py-16 text-gray-400">
        <div class="text-5xl mb-4">🔍</div>
        <p class="text-lg">Nu am găsit produse pentru "{{ $q }}"</p>
        <a href="{{ route('shop.index') }}" class="mt-4 inline-block text-[#00b4d8] hover:underline">Explorează toate produsele</a>
    </div>
    @else
    <p class="text-gray-400">Introduceți cel puțin 2 caractere pentru a căuta.</p>
    @endif
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
        if (d.success) { window.dispatchEvent(new Event('cart-updated')); }
    });
}
</script>
@endsection
