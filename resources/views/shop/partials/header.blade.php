@php
    $activeNav = $activeNav ?? null;
@endphp

<header class="shop-header">
    <div class="shop-header-inner">
        <a href="{{ route('shop.index') }}" class="shop-logo">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                <line x1="3" y1="6" x2="21" y2="6"/>
                <path d="M16 10a4 4 0 01-8 0"/>
            </svg>
            DOLLARS MENUISERIE
        </a>

        <ul class="shop-nav">
            <li>
                <a href="{{ route('shop.index') }}" class="{{ $activeNav === 'catalogue' ? 'is-active' : '' }}">CATALOGUE</a>
            </li>
            <li>
                <a href="{{ route('shop.index', ['custom' => 1]) }}" class="{{ $activeNav === 'sur-mesure' ? 'is-active' : '' }}">SUR MESURE</a>
            </li>
            @isset($highlightCategory)
                <li>
                    <a href="{{ route('shop.index', ['category' => $highlightCategory->id]) }}">{{ strtoupper($highlightCategory->name) }}</a>
                </li>
            @endisset
            <li>
                <a href="{{ route('shop.index') }}">PROMOTIONS</a>
            </li>
        </ul>

        <div class="shop-header-actions">
            @auth
                <a href="{{ route('shop.cart') }}">PANIER</a>
                <a href="{{ route('dashboard') }}">COMPTE</a>
            @else
                <a href="{{ route('login') }}">CONNEXION</a>
                <a href="{{ route('register') }}">INSCRIPTION</a>
            @endauth
            <form action="{{ route('shop.index') }}" method="GET" class="shop-search">
                <svg width="16" height="16" fill="none" stroke="rgba(255,255,255,0.9)" stroke-width="2" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                </svg>
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Rechercher…" aria-label="Rechercher">
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
            </form>
        </div>
    </div>
    <svg class="shop-scallop" viewBox="0 0 1200 28" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0,28 L0,14 C50,0 100,28 150,14 C200,0 250,28 300,14 C350,0 400,28 450,14 C500,0 550,28 600,14 C650,0 700,28 750,14 C800,0 850,28 900,14 C950,0 1000,28 1050,14 C1100,0 1150,28 1200,14 L1200,28 Z"/>
    </svg>
</header>
