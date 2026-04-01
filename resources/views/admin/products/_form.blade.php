<div class="space-y-4">
    @if(isset($product))
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Cod produs</label>
        <input type="text" value="{{ $product->code }}" disabled
               class="w-full border border-gray-100 bg-gray-50 rounded-lg px-3 py-2 text-sm text-gray-500">
    </div>
    @else
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Cod produs *</label>
        <input type="text" name="code" value="{{ old('code') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] @error('code') border-red-400 @enderror">
        @error('code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>
    @endif

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Denumire *</label>
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}"
               class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Preț (Lei, fără TVA) *</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price ?? '') }}"
                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Stoc *</label>
            <select name="stock_status" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                <option value="in_stock" {{ old('stock_status', $product->stock_status ?? 'in_stock') === 'in_stock' ? 'selected' : '' }}>În stoc</option>
                <option value="on_order" {{ old('stock_status', $product->stock_status ?? '') === 'on_order' ? 'selected' : '' }}>La comandă</option>
            </select>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Categorie</label>
        <select name="category_id" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            <option value="">Fără categorie</option>
            @foreach($categories as $cat)
            <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Descriere</label>
        <textarea name="description" rows="5"
                  class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] resize-none">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="flex gap-6">
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
            <span class="text-sm text-gray-700">Produs activ</span>
        </label>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="hidden" name="is_featured" value="0">
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $product->is_featured ?? false) ? 'checked' : '' }}>
            <span class="text-sm text-gray-700">Produs recomandat</span>
        </label>
    </div>
</div>
