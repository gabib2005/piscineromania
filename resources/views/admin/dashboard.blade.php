@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
{{-- Stats grid --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    @php
    $cards = [
        ['label' => 'Comenzi azi', 'value' => $stats['orders_today'], 'icon' => '📅', 'color' => 'blue'],
        ['label' => 'Comenzi lună', 'value' => $stats['orders_month'], 'icon' => '📆', 'color' => 'indigo'],
        ['label' => 'Vânzări lună', 'value' => number_format($stats['revenue_month'], 2, ',', '.') . ' Lei', 'icon' => '💰', 'color' => 'green'],
        ['label' => 'Comenzi noi', 'value' => $stats['new_orders'], 'icon' => '🔔', 'color' => 'yellow'],
        ['label' => 'Total produse', 'value' => $stats['products_count'], 'icon' => '📦', 'color' => 'purple'],
        ['label' => 'Total clienți', 'value' => $stats['users_count'], 'icon' => '👥', 'color' => 'pink'],
    ];
    @endphp
    @foreach($cards as $card)
    <div class="bg-white rounded-xl border border-gray-100 p-5">
        <div class="text-2xl mb-2">{{ $card['icon'] }}</div>
        <p class="text-2xl font-bold text-[#0a2540]" style="font-family:'Outfit',sans-serif">{{ $card['value'] }}</p>
        <p class="text-sm text-gray-500 mt-1">{{ $card['label'] }}</p>
    </div>
    @endforeach
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    {{-- Recent orders --}}
    <div class="bg-white rounded-xl border border-gray-100 p-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-semibold text-[#0a2540]" style="font-family:'Outfit',sans-serif">Comenzi recente</h2>
            <a href="{{ route('admin.orders.index') }}" class="text-sm text-[#00b4d8] hover:underline">Vezi toate</a>
        </div>
        <div class="space-y-3">
            @foreach($recentOrders as $order)
            <a href="{{ route('admin.orders.show', $order) }}"
               class="flex items-center justify-between py-2 border-b border-gray-50 hover:bg-gray-50 px-2 rounded transition-colors">
                <div>
                    <p class="text-sm font-mono font-medium text-[#0a2540]">{{ $order->order_number }}</p>
                    <p class="text-xs text-gray-400">{{ $order->shipping_name }} · {{ $order->created_at->diffForHumans() }}</p>
                </div>
                <div class="text-right">
                    <p class="text-sm font-medium">{{ number_format($order->total, 2, ',', '.') }} Lei</p>
                    <span class="text-xs px-2 py-0.5 rounded-full
                        {{ $order->status === 'new' ? 'bg-blue-100 text-blue-700' : '' }}
                        {{ $order->status === 'processing' ? 'bg-yellow-100 text-yellow-700' : '' }}
                        {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                        {{ $order->status_label }}
                    </span>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    {{-- Sales chart (simple) --}}
    <div class="bg-white rounded-xl border border-gray-100 p-6">
        <h2 class="font-semibold text-[#0a2540] mb-4" style="font-family:'Outfit',sans-serif">Vânzări ultimele 30 zile</h2>
        <canvas id="salesChart" height="200"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
<script>
const ctx = document.getElementById('salesChart').getContext('2d');
const salesData = @json($salesData);
new Chart(ctx, {
    type: 'line',
    data: {
        labels: salesData.map(d => d.date),
        datasets: [{
            label: 'Vânzări (Lei)',
            data: salesData.map(d => d.total),
            borderColor: '#00b4d8',
            backgroundColor: 'rgba(0,180,216,0.1)',
            fill: true,
            tension: 0.4,
            pointRadius: 3,
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true, ticks: { callback: v => v + ' Lei' } } }
    }
});
</script>
@endsection
