@extends('layouts.app')

@section('title', 'Inscription - DOLLARS MENUISERIE MEUBLE')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-600 to-blue-900 py-12 px-4 sm:px-6 lg:px-8 relative" style="background-image: url('{{ asset('images/hero/logo-dollars.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <div class="absolute inset-0 bg-blue-900/80 backdrop-blur-sm"></div>
    <div class="max-w-2xl w-full relative z-10">
        <!-- Logo Header -->
        <div class="text-center mb-8">
            <div class="w-24 h-24 mx-auto mb-4 rounded-full shadow-xl overflow-hidden p-0">
                <img src="{{ asset('images/hero/LOGO.jpg') }}" alt="DOLLARS MENUISERIE" class="w-full h-full object-cover rounded-full">
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">
                <span class="text-blue-200">DOLLARS</span>
                <span class="text-red-300">MENUISERIE</span>
            </h2>
            <p class="text-blue-100">Créez votre compte et accédez à nos services</p>
        </div>

        <!-- Register Form -->
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-blue-100 mb-2">
                            Nom Complet
                        </label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            required 
                            autocomplete="name"
                            value="{{ old('name') }}"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            placeholder="Jean Dupont"
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-blue-100 mb-2">
                            Adresse Email
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required 
                            autocomplete="email"
                            value="{{ old('email') }}"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            placeholder="exemple@email.com"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-blue-100 mb-2">
                            Téléphone
                        </label>
                        <input 
                            id="phone" 
                            name="phone" 
                            type="tel" 
                            autocomplete="tel"
                            value="{{ old('phone') }}"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                            placeholder="+224 XXX XXX XXX"
                        >
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- User Type -->
                    <div>
                        <label for="user_type" class="block text-sm font-medium text-blue-100 mb-2">
                            Type de Compte
                        </label>
                        <select 
                            id="user_type" 
                            name="user_type" 
                            required
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        >
                            <option value="">Sélectionnez...</option>
                            <option value="client" {{ old('user_type') == 'client' ? 'selected' : '' }}>Client</option>
                            <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Administrateur</option>
                            <option value="manager" {{ old('user_type') == 'manager' ? 'selected' : '' }}>Manager</option>
                            <option value="artisan" {{ old('user_type') == 'artisan' ? 'selected' : '' }}>Artisan</option>
                            <option value="livreur" {{ old('user_type') == 'livreur' ? 'selected' : '' }}>Livreur</option>
                        </select>
                        @error('user_type')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-blue-100 mb-2">
                        Mot de passe
                    </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        placeholder="Minimum 8 caractères"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-blue-100 mb-2">
                        Confirmer le Mot de passe
                    </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200"
                        placeholder="Répétez le mot de passe"
                    >
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Terms -->
                <div class="flex items-center">
                    <input 
                        id="terms" 
                        name="terms" 
                        type="checkbox" 
                        required
                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    >
                    <label for="terms" class="ml-2 block text-sm text-blue-100">
                        J'accepte les <a href="#" class="text-blue-200 hover:text-white transition-colors">conditions d'utilisation</a> et la <a href="#" class="text-blue-200 hover:text-white transition-colors">politique de confidentialité</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-blue-900 text-white py-3 px-4 rounded-lg font-semibold hover:bg-blue-800 transition-colors duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02]"
                >
                    Créer mon compte
                </button>
            </form>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-6">
            <p class="text-blue-100">
                Déjà un compte ? 
                <a href="{{ route('login') }}" class="font-medium text-blue-200 hover:text-white transition-colors">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</div>
@endsection