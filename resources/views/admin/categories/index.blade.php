@extends('layouts.admin')
@section('title', 'Gestionare Categorii')

@section('content')
<div class="flex gap-8">
    {{-- Add category --}}
    <div class="w-72 flex-shrink-0">
        <div class="bg-white rounded-xl border border-gray-100 p-6">
            <h2 class="font-semibold text-[#0a2540] mb-4">Adaugă categorie</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Denumire *</label>
                    <input type="text" name="name" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]" required>
                </div>
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Icon (emoji)</label>
                    <input type="text" name="icon" maxlength="10" placeholder="💧" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                </div>
                <button type="submit" class="w-full bg-[#0a2540] text-white py-2 rounded-lg text-sm font-medium hover:bg-[#00b4d8] transition-colors">
                    Adaugă
                </button>
            </form>
        </div>
    </div>

    {{-- Categories table --}}
    <div class="flex-1">
        <div class="bg-white rounded-xl border border-gray-100 overflow-hidden">
            <table class="w-full text-sm">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left p-3">Categorie</th>
                        <th class="text-left p-3">Produse</th>
                        <th class="text-left p-3">Ordine</th>
                        <th class="text-right p-3">Acțiuni</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @foreach($categories as $category)
                    <tr class="hover:bg-gray-50" x-data="{ editing: false, name: '{{ addslashes($category->name) }}', icon: '{{ $category->icon }}' }">
                        <td class="p-3">
                            <div x-show="!editing" class="flex items-center gap-2">
                                <span class="text-lg">{{ $category->icon ?: '📂' }}</span>
                                <span class="font-medium text-[#0a2540]">{{ $category->name }}</span>
                            </div>
                            <div x-show="editing" class="flex items-center gap-2">
                                <input type="text" x-model="icon" maxlength="10"
                                       class="w-12 border border-gray-200 rounded px-2 py-1 text-sm text-center">
                                <input type="text" x-model="name"
                                       class="border border-gray-200 rounded px-2 py-1 text-sm flex-1">
                            </div>
                        </td>
                        <td class="p-3 text-gray-500">{{ $category->products_count }}</td>
                        <td class="p-3 text-gray-500">{{ $category->sort_order }}</td>
                        <td class="p-3 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <button x-show="!editing" @click="editing = true"
                                        class="text-blue-600 hover:text-blue-800 text-xs font-medium">Editează</button>
                                <button x-show="editing" @click="saveCategory({{ $category->id }}, name, icon); editing = false"
                                        class="text-green-600 hover:text-green-800 text-xs font-medium">Salvează</button>
                                <button x-show="editing" @click="editing = false"
                                        class="text-gray-500 hover:text-gray-700 text-xs">Anulează</button>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                      onsubmit="return confirm('Ștergi categoria {{ addslashes($category->name) }}? Produsele vor fi mutate la Diverse.')" x-show="!editing">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 text-xs font-medium">Șterge</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function saveCategory(id, name, icon) {
    fetch(`/admin/categorii/${id}`, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content },
        body: JSON.stringify({ name, icon })
    }).then(() => window.location.reload());
}
</script>
@endsection
