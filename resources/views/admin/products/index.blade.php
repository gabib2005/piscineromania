@extends('layouts.admin')
@section('title', 'Gestionare Produse')

@section('content')
{{-- Actions bar --}}
<div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div class="flex flex-wrap gap-3">
        <a href="{{ route('admin.products.create') }}" class="bg-[#0a2540] text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors">
            + Produs nou
        </a>
        <form action="{{ route('admin.products.import') }}" method="POST" enctype="multipart/form-data" class="flex items-center gap-2">
            @csrf
            <label class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-green-700 cursor-pointer transition-colors">
                📥 Import Excel
                <input type="file" name="file" accept=".xlsx,.xls,.csv" class="hidden" onchange="this.form.submit()">
            </label>
        </form>
        <a href="{{ route('admin.products.export') }}" class="border border-gray-200 text-gray-700 px-4 py-2 rounded-lg text-sm hover:bg-gray-50 transition-colors">
            📤 Export CSV
        </a>
    </div>
</div>

{{-- Filters --}}
<form method="GET" class="bg-white rounded-xl border border-gray-100 p-4 mb-6 flex flex-wrap gap-3 items-end">
    <div>
        <label class="block text-xs text-gray-500 mb-1">Caută</label>
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cod, denumire..."
               class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] w-48">
    </div>
    <div>
        <label class="block text-xs text-gray-500 mb-1">Categorie</label>
        <select name="category_id" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            <option value="">Toate</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-xs text-gray-500 mb-1">Stoc</label>
        <select name="stock" class="border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            <option value="">Toate</option>
            <option value="in_stock" {{ request('stock') === 'in_stock' ? 'selected' : '' }}>În stoc</option>
            <option value="on_order" {{ request('stock') === 'on_order' ? 'selected' : '' }}>La comandă</option>
        </select>
    </div>
    <button type="submit" class="bg-[#0a2540] text-white px-4 py-2 rounded-lg text-sm hover:bg-[#00b4d8] transition-colors">Filtrează</button>
    @if(request()->hasAny(['search','category_id','stock']))
    <a href="{{ route('admin.products.index') }}" class="text-sm text-red-500 hover:text-red-700">Reset</a>
    @endif
</form>

{{-- Table --}}
<div class="bg-white rounded-xl border border-gray-100 overflow-hidden" x-data="{ selected: [], selectAll: false }">
    {{-- Bulk actions --}}
    <div class="px-4 py-3 border-b border-gray-100 flex items-center gap-3" x-show="selected.length > 0">
        <span class="text-sm text-gray-600" x-text="selected.length + ' selectate'"></span>
        <button @click="bulkAction('delete')" class="text-sm text-red-600 hover:text-red-800">Șterge</button>
        <button @click="bulkAction('activate')" class="text-sm text-green-600 hover:text-green-800">Activează</button>
        <button @click="bulkAction('in_stock')" class="text-sm text-blue-600 hover:text-blue-800">Setează în stoc</button>
    </div>

    <table class="w-full text-sm">
        <thead class="bg-gray-50">
            <tr>
                <th class="text-left p-3 w-8">
                    <input type="checkbox" x-model="selectAll" @change="selectAll ? selected = {{ $products->pluck('id')->toJson() }} : selected = []">
                </th>
                <th class="text-left p-3">Produs</th>
                <th class="text-left p-3 hidden md:table-cell">Categorie</th>
                <th class="text-left p-3">Preț</th>
                <th class="text-left p-3 hidden sm:table-cell">Stoc</th>
                <th class="text-left p-3 hidden md:table-cell">Activ</th>
                <th class="text-right p-3">Acțiuni</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-50">
            @foreach($products as $product)
            <tr class="hover:bg-gray-50 transition-colors">
                <td class="p-3">
                    <input type="checkbox" :value="{{ $product->id }}" x-model="selected">
                </td>
                <td class="p-3">
                    <div class="flex items-center gap-3">
                        <img src="{{ $product->image_url ?? 'https://via.placeholder.com/40?text=PR' }}"
                             alt="" class="w-10 h-10 object-contain rounded bg-gray-50"
                             onerror="this.src='https://via.placeholder.com/40?text=PR'">
                        <div>
                            <p class="font-medium text-[#0a2540] line-clamp-1">{{ $product->name }}</p>
                            <p class="text-xs text-gray-400 font-mono">{{ $product->code }}</p>
                        </div>
                    </div>
                </td>
                <td class="p-3 hidden md:table-cell">
                    <span class="text-gray-600">{{ $product->category?->name ?? '—' }}</span>
                </td>
                <td class="p-3">
                    <span class="font-medium">{{ number_format($product->price, 2, ',', '.') }} Lei</span>
                </td>
                <td class="p-3 hidden sm:table-cell">
                    @if($product->stock_status === 'in_stock')
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">În stoc</span>
                    @else
                    <span class="text-xs bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded-full">La comandă</span>
                    @endif
                </td>
                <td class="p-3 hidden md:table-cell">
                    @if($product->is_active)
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-0.5 rounded-full">Da</span>
                    @else
                    <span class="text-xs bg-red-100 text-red-700 px-2 py-0.5 rounded-full">Nu</span>
                    @endif
                </td>
                <td class="p-3 text-right">
                    <div class="flex items-center justify-end gap-2">
                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="text-blue-600 hover:text-blue-800 text-xs font-medium">Editează</a>
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                              onsubmit="return confirm('Ștergi produsul?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">Șterge</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="p-4 border-t border-gray-50">{{ $products->links() }}</div>
</div>
@endsection

@section('scripts')
<script>
function bulkAction(action) {
    const selected = window.Alpine.$data(document.querySelector('[x-data]')).selected;
    if (!selected.length) return;
    if (action === 'delete' && !confirm('Ștergi ' + selected.length + ' produse?')) return;
    fetch('{{ route("admin.products.bulk") }}', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify({ ids: selected, action })
    }).then(() => window.location.reload());
}
</script>
@endsection
