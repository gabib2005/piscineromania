@extends('layouts.app')
@section('title', 'Actualitate — Noutati & Articole din Presa de Specialitate')
@section('description', 'Articole si noutati din presa de specialitate despre piscine, SPA si wellness. Tendinte, tehnica si inspiratie pentru proiectul tau.')

@section('content')
<div style="background: linear-gradient(135deg, var(--navy) 0%, #162a48 100%); color:#fff; padding:56px 72px 48px;">
    <div style="max-width:1280px; margin:0 auto;">
        <h1 style="font-size:clamp(1.75rem,3.5vw,2.5rem); font-weight:800; font-family:'Outfit',sans-serif; margin-bottom:12px;">Actualitate</h1>
        <p style="font-size:15px; opacity:0.8; font-family:'Nunito',sans-serif;">Articole selectate din presa de specialitate europeana despre piscine, SPA si wellness.</p>
    </div>
</div>

<div style="max-width:900px; margin:0 auto; padding:56px 32px;">

    {{-- Articol 1 --}}
    <article x-data="{ open: false }" style="background:#fff; border-radius:20px; overflow:hidden; box-shadow:0 4px 24px rgba(10,37,64,0.09); border:1px solid var(--gray-light); margin-bottom:36px;">
        <div style="height:320px; overflow:hidden; position:relative;">
            <img src="https://picsum.photos/seed/piscine-modern-2025/900/320" alt="Piscina moderna cu acoperire retractabila" style="width:100%; height:100%; object-fit:cover;">
            <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(10,37,64,0.7) 0%, transparent 60%);"></div>
            <div style="position:absolute; bottom:24px; left:28px; right:28px;">
                <span style="background:var(--aqua); color:#fff; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; padding:4px 12px; border-radius:20px; font-family:'Outfit',sans-serif;">Piscine Magazine</span>
                <h2 style="font-size:clamp(1.2rem,2.5vw,1.7rem); font-weight:800; color:#fff; font-family:'Outfit',sans-serif; margin:10px 0 0; line-height:1.25;">Piata piscinelor in Europa: crestere record de 21% in 2025, Romania printre liderii regionali</h2>
            </div>
        </div>
        <div style="padding:28px 32px;">
            <div style="display:flex; align-items:center; gap:16px; margin-bottom:16px; font-size:12px; color:var(--gray); font-family:'Outfit',sans-serif;">
                <span>📅 10 Aprilie 2025</span>
                <span>✍️ Piscine Magazine Europa</span>
                <span>⏱️ 5 min lectura</span>
            </div>
            <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                Conform celui mai recent raport al Federatiei Europene a Producatorilor de Piscine (EUSA), piata europeana a piscinelor a inregistrat o crestere fara precedent in 2024, cu livrari de circa 385.000 de bazine noi. Romania s-a remarcat prin una dintre cele mai dinamice evolutii din regiune, cu o crestere estimata de 18-23% fata de anul precedent.
            </p>

            <div x-show="open" x-cloak>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">Factori care au condus la crestere</strong><br>
                    Expertii atribuie aceasta evolutie mai multor factori convergenți. In primul rand, pandemia a schimbat fundamental perspectiva romanilor asupra locuintei — gradina a devenit o extensie a spatiului de locuit, iar piscina, un element de confort si recreere. In al doilea rand, accesul la finantare a ramas accesibil, cu dobanzi competitive care au permis unui segment mai larg al populatiei sa isi permita astfel de investitii.
                </p>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">Tipurile de piscine cel mai des alese</strong><br>
                    Piscinele cu skimmer raman cele mai populare (65% din comenzi), urmate de piscinele infinity (18%), apreciate in special in zona dealurilor si a caselor cu panorama. Piscinele inox si cele cu pereti de sticla reprezinta inca un segment de nisa (7%), dar cu cresteri spectaculoase de peste 40% fata de 2023, semn ca gustul pentru solutii premium este in ascensiune.
                </p>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">Tehnologie si sustenabilitate</strong><br>
                    Un trend puternic identificat in 2024 este orientarea catre solutii mai ecologice: pompe de caldura cu invertor (eficienta energetica sporita), sisteme de electroliza salina in locul clorului traditional si automatizare prin aplicatii mobile. Acoperirile solare izoterme, care pot reduce consumul energetic cu pana la 70%, au inregistrat cele mai mari cresteri de vanzari din ultimii 5 ani.
                </p>
                <div style="background:var(--aqua-light); border-left:4px solid var(--aqua); padding:16px 20px; border-radius:0 8px 8px 0; margin-bottom:20px;">
                    <p style="font-size:14px; font-style:italic; color:var(--navy); font-family:'Nunito',sans-serif; margin:0;">
                        "Romania are toate conditiile pentru a deveni una dintre primele cinci piete din Europa Centrala si de Est in urmatorii trei ani. Combinatia dintre cererea suprimata, cresterea clasei medii si disponibilitatea expertizei tehnice locale creeaza o oportunitate unica."
                    </p>
                    <p style="font-size:12px; color:var(--gray); font-family:'Outfit',sans-serif; margin:8px 0 0;">— Director Regional EUSA, raport anual 2025</p>
                </div>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">Perspectivele pentru 2025-2026</strong><br>
                    Prognozele pentru urmatorii doi ani raman optimiste. Constructia de locuinte individuale mentine un ritm alert, iar cultul gradinii — stimulat si de retelele sociale — continua sa creasca. Se estimeaza ca peste 12.000 de piscine noi vor fi instalate in Romania in 2025, cu o valoare medie a comenzii in crestere cu aproximativ 15% fata de 2024.
                </p>
            </div>

            <button @click="open = !open"
                style="display:inline-flex; align-items:center; gap:8px; font-size:13px; font-weight:700; color:var(--aqua); background:none; border:none; cursor:pointer; font-family:'Outfit',sans-serif; padding:0; text-decoration:none;">
                <span x-text="open ? 'Restrânge' : 'Citeste mai mult'">Citeste mai mult</span>
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                     :style="open ? 'transform:rotate(90deg)' : ''" style="transition:transform 0.2s;">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </article>

    {{-- Articol 2 --}}
    <article x-data="{ open: false }" style="background:#fff; border-radius:20px; overflow:hidden; box-shadow:0 4px 24px rgba(10,37,64,0.09); border:1px solid var(--gray-light); margin-bottom:36px;">
        <div style="height:320px; overflow:hidden; position:relative;">
            <img src="https://picsum.photos/seed/spa-wellness-trend-2025/900/320" alt="Spa wellness tendinte" style="width:100%; height:100%; object-fit:cover;">
            <div style="position:absolute; inset:0; background:linear-gradient(to top, rgba(10,37,64,0.7) 0%, transparent 60%);"></div>
            <div style="position:absolute; bottom:24px; left:28px; right:28px;">
                <span style="background:#7c3aed; color:#fff; font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:1.5px; padding:4px 12px; border-radius:20px; font-family:'Outfit',sans-serif;">SPA Trends International</span>
                <h2 style="font-size:clamp(1.2rem,2.5vw,1.7rem); font-weight:800; color:#fff; font-family:'Outfit',sans-serif; margin:10px 0 0; line-height:1.25;">Piscina naturala si wellness integrat: cele mai mari tendinte in designul acvatic european pentru 2025</h2>
            </div>
        </div>
        <div style="padding:28px 32px;">
            <div style="display:flex; align-items:center; gap:16px; margin-bottom:16px; font-size:12px; color:var(--gray); font-family:'Outfit',sans-serif;">
                <span>📅 22 Martie 2025</span>
                <span>✍️ SPA Trends International</span>
                <span>⏱️ 6 min lectura</span>
            </div>
            <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                Designul acvatic european se afla in plina transformare. Conceptul de „wellness total" — in care piscina, spa-ul si zona de relaxare se contopesc intr-un ecosistem coerent — devine standardul noii generatii de proiecte rezidentiale si hoteliere de lux. Raportul SPA Trends International pentru 2025 identifica sase directii majore care vor modela industria in urmatorii ani.
            </p>

            <div x-show="open" x-cloak>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">1. Piscinele naturale si bio-pools</strong><br>
                    Piscinele naturale, care folosesc plante acvatice si microorganisme benefice in loc de clor pentru purificarea apei, inregistreaza o crestere de 34% in Europa de Vest. Austria si Germania sunt lideri in acest segment, dar tendinta se extinde rapid in tarile mediteraneene si central-europene. Investitia initiala este mai ridicata, dar costurile de intretinere scad cu pana la 60% pe termen lung.
                </p>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">2. Integrarea spa-ului in conceptul rezidential</strong><br>
                    Proiectele premium combina din ce in ce mai des piscina cu zona de sauna, hamam, dusuri emotionale si fotolii de relaxare intr-un spatiu coerent. Nu mai este vorba despre un bazin si optional o sauna — ci despre un intreg centru de wellness personal. Arhitectii de interior lucreaza strans cu specialistii tehnici pentru a crea tranzitii fluide intre indoor si outdoor.
                </p>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">3. Automatizare si control prin smartphone</strong><br>
                    Controlul complet al piscinei si spa-ului prin aplicatii mobile devine norma, nu exceptia. Temperatura apei, programul de filtrare, iluminatul LED RGB, sistemul de dozare chimica — toate gestionabile de la distanta. Producatorii europeni de automatizare (Astral, Hayward, Pentair) raporteaza cresteri de 50% la comenzile pentru sisteme smart in 2024.
                </p>
                <div style="background: linear-gradient(135deg, #f3e8ff, #ede9fe); border-left:4px solid #7c3aed; padding:16px 20px; border-radius:0 8px 8px 0; margin-bottom:20px;">
                    <p style="font-size:14px; font-style:italic; color:#4c1d95; font-family:'Nunito',sans-serif; margin:0;">
                        "Viitorul piscinei nu este doar despre inot — este despre recuperare, reconectare si stare de bine. Clientul modern nu cumpara un bazin; cumpara o experienta de viata mai buna."
                    </p>
                    <p style="font-size:12px; color:var(--gray); font-family:'Outfit',sans-serif; margin:8px 0 0;">— Dr. Elena Moris, Arhitect de interior, Milano Design Week 2025</p>
                </div>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">4. Materiale si finisaje premium</strong><br>
                    Mozaicul venetian artizanal si piatra naturala (travertin, marmura, bazalt) revin puternic in preferintele clientilor. Inoxul 316L ramane alegerea de top pentru piscinele la suprafata sau pe terase. Sticla securizata pentru pereti — un trend initiat in hoteluri de 5 stele — coboara acum si in segmentul rezidential premium.
                </p>
                <p style="font-size:15px; color:#374151; line-height:1.8; font-family:'Nunito',sans-serif; margin-bottom:20px;">
                    <strong style="color:var(--navy);">5. Sezonalitate eliminata: utilizare 365 de zile/an</strong><br>
                    Acoperirile retractabile din aluminiu si policarbonat, pompele de caldura cu eficienta ridicata si sistemele de incalzire radianta a teraselor permit utilizarea piscinei practic pe tot parcursul anului in climatul romanesc. Aceasta tendinta creste considerabil valoarea investitiei si transforma piscina dintr-o facilitate sezoniera intr-un beneficiu permanent.
                </p>
            </div>

            <button @click="open = !open"
                style="display:inline-flex; align-items:center; gap:8px; font-size:13px; font-weight:700; color:#7c3aed; background:none; border:none; cursor:pointer; font-family:'Outfit',sans-serif; padding:0;">
                <span x-text="open ? 'Restrânge' : 'Citeste mai mult'">Citeste mai mult</span>
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"
                     :style="open ? 'transform:rotate(90deg)' : ''" style="transition:transform 0.2s;">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </article>

</div>
@endsection
