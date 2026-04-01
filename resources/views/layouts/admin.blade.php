<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="noindex, nofollow">
    <title>Admin — @yield('title', 'Dashboard') | PiscineRomania</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Nunito:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800" x-data="{ sidebarOpen: true }">

<div class="flex h-screen overflow-hidden">
    {{-- Sidebar --}}
    <aside class="w-64 bg-[#0a2540] text-gray-200 flex-shrink-0 flex flex-col"
           :class="sidebarOpen ? 'block' : 'hidden'">
        <div class="p-4 border-b border-white/10">
            <a href="{{ route('admin.dashboard') }}" class="text-white font-bold text-lg" style="font-family:'Outfit',sans-serif">
                🏊 PiscineRomania
            </a>
            <p class="text-xs text-gray-400 mt-1">Panou Administrare</p>
        </div>
        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            @php
            $navItems = [
                ['route' => 'admin.dashboard',         'icon' => '📊', 'label' => 'Dashboard'],
                ['route' => 'admin.products.index',    'icon' => '📦', 'label' => 'Produse'],
                ['route' => 'admin.categories.index',  'icon' => '📂', 'label' => 'Categorii'],
                ['route' => 'admin.orders.index',      'icon' => '🛒', 'label' => 'Comenzi'],
                ['route' => 'admin.crm.index',         'icon' => '👥', 'label' => 'CRM Clienți'],
                ['route' => 'admin.settings.index',    'icon' => '⚙️',  'label' => 'Setări'],
            ];
            @endphp
            @foreach($navItems as $item)
            <a href="{{ route($item['route']) }}"
               class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm transition-colors
                      {{ request()->routeIs($item['route'] . '*') ? 'bg-[#00b4d8] text-white' : 'hover:bg-white/10 text-gray-300 hover:text-white' }}">
                <span>{{ $item['icon'] }}</span>
                <span>{{ $item['label'] }}</span>
            </a>
            @endforeach
        </nav>
        <div class="p-4 border-t border-white/10">
            <a href="{{ route('home') }}" class="text-xs text-gray-400 hover:text-white block mb-2">← Înapoi la magazin</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs text-red-400 hover:text-red-300">Deconectare</button>
            </form>
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col overflow-hidden">
        {{-- Top bar --}}
        <header class="bg-white border-b border-gray-200 px-6 py-3 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <h1 class="text-lg font-semibold text-gray-800" style="font-family:'Outfit',sans-serif">@yield('title', 'Dashboard')</h1>
            </div>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500">{{ auth()->user()->name }}</span>
            </div>
        </header>

        {{-- Flash --}}
        @if(session('success'))
        <div class="bg-green-50 border-l-4 border-green-400 p-3 mx-6 mt-4 rounded text-sm text-green-700" x-data x-init="setTimeout(() => $el.remove(), 4000)">
            {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="bg-red-50 border-l-4 border-red-400 p-3 mx-6 mt-4 rounded text-sm text-red-700" x-data x-init="setTimeout(() => $el.remove(), 4000)">
            {{ session('error') }}
        </div>
        @endif

        {{-- Content --}}
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>
</div>

@yield('scripts')
</body>
</html>
