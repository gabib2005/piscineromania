@extends('layouts.admin')
@section('title', 'Comandă ' . $order->order_number)

@section('content')
<div class="flex items-center justify-between mb-6">
    <a href="{{ route('admin.orders.index') }}" class="text-sm text-gray-500 hover:text-[#00b4d8]">← Înapoi la comenzi</a>
    <div class="flex gap-3">
        <a href="{{ route('admin.orders.invoice', $order) }}" class="border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-50">
            📄 Generează factură
        </a>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    {{-- Order details --}}
    <div class="lg:col-span-2 space-y-6">
        {{-- Items --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <h2 class="font-semibold text-[#0a2540] mb-4">Produse comandate</h2>
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left p-2">Produs</th>
                        <th class="text-right p-2">Cant.</th>
                        <th class="text-right p-2">Preț unit.</th>
                        <th class="text-right p-2">Subtotal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($order->items as $item)
                    <tr>
                        <td class="p-2">
                            <p class="font-medium">{{ $item->product_name }}</p>
                            <p class="text-xs text-gray-400 font-mono">{{ $item->product_code }}</p>
                        </td>
                        <td class="p-2 text-right">{{ $item->quantity }}</td>
                        <td class="p-2 text-right">{{ number_format($item->unit_price, 2, ',', '.') }} Lei</td>
                        <td class="p-2 text-right font-medium">{{ number_format($item->subtotal, 2, ',', '.') }} Lei</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="p-2 text-right text-gray-600">Subtotal</td>
                        <td class="p-2 text-right">{{ number_format($order->subtotal, 2, ',', '.') }} Lei</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="p-2 text-right text-gray-600">TVA 19%</td>
                        <td class="p-2 text-right">{{ number_format($order->tax, 2, ',', '.') }} Lei</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="p-2 text-right text-gray-600">Transport</td>
                        <td class="p-2 text-right">{{ $order->shipping == 0 ? 'Gratuit' : number_format($order->shipping, 2, ',', '.') . ' Lei' }}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="p-2 text-right font-bold text-[#0a2540]">TOTAL</td>
                        <td class="p-2 text-right font-bold text-[#0a2540]">{{ number_format($order->total, 2, ',', '.') }} Lei</td>
                    </tr>
                </tfoot>
            </table>
        </div>

        {{-- Shipping --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <h2 class="font-semibold text-[#0a2540] mb-4">Date livrare</h2>
            <div class="grid grid-cols-2 gap-3 text-sm">
                <div><p class="text-gray-500">Nume</p><p class="font-medium">{{ $order->shipping_name }}</p></div>
                <div><p class="text-gray-500">Email</p><p class="font-medium">{{ $order->shipping_email }}</p></div>
                <div><p class="text-gray-500">Telefon</p><p class="font-medium">{{ $order->shipping_phone ?? '—' }}</p></div>
                <div><p class="text-gray-500">Adresă</p><p class="font-medium">{{ $order->shipping_address }}</p></div>
                <div><p class="text-gray-500">Oraș</p><p class="font-medium">{{ $order->shipping_city }}, {{ $order->shipping_county }}</p></div>
            </div>
        </div>
    </div>

    {{-- Sidebar --}}
    <div class="space-y-6">
        {{-- Status update --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <h2 class="font-semibold text-[#0a2540] mb-4">Status comandă</h2>
            <p class="text-sm text-gray-500 mb-3">Status curent:</p>
            @php $colors = ['new' => 'blue', 'processing' => 'yellow', 'shipped' => 'purple', 'delivered' => 'green', 'cancelled' => 'red']; @endphp
            <span class="inline-block mb-4 text-sm px-3 py-1 rounded-full bg-{{ $colors[$order->status] ?? 'gray' }}-100 text-{{ $colors[$order->status] ?? 'gray' }}-700 font-medium">
                {{ $order->status_label }}
            </span>
            <form action="{{ route('admin.orders.status', $order) }}" method="POST">
                @csrf @method('PUT')
                <select name="status" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] mb-3">
                    @foreach(['new' => 'Nou', 'processing' => 'În procesare', 'shipped' => 'Expediat', 'delivered' => 'Livrat', 'cancelled' => 'Anulat'] as $val => $label)
                    <option value="{{ $val }}" {{ $order->status === $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                <button type="submit" class="w-full bg-[#0a2540] text-white py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors">
                    Actualizează status
                </button>
            </form>
        </div>

        {{-- Order info --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6 text-sm space-y-3">
            <h2 class="font-semibold text-[#0a2540]">Informații comandă</h2>
            <div><p class="text-gray-500">Nr. comandă</p><p class="font-mono font-medium">{{ $order->order_number }}</p></div>
            <div><p class="text-gray-500">Data</p><p>{{ $order->created_at->format('d.m.Y H:i') }}</p></div>
            @if($order->stripe_payment_id)
            <div><p class="text-gray-500">Stripe ID</p><p class="font-mono text-xs">{{ $order->stripe_payment_id }}</p></div>
            @endif
            @if($order->notes)
            <div><p class="text-gray-500">Observații</p><p class="text-gray-700">{{ $order->notes }}</p></div>
            @endif
        </div>
    </div>
</div>
@endsection
