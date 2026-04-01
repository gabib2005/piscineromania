@extends('layouts.admin')
@section('title', 'Fișă client: ' . $user->name)

@section('content')
<a href="{{ route('admin.crm.index') }}" class="text-sm text-gray-500 hover:text-[#00b4d8] mb-6 inline-block">← Înapoi la CRM</a>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 space-y-6">
        {{-- Orders --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <h2 class="font-semibold text-[#0a2540] mb-4">Istoricul comenzilor</h2>
            @if($user->orders->isEmpty())
            <p class="text-gray-400 text-sm">Nicio comandă plasată.</p>
            @else
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left p-2">Nr. comandă</th>
                        <th class="text-left p-2">Data</th>
                        <th class="text-left p-2">Status</th>
                        <th class="text-right p-2">Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($user->orders as $order)
                    <tr>
                        <td class="p-2">
                            <a href="{{ route('admin.orders.show', $order) }}" class="font-mono text-[#00b4d8] hover:underline">{{ $order->order_number }}</a>
                        </td>
                        <td class="p-2 text-gray-500">{{ $order->created_at->format('d.m.Y') }}</td>
                        <td class="p-2"><span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full">{{ $order->status_label }}</span></td>
                        <td class="p-2 text-right font-medium">{{ number_format($order->total, 2, ',', '.') }} Lei</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

    <div class="space-y-6">
        {{-- Client info --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6 text-sm space-y-3">
            <h2 class="font-semibold text-[#0a2540]">Date client</h2>
            <div><p class="text-gray-500">Nume</p><p class="font-medium">{{ $user->name }}</p></div>
            <div><p class="text-gray-500">Email</p><p>{{ $user->email }}</p></div>
            <div><p class="text-gray-500">Telefon</p><p>{{ $user->phone ?? '—' }}</p></div>
            <div><p class="text-gray-500">Înregistrat</p><p>{{ $user->created_at->format('d.m.Y') }}</p></div>
            <div><p class="text-gray-500">Total comenzi</p><p class="font-bold text-[#0a2540]">{{ $user->orders->count() }}</p></div>
            <div><p class="text-gray-500">Total achizitat</p><p class="font-bold text-[#0a2540]">{{ number_format($user->orders->sum('total'), 2, ',', '.') }} Lei</p></div>
        </div>

        {{-- Notes --}}
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <h2 class="font-semibold text-[#0a2540] mb-3">Note interne</h2>
            @if($user->customer?->notes)
            <div class="text-sm text-gray-600 bg-gray-50 rounded p-3 mb-4 whitespace-pre-wrap max-h-40 overflow-y-auto">{{ $user->customer->notes }}</div>
            @endif
            <form action="{{ route('admin.crm.note', $user) }}" method="POST">
                @csrf
                <textarea name="note" rows="3" placeholder="Adaugă o notă..."
                          class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] resize-none mb-2"></textarea>
                <button type="submit" class="w-full bg-[#0a2540] text-white py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors">
                    Salvează notă
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
