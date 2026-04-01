@extends('layouts.app')
@section('title', 'Profilul meu')

@section('content')
<div class="max-w-lg mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-[#0a2540] mb-8" style="font-family:'Outfit',sans-serif">👤 Profilul meu</h1>

    <form action="{{ route('account.profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="bg-white rounded-xl border border-gray-100 p-8 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nume complet</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" value="{{ $user->email }}" disabled
                       class="w-full border border-gray-100 bg-gray-50 rounded-lg px-3 py-2 text-sm text-gray-400">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                       class="w-full border border-gray-200 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-[#00b4d8]">
            </div>
            <button type="submit" class="w-full bg-[#0a2540] text-white py-3 rounded-xl font-semibold hover:bg-[#00b4d8] transition-colors">
                Salvează modificările
            </button>
        </div>
    </form>
</div>
@endsection
