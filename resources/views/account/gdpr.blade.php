@extends('layouts.app')
@section('title', 'Drepturile mele GDPR')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-[#0a2540] mb-2" style="font-family:'Outfit',sans-serif">
            🛡️ Datele mele & GDPR
        </h1>
        <p class="text-gray-500 text-sm">Conform Regulamentului UE 2016/679 (GDPR), ai control deplin asupra datelor tale personale.</p>
    </div>

    {{-- Mesaje --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 text-sm">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-sm">❌ {{ session('error') }}</div>
    @endif

    {{-- Drepturile tale --}}
    <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
        <h2 class="text-lg font-semibold text-[#0a2540] mb-4" style="font-family:'Outfit',sans-serif">📋 Drepturile tale</h2>
        <div class="space-y-3">
            @foreach([
                ['🔍', 'Dreptul de acces', 'Poți solicita oricând o copie a datelor personale pe care le deținem despre tine.'],
                ['✏️', 'Dreptul la rectificare', 'Poți corecta datele incorecte direct din profilul tău.'],
                ['🗑️', 'Dreptul la ștergere', 'Poți solicita ștergerea contului și a datelor personale (cu excepția datelor necesare obligațiilor legale).'],
                ['📦', 'Dreptul la portabilitate', 'Poți descărca toate datele tale în format JSON.'],
                ['🚫', 'Dreptul la opoziție', 'Poți refuza prelucrarea datelor pentru marketing în orice moment.'],
                ['📞', 'Dreptul de a depune plângere', 'Poți sesiza ANSPDCP la www.dataprotection.ro sau anspdcp@dataprotection.ro.'],
            ] as [$icon, $title, $desc])
            <div class="flex gap-3 p-3 bg-gray-50 rounded-lg">
                <span class="text-xl flex-shrink-0">{{ $icon }}</span>
                <div>
                    <p class="font-semibold text-[#0a2540] text-sm">{{ $title }}</p>
                    <p class="text-gray-500 text-xs mt-0.5 leading-relaxed">{{ $desc }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Export date --}}
    <div class="bg-white rounded-xl border border-gray-100 p-6 mb-6">
        <h2 class="text-lg font-semibold text-[#0a2540] mb-2" style="font-family:'Outfit',sans-serif">📦 Export date personale</h2>
        <p class="text-gray-500 text-sm mb-4">Descarcă toate datele personale asociate contului tău (profil, comenzi, adrese) în format JSON.</p>
        <a href="{{ route('account.gdpr.export') }}"
           class="inline-flex items-center gap-2 bg-[#0a2540] text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-[#00b4d8] transition-colors">
            ⬇️ Descarcă datele mele
        </a>
    </div>

    {{-- Ștergere cont --}}
    <div class="bg-white rounded-xl border border-red-100 p-6">
        <h2 class="text-lg font-semibold text-red-700 mb-2" style="font-family:'Outfit',sans-serif">🗑️ Ștergere cont</h2>
        <div class="bg-red-50 rounded-lg p-3 mb-4 text-xs text-red-600 leading-relaxed">
            <strong>⚠️ Atenție:</strong> Ștergerea contului este ireversibilă. Datele tale personale vor fi anonimizate.
            Istoricul comenzilor va fi păstrat în formă anonimizată conform obligațiilor legale contabile (10 ani).
        </div>
        <form method="POST" action="{{ route('account.gdpr.delete') }}"
              onsubmit="return confirm('Ești sigur că vrei să ștergi contul? Această acțiune este ireversibilă.')">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirmă cu parola ta *</label>
                <input type="password" name="password" required
                       class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#00b4d8]"
                       placeholder="Parola curentă">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-start gap-2 mb-4">
                <input type="checkbox" name="confirm_delete" id="confirm_delete" required class="mt-1" style="accent-color:#dc2626">
                <label for="confirm_delete" class="text-xs text-gray-600">
                    Înțeleg că ștergerea contului este permanentă și că datele mele personale vor fi anonimizate.
                </label>
            </div>
            <button type="submit"
                    class="bg-red-600 text-white px-5 py-2.5 rounded-lg text-sm font-semibold hover:bg-red-700 transition-colors">
                🗑️ Șterge contul meu
            </button>
        </form>
    </div>

    {{-- Contact DPO --}}
    <div class="mt-6 text-center text-xs text-gray-400">
        Pentru orice solicitare GDPR contactează-ne la
        <a href="mailto:gdpr@piscineromania.ro" class="text-[#00b4d8]">gdpr@piscineromania.ro</a>
        sau scrie la ANSPDCP: <a href="https://www.dataprotection.ro" target="_blank" class="text-[#00b4d8]">dataprotection.ro</a>
    </div>
</div>
@endsection
