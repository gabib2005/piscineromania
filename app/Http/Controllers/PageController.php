<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // ── Date concepte piscine ──────────────────────────────────────────────
    private array $concepte = [
        'piscine-cu-skimmer' => [
            'name'        => 'Piscine cu skimmer',
            'description' => 'Piscina cu skimmer este cel mai popular tip de piscina rezidentiala. Sistemul de skimmer aspira impuritatile de la suprafata apei si le filtreaza, mentinand apa curata in mod continuu. Acest sistem este ideal pentru piscinele din gradina, oferind un raport excelent calitate-pret si intretinere simpla.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/skimmer1/800/600', 'alt' => 'Piscina cu skimmer exterior', 'desc' => 'Piscina cu skimmer incastrata in terasa'],
                ['url' => 'https://picsum.photos/seed/skimmer2/800/600', 'alt' => 'Piscina cu skimmer modern', 'desc' => 'Design modern cu bordura din piatra'],
                ['url' => 'https://picsum.photos/seed/pool3/800/600', 'alt' => 'Piscina cu skimmer noapte', 'desc' => 'Iluminare LED nocturna'],
                ['url' => 'https://picsum.photos/seed/skimmer4/800/600', 'alt' => 'Piscina cu skimmer panoramica', 'desc' => 'Vedere panoramica din gradina'],
                ['url' => 'https://picsum.photos/seed/pool5/800/600', 'alt' => 'Detaliu skimmer', 'desc' => 'Sistem de filtrare integrat'],
                ['url' => 'https://picsum.photos/seed/skimmer6/800/600', 'alt' => 'Piscina cu skimmer complet', 'desc' => 'Ansamblu complet cu terasa'],
            ],
        ],
        'piscine-infinity' => [
            'name'        => 'Piscine infinity',
            'description' => 'Piscinele infinity, cunoscute si ca piscine cu efect de "apa care se varsa", creeaza o iluzie optica spectaculoasa in care apa pare sa se contopeasca cu orizontul. Perfecte pentru amplasamente pe pante sau cu vedere panoramica, aceste piscine sunt un simbol al luxului si eleganței.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/infinity1/800/600', 'alt' => 'Piscina infinity cu vedere panoramica', 'desc' => 'Efect de apa la infinit cu vedere spre oras'],
                ['url' => 'https://picsum.photos/seed/infinity2/800/600', 'alt' => 'Piscina infinity apus', 'desc' => 'Piscina infinity la apus de soare'],
                ['url' => 'https://picsum.photos/seed/infinity3/800/600', 'alt' => 'Piscina infinity moderna', 'desc' => 'Design minimalist cu margine de otel'],
                ['url' => 'https://picsum.photos/seed/infinity4/800/600', 'alt' => 'Piscina infinity panorama', 'desc' => 'Vedere laterala a efectului infinity'],
                ['url' => 'https://picsum.photos/seed/infinity5/800/600', 'alt' => 'Detaliu piscina infinity', 'desc' => 'Detaliu margine infinity cu jgheab colector'],
                ['url' => 'https://picsum.photos/seed/infinity6/800/600', 'alt' => 'Piscina infinity noapte', 'desc' => 'Iluminare nocturna dramatica'],
            ],
        ],
        'piscine-cu-rigola-perimetrala' => [
            'name'        => 'Piscine cu rigola perimetrala',
            'description' => 'Piscinele cu rigola perimetrala sunt considerate varf de gama in domeniu. Rigola continua pe toata circumferinta piscinei colecteaza apa de la suprafata, asigurand o filtrare perfecta si o curatare eficienta. Nivelul apei ajunge pana la marginea piscinei, creand un aspect estetic deosebit.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/rigola1/800/600', 'alt' => 'Piscina cu rigola perimetrala', 'desc' => 'Rigola continua pe toata circumferinta'],
                ['url' => 'https://picsum.photos/seed/rigola2/800/600', 'alt' => 'Detaliu rigola piscina', 'desc' => 'Detaliu constructiv rigola din inox'],
                ['url' => 'https://picsum.photos/seed/rigola3/800/600', 'alt' => 'Piscina rigola moderna', 'desc' => 'Piscina moderna cu rigola din piatra naturala'],
                ['url' => 'https://picsum.photos/seed/rigola4/800/600', 'alt' => 'Piscina rigola interior', 'desc' => 'Rigola perimetrala la piscina interioara'],
                ['url' => 'https://picsum.photos/seed/rigola5/800/600', 'alt' => 'Piscina rigola design', 'desc' => 'Design integrat terasa-piscina'],
                ['url' => 'https://picsum.photos/seed/rigola6/800/600', 'alt' => 'Piscina rigola panoramica', 'desc' => 'Vedere panoramica piscina cu rigola'],
            ],
        ],
        'piscina-interioara' => [
            'name'        => 'Piscine interioare',
            'description' => 'Piscinele interioare ofera posibilitatea de a inota tot timpul anului, indiferent de conditiile meteorologice. Amplasate in interiorul casei sau intr-un spatiu dedicat, acestea necesita o atentie speciala la ventilatie, umiditate si izolatie termica. Beneficiati de inot terapeutic si relaxare in orice anotimp.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/interior1/800/600', 'alt' => 'Piscina interioara moderna', 'desc' => 'Piscina interioara cu acoperis sticla'],
                ['url' => 'https://picsum.photos/seed/interior2/800/600', 'alt' => 'Piscina interioara lux', 'desc' => 'Spatiu piscina cu sauna integrata'],
                ['url' => 'https://picsum.photos/seed/interior3/800/600', 'alt' => 'Piscina interioara design', 'desc' => 'Design modern cu iluminare indirecta'],
                ['url' => 'https://picsum.photos/seed/interior4/800/600', 'alt' => 'Piscina interioara clasica', 'desc' => 'Piscina clasica cu coloane si mozaic'],
                ['url' => 'https://picsum.photos/seed/indoor-pool/800/600', 'alt' => 'Piscina interioara ventilatie', 'desc' => 'Sistem de ventilatie si deumidificare'],
                ['url' => 'https://picsum.photos/seed/interior6/800/600', 'alt' => 'Piscina interioara noapte', 'desc' => 'Atmosfera relaxanta cu lumina difuza'],
            ],
        ],
        'aqua-fitness' => [
            'name'        => 'Aqua fitness',
            'description' => 'Piscinele pentru aqua fitness sunt proiectate special pentru exercitii fizice in apa. Dimensiunile si adancimea sunt calculate pentru activitati sportive, iar echipamentele optionale (contra-curent, banda subacvatica, trepte de aerobic) transforma piscina intr-o adevarata sala de sport acvatica.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/aquafitness1/800/600', 'alt' => 'Aqua fitness piscina', 'desc' => 'Antrenament aqua fitness in piscina personala'],
                ['url' => 'https://picsum.photos/seed/aquafitness2/800/600', 'alt' => 'Contra-curent piscina', 'desc' => 'Sistem contra-curent pentru inot stationat'],
                ['url' => 'https://picsum.photos/seed/aquafitness3/800/600', 'alt' => 'Piscina sport', 'desc' => 'Piscina cu culoar de inot marcat'],
                ['url' => 'https://picsum.photos/seed/aquafitness4/800/600', 'alt' => 'Exercitii acvatice', 'desc' => 'Trepte multifunctionale pentru aerobic acvatic'],
                ['url' => 'https://picsum.photos/seed/aquafitness5/800/600', 'alt' => 'Piscina fitness design', 'desc' => 'Design ergonomic pentru activitate sportiva'],
                ['url' => 'https://picsum.photos/seed/fitness-pool/800/600', 'alt' => 'Piscina aqua wellness', 'desc' => 'Zona de recuperare cu hidromasaj integrat'],
            ],
        ],
        'piscine-inox' => [
            'name'        => 'Piscine inox',
            'description' => 'Piscinele din inox reprezinta solutia premium pentru cei care doresc durabilitate maxima si un aspect ultra-modern. Otelul inoxidabil 316L este rezistent la coroziune, impermeabil si nu necesita finisaje suplimentare. Pot fi montate semi-ingropat, la suprafata sau pe acoperisuri.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/inox1/800/600', 'alt' => 'Piscina inox moderna', 'desc' => 'Piscina din inox 316L cu finisaj mat'],
                ['url' => 'https://picsum.photos/seed/inox2/800/600', 'alt' => 'Piscina inox terasa', 'desc' => 'Piscina inox amplasata pe terasa'],
                ['url' => 'https://picsum.photos/seed/steel-pool/800/600', 'alt' => 'Piscina inox design', 'desc' => 'Design minimalist in otel si sticla'],
                ['url' => 'https://picsum.photos/seed/inox4/800/600', 'alt' => 'Piscina inox noapte', 'desc' => 'Iluminare LED subacvatica in piscina inox'],
                ['url' => 'https://picsum.photos/seed/inox5/800/600', 'alt' => 'Detaliu structura inox', 'desc' => 'Detaliu sudura si finisaj premium'],
                ['url' => 'https://picsum.photos/seed/inox6/800/600', 'alt' => 'Piscina inox gradina', 'desc' => 'Integrare perfecta in peisajul gradinii'],
            ],
        ],
        'piscine-cu-pereti-sticla' => [
            'name'        => 'Piscine cu pereti de sticla',
            'description' => 'Piscinele cu pereti de sticla sunt o alegere spectaculoasa pentru cei care doresc sa vizualizeze interiorul piscinei din exterior. Sticla securizata sau laminata permite crearea unor efecte vizuale unice, mai ales cu iluminare subacvatica. Acestea pot fi integrate in ziduri, terase sau structuri arhitecturale.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/glass-pool1/800/600', 'alt' => 'Piscina cu pereti sticla', 'desc' => 'Perete de sticla securizata 50mm'],
                ['url' => 'https://picsum.photos/seed/glass-pool2/800/600', 'alt' => 'Piscina sticla noapte', 'desc' => 'Efect spectaculos cu iluminare LED nocturna'],
                ['url' => 'https://picsum.photos/seed/glass-pool3/800/600', 'alt' => 'Piscina sticla modern', 'desc' => 'Piscina ingropata cu vedere subacvatica'],
                ['url' => 'https://picsum.photos/seed/glass-pool4/800/600', 'alt' => 'Detaliu sticla piscina', 'desc' => 'Detaliu imbinare sticla-beton armat'],
                ['url' => 'https://picsum.photos/seed/glass-pool5/800/600', 'alt' => 'Piscina sticla terasa', 'desc' => 'Integrare in terasa cu efect vizual unic'],
                ['url' => 'https://picsum.photos/seed/glass-pool6/800/600', 'alt' => 'Piscina sticla interior', 'desc' => 'Piscina interioara cu perete de sticla spre living'],
            ],
        ],
    ];

    // ── Date tehnologii ────────────────────────────────────────────────────
    private array $tehnologii = [
        'filtrare' => [
            'name'        => 'Filtrare',
            'description' => 'Sistemele moderne de filtrare pentru piscine combina filtrarea mecanica cu cea biologica si chimica pentru a mentine apa perfect curata. Filtrele cu nisip, diatomeea sau cartus, combinate cu pompe de recirculare eficiente energetic, asigura o apa sanatoasa si transparenta. Sistemele automate de backwash simplifica intretinerea.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/filter1/800/600', 'alt' => 'Sistem filtrare piscina', 'desc' => 'Filtru cu nisip de cuart de inalta performanta'],
                ['url' => 'https://picsum.photos/seed/filter2/800/600', 'alt' => 'Pompa recirculare', 'desc' => 'Pompa de recirculare cu invertor'],
                ['url' => 'https://picsum.photos/seed/filter3/800/600', 'alt' => 'Camera tehnica piscina', 'desc' => 'Camera tehnica compacta si organizata'],
                ['url' => 'https://picsum.photos/seed/filter4/800/600', 'alt' => 'Filtru cartus piscina', 'desc' => 'Filtru cu cartus pentru piscine mici'],
                ['url' => 'https://picsum.photos/seed/filter5/800/600', 'alt' => 'Automatizare filtrare', 'desc' => 'Panou de automatizare si control'],
                ['url' => 'https://picsum.photos/seed/filter6/800/600', 'alt' => 'Filtrare apa clara', 'desc' => 'Rezultat: apa cristal dupa filtrare eficienta'],
            ],
        ],
        'incalzire' => [
            'name'        => 'Incalzire',
            'description' => 'Sistemele de incalzire a apei din piscina extind sezonul de baie cu 3-4 luni pe an. Pompele de caldura sunt solutia cea mai eficienta energetic, cu COP de pana la 16. Colectoarele solare, schimbatoarele de caldura si rezistentele electrice sunt alte optiuni viabile in functie de buget si context.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/heating1/800/600', 'alt' => 'Pompa caldura piscina', 'desc' => 'Pompa de caldura inverter pentru piscina'],
                ['url' => 'https://picsum.photos/seed/heating2/800/600', 'alt' => 'Panouri solare piscina', 'desc' => 'Colectoare solare pentru incalzire gratuita'],
                ['url' => 'https://picsum.photos/seed/heating3/800/600', 'alt' => 'Schimbator caldura', 'desc' => 'Schimbator de caldura cu centrala termica'],
                ['url' => 'https://picsum.photos/seed/heating4/800/600', 'alt' => 'Incalzire piscina instalatie', 'desc' => 'Instalatie completa de incalzire'],
                ['url' => 'https://picsum.photos/seed/heating5/800/600', 'alt' => 'Piscina incalzita toamna', 'desc' => 'Inot confortabil si in septembrie-octombrie'],
                ['url' => 'https://picsum.photos/seed/heating6/800/600', 'alt' => 'Control temperatura piscina', 'desc' => 'Termostat digital pentru control precis'],
            ],
        ],
        'tratament-apa' => [
            'name'        => 'Tratament apa',
            'description' => 'Tratamentul apei din piscina este esential pentru sanatatea utilizatorilor si durata de viata a piscinei. Sistemele moderne includ electrolyza salina (fara clor traditional), UV-C, ozon, dozare automata pH si redox. O apa echilibrata chimic protejeaza echipamentele si ofera confort maxim.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/treatment1/800/600', 'alt' => 'Electroliza salina piscina', 'desc' => 'Generator de clor prin electroliza salina'],
                ['url' => 'https://picsum.photos/seed/treatment2/800/600', 'alt' => 'Sistem UV piscina', 'desc' => 'Sterilizator UV-C pentru dezinfectie'],
                ['url' => 'https://picsum.photos/seed/treatment3/800/600', 'alt' => 'Dozator automat piscina', 'desc' => 'Dozator automat pH si clor'],
                ['url' => 'https://picsum.photos/seed/treatment4/800/600', 'alt' => 'Generator ozon piscina', 'desc' => 'Generator de ozon pentru dezinfectie'],
                ['url' => 'https://picsum.photos/seed/treatment5/800/600', 'alt' => 'Testare apa piscina', 'desc' => 'Analizor electronic al calitatii apei'],
                ['url' => 'https://picsum.photos/seed/treatment6/800/600', 'alt' => 'Apa curata piscina', 'desc' => 'Rezultat: apa cristal, fara mirosuri'],
            ],
        ],
        'iluminare' => [
            'name'        => 'Iluminare',
            'description' => 'Iluminarea subacvatica si perimetrala transforma piscina intr-o bijuterie nocturna. Proiectoarele LED RGB cu schimbarea culorii, fibra optica si sistemele de automatizare creeaza atmosfere magice. Iluminarea corecta sporeste siguranta si prelungeste orele de utilizare a piscinei.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/lighting1/800/600', 'alt' => 'Iluminare LED piscina', 'desc' => 'Proiector LED RGB subacvatic'],
                ['url' => 'https://picsum.photos/seed/lighting2/800/600', 'alt' => 'Piscina iluminata albastru', 'desc' => 'Efecte de lumina albastra spectaculoasa'],
                ['url' => 'https://picsum.photos/seed/lighting3/800/600', 'alt' => 'Piscina iluminata multicolor', 'desc' => 'Show de culori cu LED RGB'],
                ['url' => 'https://picsum.photos/seed/lighting4/800/600', 'alt' => 'Fibra optica piscina', 'desc' => 'Fibra optica integrata in peretii piscinei'],
                ['url' => 'https://picsum.photos/seed/lighting5/800/600', 'alt' => 'Iluminare perimetrala piscina', 'desc' => 'Strip LED perimetral pe bordura'],
                ['url' => 'https://picsum.photos/seed/lighting6/800/600', 'alt' => 'Piscina noapte iluminata', 'desc' => 'Panorama spectaculoasa seara'],
            ],
        ],
        'jocuri-acvatice' => [
            'name'        => 'Jocuri acvatice',
            'description' => 'Jocurile acvatice transforma piscina intr-un paradis pentru copii si adulti. De la tobogane, fontane, contra-curenti si geyser-uri pana la plafoane cu efecte de ploaie si cascade, optiunile sunt nelimitate. Sistemele moderne se integreaza perfect in designul piscinei.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/waterplay1/800/600', 'alt' => 'Fontana piscina', 'desc' => 'Fontana decorativa cu efecte de lumina'],
                ['url' => 'https://picsum.photos/seed/waterplay2/800/600', 'alt' => 'Cascada piscina', 'desc' => 'Cascada naturala integrata in peisaj'],
                ['url' => 'https://picsum.photos/seed/waterplay3/800/600', 'alt' => 'Geyser piscina', 'desc' => 'Geyser cu jet vertical reglabil'],
                ['url' => 'https://picsum.photos/seed/waterplay4/800/600', 'alt' => 'Tobogan piscina', 'desc' => 'Tobogan spiralat pentru copii si adulti'],
                ['url' => 'https://picsum.photos/seed/waterplay5/800/600', 'alt' => 'Contra-curent piscina', 'desc' => 'Sistem contra-curent pentru inot stationat'],
                ['url' => 'https://picsum.photos/seed/waterplay6/800/600', 'alt' => 'Jocuri apa piscina', 'desc' => 'Zona de jocuri pentru intreaga familie'],
            ],
        ],
    ];

    // ── Date cazi hidromasaj ───────────────────────────────────────────────
    private array $cazi = [
        'spa-portabil' => [
            'name'        => 'SPA Portabil',
            'description' => 'Cazile SPA portabile sunt solutia ideala pentru cei care doresc relaxare si hidromasaj fara a face lucrari de constructie. Umplete cu apa si conectate la curent, sunt gata de utilizare in cateva ore. Pot fi amplasate pe terasa, in gradina sau chiar in interior, si pot fi mutate cu usurinta.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/hot-tub1/800/600', 'alt' => 'SPA portabil rotund', 'desc' => 'Cada SPA portabila pentru 4-6 persoane'],
                ['url' => 'https://picsum.photos/seed/hot-tub2/800/600', 'alt' => 'SPA portabil terasa', 'desc' => 'Amplasare pe terasa cu vedere la gradina'],
                ['url' => 'https://picsum.photos/seed/hot-tub3/800/600', 'alt' => 'SPA portabil noapte', 'desc' => 'Relaxare seara cu iluminare LED colorata'],
                ['url' => 'https://picsum.photos/seed/hot-tub4/800/600', 'alt' => 'Interior SPA portabil', 'desc' => 'Sisteme de jeturi si hidromasaj integrat'],
            ],
        ],
        'spa-incorporat' => [
            'name'        => 'SPA Incorporat',
            'description' => 'Cazile SPA incorporat sunt construite direct in terasa sau in structura casei, oferind un aspect integrat si premium. Realizate din acril, fibra de sticla sau poliester, acestea dispun de sisteme complexe de hidromasaj, cromoterapie, aromoterapie si difuzoare audio integrate.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/built-spa1/800/600', 'alt' => 'SPA incorporat terasa', 'desc' => 'SPA incastrat in terasa de lemn exotic'],
                ['url' => 'https://picsum.photos/seed/built-spa2/800/600', 'alt' => 'SPA incorporat interior', 'desc' => 'SPA incorporat in baia de lux'],
                ['url' => 'https://picsum.photos/seed/built-spa3/800/600', 'alt' => 'SPA incorporat noapte', 'desc' => 'Cromoterapie si hidromasaj la apus'],
                ['url' => 'https://picsum.photos/seed/built-spa4/800/600', 'alt' => 'Detaliu jets SPA', 'desc' => 'Jeturi de masaj configurabile individual'],
            ],
        ],
        'spa-public' => [
            'name'        => 'SPA Public',
            'description' => 'Cazile SPA pentru uz public sunt proiectate pentru volume mari de utilizare si cerinte stricte de igiena. Sistemele de dezinfectie automate, materialele rezistente la uzura intensiva si capacitatile mari le fac ideale pentru hoteluri, centre spa, cluburi de fitness si bazine publice.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/public-spa1/800/600', 'alt' => 'SPA public hotel', 'desc' => 'Zona SPA de lux in hotel de 5 stele'],
                ['url' => 'https://picsum.photos/seed/public-spa2/800/600', 'alt' => 'SPA public centru wellness', 'desc' => 'Centru wellness cu cazi multiple'],
                ['url' => 'https://picsum.photos/seed/public-spa3/800/600', 'alt' => 'SPA public exterior', 'desc' => 'Zona SPA exterioara cu vedere panoramica'],
                ['url' => 'https://picsum.photos/seed/public-spa4/800/600', 'alt' => 'Instalatii SPA public', 'desc' => 'Sistem profesional de filtrare si dezinfectie'],
            ],
        ],
    ];

    // ── Date acoperiri ─────────────────────────────────────────────────────
    private array $acoperiri = [
        'prelata-izotermica' => [
            'name'        => 'Prelata izotermica',
            'description' => 'Prelatele izoterme sunt acoperiri din material cu bule de aer care mentin temperatura apei si reduc evaporarea cu pana la 98%. Stratul izoterm reflecta caldura si mentine piscina curata. Usor de manevrat cu role de rulare, reprezinta investitia optima pentru economie la incalzire.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/cover1/800/600', 'alt' => 'Prelata izotermica piscina', 'desc' => 'Prelata izotermica albastra cu bule'],
                ['url' => 'https://picsum.photos/seed/cover2/800/600', 'alt' => 'Rola prelata piscina', 'desc' => 'Sistem de rola automata pentru prelata'],
                ['url' => 'https://picsum.photos/seed/isocover/800/600', 'alt' => 'Prelata izotermica detaliu', 'desc' => 'Detaliu structura multi-strat izoterma'],
                ['url' => 'https://picsum.photos/seed/cover4/800/600', 'alt' => 'Piscina acoperita iarna', 'desc' => 'Protectie eficienta pe timpul iernii'],
            ],
        ],
        'prelata-securitate' => [
            'name'        => 'Prelata securitate',
            'description' => 'Prelatele de securitate sunt acoperiri rigide sau semi-rigide care protejeaza piscina impotriva accesului accidental. Omologate conform standardelor europene de securitate, pot suporta greutatea unui adult, prevenind accidentele. Pot fi actionate manual, semi-automat sau complet automat.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/safety-cover1/800/600', 'alt' => 'Prelata securitate rigida', 'desc' => 'Prelata de securitate cu lamele din policarbonat'],
                ['url' => 'https://picsum.photos/seed/safety-cover2/800/600', 'alt' => 'Prelata securitate automata', 'desc' => 'Sistem de acoperire automata cu telecomanda'],
                ['url' => 'https://picsum.photos/seed/safety-cover3/800/600', 'alt' => 'Prelata securitate lemn', 'desc' => 'Acoperire cu lamele din lemn tratat'],
                ['url' => 'https://picsum.photos/seed/safety-cover4/800/600', 'alt' => 'Prelata securitate iarna', 'desc' => 'Rezistenta la zapada si conditii extreme'],
            ],
        ],
        'acoperire-retractabila' => [
            'name'        => 'Acoperire retractabila',
            'description' => 'Acoperirile retractabile sunt structuri arhitecturale care permit utilizarea piscinei pe tot parcursul anului. Sistemele din aluminiu si policarbonat se deschid si inchid electric, transformand o piscina exterioara intr-una semi-interioara. Protectia impotriva vantului, ploii si insectelor este totala.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/retractable1/800/600', 'alt' => 'Acoperire retractabila deschisa', 'desc' => 'Structura retractabila in pozitie deschisa'],
                ['url' => 'https://picsum.photos/seed/retractable2/800/600', 'alt' => 'Acoperire retractabila inchisa', 'desc' => 'Piscina protejata complet in pozitia inchisa'],
                ['url' => 'https://picsum.photos/seed/retractable3/800/600', 'alt' => 'Acoperire retractabila moderna', 'desc' => 'Design modern din aluminiu si sticla'],
                ['url' => 'https://picsum.photos/seed/retractable4/800/600', 'alt' => 'Acoperire retractabila iarna', 'desc' => 'Inot confortabil chiar si iarna'],
            ],
        ],
    ];

    // ── Date SPA & Wellness ────────────────────────────────────────────────
    private array $spaWellnessItems = [
        'hamam' => [
            'name'        => 'Hamam',
            'description' => 'Hamam-ul traditional turcesc este o baie de abur umeda cu temperaturi intre 40-50°C si umiditate de 95-100%. Mozaicurile colorate, marmura si iluminarea ambientala creeaza o atmosfera unica de relaxare si detoxifiere. Modern interpretat, hamam-ul poate fi integrat in orice spatiu de wellness.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/hamam1/800/600', 'alt' => 'Hamam traditional', 'desc' => 'Hamam cu mozaic autentic si abur'],
                ['url' => 'https://picsum.photos/seed/hamam2/800/600', 'alt' => 'Hamam modern', 'desc' => 'Hamam contemporan cu iluminare cromatica'],
                ['url' => 'https://picsum.photos/seed/hamam3/800/600', 'alt' => 'Interior hamam', 'desc' => 'Interior hamam cu cupola si stele de lumina'],
                ['url' => 'https://picsum.photos/seed/hamam4/800/600', 'alt' => 'Piatra hamam', 'desc' => 'Masa de masaj calda din marmura'],
            ],
        ],
        'dusuri-emotionale' => [
            'name'        => 'Dusuri emotionale',
            'description' => 'Dusurile emotionale sunt experiente senzoriale complete care combina apa, lumina, aroma si sunet. De la ploaia tropicala calda la bruma rece a padurii sau cascada alpina, fiecare program simuleaza un mediu natural diferit. Ideal pentru centrele de wellness si spa-urile de lux.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/emotion-shower1/800/600', 'alt' => 'Dus emotional tropical', 'desc' => 'Program ploaie tropicala cu arome exotice'],
                ['url' => 'https://picsum.photos/seed/emotion-shower2/800/600', 'alt' => 'Dus emotional alpina', 'desc' => 'Experienta cascada alpina cu bruma rece'],
                ['url' => 'https://picsum.photos/seed/emotion-shower3/800/600', 'alt' => 'Cabina dus emotional', 'desc' => 'Cabina cu panouri LED si difuzoare audio'],
                ['url' => 'https://picsum.photos/seed/emotion-shower4/800/600', 'alt' => 'Dus emotional lux', 'desc' => 'Sistem premium cu 12 programe preset'],
            ],
        ],
        'dusuri-vichy' => [
            'name'        => 'Dusuri Vichy',
            'description' => 'Dusul Vichy este o tehnica terapeutica in care multiple jeturi de apa termifera cad simultan pe intregul corp asezat pe o masa de masaj. Originara din statiunea Vichy din Franta, aceasta tehnica combina beneficiile hidrokineziterapiei cu masajul si aromoterapia pentru rezultate exceptionale.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/vichy1/800/600', 'alt' => 'Dus Vichy masaj', 'desc' => 'Masa de dus Vichy cu multiple jeturi'],
                ['url' => 'https://picsum.photos/seed/vichy2/800/600', 'alt' => 'Cabina Vichy', 'desc' => 'Cabina Vichy profesionala pentru spa'],
                ['url' => 'https://picsum.photos/seed/vichy3/800/600', 'alt' => 'Tratament Vichy', 'desc' => 'Sedinta de tratament cu aromoterapie'],
                ['url' => 'https://picsum.photos/seed/vichy4/800/600', 'alt' => 'Echipament Vichy', 'desc' => 'Bara cu 5 jeturi reglabile individual'],
            ],
        ],
        'fotolii-relaxare' => [
            'name'        => 'Fotolii de relaxare',
            'description' => 'Fotoliile de relaxare pentru zone SPA combina confortul unui scaun ergonomic cu functii de masaj, incalzire si cromoterapie. De la fotolii cu masaj prin vibratii si aer pana la capsule de flotare si paturi de apa incalzita, optiunile permit crearea unui spatiu de recuperare total.',
            'photos'      => [
                ['url' => 'https://picsum.photos/seed/relax-chair1/800/600', 'alt' => 'Fotoliu masaj spa', 'desc' => 'Fotoliu zero-gravity cu masaj complet'],
                ['url' => 'https://picsum.photos/seed/relax-chair2/800/600', 'alt' => 'Zona relaxare spa', 'desc' => 'Zona de relaxare cu fotolii incalzite'],
                ['url' => 'https://picsum.photos/seed/relax-chair3/800/600', 'alt' => 'Fotoliu saline', 'desc' => 'Fotoliu cu terapie prin lumina saline'],
                ['url' => 'https://picsum.photos/seed/relax-chair4/800/600', 'alt' => 'Pat relaxare spa', 'desc' => 'Pat de relaxare cu apa incalzita si masaj'],
            ],
        ],
    ];

    // ── Helper ─────────────────────────────────────────────────────────────
    protected function topCategories()
    {
        return Category::whereNull('parent_id')
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();
    }

    // ── Metode existente ───────────────────────────────────────────────────
    public function piscine()
    {
        $categories = $this->topCategories();
        return view('pagini.piscine.index', compact('categories'));
    }

    public function piscineConcepte()
    {
        $categories = $this->topCategories();
        $concepteList = collect($this->concepte)->map(fn($v, $k) => array_merge($v, ['slug' => $k]))->values();
        return view('pagini.piscine.concepte', compact('categories', 'concepteList'));
    }

    public function piscineConcept(string $slug)
    {
        $concept = $this->concepte[$slug] ?? abort(404);
        $categories = $this->topCategories();
        return view('pagini.piscine.concept-detail', compact('categories', 'concept', 'slug'));
    }

    public function piscineTendinte()
    {
        $categories = $this->topCategories();
        return view('pagini.piscine.tendinte', compact('categories'));
    }

    public function piscineCuloareaApei()
    {
        $categories = $this->topCategories();
        return view('pagini.piscine.culoarea-apei', compact('categories'));
    }

    public function piscineTehnologie()
    {
        $categories = $this->topCategories();
        $tehnologiiList = collect($this->tehnologii)->map(fn($v, $k) => array_merge($v, ['slug' => $k]))->values();
        return view('pagini.piscine.tehnologie', compact('categories', 'tehnologiiList'));
    }

    public function piscineTehnologieDetail(string $slug)
    {
        $tehnologie = $this->tehnologii[$slug] ?? abort(404);
        $categories = $this->topCategories();
        return view('pagini.piscine.tehnologie-detail', compact('categories', 'tehnologie', 'slug'));
    }

    public function piscineRenovari()
    {
        $categories = $this->topCategories();
        return view('pagini.piscine.renovari', compact('categories'));
    }

    public function piscineServicii()
    {
        $categories = $this->topCategories();
        return view('pagini.piscine.servicii', compact('categories'));
    }

    public function piscinePublice()
    {
        $categories = $this->topCategories();
        return view('pagini.piscine-publice', compact('categories'));
    }

    public function caziHidromasaj()
    {
        $categories = $this->topCategories();
        $caziList = collect($this->cazi)->map(fn($v, $k) => array_merge($v, ['slug' => $k]))->values();
        return view('pagini.cazi-hidromasaj', compact('categories', 'caziList'));
    }

    public function caziSpa(string $slug)
    {
        $spa = $this->cazi[$slug] ?? abort(404);
        $categories = $this->topCategories();
        return view('pagini.cazi-spa-detail', compact('categories', 'spa', 'slug'));
    }

    public function hamam()
    {
        $categories = $this->topCategories();
        return view('pagini.hamam', compact('categories'));
    }

    public function acoperire()
    {
        $categories = $this->topCategories();
        $acopeririList = collect($this->acoperiri)->map(fn($v, $k) => array_merge($v, ['slug' => $k]))->values();
        return view('pagini.acoperire', compact('categories', 'acopeririList'));
    }

    public function acoperiereDetail(string $slug)
    {
        $acoperire = $this->acoperiri[$slug] ?? abort(404);
        $categories = $this->topCategories();
        return view('pagini.acoperire-detail', compact('categories', 'acoperire', 'slug'));
    }

    public function spaWellness()
    {
        $categories = $this->topCategories();
        $spaList = collect($this->spaWellnessItems)->map(fn($v, $k) => array_merge($v, ['slug' => $k]))->values();
        return view('pagini.spa-wellness', compact('categories', 'spaList'));
    }

    public function spaWellnessDetail(string $slug)
    {
        $spaItem = $this->spaWellnessItems[$slug] ?? abort(404);
        $categories = $this->topCategories();
        return view('pagini.spa-detail', compact('categories', 'spaItem', 'slug'));
    }

    public function servicii()
    {
        $categories = $this->topCategories();
        return view('pagini.servicii', compact('categories'));
    }

    public function actualitate()
    {
        $categories = $this->topCategories();
        return view('pagini.actualitate', compact('categories'));
    }

    public function contact()
    {
        $categories = $this->topCategories();
        return view('pagini.contact', compact('categories'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'nume'    => 'required|string|max:120',
            'email'   => 'required|email|max:120',
            'telefon' => 'nullable|string|max:30',
            'subiect' => 'required|string|max:120',
            'mesaj'   => 'required|string|max:2000',
        ]);

        return back()->with('success', 'Mesajul dvs. a fost trimis. Vă vom contacta în cel mai scurt timp!');
    }
}
