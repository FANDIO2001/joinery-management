@extends('layouts.app')

@section('title', 'Connexion - DOLLARS MENUISERIE')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-950 to-blue-900 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden" style="background-image: linear-gradient(rgba(30, 58, 138, 0.97), rgba(30, 58, 138, 0.95)), url('{{ asset('images/hero/logo-dollars.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; background-attachment: fixed;">
    <div class="absolute inset-0 bg-blue-950/40"></div>
    <div class="max-w-md w-full space-y-8 relative z-10 mx-auto">
        <!-- Logo Header -->
        <div class="text-center flex flex-col items-center justify-center">
            <div class="w-16 h-16 mx-auto mb-4 rounded-full shadow-lg overflow-hidden p-0 border-2 border-white/20 flex items-center justify-center bg-white/10 backdrop-blur-sm">
                <img src="{{ asset('images/hero/logo-dollars.jpg') }}" alt="DOLLARS MENUISERIE" class="w-full h-full object-cover rounded-full">
            </div>
            <h2 class="text-3xl font-bold text-white mb-2">
                <span class="text-blue-200">DOLLARS</span>
                <span class="text-white">MENUISERIE</span>
            </h2>
            <p class="text-blue-100">Connectez-vous à votre espace ERP</p>
        </div>

        <!-- Login Form -->
        <div class="bg-white/95 backdrop-blur-sm rounded-xl shadow-2xl p-6 border border-white/20 w-full mx-auto">
            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
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

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-bold text-gray-800 mb-2">
                        Mot de passe
                    </label>
                    <div class="relative">
                        <input 
                            id="password" 
                            name="password" 
                            type="password" 
                            required 
                            autocomplete="current-password"
                            class="block w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-blue-600 transition-all duration-200 bg-white/80 backdrop-blur-sm"
                            placeholder="••••••••"
                        >
                        <button 
                            type="button" 
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                        >
                            <svg id="eyeIcon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input 
                            id="remember" 
                            name="remember" 
                            type="checkbox" 
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                        >
                        <label for="remember" class="ml-2 block text-sm font-medium text-gray-800">
                            Se souvenir de moi
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" class="text-sm font-semibold text-blue-600 hover:text-blue-800 transition-colors">
                        Mot de passe oublié ?
                    </a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white py-3 px-4 rounded-lg font-bold hover:from-red-600 hover:to-red-700 transition-all duration-200 shadow-2xl hover:shadow-3xl transform hover:scale-[1.03] border-2 border-red-400/60"
                >
                    Se connecter
                </button>
            </form>
        </div>

        <!-- Register Link -->
        <div class="text-center">
            <p class="text-white font-medium">
                Pas encore de compte ? 
                <a href="{{ route('register') }}" class="font-bold text-blue-200 hover:text-white transition-colors">
                    Créer un compte
                </a>
            </p>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const eyeIcon = document.getElementById('eyeIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c4.478 0 8.268-2.943 9.543-7a9.97 9.97 0 01-9.543 7c-1.274 4.057-5.065 7-9.543 7-4.477 0-8.268-2.943-9.543-7z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        `;
    } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
        `;
    }
}
</script>
@endsection