<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="text-lg font-semibold text-gray-900">DOLLARS MENUISERIE</a>
                <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">Accueil</a>
            </div>
            <div class="flex items-center gap-4">
                <a href="{{ route('profile.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:text-red-800">Déconnexion</button>
                </form>
            </div>
        </div>
    </div>
</nav>
