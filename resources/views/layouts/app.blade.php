<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PiscineRomania') — Magazine Piscine & Accesorii</title>
    <meta name="description" content="@yield('description', 'Piscine, pompe, filtre și accesorii de calitate la prețuri competitive.')">
    @yield('meta')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Nunito:wght@400;500;600&family=Playfair+Display:ital,wght@0,700;1,700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background:#f8fafc; color:#0a2540; overflow-x:hidden">

{{-- ════ TOPBAR ════ --}}
<div class="pr-topbar">
    Livrare gratuită pentru comenzi peste <strong>{{ number_format(config('app.shipping_free_threshold', env('SHIPPING_FREE_THRESHOLD', 800)), 0, ',', '.') }} RON</strong>
    · Luni–Vineri 09:00–18:00
</div>

{{-- ════ HEADER ════ --}}
<header class="pr-header" x-data="{ mobileOpen: false }">
    <div class="pr-header-inner">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="pr-logo">
            <img src="{{ asset('images/sigla.png') }}" alt="S&S Piscine">
        </a>

        {{-- SEARCH — centrat pe pagină --}}
        <form action="{{ route('shop.search') }}" method="GET" class="pr-search" tabindex="-1">
            <button type="submit" style="background:none;border:none;cursor:pointer;padding:0;display:flex;align-items:center;outline:none">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" style="width:16px;height:16px;color:rgba(10,37,64,0.5)">
                    <circle cx="11" cy="11" r="7"/>
                    <path d="M21 21l-4.35-4.35" stroke-linecap="round"/>
                </svg>
            </button>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Caută produse sau cod articol..." autocomplete="off" style="-webkit-tap-highlight-color:transparent">
        </form>

        {{-- NAV ICONS --}}
        <div class="pr-nav-icons">
            {{-- ACASĂ --}}
            <a href="{{ route('home') }}" class="pr-nav-icon {{ request()->routeIs('home') ? 'active' : '' }}">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                    <path d="M9 22V12h6v10"/>
                </svg>
                <span>Acasă</span>
            </a>

            {{-- COS --}}
            <a href="{{ route('cart.index') }}" class="pr-nav-icon" style="position:relative"
               x-data="cartBadge()" x-init="init()">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M6 2L3 6v1a1 1 0 001 1h16a1 1 0 001-1V6L18 2z"/>
                    <path d="M3 8l2 13a2 2 0 002 2h10a2 2 0 002-2l2-13"/>
                    <path d="M9 12v4M15 12v4"/>
                </svg>
                <span>Coș</span>
                <div class="pr-badge" x-show="count > 0" x-text="count" style="display:none"></div>
            </a>

            {{-- CONT --}}
            @auth
            <div x-data="{ open: false }" @click.away="open = false" style="position:relative">
                <button type="button" class="pr-nav-icon" style="background:none;border:none;cursor:pointer" @click="open = !open">
                    <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                    </svg>
                    <span>{{ Str::limit(auth()->user()->name, 10) }}</span>
                </button>
                <div x-cloak x-show="open" x-transition class="pr-nav-dropdown-menu">
                    <a href="{{ route('account.orders') }}">Comenzile mele</a>
                    <a href="{{ route('account.profile') }}">Profilul meu</a>
                    @if(auth()->user()->hasRole('admin'))
                    <hr>
                    <a href="{{ route('admin.dashboard') }}" style="font-weight:600">Panou Admin</a>
                    @endif
                    <hr>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="danger">Deconectare</button>
                    </form>
                </div>
            </div>
            @else
            <a href="{{ route('login') }}" class="pr-nav-icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
                <span>Cont</span>
            </a>
            @endauth
        </div>

    </div>
</header>

{{-- ════ CATEGORY NAV ════ --}}
<nav class="pr-cat-nav"
     x-data="categorySlider()"
     @mousemove="onMouseMove($event)"
     @mouseleave="onMouseLeave()"
     @mouseenter="onMouseEnter()"
     @touchstart.passive="onTouchStart($event)"
     @touchmove.passive="onTouchMove($event)"
     @touchend.passive="onTouchEnd()">
    <div class="overflow-hidden">
        <div class="pr-cat-track"
             x-ref="track"
             :style="`transform: translateX(${offset}px)`">
            <a href="{{ route('shop.index') }}"
               class="pr-cat-link {{ request()->routeIs('shop.index') && !request('category') ? 'active' : '' }}">
                Toate produsele
            </a>
            @foreach(\App\Models\Category::where('is_active', true)->orderBy('sort_order')->get() as $cat)
            <a href="{{ route('shop.category', $cat->slug) }}"
               class="pr-cat-link {{ request()->is('*/'.$cat->slug) ? 'active' : '' }}">
                {{ $cat->name }}
            </a>
            @endforeach
        </div>
    </div>
