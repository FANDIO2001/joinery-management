<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOLLARS MENUISERIE MEUBLE</title>
    
    <!-- Local Styles -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/colors.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    <link rel="stylesheet" href="{{ asset('css/premium.css') }}">
    
    <style>
        /* Styles personnalisés pour le design premium */
        .hero-section {
            position: relative;
            min-height: calc(100vh - 5rem);
            padding: 5rem 1rem 3rem;
            background: linear-gradient(135deg, rgba(139, 69, 19, 0.6), rgba(160, 82, 45, 0.5), rgba(55, 65, 81, 0.4)),
                        url('{{ asset('images/hero/I.jpeg') }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            max-width: 960px;
            width: 100%;
            padding: 2rem;
            margin: 0 auto;
        }

        .hero-title {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 3.5rem;
            line-height: 1.15;
            margin: 0 auto 1.5rem;
            max-width: 760px;
            animation: fadeInUp 1s ease-out;
        }

        .hero-subtitle {
            font-family: 'Inter', sans-serif;
            font-weight: 300;
            font-size: 1.5rem;
            line-height: 1.65;
            margin: 0 auto 3rem;
            max-width: 760px;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.2s;
            animation-fill-mode: both;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.4s;
            animation-fill-mode: both;
        }
        
        .navbar-custom {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(59, 130, 246, 0.3);
            box-shadow: 0 1px 3px rgba(30, 64, 175, 0.3);
            transition: all 0.3s ease;
        }
        
        .navbar-custom.scrolled {
            background: linear-gradient(135deg, #1e40af, #3b82f6);
            box-shadow: 0 2px 8px rgba(30, 64, 175, 0.4);
        }
        
        .logo-container {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .logo-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .logo-text {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 1.25rem;
            color: white;
            letter-spacing: -0.02em;
        }
        
        .nav-links {
            gap: 2rem;
        }
        
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
            justify-content: flex-end;
        }
        
        #mobile-menu a {
            text-decoration: none;
        }
        
        .nav-link,
        .btn-primary,
        .footer-links a,
        .hero-cta a {
            text-decoration: none;
        }
        
        .nav-link {
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            color: white;
            transition: all 0.3s ease;
            position: relative;
            white-space: nowrap;
        }
        
        .nav-link:hover {
            color: #fbbf24;
        }
        
        .nav-link::after {
            content: none;
        }
        
        .nav-link:hover::after {
            width: 0;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #dc2626, #ef4444);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
            white-space: nowrap;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #b91c1c, #dc2626);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }

        body {
            overflow-x: hidden;
        }

        .cards-grid,
        .project-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 1.5rem;
            align-items: stretch;
            width: 100%;
        }

        @media (min-width: 768px) {
            .cards-grid,
            .project-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (min-width: 1280px) {
            .cards-grid,
            .project-grid {
                grid-template-columns: repeat(4, minmax(0, 1fr));
            }
        }

        /* Projects grid - 5 per row on large screens */
        @media (min-width: 1400px) {
            .project-grid {
                grid-template-columns: repeat(5, minmax(0, 1fr));
            }
        }

        /* Services section full width */
        .services-section {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }

        /* Projects section full width */
        .projects-section {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .projects-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Testimonials section full width */
        .testimonials-section {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .testimonials-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Footer section full width */
        .footer-section {
            width: 100vw;
            position: relative;
            left: 50%;
            right: 50%;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .footer-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .services-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .cards-grid > div,
        .project-grid > div {
            display: flex;
            flex-direction: column;
            min-height: 320px;
            background: white;
            border-radius: 1rem;
            overflow: hidden;
            border: 1px solid rgba(229, 231, 235, 0.95);
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .cards-grid > div:hover,
        .project-grid > div:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }

        .project-grid > div img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            border-radius: 0.5rem 0.5rem 0 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .project-grid > div:hover img {
            transform: scale(1.03);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .project-grid > div .p-4 {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 1.5rem;
        }

        .project-grid > div .p-4 .flex.justify-between.items-center {
            margin-top: auto;
        }

        .cards-grid > div .p-8,
        .cards-grid > div .p-4 {
            padding: 1.5rem;
        }

        .cards-grid > div h3,
        .project-grid > div h3 {
            margin-bottom: 0.75rem;
        }

        .cards-grid > div p,
        .project-grid > div p {
            color: #4b5563;
        }

        .cards-grid > div .text-sm,
        .project-grid > div .text-sm {
            margin-bottom: 1.5rem;
        }

        .project-grid > div .text-lg.font-bold.text-red-600 {
            line-height: 1.2;
        }

        .cards-grid > div .btn,
        .project-grid > div .btn {
            margin-top: auto;
        }

        .project-grid > div .text-lg.font-bold.text-red-600 {
            line-height: 1.1;
        }

        .testimonial-card,
        .bg-gray-50.p-8.rounded-xl {
            background: rgba(248, 250, 252, 0.95);
            border: 1px solid rgba(226, 232, 240, 0.9);
            border-radius: 1.5rem;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .testimonial-card:hover,
        .bg-gray-50.p-8.rounded-xl:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
        }
        
        .hero-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            max-width: 900px;
            width: 100%;
            padding: 2rem;
            margin: 0 auto;
        }
        
        .hero-title {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 3.5rem;
            line-height: 1.2;
            margin: 0 auto 1.5rem;
            max-width: 760px;
            animation: fadeInUp 1s ease-out;
        }
        
        .hero-subtitle {
            font-family: 'Inter', sans-serif;
            font-weight: 300;
            font-size: 1.5rem;
            line-height: 1.6;
            margin: 0 auto 3rem;
            max-width: 760px;
            opacity: 0.95;
            animation: fadeInUp 1s ease-out 0.2s;
            animation-fill-mode: both;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            animation: fadeInUp 1s ease-out 0.4s;
            animation-fill-mode: both;
        }
        
        .btn-hero {
            padding: 1rem 2rem;
            border-radius: 8px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
        }
        
        .btn-hero-blue {
            background: linear-gradient(135deg, #1e40af 0%, #3b82f6 100%);
            color: white;
            border: none;
        }
        
        .btn-hero-blue:hover {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(30, 64, 175, 0.4);
        }
        
        .btn-hero-primary {
            background: linear-gradient(135deg, #dc2626 0%, #ef4444 100%);
            color: white;
            border: none;
        }
        
        .btn-hero-primary:hover {
            background: linear-gradient(135deg, #b91c1c, #dc2626);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 38, 38, 0.4);
        }
        
        .btn-hero-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-hero-secondary:hover {
            background: white;
            color: #1e40af;
        }
        
        .title-main {
            font-weight: 700;
            display: block;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .title-sub {
            font-weight: 300;
            font-size: 0.6em;
            opacity: 0.9;
            letter-spacing: 0.1em;
        }
        
        .subtitle-highlight {
            font-weight: 600;
            color: #fbbf24;
            display: inline;
        }
        
        .subtitle-secondary {
            font-weight: 400;
            opacity: 0.95;
            display: inline;
        }
        
        .subtitle-tertiary {
            font-weight: 300;
            opacity: 0.85;
            display: inline;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-section {
                min-height: 100vh;
                background-position: center center;
                background-size: cover;
            }
            
            .hero-title {
                font-size: 2.2rem;
                line-height: 1.1;
                padding: 0 1rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
                line-height: 1.5;
                padding: 0 1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
                gap: 1rem;
            }
            
            .btn-hero {
                width: 100%;
                max-width: 280px;
                padding: 0.875rem 1.5rem;
                font-size: 0.95rem;
            }
            
            .nav-links {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .logo-text {
                font-size: 1.1rem;
            }
            
            .logo-image {
                width: 35px;
                height: 35px;
            }
            
            .navbar-custom {
                padding: 0 1rem;
            }
        }
        
        @media (max-width: 480px) {
            .hero-title {
                font-size: 1.8rem;
            }
            
            .hero-subtitle {
                font-size: 1rem;
            }
            
            .btn-hero {
                max-width: 250px;
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
            }
        }
        
        @media (min-width: 769px) {
            .mobile-menu-btn {
                display: none;
            }
        }
        
        @media (min-width: 1024px) {
            .hero-title {
                font-size: 4rem;
            }
            
            .hero-subtitle {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body class="bg-white text-gray-900 antialiased">

<!-- Navigation Premium -->
<nav class="navbar-custom fixed top-0 left-0 right-0 z-50" id="navbar">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 xl:px-16">
        <div class="flex justify-between items-center h-16">
            <!-- Logo avec image -->
            <div class="logo-container">
                <img src="{{ asset('images/hero/LOGO.jpg') }}" alt="DOLLARS MENUISERIE" class="logo-image">
                <span class="logo-text">DOLLARS MENUISERIE</span>
            </div>
            
            <!-- Navigation Links -->
            <div class="hidden md:flex flex-1 justify-center">
                <div class="nav-links flex items-center space-x-8">
                    <a href="#" class="nav-link">Accueil</a>
                    <a href="{{ route('shop.index') }}" class="nav-link">Boutique</a>
                    <a href="#" class="nav-link">Services</a>
                    <a href="#" class="nav-link">Réalisations</a>
                    <a href="#" class="nav-link">Contact</a>
                </div>
            </div>
            
            <!-- Auth Buttons -->
            <div class="flex items-center space-x-3">
                <div class="hidden md:flex nav-actions">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="nav-link">
                            Tableau de bord
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">
                            Connexion
                        </a>
                        <a href="{{ route('register') }}" class="btn-primary">
                            S'inscrire
                        </a>
                    @endauth
                </div>
                <!-- Mobile menu button -->
                <button class="mobile-menu-btn md:hidden" onclick="toggleMobileMenu()">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Accueil</a>
            <a href="{{ route('shop.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Boutique</a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Services</a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Réalisations</a>
            <a href="#" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Contact</a>
            @auth
                <a href="{{ url('/dashboard') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Tableau de bord</a>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50">Connexion</a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium text-blue-600 hover:text-blue-700 hover:bg-blue-50">S'inscrire</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Hero Section Premium -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">
            <span class="title-main">Menuiserie d'Excellence</span><br>
            <span class="title-sub">Sur Mesure</span>
        </h1>
        <p class="hero-subtitle">
            <span class="subtitle-highlight">Transformez vos idées</span> en créations uniques. <br>
            <span class="subtitle-secondary">Notre savoir-faire artisanal et notre passion pour le bois</span> <br>
            <span class="subtitle-tertiary">nous permettent de réaliser des projets exceptionnels qui dépassent vos attentes.</span>
        </p>
        <div class="hero-buttons">
            <a href="#derniers-projets" class="btn-hero btn-hero-blue">
                Voir nos réalisations
            </a>
            <a href="#contact" class="btn-hero btn-hero-secondary">
                Demander un devis
            </a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="services-section py-20">
    <div class="services-container">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Nos Services</h2>
            <p class="text-xl text-gray-800 max-w-3xl mx-auto">
                Découvrez notre expertise en menuiserie et notre savoir-faire artisanal
            </p>
        </div>
        
        <div class="cards-grid">
            <!-- Service 1 -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-amber-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 01-1 1H4a1 1 0 01-1-1V3a1 1 0 011-1h1a1 1 0 011 1v1a1 1 0 01-1 1H4a1 1 0 01-1-1V3a1 1 0 011-1h1zm4 0a1 1 0 011 1v1a1 1 0 01-1 1H4a1 1 0 01-1-1V3a1 1 0 011-1h1a1 1 0 011 1v1a1 1 0 01-1 1H4a1 1 0 01-1-1V3a1 1 0 011-1h1z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Menuiserie Sur Mesure</h3>
                <p class="text-gray-600">
                    Créations sur-mesure adaptées à vos besoins et votre espace
                </p>
            </div>
            
            <!-- Service 2 -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 14a1 1 0 001.169.922l5.016-7.016a1 1 0 001.169-.922l-7-14a1 1 0 00-.788 0zm-1.169 14.2a1 1 0 01-.969.249L5.35 10.38a1 1 0 01-.969-.249L3.169 14.2a1 1 0 01-.969-.249l5.016-7.016a1 1 0 001.169-.922l5.016 7.016a1 1 0 001.169.922z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Rénovation</h3>
                <p class="text-gray-600">
                    Transformation de vos espaces avec des solutions modernes et fonctionnelles
                </p>
            </div>
            
            <!-- Service 3 -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 000-2H9a1 1 0 000 2h2a1 1 0 000 2H9a1 1 0 000 2H9a1 1 0 000-2zm0 6a1 1 0 000 2h2a1 1 0 000-2H9a1 1 0 000 2h2a1 1 0 000 2H9a1 1 0 000 2H9a1 1 0 000-2zm0 6a1 1 0 000 2h2a1 1 0 000-2H9a1 1 0 000 2h2a1 1 0 000 2H9a1 1 0 000-2z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Conseil Expert</h3>
                <p class="text-gray-600">
                    Accompagnement personnalisé pour vos projets de menuiserie
                </p>
            </div>
            
            <!-- Service 4 - Pompes Funèbres -->
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                    <svg class="w-8 h-8 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-blue-900 mb-3">Pompes Funèbres</h3>
                <p class="text-gray-600">
                    Services funéraires dignes et respectueux pour accompagner vos proches
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Derniers Projets Section -->
<section id="derniers-projets" class="py-20 bg-gray-50 projects-section">
    <div class="projects-container">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Derniers Projets</h2>
            <p class="text-xl text-gray-800 max-w-3xl mx-auto">
                Découvrez nos 10 dernières réalisations artisanales
            </p>
        </div>
        
        <div class="project-grid">
            <!-- Projet 1 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=500&h=300&fit=crop&crop=center" alt="Table Salle à Manger" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Table Salle à Manger</h3>
                    <p class="text-sm text-gray-600 mb-3">Design moderne en bois massif</p>
                    <div class="flex justify-between items-center mt-auto">
                        <span class="text-lg font-bold text-red-600">280 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Projet 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Chaise Bureau" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Chaise Bureau</h3>
                    <p class="text-sm text-gray-600 mb-3">Ergonomique et élégante</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">95 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Projet 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Bibliothèque Murale" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Bibliothèque Murale</h3>
                    <p class="text-sm text-gray-600 mb-3">Rangement sur mesure</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">195 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 4 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=250&fit=crop&crop=center" alt="Cuisine Complète" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Cuisine Complète</h3>
                    <p class="text-sm text-gray-600 mb-3">Aménagement moderne</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">750 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 5 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Meuble TV" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Meuble TV</h3>
                    <p class="text-sm text-gray-600 mb-3">Design contemporain</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">165 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 6 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Table Chevet" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Table Chevet</h3>
                    <p class="text-sm text-gray-600 mb-3">Élégant et pratique</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">75 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 7 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&h=250&fit=crop&crop=center" alt="Commode Moderne" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Commode Moderne</h3>
                    <p class="text-sm text-gray-600 mb-3">3 tiroirs avec poignées</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">210 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 8 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Porte Coulissante" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Porte Coulissante</h3>
                    <p class="text-sm text-gray-600 mb-3">Sur mesure avec rail</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">320 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 9 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Escalier Bois" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Escalier Bois</h3>
                    <p class="text-sm text-gray-600 mb-3">Contemporain et sécurisé</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">850 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>

            <!-- Projet 10 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=250&fit=crop&crop=center" alt="Dressing Chambre" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold text-blue-900 mb-2">Dressing Chambre</h3>
                    <p class="text-sm text-gray-600 mb-3">Rangement optimisé</p>
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-red-600">420 000 FCFA</span>
                        <button class="bg-blue-600 text-white px-3 py-1 rounded-lg hover:bg-blue-700 transition-colors text-sm">
                            Voir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Témoignages Section -->
<section class="py-20 bg-white testimonials-section">
    <div class="testimonials-container">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-blue-900 mb-4">Témoignages Clients</h2>
            <p class="text-xl text-gray-800 max-w-3xl mx-auto">
                Ce que nos clients disent de notre travail
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Témoignage 1 -->
            <div class="bg-gray-50 p-8 rounded-xl">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        JD
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">Jean Dupont</h4>
                        <p class="text-gray-600">Architecte</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 italic">
                    "Un travail d'une qualité exceptionnelle ! La table sur mesure que j'ai commandée dépasse toutes mes attentes. Je recommande vivement DOLLARS MENUISERIE."
                </p>
            </div>
            
            <!-- Témoignage 2 -->
            <div class="bg-gray-50 p-8 rounded-xl">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        MB
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">Marie Ba</h4>
                        <p class="text-gray-600">Designer d'intérieur</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-700 italic">
                    "Le service client est impeccable et la qualité des meubles est remarquable. J'ai fait rénover toute ma maison avec eux et je suis très satisfait."
                </p>
            </div>
            
            <!-- Témoignage 3 -->
            <div class="bg-gray-50 p-8 rounded-xl">
                <div class="flex items-center mb-4">
                    <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold mr-4">
                        AT
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">Ali Touré</h4>
                        <p class="text-gray-600">Entrepreneur</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </div>
                <p class="text-gray-300 italic">
                    "Des artisans de grand talent ! Leurs pompes funèbres sont réalisées avec beaucoup de dignité et respect. Un service très apprécié dans nos moments difficiles."
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer id="contact" class="bg-gray-900 text-white py-12 footer-section">
    <div class="footer-container">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Logo et Description -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('images/hero/LOGO.jpg') }}" alt="DOLLARS MENUISERIE" class="w-10 h-10 rounded-full mr-3">
                    <span class="text-xl font-bold">DOLLARS MENUISERIE</span>
                </div>
                <p class="text-gray-300 mb-4">
                    Votre partenaire de confiance pour tous vos projets de menuiserie, rénovation et services funéraires depuis plus de 20 ans.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069 3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zM5.838 12a6.162 6.162 0 1112.324 0 6.162 6.162 0 01-12.324 0zM12 16a4 4 0 110-8 4 4 0 010 8zm4.965-10.405a1.44 1.44 0 112.881.001 1.44 1.44 0 01-2.881-.001z"/>
                        </svg>
                    </a>
                </div>
            </div>
            
            <!-- Services -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Services</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Menuiserie Sur Mesure</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Rénovation</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Conseil Expert</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white transition-colors">Pompes Funèbres</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li class="text-gray-300">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/>
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/>
                        </svg>
                       ghomsifranch@gmail.com
                    </li>
                    <li class="text-gray-300">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/>
                        </svg>
                        +237 670 83 53 55
                    </li>
                    <li class="text-gray-300">
                        <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        Dakar, Sénégal
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p class="text-gray-400">
                © 2024 DOLLARS MENUISERIE. Tous droits réservés.
            </p>
        </div>
    </div>
</footer>

<!-- JavaScript -->
<script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Mobile menu toggle
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.toggle('hidden');
        }
    }
    
    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetSelector = this.getAttribute('href');
            const target = document.querySelector(targetSelector);
            if (!target) {
                return;
            }

            e.preventDefault();
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });

            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
            }
        });
    });
</script>

</body>
</html>
