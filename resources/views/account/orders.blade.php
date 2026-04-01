@extends('layouts.app')
@section('title', 'Comenzile mele')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-[#0a2540] mb-8" style="font-family:'Outfit',sans-serif">📋 Comenzile mele</h1>

    @if($orders->isEmpty())
    <div class="text-center py-16 text-gray-400">
        <div class="text-5xl mb-4">📭</div>
        <p class="text-lg">Nu ai nicio comandă plasată.</p>
        <a href="{{ route('shop.index') }}" class="mt-4 inline-block bg-[#0a2540] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors">
            Explorează produsele
        </a>
    </div>
    @else
    <div class="space-y-4">
        @foreach($orders as $order)
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <div class="flex flex-wrap items-start justify-between gap-4 mb-4">
                <div>
                    <p class="font-mono font-bold text-[#0a2540] text-lg">{{ $order->order_number }}</p>
                    <p class="text-sm text-gray-400">{{ $order->created_at->format('d.m.Y H:i') }}</p>
                </div>
                <div class="text-right">
                    <p class="font-bold text-[#0a2540]">{{ number_format($order->total, 2, ',', '.') }} Lei</p>
                    @php
                    $statusColors = ['new' => 'blue', 'processing' => 'yellow', 'shipped' => 'purple', 'delivered' => 'green', 'cancelled' => 'red'];
                    $color = $statusColors[$order->status] ?? 'gray';
                    @endphp
                    <span class="inline-block bg-{{ $color }}-100 text-{{ $color }}-800 px-2 py-0.5 rounded-full text-xs font-medium mt-1">
                        {{ $order->status_label }}
                    </span>
                </div>
            </div>
            <div class="flex flex-wrap gap-2">
                @foreach($order->items->take(3) as $item)
                <span class="text-xs bg-gray-50 text-gray-600 px-2 py-1 rounded border border-gray-100">{{ $item->product_name }}</span>
                @endforeach
                @if($order->items->count() > 3)
                <span class="text-xs text-gray-400">+{{ $order->items->count() - 3 }} mai multe</span>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <div class="mt-6">{{ $orders->links() }}</div>
    @endif
</div>
@endsection
