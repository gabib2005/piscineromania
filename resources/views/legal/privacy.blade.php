@extends('layouts.app')
@section('title', 'Politica de Confidențialitate — PiscineRomania')
@section('description', 'Politica de confidențialitate PiscineRomania SRL. Aflați cum colectăm, utilizăm și protejăm datele dumneavoastră personale.')

@section('content')

{{-- Hero full-width --}}
<div style="background:linear-gradient(135deg,#0a2540 0%,#0d3a6e 100%);" class="py-16 sm:py-24 px-6">
    <div class="max-w-4xl mx-auto">
        <p class="font-bold uppercase mb-5 tracking-widest text-xs" style="color:#00b4d8;letter-spacing:0.22em">Document Legal</p>
        <h1 class="text-white leading-tight mb-5" style="font-size:clamp(2rem,6vw,3.8rem);line-height:1.15">
            <span class="font-bold" style="font-family:'Outfit',sans-serif">Politica de</span><br>
            <em class="font-light" style="font-family:Georgia,'Times New Roman',serif;font-style:italic">Confidențialitate</em>
        </h1>
        <p class="text-sm" style="color:rgba(255,255,255,0.45)">Ultima actualizare: 6 aprilie 2026</p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 lg:p-12 space-y-10 text-gray-700 leading-relaxed" style="font-size:0.95rem">

        {{-- Intro --}}
        <section>
            <p>
                <strong class="text-[#0a2540]">PiscineRomania SRL</strong> ("noi", "operatorul") respectă confidențialitatea dumneavoastră și se angajează să proceseze datele personale în conformitate cu
                <strong>Regulamentul (UE) 2016/679 privind protecția datelor (GDPR)</strong> și legislația română aplicabilă.
            </p>
            <p class="mt-3">
                Această politică descrie ce date colectăm, de ce le colectăm, cum le utilizăm și ce drepturi aveți asupra lor atunci când utilizați platforma
                <a href="https://piscineromania.ro" class="text-[#00b4d8] hover:underline">piscineromania.ro</a>.
            </p>
        </section>

        {{-- 1. Operatorul --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">1</span>
                Operatorul de date cu caracter personal
            </h2>
            <div class="bg-gray-50 rounded-xl p-5 space-y-1 text-sm">
                <p><strong>Denumire:</strong> PiscineRomania SRL</p>
                <p><strong>Sediu:</strong> România</p>
                <p><strong>Email:</strong> <a href="mailto:office@piscineromania.ro" class="text-[#00b4d8]">office@piscineromania.ro</a></p>
                <p><strong>Telefon:</strong> <a href="tel:+40745104024" class="text-[#00b4d8]">+40 745 104 024</a></p>
                <p><strong>Autoritate de supraveghere:</strong> ANSPDCP — <a href="https://www.dataprotection.ro" target="_blank" rel="noopener" class="text-[#00b4d8]">www.dataprotection.ro</a></p>
            </div>
        </section>

        {{-- 2. Date colectate --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">2</span>
                Datele pe care le colectăm
            </h2>

            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2">2.1. Date de cont</h3>
            <ul class="list-disc list-inside space-y-1 text-sm">
                <li>Nume și prenume</li>
                <li>Adresă de email</li>
                <li>Parolă (stocată criptat, hash bcrypt)</li>
                <li>Număr de telefon (opțional)</li>
                <li>Avatar (opțional, furnizat de rețelele sociale)</li>
            </ul>

            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2">2.2. Date privind comenzile</h3>
            <ul class="list-disc list-inside space-y-1 text-sm">
                <li>Adresă de livrare (nume, stradă, oraș, județ, cod poștal, țară)</li>
                <li>Date de facturare (dacă solicitați factură pe firmă: denumire, CUI, adresă fiscală)</li>
                <li>Produsele comandate, cantități, prețuri</li>
                <li>Starea comenzii și istoricul actualizărilor</li>
                <li>Note de livrare (opțional)</li>
            </ul>

            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2">2.3. Date de plată (procesate de Stripe)</h3>
            <p class="text-sm">
                Plățile cu cardul sunt procesate exclusiv prin <strong>Stripe, Inc.</strong> — nu stocăm niciodată datele cardului pe serverele noastre.
                Stripe funcționează ca operator separat conform propriei politici de confidențialitate:
                <a href="https://stripe.com/privacy" target="_blank" rel="noopener" class="text-[#00b4d8]">stripe.com/privacy</a>.
                Noi primim doar o confirmare a plății și un identificator de tranzacție.
            </p>

            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2">2.4. Date de autentificare socială (Google / Facebook)</h3>
            <p class="text-sm">
                Dacă vă autentificați prin Google sau Facebook, primim de la aceste platforme:
                email, nume și fotografie de profil (avatar), în baza OAuth 2.0.
                Nu solicităm și nu stocăm parole de rețele sociale sau token-uri de acces permanente.
            </p>

            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2">2.5. Date tehnice și cookies</h3>
            <ul class="list-disc list-inside space-y-1 text-sm">
                <li>Adresa IP și localizare geografică aproximativă</li>
                <li>Tipul browserului și sistemul de operare (User-Agent)</li>
                <li>Paginile vizitate și durata sesiunii</li>
                <li>Cookie-uri tehnice (sesiune, CSRF) și analitice (cu consimțământ)</li>
            </ul>

            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2">2.6. Jurnalul consimțămintelor</h3>
            <p class="text-sm">
                Stocăm data, ora, IP-ul și tipul consimțământului exprimat pentru cookies și politici legale,
                pentru a dovedi conformarea cu GDPR.
            </p>
        </section>

        {{-- 3. Temeiuri legale --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">3</span>
                Temeiurile legale (Art. 6 GDPR)
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse">
                    <thead>
                        <tr class="bg-[#0a2540] text-white">
                            <th class="text-left p-3 rounded-tl-lg">Activitate de procesare</th>
                            <th class="text-left p-3 rounded-tr-lg">Temei legal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3">Crearea și gestionarea contului</td>
                            <td class="p-3">Art. 6(1)(b) — executarea unui contract</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3">Procesarea și livrarea comenzilor</td>
                            <td class="p-3">Art. 6(1)(b) — executarea unui contract</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3">Emiterea facturilor</td>
                            <td class="p-3">Art. 6(1)(c) — obligație legală contabilă</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3">Comunicări tranzacționale (confirmare comandă)</td>
                            <td class="p-3">Art. 6(1)(b) — executarea unui contract</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3">Newsletter și marketing</td>
                            <td class="p-3">Art. 6(1)(a) — consimțământ explicit</td>
                        </tr>
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="p-3">Cookie-uri analitice</td>
                            <td class="p-3">Art. 6(1)(a) — consimțământ explicit</td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3">Prevenirea fraudei și securitatea platformei</td>
                            <td class="p-3">Art. 6(1)(f) — interes legitim</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        {{-- 4. Durata --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">4</span>
                Durata stocării datelor
            </h2>
            <ul class="space-y-2 text-sm">
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Date de cont:</strong> pe durata existenței contului + 1 an după ștergerea contului.</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Date comenzi și facturi:</strong> 10 ani conform obligațiilor contabile din legislația română (Legea 82/1991).</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Jurnalul consimțămintelor:</strong> 3 ani de la data exprimării consimțământului.</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Loguri tehnice:</strong> maximum 90 de zile.</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Date marketing:</strong> până la retragerea consimțământului.</span></li>
            </ul>
        </section>

        {{-- 5. Destinatari --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">5</span>
                Destinatarii datelor
            </h2>
            <p class="text-sm mb-3">Datele dumneavoastră pot fi transmise către:</p>
            <ul class="space-y-2 text-sm">
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Stripe, Inc.</strong> — procesator de plăți (SUA, certificat Privacy Shield / Clauze contractuale standard)</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Servicii de curierat</strong> — date de livrare transmise curierului ales pentru expedierea comenzii</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Furnizori de hosting</strong> — serverele noastre sunt găzduite în UE</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Autorități fiscale și judiciare</strong> — când suntem obligați prin lege</span></li>
            </ul>
            <p class="text-sm mt-3">Nu vindem, nu închiriem și nu partajăm datele cu terți în scopuri comerciale.</p>
        </section>

        {{-- 6. Drepturi --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">6</span>
                Drepturile dumneavoastră (Art. 15–22 GDPR)
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul de acces</h4>
                    <p class="text-xs text-gray-600">Puteți solicita o copie a datelor pe care le deținem despre dumneavoastră.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul la rectificare</h4>
                    <p class="text-xs text-gray-600">Puteți corecta datele inexacte direct din profilul contului sau contactând-ne.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul la ștergere</h4>
                    <p class="text-xs text-gray-600">Puteți solicita ștergerea datelor, sub rezerva obligațiilor legale de păstrare (ex. date contabile).</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul la portabilitate</h4>
                    <p class="text-xs text-gray-600">Puteți descărca datele dumneavoastră în format JSON din secțiunea <a href="{{ route('account.gdpr') }}" class="text-[#00b4d8]">Date & GDPR</a>.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul la restricționare</h4>
                    <p class="text-xs text-gray-600">Puteți solicita restricționarea procesării datelor în anumite situații prevăzute de GDPR.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul la opoziție</h4>
                    <p class="text-xs text-gray-600">Puteți obiecta față de procesarea bazată pe interesul nostru legitim sau față de marketing direct.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Retragerea consimțământului</h4>
                    <p class="text-xs text-gray-600">Puteți retrage consimțământul în orice moment fără a afecta legalitatea procesării anterioare.</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-4">
                    <h4 class="font-semibold text-[#0a2540] mb-1">Dreptul de a depune plângere</h4>
                    <p class="text-xs text-gray-600">Puteți contacta ANSPDCP la <a href="https://www.dataprotection.ro" target="_blank" class="text-[#00b4d8]">dataprotection.ro</a>.</p>
                </div>
            </div>
        </section>

        {{-- 7. Exercitarea drepturilor --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">7</span>
                Cum vă puteți exercita drepturile
            </h2>
            <p class="text-sm mb-4">
                Puteți exercita orice drept GDPR prin:
            </p>
            <ul class="space-y-2 text-sm">
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Email:</strong> <a href="mailto:office@piscineromania.ro" class="text-[#00b4d8]">office@piscineromania.ro</a> — cu subiectul "Cerere GDPR"</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span><strong>Din cont:</strong> Secțiunea <a href="{{ route('account.gdpr') }}" class="text-[#00b4d8]">Date & GDPR</a> — export date, ștergere cont</span></li>
            </ul>
            <p class="text-sm mt-4">
                Vom răspunde cererilor în termen de <strong>30 de zile</strong>, cu posibilitate de prelungire cu 2 luni în cazuri complexe, cu notificarea dumneavoastră.
                Verificarea identității este necesară înainte de procesarea cererii.
            </p>
        </section>

        {{-- 8. Securitate --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">8</span>
                Securitatea datelor
            </h2>
            <p class="text-sm">
                Implementăm măsuri tehnice și organizatorice adecvate pentru protecția datelor:
            </p>
            <ul class="space-y-2 text-sm mt-3">
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span>Comunicații criptate TLS/HTTPS</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span>Parole stocate cu algoritm bcrypt (hash unidirecțional)</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span>Protecție CSRF pe toate formularele</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span>Acces la date restricționat prin roluri și permisiuni</span></li>
                <li class="flex gap-3"><span class="text-[#00b4d8] font-bold mt-0.5">•</span><span>Backup-uri regulate și planuri de recuperare</span></li>
            </ul>
        </section>

        {{-- 9. Cookies --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">9</span>
                Cookies
            </h2>
            <p class="text-sm">
                Utilizăm cookie-uri necesare pentru funcționarea platformei și, cu consimțământul dumneavoastră, cookie-uri analitice și de marketing.
                Consultați <a href="{{ route('legal.cookies') }}" class="text-[#00b4d8]">Politica noastră de Cookies</a> pentru detalii complete.
            </p>
        </section>

        {{-- 10. Modificari --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">10</span>
                Modificări ale acestei politici
            </h2>
            <p class="text-sm">
                Putem actualiza această politică periodic. Versiunea actualizată va fi publicată pe această pagină cu data revizuirii.
                Modificările semnificative vor fi comunicate prin email sau printr-un mesaj vizibil pe platformă.
            </p>
        </section>

        {{-- CTA --}}
        <div class="border-t border-gray-100 pt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('account.gdpr') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold text-white transition-colors"
               style="background:#00b4d8">
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                Gestionează datele mele
            </a>
            <a href="{{ route('legal.cookies') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold border border-gray-200 text-[#0a2540] hover:border-[#00b4d8] transition-colors">
                Politica Cookies
            </a>
            <a href="{{ route('legal.terms') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold border border-gray-200 text-[#0a2540] hover:border-[#00b4d8] transition-colors">
                Termeni și Condiții
            </a>
        </div>

    </div>
</div>
</div>
@endsection
