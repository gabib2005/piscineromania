<nav class="pr-mega-nav" x-data="{ active: null, section: 'concepte' }" @mouseleave="active = null">
    <div class="pr-mega-nav-inner">

        {{-- PISCINE cu dropdown --}}
        <div class="pr-mega-item" @mouseenter="active = 'piscine'">
            <button type="button" class="pr-mega-trigger {{ request()->is('piscine*') ? 'active' : '' }}">
                Piscine
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </button>
        </div>

        {{-- CAZI HIDROMASAJ --}}
        <div class="pr-mega-item" @mouseenter="active = 'cazi'">
            <a href="{{ route('page.cazi') }}" class="pr-mega-trigger {{ request()->is('cazi-hidromasaj*') ? 'active' : '' }}">
                Cazi hidromasaj
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </a>
        </div>

        {{-- HAMAM (direct, fara dropdown) --}}
        <a href="{{ route('page.hamam') }}" class="pr-mega-link {{ request()->is('hamam*') ? 'active' : '' }}" @mouseenter="active = null">
            Hamam &amp; Bai de abur
        </a>

        {{-- ACOPERIRE --}}
        <div class="pr-mega-item" @mouseenter="active = 'acoperire'">
            <a href="{{ route('page.acoperire') }}" class="pr-mega-trigger {{ request()->is('acoperire*') ? 'active' : '' }}">
                Acoperire
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </a>
        </div>

        {{-- SPA & WELLNESS --}}
        <div class="pr-mega-item" @mouseenter="active = 'spa'">
            <a href="{{ route('page.spa') }}" class="pr-mega-trigger {{ request()->is('spa*') ? 'active' : '' }}">
                SPA &amp; Wellness
                <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </a>
        </div>

        {{-- Separator --}}
        <div style="flex:1"></div>

        {{-- ACTUALITATE --}}
        <a href="{{ route('page.actualitate') }}" class="pr-mega-link {{ request()->is('actualitate') ? 'active' : '' }}" @mouseenter="active = null">
            Actualitate
        </a>

        {{-- CONTACT --}}
        <a href="{{ route('page.contact') }}" class="pr-mega-link {{ request()->is('contact') ? 'active' : '' }}" @mouseenter="active = null">
            Contact
        </a>

    </div>

    {{-- ════ DROPDOWN PISCINE (mega, 3 coloane) ════ --}}
    <div class="pr-mega-dropdown"
         x-show="active === 'piscine'"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-1"
         x-transition:enter-end="opacity-100 translate-y-0"
         @mouseenter="active = 'piscine'"
         style="display:none">
        <div class="pr-mega-dd-inner">

            {{-- Col 1: Sectiuni --}}
            <div class="pr-mega-col-1">
                <div class="pr-mega-col-title">Inspiratie &amp; Design</div>
                <a href="{{ route('page.piscine.concepte') }}"
                   class="pr-mega-section-item" :class="{ 'active': section === 'concepte' }"
                   @mouseenter="section = 'concepte'">
                    Concepte
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                </a>
                <a href="{{ route('page.piscine.tendinte') }}"
                   class="pr-mega-section-item" :class="{ 'active': section === 'tendinte' }"
                   @mouseenter="section = 'tendinte'">
                    Tendinte
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                </a>
                <a href="{{ route('page.piscine.culoarea-apei') }}"
                   class="pr-mega-section-item" :class="{ 'active': section === 'culoarea-apei' }"
                   @mouseenter="section = 'culoarea-apei'">
                    Culoarea apei
                </a>
                <a href="{{ route('page.piscine.tehnologie') }}"
                   class="pr-mega-section-item" :class="{ 'active': section === 'tehnologie' }"
                   @mouseenter="section = 'tehnologie'">
                    Tehnologie
                </a>
                <a href="{{ route('page.piscine.renovari') }}"
                   class="pr-mega-section-item" :class="{ 'active': section === 'renovari' }"
                   @mouseenter="section = 'renovari'">
                    Renovari
                </a>
                <a href="{{ route('page.piscine.servicii') }}"
                   class="pr-mega-section-item" :class="{ 'active': section === 'servicii' }"
                   @mouseenter="section = 'servicii'">
                    Servicii
                </a>
            </div>

            {{-- Col 2: Subcategorii dinamice --}}
            <div class="pr-mega-col-2">
                {{-- Concepte --}}
                <div x-show="section === 'concepte'">
                    <div class="pr-mega-col-title">Tipuri de piscine</div>
                    @foreach(\App\Models\Category::where('parent_id', function($q){ $q->select('id')->from('categories')->where('slug','piscine'); })->where('group','concepte')->where('is_active',true)->orderBy('sort_order')->get() as $sub)
                    <a href="{{ route('shop.category', $sub->slug) }}" class="pr-mega-sub-item">{{ $sub->name }}</a>
                    @endforeach
                </div>

                {{-- Tendinte --}}
                <div x-show="section === 'tendinte'">
                    <div class="pr-mega-col-title">Functionalitati</div>
                    @foreach(\App\Models\Category::where('parent_id', function($q){ $q->select('id')->from('categories')->where('slug','piscine'); })->where('group','tendinte')->where('is_active',true)->orderBy('sort_order')->get() as $sub)
                    <a href="{{ route('shop.category', $sub->slug) }}" class="pr-mega-sub-item">{{ $sub->name }}</a>
                    @endforeach
                </div>

                {{-- Culoarea apei --}}
                <div x-show="section === 'culoarea-apei'">
                    <div class="pr-mega-col-title">Culoarea apei</div>
                    <p style="padding:12px 16px; font-size:13px; color:var(--gray); line-height:1.6">
                        Apa ideala are o culoare albastra-turcoaz transparenta, rezultatul unui echilibru perfect al chimiei si al revêtimentului interior.
                    </p>
                    <a href="{{ route('page.piscine.culoarea-apei') }}" class="pr-mega-sub-item">Citeste mai mult &rarr;</a>
                </div>

                {{-- Tehnologie --}}
                <div x-show="section === 'tehnologie'">
                    <div class="pr-mega-col-title">Tehnologie moderna</div>
                    <p style="padding:12px 16px; font-size:13px; color:var(--gray); line-height:1.6">
                        Automatizare, filtrare inteligenta si sisteme de tratament al apei de ultima generatie.
                    </p>
                    <a href="{{ route('page.piscine.tehnologie') }}" class="pr-mega-sub-item">Descopera &rarr;</a>
                </div>

                {{-- Renovari --}}
                <div x-show="section === 'renovari'">
                    <div class="pr-mega-col-title">Renovare piscine</div>
                    <p style="padding:12px 16px; font-size:13px; color:var(--gray); line-height:1.6">
                        Renovam si modernizam orice tip de piscina existenta, de la revêtiment la sisteme de filtrare.
                    </p>
                    <a href="{{ route('page.piscine.renovari') }}" class="pr-mega-sub-item">Vezi servicii &rarr;</a>
                </div>

                {{-- Servicii --}}
                <div x-show="section === 'servicii'">
                    <div class="pr-mega-col-title">Servicii profesionale</div>
                    <p style="padding:12px 16px; font-size:13px; color:var(--gray); line-height:1.6">
                        Intretinere, service, repornire sezoniera si asistenta tehnica pentru piscina dumneavoastra.
                    </p>
                    <a href="{{ route('page.piscine.servicii') }}" class="pr-mega-sub-item">Mai multe &rarr;</a>
                </div>

                {{-- Default --}}
                <div x-show="section !== 'concepte' && section !== 'tendinte' && section !== 'culoarea-apei' && section !== 'tehnologie' && section !== 'renovari' && section !== 'servicii'">
                    <div class="pr-mega-col-title">Descopera</div>
                    <a href="{{ route('shop.category', 'piscine') }}" class="pr-mega-sub-item">Toate produsele piscine</a>
                </div>
            </div>

            {{-- Col 3: CTA/promo --}}
            <div class="pr-mega-col-3">
                <div class="pr-mega-promo">
                    <div class="pr-mega-promo-title">Consultanta gratuita</div>
                    <p>Expertii nostri va ajuta sa alegeti piscina perfecta pentru casa dumneavoastra.</p>
                    <a href="{{ route('page.contact') }}" class="pr-mega-promo-btn">Solicita detalii</a>
                </div>
            </div>

        </div>
    </div>

    {{-- ════ DROPDOWN CAZI HIDROMASAJ ════ --}}
    <div class="pr-mega-dropdown pr-mega-dropdown-simple"
         x-show="active === 'cazi'"
         @mouseenter="active = 'cazi'"
         style="display:none">
        <div class="pr-mega-dd-inner pr-mega-dd-simple">
            <div class="pr-mega-col-title">Tipuri</div>
            @foreach(\App\Models\Category::where('parent_id', function($q){ $q->select('id')->from('categories')->where('slug','cazi-hidromasaj'); })->where('is_active',true)->orderBy('sort_order')->get() as $sub)
            <a href="{{ route('shop.category', $sub->slug) }}" class="pr-mega-dd-link">{{ $sub->name }}</a>
            @endforeach
        </div>
    </div>

    {{-- ════ DROPDOWN ACOPERIRE ════ --}}
    <div class="pr-mega-dropdown pr-mega-dropdown-simple"
         x-show="active === 'acoperire'"
         @mouseenter="active = 'acoperire'"
         style="display:none">
        <div class="pr-mega-dd-inner pr-mega-dd-simple">
            <div class="pr-mega-col-title">Tipuri acoperire</div>
            @foreach(\App\Models\Category::where('parent_id', function($q){ $q->select('id')->from('categories')->where('slug','acoperire'); })->where('is_active',true)->orderBy('sort_order')->get() as $sub)
            <a href="{{ route('shop.category', $sub->slug) }}" class="pr-mega-dd-link">{{ $sub->name }}</a>
            @endforeach
        </div>
    </div>

    {{-- ════ DROPDOWN SPA & WELLNESS ════ --}}
    <div class="pr-mega-dropdown pr-mega-dropdown-simple"
         x-show="active === 'spa'"
         @mouseenter="active = 'spa'"
         style="display:none">
        <div class="pr-mega-dd-inner pr-mega-dd-simple">
            <div class="pr-mega-col-title">Wellness &amp; Relaxare</div>
            @foreach(\App\Models\Category::where('parent_id', function($q){ $q->select('id')->from('categories')->where('slug','spa-wellness'); })->where('is_active',true)->orderBy('sort_order')->get() as $sub)
            <a href="{{ route('page.spa') }}#{{ $sub->slug }}" class="pr-mega-dd-link">{{ $sub->name }}</a>
            @endforeach
        </div>
    </div>

</nav>
