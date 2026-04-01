@extends('layouts.admin')
@section('title', 'Gestionare Comenzi')

@section('content')
{{-- Filters --}}
<form method="GET" class="bg-white rounded-xl border border-gray-100 p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div>
        <label class="block text-xs text-gray-500 mb-1">Caută</label>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Număr, client, email..."
               class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] w-52">
    </div>
    <div>
        <label class="block text-xs text-gray-500 mb-1">Status</label>
        <select name="status" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            <option value="">Toate</option>
            @foreach(['new' => 'Nou', 'processing' => 'În procesare', 'shipped' => 'Expediat', 'delivered' => 'Livrat', 'cancelled' => 'Anulat'] as $val => $label)
            <option value="{{ $val }}" {{ request('status') === $val ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="bg-[#0a2540] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#00b4d8] transition-colors">Filtrează</button>
</form>

<div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left p-3">Număr</th>
                <th class="text-left p-3 hidden md:table-cell">Client</th>
                <th class="text-left p-3 hidden sm:table-cell">Data</th>
                <th class="text-left p-3">Total</th>
                <th class="text-left p-3">Status</th>
                <th class="text-right p-3">Acțiuni</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($orders as $order)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="p-3">
                    <a href="{{ route('admin.orders.show', $order) }}" class="font-mono font-medium text-[#0a2540] hover:text-[#00b4d8]">
                        {{ $order->order_number }}
                    </a>
                </td>
                <td class="p-3 hidden md:table-cell">
                    <p class="text-gray-700">{{ $order->shipping_name }}</p>
                    <p class="text-xs text-gray-400">{{ $order->shipping_email }}</p>
                </td>
                <td class="p-3 text-gray-500 hidden sm:table-cell">{{ $order->created_at->format('d.m.Y H:i') }}</td>
                <td class="p-3 font-medium">{{ number_format($order->total, 2, ',', '.') }} Lei</td>
                <td class="p-3">
                    @php $colors = ['new' => 'blue', 'processing' => 'yellow', 'shipped' => 'purple', 'delivered' => 'green', 'cancelled' => 'red']; @endphp
                    <span class="text-xs px-2 py-0.5 rounded-full bg-{{ $colors[$order->status] ?? 'gray' }}-100 text-{{ $colors[$order->status] ?? 'gray' }}-700">
                        {{ $order->status_label }}
                    </span>
                </td>
                <td class="p-3 text-right">
                    <a href="{{ route('admin.orders.show', $order) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">Detalii</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4 border-t border-gray-50">{{ $orders->links() }}</div>
</div>
@endsection
