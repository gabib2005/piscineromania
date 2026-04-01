@extends('layouts.admin')
@section('title', 'CRM Clienți')

@section('content')
{{-- Search --}}
<form method="GET" class="bg-white rounded-xl border border-gray-100 p-4 mb-6 flex gap-3">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Caută client după nume, email..."
           class="flex-1 border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
    <button type="submit" class="bg-[#0a2540] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#00b4d8] transition-colors">Caută</button>
</form>

<div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left p-3">Client</th>
                <th class="text-left p-3 hidden md:table-cell">Înregistrat</th>
                <th class="text-left p-3">Comenzi</th>
                <th class="text-left p-3 hidden sm:table-cell">Total achizitat</th>
                <th class="text-right p-3">Acțiuni</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($users as $user)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="p-3">
                    <p class="font-medium text-[#0a2540]">{{ $user->name }}</p>
                    <p class="text-xs text-gray-400">{{ $user->email }}</p>
                </td>
                <td class="p-3 text-gray-500 hidden md:table-cell">{{ $user->created_at->format('d.m.Y') }}</td>
                <td class="p-3">
                    <span class="font-medium">{{ $user->orders_count }}</span>
                </td>
                <td class="p-3 font-medium hidden sm:table-cell">
                    {{ number_format($user->orders_sum_total ?? 0, 2, ',', '.') }} Lei
                </td>
                <td class="p-3 text-right">
                    <a href="{{ route('admin.crm.show', $user) }}" class="text-blue-600 hover:text-blue-800 text-xs font-medium">
                        Fișă client
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4 border-t border-gray-50">{{ $users->links() }}</div>
</div>
@endsection
