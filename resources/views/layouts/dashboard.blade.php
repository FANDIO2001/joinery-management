<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - DOLLARS MENUISERIE</title>
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        :root {
            --brand-primary: #1e3a8a;
            --brand-secondary: #2563eb;
            --brand-accent: #f59e0b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
        }

        .sidebar {
            width: 280px;
            background: linear-gradient(135deg, #1e3a8a 0%, #2563eb 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            z-index: 50;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .sidebar-brand-logo {
            width: 40px;
            height: 40px;
            border-radius: 0.5rem;
            object-fit: cover;
        }

        .sidebar-nav {
            padding: 1rem 0;
        }

        .sidebar-nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.5rem;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.2s;
        }

        .sidebar-nav-item:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar-nav-item.active {
            background: rgba(255,255,255,0.15);
            border-left: 3px solid #fbbf24;
        }

        .sidebar-user {
            position: relative;
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-user-profile {
            padding: 1rem 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .sidebar-user-profile:hover {
            background: rgba(255,255,255,0.1);
        }

        .sidebar-user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255,255,255,0.2);
        }

        .sidebar-user-name {
            font-weight: 600;
            color: white;
        }

        .sidebar-user-role {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.7);
        }

        .sidebar-user-dropdown {
            position: absolute;
            bottom: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            margin-bottom: 0.5rem;
            display: none;
        }

        .sidebar-user-dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1rem;
            color: #374151;
            text-decoration: none;
            transition: all 0.2s;
        }

        .sidebar-user-dropdown-item:hover {
            background: #f3f4f6;
        }

        .main-content {
            margin-left: 280px;
            min-height: 100vh;
        }

        .header {
            background: linear-gradient(90deg, #1e3a8a 0%, #2563eb 100%);
            color: white;
            padding: 1.5rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .header-subtitle {
            font-size: 0.875rem;
            color: rgba(255,255,255,0.7);
            margin-top: 0.25rem;
        }

        .content {
            padding: 2rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .stat-title {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
        }

        .stat-change {
            font-size: 0.75rem;
            margin-top: 0.5rem;
        }

        .stat-change.positive {
            color: #10b981;
        }

        .stat-change.negative {
            color: #ef4444;
        }

        .card {
            background: white;
            border-radius: 0.75rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 1rem;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: #f9fafb;
            padding: 0.75rem;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 1px solid #e5e7eb;
        }

        .table td {
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .badge {
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background: #10b981;
            color: white;
        }

        .badge-warning {
            background: #f59e0b;
            color: white;
        }

        .badge-danger {
            background: #ef4444;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <img src="{{ asset('images/hero/logo-dollars.jpg') }}" alt="DOLLARS MENUISERIE" class="sidebar-brand-logo">
            <div>
                <div style="font-weight: 700; font-size: 1.125rem;">DOLLARS MENUISERIE</div>
                <div style="font-size: 0.75rem; color: rgba(255,255,255,0.7);">Système ERP</div>
            </div>
        </div>

        <nav class="sidebar-nav">
            <!-- GESTION PRODUITS -->
            <div style="margin-bottom: 1.5rem;">
                <div class="sidebar-nav-section-header" onclick="toggleSection('products-section')">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                            📦 Produits & Catalogue
                        </div>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-nav-items" id="products-section" style="display: block;">
                    <a href="{{ route('products.index') }}" class="sidebar-nav-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Produits
                    </a>
                    <a href="{{ route('products.create') }}" class="sidebar-nav-item {{ request()->routeIs('products.create') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H12a2 2 0 00-2-2v12a2 2 0 002 2h12a2 2 0 002-2M12 4v16m8-8H12a2 2 0 00-2-2v12a2 2 0 002 2h12a2 2 0 002-2"></path>
                        </svg>
                        Ajouter Produit
                    </a>
                    <a href="{{ route('settings.categories') }}" class="sidebar-nav-item {{ request()->routeIs('settings.categories') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Catégories
                    </a>
                    <a href="{{ route('stocks.index') }}" class="sidebar-nav-item {{ request()->routeIs('stocks.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Gestion Stock
                    </a>
                </div>
            </div>

            <!-- GESTION COMMANDES -->
            <div style="margin-bottom: 1.5rem;">
                <div class="sidebar-nav-section-header" onclick="toggleSection('orders-section')">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                            🛒 Commandes & Ventes
                        </div>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-nav-items" id="orders-section" style="display: none;">
                    <a href="{{ route('orders.index') }}" class="sidebar-nav-item {{ request()->routeIs('orders.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Toutes les Commandes
                    </a>
                    <a href="{{ route('orders.create') }}" class="sidebar-nav-item {{ request()->routeIs('orders.create') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H12a2 2 0 00-2-2v12a2 2 0 002 2h12a2 2 0 002-2M12 4v16m8-8H12a2 2 0 00-2-2v12a2 2 0 002 2h12a2 2 0 002-2"></path>
                        </svg>
                        Nouvelle Commande
                    </a>
                    <a href="{{ route('quotes.index') }}" class="sidebar-nav-item {{ request()->routeIs('quotes.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Devis
                    </a>
                    <a href="{{ route('invoices.index') }}" class="sidebar-nav-item {{ request()->routeIs('invoices.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"></path>
                        </svg>
                        Factures
                    </a>
                </div>
            </div>

            <!-- GESTION CLIENTS -->
            <div style="margin-bottom: 1.5rem;">
                <div class="sidebar-nav-section-header" onclick="toggleSection('customers-section')">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                            👥 Clients & CRM
                        </div>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-nav-items" id="customers-section" style="display: none;">
                    <a href="{{ route('customers.index') }}" class="sidebar-nav-item {{ request()->routeIs('customers.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Clients
                    </a>
                    <a href="{{ route('customers.create') }}" class="sidebar-nav-item {{ request()->routeIs('customers.create') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Ajouter Client
                    </a>
                </div>
            </div>

            <!-- PRODUCTION & ATELIER -->
            <div style="margin-bottom: 1.5rem;">
                <div class="sidebar-nav-section-header" onclick="toggleSection('production-section')">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                            🏭 Production & Atelier
                        </div>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-nav-items" id="production-section" style="display: none;">
                    <a href="{{ route('production.calendar') }}" class="sidebar-nav-item {{ request()->routeIs('production.calendar') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Production
                    </a>
                    <a href="{{ route('stocks.materials') }}" class="sidebar-nav-item {{ request()->routeIs('stocks.materials') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        Matériaux
                    </a>
                </div>
            </div>

            <!-- RESSOURCES HUMAINES -->
            <div style="margin-bottom: 1.5rem;">
                <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                    👤 Ressources Humaines
                </div>
                <a href="{{ route('employees.index') }}" class="sidebar-nav-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                    Employés
                </a>
                <a href="{{ route('employees.create') }}" class="sidebar-nav-item {{ request()->routeIs('employees.create') ? 'active' : '' }}">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                    Ajouter Employé
                </a>
                <a href="#" class="sidebar-nav-item" style="opacity: 0.5; cursor: not-allowed;">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Paie (Bientôt)
                </a>
                <a href="{{ route('employees.index') }}" class="sidebar-nav-item {{ request()->routeIs('employees.*') ? 'active' : '' }}">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Congés
                </a>
            </div>

            <!-- LOGISTIQUE -->
            <div style="margin-bottom: 1.5rem;">
                <div class="sidebar-nav-section-header" onclick="toggleSection('logistics-section')">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                            🚚 Logistique
                        </div>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-nav-items" id="logistics-section" style="display: none;">
                    <a href="{{ route('stocks.index') }}" class="sidebar-nav-item {{ request()->routeIs('stocks.*') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 104 0m6 0a2 2 0 104 0m-4 0a2 2 0 104 0"></path>
                        </svg>
                        Stocks
                    </a>
                </div>
            </div>



            <!-- ADMINISTRATION -->
            <div style="margin-bottom: 1.5rem;">
                <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                    ⚙️ Administration
                </div>
                <a href="{{ route('reports.index') }}" class="sidebar-nav-item {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                    <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v1a3 3 0 003 3h0a3 3 0 003-3v-1m3-10V4a2 2 0 00-2-2H8a2 2 0 00-2 2v3m3 10h6m-6-4h6"></path>
                    </svg>
                    Rapports & Analytics
                </a>
            </div>

            <!-- MON PROFIL -->
            <div style="margin-bottom: 1.5rem;">
                <div class="sidebar-nav-section-header" onclick="toggleSection('profile-section')">
                    <div style="display: flex; align-items: center; gap: 0.5rem;">
                        <div style="padding: 0.5rem 1.5rem; font-size: 0.75rem; font-weight: 600; color: rgba(255,255,255,0.6); text-transform: uppercase; letter-spacing: 0.05em;">
                            👤 Mon Profil
                        </div>
                        <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
                <div class="sidebar-nav-items" id="profile-section" style="display: block;">
                    <a href="{{ route('profile.index') }}" class="sidebar-nav-item {{ request()->routeIs('profile.index') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Voir mon profil
                    </a>
                    <a href="{{ route('profile.edit') }}" class="sidebar-nav-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                        <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Modifier profil
                    </a>
                </div>
            </div>
        </nav>

        <div class="sidebar-user">
            <div class="sidebar-user-profile" onclick="toggleUserMenu()">
                <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=1e3a8a&color=fff" alt="Jean Dupont" class="sidebar-user-avatar">
                <div>
                    <div class="sidebar-user-name">Jean Dupont</div>
                    <div class="sidebar-user-role">ADMINISTRATEUR</div>
                </div>
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
            
            <div id="userDropdown" class="sidebar-user-dropdown">
                <a href="{{ route('profile.index') }}" class="sidebar-user-dropdown-item">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Voir mon profil
                </a>
                <a href="{{ route('profile.edit') }}" class="sidebar-user-dropdown-item">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                    </svg>
                    Modifier profil
                </a>
                <div style="height: 1px; background: #e5e7eb; margin: 0.25rem 0;"></div>
                <a href="{{ route('logout') }}" class="sidebar-user-dropdown-item" style="color: #ef4444;">
                    <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                    </svg>
                    Déconnexion
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header class="header">
            <div>
                <h1 class="header-title">@yield('title', 'Tableau de bord')</h1>
                <p class="header-subtitle">@yield('subtitle', 'Vue d\'ensemble de l\'activité • '.date('d/m/Y'))</p>
            </div>
            <div style="display: flex; gap: 1rem;">
                <button style="padding: 0.5rem 1rem; background: rgba(255,255,255,0.1); border: none; border-radius: 0.5rem; color: white; cursor: pointer;">
                    📊 Exporter
                </button>
                <button style="padding: 0.5rem 1rem; background: #f59e0b; border: none; border-radius: 0.5rem; color: white; cursor: pointer;">
                    ➕ Nouveau
                </button>
            </div>
        </header>

        <div class="content" id="main-content">
            @yield('content')
        </div>
    </div>

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.style.display = section.style.display === 'block' ? 'none' : 'block';
            }
        }

        // Fermer le menu si clic à l'extérieur
        document.addEventListener('click', function(event) {
            const userProfile = document.querySelector('.sidebar-user-profile');
            const dropdown = document.getElementById('userDropdown');
            
            if (!userProfile.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
