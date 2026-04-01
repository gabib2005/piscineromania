@extends('layouts.admin')
@section('title', 'Setări platformă')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl border border-gray-100 p-8">
        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-5">
            @csrf
            <h2 class="font-semibold text-[#0a2540] text-lg mb-4" style="font-family:'Outfit',sans-serif">Date firmă</h2>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nume firmă</label>
                <input type="text" name="company_name" value="{{ $settings['company_name'] }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email contact</label>
                <input type="email" name="company_email" value="{{ $settings['company_email'] }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            </div>

            <hr class="my-6">
            <h2 class="font-semibold text-[#0a2540] text-lg mb-4" style="font-family:'Outfit',sans-serif">Livrare & Prețuri</h2>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Prag livrare gratuită (Lei)</label>
                    <input type="number" name="shipping_threshold" value="{{ $settings['shipping_threshold'] }}"
                           class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cost livrare standard (Lei)</label>
                    <input type="number" name="shipping_cost" value="{{ $settings['shipping_cost'] }}"
                           class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Adaos față de furnizor (%)</label>
                    <input type="number" step="0.1" name="price_markup" value="{{ $settings['price_markup'] }}"
                           class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                </div>
            </div>

            <hr class="my-6">
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 text-sm text-yellow-800 mb-4">
                ⚠️ Cheile Stripe, Google și Facebook OAuth se configurează direct în fișierul <code>.env</code> pentru securitate maximă.
            </div>

            <button type="submit" class="bg-[#0a2540] text-white px-6 py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors">
                Salvează setările
            </button>
        </form>
    </div>
</div>
@endsection
