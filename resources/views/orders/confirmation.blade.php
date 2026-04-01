@extends('layouts.app')
@section('title', 'Confirmare comandă')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
    <div class="text-6xl mb-6">✅</div>
    <h1 class="text-3xl font-bold text-[#0a2540] mb-3" style="font-family:'Outfit',sans-serif">Comandă plasată!</h1>
    <p class="text-gray-500 mb-8">Îți mulțumim! Comanda ta a fost înregistrată cu succes.</p>

    <div class="bg-white rounded-xl border border-gray-100 p-8 text-left mb-8">
        <div class="grid grid-cols-2 gap-4 text-sm mb-6">
            <div>
                <p class="text-gray-500">Număr comandă</p>
                <p class="font-bold text-[#0a2540] text-lg font-mono">{{ $order->order_number }}</p>
            </div>
            <div>
                <p class="text-gray-500">Status</p>
                <span class="inline-block bg-blue-100 text-blue-800 px-2 py-0.5 rounded-full text-xs font-medium">{{ $order->status_label }}</span>
            </div>
            <div>
                <p class="text-gray-500">Data</p>
                <p class="font-medium">{{ $order->created_at->format('d.m.Y H:i') }}</p>
            </div>
            <div>
                <p class="text-gray-500">Total</p>
                <p class="font-bold text-[#0a2540]">{{ number_format($order->total, 2, ',', '.') }} Lei</p>
            </div>
        </div>

        <h3 class="font-semibold text-[#0a2540] mb-3">Produse comandate:</h3>
        <div class="space-y-2">
            @foreach($order->items as $item)
            <div class="flex items-center justify-between text-sm py-2 border-b border-gray-50">
                <div>
                    <p class="text-gray-700 font-medium">{{ $item->product_name }}</p>
                    <p class="text-gray-400 text-xs">Cod: {{ $item->product_code }} | x{{ $item->quantity }}</p>
                </div>
                <span class="font-medium">{{ number_format($item->subtotal, 2, ',', '.') }} Lei</span>
            </div>
            @endforeach
        </div>

        <div class="mt-4 pt-4 border-t border-gray-100 space-y-1 text-sm">
            <div class="flex justify-between text-gray-500">
                <span>Subtotal</span><span>{{ number_format($order->subtotal, 2, ',', '.') }} Lei</span>
            </div>
            <div class="flex justify-between text-gray-500">
                <span>TVA</span><span>{{ number_format($order->tax, 2, ',', '.') }} Lei</span>
            </div>
            <div class="flex justify-between font-bold text-[#0a2540] text-base mt-2">
                <span>Total</span><span>{{ number_format($order->total, 2, ',', '.') }} Lei</span>
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="{{ route('account.orders') }}" class="bg-[#0a2540] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors">
            📋 Comenzile mele
        </a>
        <a href="{{ route('shop.index') }}" class="border border-gray-200 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-50 transition-colors">
            Continuă cumpărăturile
        </a>
    </div>
</div>
@endsection
