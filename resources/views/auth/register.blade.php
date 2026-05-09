@extends('layouts.app')

@section('title', 'Inscription - DOLLARS MENUISERIE')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-950 to-blue-900 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden" style="background-image: linear-gradient(rgba(30, 58, 138, 0.97), rgba(30, 58, 138, 0.95)), url('{{ asset('images/hero/logo-dollars.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="absolute inset-0 bg-blue-950/40"></div>
    <div class="max-w-md w-full relative z-10 mx-auto px-4">
        <!-- Logo Header -->
        <div class="text-center mb-8 flex flex-col items-center justify-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full shadow-lg overflow-hidden p-0 border-2 border-white/20 flex items-center justify-center bg-white/10 backdrop-blur-sm">
                <img src="{{ asset('images/hero/logo-dollars.jpg') }}" alt="DOLLARS MENUISERIE" class="w-full h-full object-cover rounded-full">
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">
                <span class="text-blue-200">DOLLARS</span>
                <span class="text-white">MENUISERIE</span>
            </h2>
            <p class="text-blue-100">Créez votre compte et accédez à nos services</p>
        </div>

        <!-- Register Form -->
        <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-2xl p-6 border border-white/20 w-full">
            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 gap-6">
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-bold text-gray-800 mb-2">
                            Nom Complet
                        </label>
                        <input 
                            id="name" 
                            name="name" 
                            type="text" 
                            required 
                            autocomplete="name"
                            value="{{ old('name') }}"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                            placeholder="Jean Dupont"
                        >
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-bold text-gray-800 mb-2">
                            Adresse Email
                        </label>
                        <input 
                            id="email" 
                            name="email" 
                            type="email" 
                            required 
                            autocomplete="email"
                            value="{{ old('email') }}"
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                            placeholder="exemple@email.com"
                        >
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-bold text-gray-800 mb-2">
                        Téléphone
                    </label>
                    <input 
                        id="phone" 
                        name="phone" 
                        type="tel" 
                        autocomplete="tel"
                        value="{{ old('phone') }}"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                        placeholder="+224 XXX XXX XXX"
                    >
                    @error('phone')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                        <label for="password" class="block text-sm font-bold text-gray-800 mb-2">
                            Mot de passe
                        </label>
                    <input 
                        id="password" 
                        name="password" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                        placeholder="Minimum 8 caractères"
                    >
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                        <label for="password_confirmation" class="block text-sm font-bold text-gray-800 mb-2">
                            Confirmer le Mot de passe
                        </label>
                    <input 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        type="password" 
                        required 
                        autocomplete="new-password"
                        class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 bg-white/80 backdrop-blur-sm"
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
                    <label for="terms" class="ml-2 block text-sm font-medium text-gray-800">
                        J'accepte les <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors">conditions d'utilisation</a> et la <a href="#" class="text-blue-600 hover:text-blue-800 font-semibold transition-colors">politique de confidentialité</a>
                    </label>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white py-3 px-4 rounded-lg font-bold hover:from-orange-600 hover:to-orange-700 transition-all duration-200 shadow-xl hover:shadow-2xl transform hover:scale-[1.02] border-2 border-orange-400/50"
                >
                    Créer mon compte
                </button>
            </form>
        </div>

        <!-- Login Link -->
        <div class="text-center mt-6">
            <p class="text-white font-medium">
                Déjà un compte ? 
                <a href="{{ route('login') }}" class="font-bold text-blue-200 hover:text-white transition-colors">
                    Se connecter
                </a>
            </p>
        </div>
    </div>
</div>
@endsection