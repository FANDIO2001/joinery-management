<nav class="navbar-custom fixed top-0 left-0 right-0 z-50" id="navbar">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 xl:px-16">
        <div class="flex justify-between items-center h-16">
            <a href="{{ url('/') }}" class="logo-container">
                <img src="{{ asset('images/hero/LOGO.jpg') }}" alt="DOLLARS MENUISERIE" class="logo-image"
                    onerror="this.src='{{ asset('images/hero/logo-dollars.jpg') }}'">
                <span class="logo-text">DOLLARS MENUISERIE</span>
            </a>

            <div class="hidden md:flex flex-1 justify-center">
                <div class="nav-links flex items-center space-x-8">
                    <a href="{{ url('/') }}"
                        class="nav-link {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
                    <a href="{{ route('shop.index') }}"
                        class="nav-link {{ request()->routeIs('shop.index', 'shop.show', 'shop.customize') ? 'active' : '' }}">Boutique</a>
                    @auth
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard', 'dashboard.fr') ? 'active' : '' }}">Tableau de bord</a>
                        <a href="{{ route('customer.orders.index') }}"
                            class="nav-link {{ request()->routeIs('customer.orders.*') ? 'active' : '' }}">Mes commandes</a>
                    @endauth
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <div class="hidden md:flex nav-actions">
                    @auth
                        <a href="{{ route('profile.index') }}"
                            class="nav-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">Profil</a>
                        <a href="{{ route('shop.cart') }}"
                            class="nav-link {{ request()->routeIs('shop.cart', 'shop.checkout*') ? 'active' : '' }}">Panier</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="btn-nav-logout">Déconnexion</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}"
                            class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Connexion</a>
                        <a href="{{ route('register') }}" class="btn-primary">S'inscrire</a>
                    @endauth
                </div>

                <button type="button" class="mobile-menu-btn md:hidden" onclick="toggleAppMobileMenu()"
                    aria-label="Ouvrir le menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div id="app-mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="{{ url('/') }}"
                class="nav-mobile-link {{ request()->is('/') ? 'active' : '' }}">Accueil</a>
            <a href="{{ route('shop.index') }}"
                class="nav-mobile-link {{ request()->routeIs('shop.index', 'shop.show', 'shop.customize') ? 'active' : '' }}">Boutique</a>
            @auth
                <a href="{{ route('dashboard') }}"
                    class="nav-mobile-link {{ request()->routeIs('dashboard', 'dashboard.fr') ? 'active' : '' }}">Tableau de bord</a>
                <a href="{{ route('customer.orders.index') }}"
                    class="nav-mobile-link {{ request()->routeIs('customer.orders.*') ? 'active' : '' }}">Mes commandes</a>
                <a href="{{ route('profile.index') }}"
                    class="nav-mobile-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">Profil</a>
                <a href="{{ route('shop.cart') }}"
                    class="nav-mobile-link {{ request()->routeIs('shop.cart', 'shop.checkout*') ? 'active' : '' }}">Panier</a>
                <form method="POST" action="{{ route('logout') }}" class="pt-2">
                    @csrf
                    <button type="submit"
                        class="w-full text-left nav-mobile-link text-red-600 hover:bg-red-50 hover:text-red-700">
                        Déconnexion
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="nav-mobile-link {{ request()->routeIs('login') ? 'active' : '' }}">Connexion</a>
                <a href="{{ route('register') }}"
                    class="nav-mobile-link text-blue-600 {{ request()->routeIs('register') ? 'active' : '' }}">S'inscrire</a>
            @endauth
        </div>
    </div>
</nav>
