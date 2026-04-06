@extends('layouts.app')
@section('title', 'Termeni și Condiții — PiscineRomania')
@section('description', 'Termenii și condițiile PiscineRomania SRL. Informații despre procesul de comandă, dreptul de retragere și politica de retur.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Hero --}}
    <div class="mb-10 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background: rgba(0,180,216,0.1)">
            <svg width="30" height="30" fill="none" stroke="#00b4d8" stroke-width="1.7" viewBox="0 0 24 24">
                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8"/>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-[#0a2540]" style="font-family:'Outfit',sans-serif">Termeni și Condiții</h1>
        <p class="text-gray-500 mt-2 text-sm">Ultima actualizare: 6 aprilie 2026 · Versiunea 1.0</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 lg:p-12 space-y-10 text-gray-700 leading-relaxed" style="font-size:0.95rem">

        {{-- Intro --}}
        <section>
            <p>
                Acești Termeni și Condiții reglementează utilizarea platformei de comerț electronic
                <a href="https://piscineromania.ro" class="text-[#00b4d8] hover:underline">piscineromania.ro</a>
                și relația contractuală dintre <strong class="text-[#0a2540]">PiscineRomania SRL</strong> și clienți.
                Prin plasarea unei comenzi, acceptați în întregime acești termeni.
            </p>
        </section>

        {{-- 1. Comerciant --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">1</span>
                Informații despre comerciant
            </h2>
            <div class="bg-gray-50 rounded-xl p-5 space-y-1 text-sm">
                <p><strong>Denumire:</strong> PiscineRomania SRL</p>
                <p><strong>Domeniu:</strong> piscineromania.ro</p>
                <p><strong>Email:</strong> <a href="mailto:office@piscineromania.ro" class="text-[#00b4d8]">office@piscineromania.ro</a></p>
                <p><strong>Telefon:</strong> <a href="tel:+40000000000" class="text-[#00b4d8]">+40 XXX XXX XXX</a></p>
                <p><strong>Program:</strong> Luni–Vineri, 09:00–18:00</p>
            </div>
        </section>

        {{-- 2. Definiții --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">2</span>
                Definiții
            </h2>
            <ul class="space-y-2 text-sm">
                <li><strong>"Platforma"</strong> — site-ul web piscineromania.ro și toate serviciile sale</li>
                <li><strong>"Comerciantul"</strong> — PiscineRomania SRL</li>
                <li><strong>"Clientul"</strong> — persoana fizică sau juridică care plasează o comandă</li>
                <li><strong>"Comanda"</strong> — solicitarea fermă a unui produs prin intermediul platformei</li>
                <li><strong>"Contractul"</strong> — acordul format prin acceptarea comenzii de către comerciant</li>
                <li><strong>"Prețul"</strong> — suma în RON afișată pe produs, inclusiv TVA</li>
            </ul>
        </section>

        {{-- 3. Înregistrare --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">3</span>
                Înregistrare și cont de client
            </h2>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Plasarea comenzilor necesită crearea unui cont cu date reale și complete.</li>
                <li>Clientul răspunde pentru confidențialitatea datelor de acces la cont.</li>
                <li>Contul nu poate fi transferat altor persoane.</li>
                <li>PiscineRomania SRL poate suspenda conturi utilizate abuziv sau fraudulos.</li>
            </ul>
        </section>

        {{-- 4. Produse și prețuri --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">4</span>
                Produse și prețuri
            </h2>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Prețurile afișate sunt în RON și includ TVA 19%, dacă nu se specifică altfel.</li>
                <li>Ne rezervăm dreptul de a modifica prețurile oricând, fără notificare prealabilă, modificările neafectând comenzile deja plasate și confirmate.</li>
                <li>Fotografiile produselor sunt orientative; culoarea reală poate varia ușor față de afișajul monitorului.</li>
                <li>Disponibilitatea stocului este afișată în timp real; în cazul epuizării unui produs după plasarea comenzii, vă vom contacta.</li>
                <li>PiscineRomania SRL este distribuitor autorizat Aquashop.hu în România.</li>
            </ul>
        </section>

        {{-- 5. Procesul de comandă --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">5</span>
                Procesul de comandă
            </h2>
            <div class="space-y-4 text-sm">
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white flex-shrink-0 text-xs" style="background:#00b4d8">1</div>
                    <div><strong>Selecție produse:</strong> Adăugați produsele dorite în coș.</div>
                </div>
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white flex-shrink-0 text-xs" style="background:#00b4d8">2</div>
                    <div><strong>Date livrare:</strong> Completați adresa și datele de contact în pagina de finalizare comandă.</div>
                </div>
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white flex-shrink-0 text-xs" style="background:#00b4d8">3</div>
                    <div><strong>Plată:</strong> Efectuați plata securizat prin Stripe (card bancar).</div>
                </div>
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white flex-shrink-0 text-xs" style="background:#00b4d8">4</div>
                    <div><strong>Confirmare:</strong> Primiți email de confirmare a comenzii cu numărul de referință.</div>
                </div>
                <div class="flex gap-4">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-white flex-shrink-0 text-xs" style="background:#00b4d8">5</div>
                    <div><strong>Procesare:</strong> Comanda este procesată și expediată în termenul indicat pe produs.</div>
                </div>
            </div>
            <p class="text-sm mt-4">
                <strong>Contractul de vânzare-cumpărare se formează</strong> în momentul în care primiți confirmarea scrisă (email) a procesării plății.
                Comanda dumneavoastră reprezintă o ofertă; contractul se consideră încheiat prin acceptarea noastră expresă.
            </p>
        </section>

        {{-- 6. Plata --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">6</span>
                Plata
            </h2>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Acceptăm plata prin card bancar (Visa, Mastercard, Maestro) via Stripe.</li>
                <li>Plata se efectuează integral la momentul plasării comenzii.</li>
                <li>Tranzacțiile sunt securizate prin criptare TLS și procesate de Stripe, Inc.</li>
                <li>Nu stocăm datele cardului pe serverele noastre.</li>
                <li>Factura fiscală va fi emisă și transmisă pe email în termen de 5 zile lucrătoare de la livrare.</li>
            </ul>
        </section>

        {{-- 7. Livrare --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">7</span>
                Livrare
            </h2>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Livrăm pe teritoriul României prin servicii de curierat.</li>
                <li>Termenele de livrare sunt orientative și pot varia în funcție de disponibilitate și zonă geografică.</li>
                <li>Livrarea este gratuită pentru comenzi ce depășesc pragul afișat pe platformă.</li>
                <li>Riscul pierderii sau deteriorării trece asupra cumpărătorului la momentul preluării coletului.</li>
                <li>La recepție, verificați integritatea coletului în prezența curierului; semnați rezervă dacă există deteriorări.</li>
            </ul>
        </section>

        {{-- 8. Drept de retragere --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">8</span>
                Dreptul de retragere — 14 zile (OUG 34/2014)
            </h2>
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-5 mb-4">
                <p class="text-sm font-semibold text-[#0a2540] mb-2">Important</p>
                <p class="text-sm">
                    Conform <strong>OUG nr. 34/2014</strong> privind drepturile consumatorilor în contractele încheiate cu profesioniștii,
                    aveți dreptul să vă retrageți din contract <strong>în termen de 14 zile calendaristice</strong> de la data primirii produsului,
                    fără a invoca niciun motiv și fără penalități.
                </p>
            </div>
            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2 text-sm">Cum exercitați dreptul de retragere:</h3>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Transmiteți o declarație clară de retragere la <a href="mailto:office@piscineromania.ro" class="text-[#00b4d8]">office@piscineromania.ro</a>, cu menționarea numărului comenzii.</li>
                <li>Returnați produsul în termen de 14 zile de la comunicarea deciziei de retragere.</li>
                <li>Produsul trebuie să fie în starea originală, nefolosit, în ambalajul original, cu toate accesoriile.</li>
                <li>Costul returului este suportat de client, cu excepția cazurilor de produs defect sau neconform.</li>
                <li>Rambursăm prețul produsului în termen de 14 zile de la primirea returnului, prin aceeași metodă de plată.</li>
            </ul>
            <h3 class="font-semibold text-[#0a2540] mt-5 mb-2 text-sm">Excepții de la dreptul de retragere:</h3>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Produse realizate la comandă sau personalizate</li>
                <li>Produse sigilate care nu pot fi returnate din motive de igienă (ex. produse de tratare apa)</li>
                <li>Produse deteriorate din cauza utilizării necorespunzătoare</li>
            </ul>
        </section>

        {{-- 9. Garantii --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">9</span>
                Garanții legale (Legea 449/2003)
            </h2>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Toate produsele beneficiază de <strong>garanție legală de conformitate de 2 ani</strong> de la data livrării, conform Legii 449/2003.</li>
                <li>Defectele de conformitate apărute în primele 6 luni de la livrare sunt prezumate a fi existat la momentul livrării.</li>
                <li>Garanția comercială a producătorului (dacă există) se adaugă garanției legale și nu o înlocuiește.</li>
                <li>Pentru reclamații de garanție, contactați-ne la <a href="mailto:office@piscineromania.ro" class="text-[#00b4d8]">office@piscineromania.ro</a> cu numărul comenzii și descrierea problemei.</li>
                <li>Garanția nu acoperă defecțiunile cauzate de: utilizare necorespunzătoare, modificări neautorizate, uzură normală.</li>
            </ul>
        </section>

        {{-- 10. Raspundere limitata --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">10</span>
                Răspundere limitată
            </h2>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>PiscineRomania SRL nu răspunde pentru daune indirecte, pierderi de profit sau daune consecutive.</li>
                <li>Răspunderea noastră maximă este limitată la valoarea comenzii care a generat prejudiciul.</li>
                <li>Nu garantăm disponibilitatea neîntreruptă a platformei; ne rezervăm dreptul la întreruperi pentru mentenanță.</li>
                <li>Link-urile externe de pe platformă nu constituie o endorsare și nu răspundem pentru conținutul lor.</li>
            </ul>
        </section>

        {{-- 11. Proprietate intelectuala --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">11</span>
                Proprietate intelectuală
            </h2>
            <p class="text-sm">
                Toate conținuturile platformei (texte, imagini, logo-uri, design) sunt proprietatea PiscineRomania SRL sau a furnizorilor
                de licențe și sunt protejate de legislația privind drepturile de autor. Reproducerea fără acordul scris este interzisă.
            </p>
        </section>

        {{-- 12. Legea aplicabila --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">12</span>
                Legea aplicabilă și litigii
            </h2>
            <p class="text-sm">
                Prezentul contract este guvernat de legea română. Orice litigiu va fi soluționat pe cale amiabilă; în caz de eșec,
                litigiul va fi deferit instanțelor competente din România.
                Consumatorii pot utiliza și platforma europeană de soluționare online a litigiilor:
                <a href="https://ec.europa.eu/consumers/odr" target="_blank" rel="noopener" class="text-[#00b4d8]">ec.europa.eu/consumers/odr</a>.
            </p>
        </section>

        {{-- CTA --}}
        <div class="border-t border-gray-100 pt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('legal.privacy') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold border border-gray-200 text-[#0a2540] hover:border-[#00b4d8] transition-colors text-sm">
                Politica de Confidențialitate
            </a>
            <a href="{{ route('legal.cookies') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold border border-gray-200 text-[#0a2540] hover:border-[#00b4d8] transition-colors text-sm">
                Politica Cookies
            </a>
            <a href="mailto:office@piscineromania.ro"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold text-white transition-colors text-sm"
               style="background:#0a2540">
                Contactează-ne
            </a>
        </div>

    </div>
</div>
@endsection