</nav>

{{-- FLASH MESSAGES --}}
@if(session('success'))
<div class="pr-flash-success" x-data x-init="setTimeout(() => $el.remove(), 4000)">
    <p>{{ session('success') }}</p>
</div>
@endif
@if(session('error'))
<div class="pr-flash-error" x-data x-init="setTimeout(() => $el.remove(), 4000)">
    <p>{{ session('error') }}</p>
</div>
@endif

<main class="@yield('main-class')">
    @yield('content')
</main>

{{-- ════ FOOTER ════ --}}
<footer class="pr-footer">
    <div class="pr-footer-top">
        <div>
            <div class="pr-footer-logo">
                <img src="{{ asset('images/sigla.png') }}" alt="S&S Piscine">
            </div>
            <div class="pr-footer-brand">
                <p>Furnizor profesional de echipamente pentru piscine, saune și spa în România. Distribuitor Aquashop.hu.</p>
            </div>
            <div class="pr-social-links">
                <a href="https://www.facebook.com/piscineromania" target="_blank" rel="noopener" class="pr-social-link" title="Facebook">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073C24 5.404 18.627 0 12 0S0 5.404 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.885v2.271h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/></svg>
                </a>
                <a href="https://www.instagram.com/piscineromania" target="_blank" rel="noopener" class="pr-social-link" title="Instagram">
                    <svg width="15" height="15" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
            </div>
        </div>
        <div class="pr-footer-col">
            <h4>Categorii</h4>
            <ul>
                <li><a href="{{ route('shop.index') }}">Toate produsele</a></li>
                @foreach(\App\Models\Category::where('is_active', true)->orderBy('sort_order')->limit(5)->get() as $cat)
                <li><a href="{{ route('shop.category', $cat->slug) }}">{{ $cat->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="pr-footer-col">
            <h4>Cont</h4>
            <ul>
                <li><a href="{{ route('login') }}">Autentificare</a></li>
                <li><a href="{{ route('register') }}">Înregistrare</a></li>
                @auth
                <li><a href="{{ route('account.orders') }}">Comenzile mele</a></li>
                <li><a href="{{ route('account.profile') }}">Profilul meu</a></li>
                @endauth
            </ul>
        </div>
        <div class="pr-footer-col">
            <h4>Contact</h4>
            <ul>
                <li><a href="mailto:contact@piscineromania.ro">contact@piscineromania.ro</a></li>
                <li><a href="tel:+40000000000">+40 XXX XXX XXX</a></li>
                <li><a href="#">Termeni & Condiții</a></li>
                <li><a href="#">Politica GDPR</a></li>
            </ul>
        </div>
    </div>
    <div class="pr-footer-bottom">
        <p>© {{ date('Y') }} PiscineRomania SRL. Toate drepturile rezervate.</p>
    </div>
</footer>

{{-- ════ SCRIPTS ════ --}}
<script>
function cartBadge() {
    return {
        count: 0,
        init() {
            this.fetchCount();
            window.addEventListener('cart-updated', () => this.fetchCount());
        },
        fetchCount() {
            fetch('{{ route("cart.count") }}')
                .then(r => r.json())
                .then(d => { this.count = d.count; })
                .catch(() => {});
        }
    }
}

function categorySlider() {
    return {
        offset: 0,
        maxOffset: 0,
        active: false,
        touchStartX: 0,
        touchStartOffset: 0,

        onMouseEnter() {
            this.active = true;
            this.$nextTick(() => this.calcMax());
        },
        onMouseLeave() {
            this.active = false;
            const ease = () => {
                if (this.active) return;
                this.offset = this.offset * 0.97;
                if (Math.abs(this.offset) > 0.5) requestAnimationFrame(ease);
                else this.offset = 0;
            };
            requestAnimationFrame(ease);
        },
        onMouseMove(e) {
            if (!this.active) return;
            this.calcMax();
            const rect  = this.$el.getBoundingClientRect();
            const ratio = (e.clientX - rect.left) / rect.width;
            const target = -Math.round(this.maxOffset * ratio);
            this.offset = this.offset + (target - this.offset) * 0.04;
        },
        onTouchStart(e) {
            this.touchStartX = e.touches[0].clientX;
            this.touchStartOffset = this.offset;
            this.calcMax();
        },
        onTouchMove(e) {
            const dx = e.touches[0].clientX - this.touchStartX;
            this.offset = Math.max(-this.maxOffset, Math.min(0, this.touchStartOffset + dx));
        },
        onTouchEnd() {
            // rămâne unde a fost lăsat
        },
        calcMax() {
            const track = this.$refs.track;
            this.maxOffset = Math.max(0, track.scrollWidth - this.$el.offsetWidth);
        }
    }
}
</script>
@yield('scripts')
</body>
</html>
