@extends('layouts.app')
@section('title', 'Politica de Cookies — PiscineRomania')
@section('description', 'Politica de cookies PiscineRomania. Aflați ce tipuri de cookies folosim, scopul lor și cum le puteți gestiona.')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Hero --}}
    <div class="mb-10 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-4" style="background: rgba(0,180,216,0.1)">
            <svg width="30" height="30" fill="none" stroke="#00b4d8" stroke-width="1.7" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10"/>
                <circle cx="8.5" cy="9" r="1.5" fill="#00b4d8" stroke="none"/>
                <circle cx="14.5" cy="8" r="1" fill="#00b4d8" stroke="none"/>
                <circle cx="16" cy="14" r="1.5" fill="#00b4d8" stroke="none"/>
                <circle cx="10" cy="15" r="1" fill="#00b4d8" stroke="none"/>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-[#0a2540]" style="font-family:'Outfit',sans-serif">Politica de Cookies</h1>
        <p class="text-gray-500 mt-2 text-sm">Ultima actualizare: 6 aprilie 2026 · Versiunea 1.0</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-8 lg:p-12 space-y-10 text-gray-700 leading-relaxed" style="font-size:0.95rem">

        {{-- Intro --}}
        <section>
            <p>
                Această politică explică ce sunt cookie-urile, ce tipuri de cookie-uri utilizăm pe
                <a href="https://piscineromania.ro" class="text-[#00b4d8] hover:underline">piscineromania.ro</a>,
                scopul acestora și cum le puteți gestiona.
            </p>
        </section>

        {{-- 1. Ce sunt cookies --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">1</span>
                Ce sunt cookie-urile?
            </h2>
            <p class="text-sm">
                Cookie-urile sunt fișiere text de mici dimensiuni stocate pe dispozitivul dumneavoastră (calculator, telefon, tabletă)
                atunci când vizitați un site web. Ele permit site-ului să vă recunoască la vizitele ulterioare și să îmbunătățească
                experiența de navigare. Cookie-urile nu conțin viruși și nu pot accesa alte fișiere de pe dispozitivul dumneavoastră.
            </p>
        </section>

        {{-- 2. Categorii --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">2</span>
                Categoriile de cookie-uri pe care le utilizăm
            </h2>

            {{-- Necesare --}}
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white" style="background:#0a2540">Întotdeauna active</span>
                    <h3 class="font-bold text-[#0a2540]">Cookie-uri strict necesare</h3>
                </div>
                <p class="text-sm mb-3">
                    Aceste cookie-uri sunt esențiale pentru funcționarea corectă a platformei. Fără ele, nu puteți utiliza coșul de cumpărături,
                    nu vă puteți autentifica și formularele nu funcționează. Nu necesită consimțământ.
                </p>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left p-3 font-semibold text-gray-700">Nume cookie</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Durată</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Scop</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Furnizor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">piscineromania_session</td>
                                <td class="p-3">Sesiune</td>
                                <td class="p-3">Menținerea sesiunii de utilizator autentificat</td>
                                <td class="p-3">piscineromania.ro</td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">XSRF-TOKEN</td>
                                <td class="p-3">Sesiune</td>
                                <td class="p-3">Protecție împotriva atacurilor CSRF (Cross-Site Request Forgery)</td>
                                <td class="p-3">piscineromania.ro</td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">remember_web_*</td>
                                <td class="p-3">5 ani</td>
                                <td class="p-3">Funcția "Ține-mă minte" la autentificare</td>
                                <td class="p-3">piscineromania.ro</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 font-mono">cookie_consent</td>
                                <td class="p-3">1 an</td>
                                <td class="p-3">Stochează preferințele dumneavoastră privind cookie-urile</td>
                                <td class="p-3">piscineromania.ro</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Analitice --}}
            <div class="mb-6">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white" style="background:#00b4d8">Necesită consimțământ</span>
                    <h3 class="font-bold text-[#0a2540]">Cookie-uri analitice</h3>
                </div>
                <p class="text-sm mb-3">
                    Ne ajută să înțelegem cum interacționați cu platforma: ce pagini vizitați, cât timp petreceți pe site,
                    de unde proveniți. Folosim aceste date exclusiv pentru îmbunătățirea experienței utilizatorilor.
                    Sunt activate numai cu consimțământul dumneavoastră explicit.
                </p>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left p-3 font-semibold text-gray-700">Nume cookie</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Durată</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Scop</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Furnizor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">_ga</td>
                                <td class="p-3">2 ani</td>
                                <td class="p-3">Distinge utilizatorii pentru statistici Google Analytics</td>
                                <td class="p-3">Google</td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">_ga_*</td>
                                <td class="p-3">2 ani</td>
                                <td class="p-3">Menține starea sesiunii Google Analytics 4</td>
                                <td class="p-3">Google</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 font-mono">_gid</td>
                                <td class="p-3">24 ore</td>
                                <td class="p-3">Distinge utilizatorii pentru statistici de trafic</td>
                                <td class="p-3">Google</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Marketing --}}
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white" style="background:#ff6b35">Necesită consimțământ</span>
                    <h3 class="font-bold text-[#0a2540]">Cookie-uri de marketing</h3>
                </div>
                <p class="text-sm mb-3">
                    Utilizate pentru a afișa reclame relevante pe platforme externe (Facebook, Google Ads) pe baza activității
                    dumneavoastră pe site-ul nostru. Sunt activate numai cu consimțământul dumneavoastră explicit.
                </p>
                <div class="overflow-x-auto">
                    <table class="w-full text-xs border-collapse">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="text-left p-3 font-semibold text-gray-700">Nume cookie</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Durată</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Scop</th>
                                <th class="text-left p-3 font-semibold text-gray-700">Furnizor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">_fbp</td>
                                <td class="p-3">90 zile</td>
                                <td class="p-3">Facebook Pixel — urmărire conversii și remarketing</td>
                                <td class="p-3">Meta Platforms</td>
                            </tr>
                            <tr class="border-b border-gray-100 hover:bg-gray-50">
                                <td class="p-3 font-mono">fr</td>
                                <td class="p-3">90 zile</td>
                                <td class="p-3">Livrare de reclame Facebook</td>
                                <td class="p-3">Meta Platforms</td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="p-3 font-mono">_gcl_au</td>
                                <td class="p-3">90 zile</td>
                                <td class="p-3">Google Ads — urmărire conversii</td>
                                <td class="p-3">Google</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- 3. Gestionare --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">3</span>
                Cum gestionați preferințele de cookie-uri
            </h2>
            <p class="text-sm mb-4">
                La prima vizită pe platformă, vi se afișează un banner prin care puteți alege să acceptați toate cookie-urile,
                doar cele necesare sau să personalizați preferințele. Puteți modifica oricând preferințele:
            </p>
            <ul class="space-y-2 text-sm list-disc list-inside">
                <li>Ștergând cookie-urile din setările browserului dumneavoastră</li>
                <li>Folosind modul privat / incognito al browserului</li>
                <li>Configurând browserul să blocheze cookie-urile de la terți</li>
            </ul>
            <p class="text-sm mt-4">
                Dezactivarea cookie-urilor necesare poate afecta funcționalitatea platformei (coș, autentificare, plată).
            </p>
            <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm">
                <a href="https://support.google.com/chrome/answer/95647" target="_blank" rel="noopener"
                   class="flex items-center gap-2 px-4 py-3 rounded-xl border border-gray-200 hover:border-[#00b4d8] transition-colors">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#4285F4"><path d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0zm0 4.5A7.49 7.49 0 0119.5 12c0 4.14-3.36 7.5-7.5 7.5S4.5 16.14 4.5 12 7.86 4.5 12 4.5z"/></svg>
                    Chrome
                </a>
                <a href="https://support.mozilla.org/kb/cookies-information-websites-store-on-your-computer" target="_blank" rel="noopener"
                   class="flex items-center gap-2 px-4 py-3 rounded-xl border border-gray-200 hover:border-[#00b4d8] transition-colors">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#FF6611"><circle cx="12" cy="12" r="10"/></svg>
                    Firefox
                </a>
                <a href="https://support.apple.com/guide/safari/manage-cookies-sfri11471/mac" target="_blank" rel="noopener"
                   class="flex items-center gap-2 px-4 py-3 rounded-xl border border-gray-200 hover:border-[#00b4d8] transition-colors">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="#00b4d8"><path d="M12 0C5.37 0 0 5.37 0 12s5.37 12 12 12 12-5.37 12-12S18.63 0 12 0z"/></svg>
                    Safari
                </a>
            </div>
        </section>

        {{-- 4. Contact --}}
        <section>
            <h2 class="text-xl font-bold text-[#0a2540] mb-4 flex items-center gap-2" style="font-family:'Outfit',sans-serif">
                <span class="inline-block w-7 h-7 rounded-full text-white text-xs font-bold flex items-center justify-center" style="background:#00b4d8">4</span>
                Contact
            </h2>
            <p class="text-sm">
                Pentru întrebări despre utilizarea cookie-urilor, contactați-ne la
                <a href="mailto:office@piscineromania.ro" class="text-[#00b4d8]">office@piscineromania.ro</a>.
            </p>
        </section>

        {{-- CTA --}}
        <div class="border-t border-gray-100 pt-8 flex flex-col sm:flex-row gap-4">
            <a href="{{ route('legal.privacy') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold border border-gray-200 text-[#0a2540] hover:border-[#00b4d8] transition-colors text-sm">
                Politica de Confidențialitate
            </a>
            <a href="{{ route('legal.terms') }}"
               class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl font-semibold border border-gray-200 text-[#0a2540] hover:border-[#00b4d8] transition-colors text-sm">
                Termeni și Condiții
            </a>
        </div>

    </div>
</div>
@endsection
