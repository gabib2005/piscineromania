@extends('layouts.app')
@section('title', 'Finalizare comandă')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-[#0a2540] mb-8" style="font-family:'Outfit',sans-serif">📋 Finalizare comandă</h1>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Form --}}
            <div class="flex-1 space-y-6">
                {{-- Shipping --}}
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <h2 class="font-semibold text-[#0a2540] text-lg mb-5" style="font-family:'Outfit',sans-serif">Date livrare</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nume și prenume *</label>
                            <input type="text" name="shipping_name" value="{{ old('shipping_name', $user->name) }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] @error('shipping_name') border-red-400 @enderror">
                            @error('shipping_name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                            <input type="email" name="shipping_email" value="{{ old('shipping_email', $user->email) }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                            @error('shipping_email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                            <input type="text" name="shipping_phone" value="{{ old('shipping_phone', $user->phone) }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Județ *</label>
                            <input type="text" name="shipping_county" value="{{ old('shipping_county') }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                            @error('shipping_county') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Adresă *</label>
                            <input type="text" name="shipping_address" value="{{ old('shipping_address') }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                            @error('shipping_address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Oraș *</label>
                            <input type="text" name="shipping_city" value="{{ old('shipping_city') }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                            @error('shipping_city') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Cod poștal</label>
                            <input type="text" name="shipping_zip" value="{{ old('shipping_zip') }}"
                                   class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                    </div>
                </div>

                {{-- Invoice --}}
                <div class="bg-white rounded-xl border border-gray-100 p-6" x-data="{ wantsInvoice: false }">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" name="wants_invoice" value="1" x-model="wantsInvoice"
                               class="w-4 h-4 rounded border-gray-300 text-[#00b4d8]">
                        <span class="font-medium text-gray-700">Doresc factură pe firmă</span>
                    </label>
                    <div x-show="wantsInvoice" class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Denumire firmă</label>
                            <input type="text" name="company_name" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">CUI</label>
                            <input type="text" name="company_vat" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Adresă fiscală</label>
                            <input type="text" name="company_address" class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                        </div>
                    </div>
                </div>

                {{-- Notes --}}
                <div class="bg-white rounded-xl border border-gray-100 p-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Observații (opțional)</label>
                    <textarea name="notes" rows="3" placeholder="Instrucțiuni speciale pentru livrare..."
                              class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8] resize-none"></textarea>
                </div>
            </div>

            {{-- Order summary --}}
            <div class="lg:w-80 flex-shrink-0">
                <div class="bg-white rounded-xl border border-gray-100 p-6 sticky top-20">
                    <h2 class="font-semibold text-[#0a2540] text-lg mb-4" style="font-family:'Outfit',sans-serif">Sumar comandă</h2>
                    <div class="space-y-3 mb-5 max-h-60 overflow-y-auto">
                        @foreach($items as $item)
                        <div class="flex items-center gap-3 text-sm">
                            <img src="{{ $item->product->primaryImage?->image_url ?? $item->product->image_url ?? 'https://via.placeholder.com/40' }}"
                                 alt="" class="w-10 h-10 object-contain rounded bg-gray-50">
                            <div class="flex-1 min-w-0">
                                <p class="text-gray-700 line-clamp-1">{{ $item->product->name }}</p>
                                <p class="text-gray-400 text-xs">x{{ $item->quantity }}</p>
                            </div>
                            <span class="text-gray-700 font-medium">{{ number_format($item->product->price * $item->quantity, 2, ',', '.') }} Lei</span>
                        </div>
                        @endforeach
                    </div>
                    <div class="border-t border-gray-100 pt-4 space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span><span>{{ number_format($totals['subtotal'], 2, ',', '.') }} Lei</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>TVA 19%</span><span>{{ number_format($totals['tax'], 2, ',', '.') }} Lei</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Transport</span>
                            @if($totals['shipping'] == 0)
                                <span class="text-green-600">Gratuit</span>
                            @else
                                <span>{{ number_format($totals['shipping'], 2, ',', '.') }} Lei</span>
                            @endif
                        </div>
                        <div class="flex justify-between font-bold text-[#0a2540] text-base pt-2 border-t border-gray-100">
                            <span>Total</span><span>{{ number_format($totals['total'], 2, ',', '.') }} Lei</span>
                        </div>
                    </div>
                    <button type="submit" class="block w-full mt-6 bg-[#0a2540] text-white py-3 rounded-xl text-center font-semibold hover:bg-[#00b4d8] transition-colors">
                        Continuă la plată →
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
