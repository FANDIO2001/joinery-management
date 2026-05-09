<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Production ERP - DOLLARS MENUISERIE</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700,800" rel="stylesheet" />
    
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    
    <style>
        /* Enterprise ERP Design System - DOLLARS MENUISERIE */
        :root {
            /* Brand Colors from Logo */
            --brand-gold: #B8860B;
            --brand-gold-light: #DAA520;
            --brand-gold-dark: #8B6914;
            --brand-black: #1a1a1a;
            --brand-gray: #4a4a4a;
            --brand-gray-light: #8a8a8a;
            
            /* Extended Palette */
            --bg-primary: #ffffff;
            --bg-secondary: #fafafa;
            --bg-tertiary: #f5f5f5;
            --bg-quaternary: #e8e8e8;
            
            /* Text Colors */
            --text-primary: var(--brand-black);
            --text-secondary: var(--brand-gray);
            --text-tertiary: var(--brand-gray-light);
            --text-quaternary: #999999;
            
            /* Semantic Colors */
            --blue-50: #eff6ff;
            --blue-500: #3b82f6;
            --blue-600: #2563eb;
            --blue-700: #1d4ed8;
            
            --green-50: #f0fdf4;
            --green-500: #10b981;
            --green-600: #059669;
            
            --amber-50: #fffbeb;
            --amber-500: #f59e0b;
            --amber-600: #d97706;
            
            --red-50: #fef2f2;
            --red-500: #ef4444;
            --red-600: #dc2626;
            
            /* Shadows */
            --shadow-xs: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-sm: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            
            /* Spacing System */
            --space-1: 0.25rem;
            --space-2: 0.5rem;
            --space-3: 0.75rem;
            --space-4: 1rem;
            --space-5: 1.25rem;
            --space-6: 1.5rem;
            --space-8: 2rem;
            --space-10: 2.5rem;
            --space-12: 3rem;
            --space-16: 4rem;
            --space-20: 5rem;
            
            /* Border Radius */
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
            --radius-xl: 1rem;
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--bg-secondary);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: var(--text-primary);
            line-height: 1.5;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 0;
            padding: 0;
        }

        /* Enterprise Layout System */
        .erp-container {
            display: grid;
            grid-template-columns: 280px 1fr;
            grid-template-rows: auto 1fr;
            height: 100vh;
            background: var(--bg-secondary);
        }

        .erp-sidebar {
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
            border-right: 1px solid #1e3a8a;
            overflow-y: auto;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .erp-main {
            display: flex;
            flex-direction: column;
            overflow: hidden;
            background: var(--bg-secondary);
        }

        /* Professional Sidebar Brand */
        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-6) var(--space-5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
        }

        .sidebar-brand-logo {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 2px solid var(--brand-gold);
        }

        .sidebar-brand-text {
            font-size: 0.875rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: -0.025em;
        }

        .sidebar-brand-subtitle {
            font-size: 0.75rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: var(--space-1);
        }

        /* Role-Based Navigation */
        .sidebar-nav {
            flex: 1;
            padding: var(--space-4);
            overflow-y: auto;
        }

        .sidebar-nav-section {
            margin-bottom: var(--space-8);
        }

        .sidebar-nav-section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: var(--space-2) var(--space-3);
            margin-bottom: var(--space-3);
            cursor: pointer;
            border-radius: var(--radius-md);
            transition: all 0.15s ease;
        }

        .sidebar-nav-section-header:hover {
            background: var(--bg-tertiary);
        }

        .sidebar-nav-section-title {
            font-size: 0.75rem;
            font-weight: 600;
            color: rgba(255, 255, 255, 0.9);
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .sidebar-nav-section-icon {
            width: 16px;
            height: 16px;
            color: rgba(255, 255, 255, 0.7);
            transition: transform 0.15s ease;
        }

        .sidebar-nav-section.collapsed .sidebar-nav-section-icon {
            transform: rotate(-90deg);
        }

        .sidebar-nav-items {
            display: flex;
            flex-direction: column;
            gap: var(--space-1);
            margin-left: var(--space-4);
        }

        .sidebar-nav-section.collapsed .sidebar-nav-items {
            display: none;
        }

        .sidebar-nav-item {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.15s ease;
            position: relative;
        }

        .sidebar-nav-item:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #ffffff;
            transform: translateX(2px);
        }

        .sidebar-nav-item.active {
            background: rgba(255, 255, 255, 0.25);
            color: #ffffff;
            font-weight: 600;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            border-left: 3px solid #ffffff;
        }

        .sidebar-nav-item.active::before {
            display: none;
        }

        .sidebar-nav-icon {
            width: 18px;
            height: 18px;
            flex-shrink: 0;
        }

        .sidebar-nav-badge {
            margin-left: auto;
            background: var(--red-500);
            color: white;
            font-size: 0.625rem;
            font-weight: 600;
            padding: var(--space-1) var(--space-2);
            border-radius: 9999px;
            min-width: 18px;
            text-align: center;
        }

        /* User Profile Section */
        .sidebar-user {
            padding: var(--space-4);
            border-top: 1px solid var(--bg-quaternary);
            background: var(--bg-tertiary);
        }

        .sidebar-user-profile {
            display: flex;
            align-items: center;
            gap: var(--space-3);
            padding: var(--space-3);
            border-radius: var(--radius-md);
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .sidebar-user-profile:hover {
            background: var(--bg-quaternary);
        }

        .sidebar-user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--brand-gold);
        }

        .sidebar-user-info {
            flex: 1;
        }

        .sidebar-user-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .sidebar-user-role {
            font-size: 0.75rem;
            color: var(--text-tertiary);
        }

        .sidebar-user-role-badge {
            display: inline-flex;
            align-items: center;
            padding: var(--space-1) var(--space-2);
            border-radius: var(--radius-sm);
            font-size: 0.625rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .role-admin {
            background: var(--brand-gold);
            color: var(--bg-primary);
        }

        .role-manager {
            background: var(--blue-500);
            color: white;
        }

        .role-artisan {
            background: var(--green-500);
            color: white;
        }

        .role-livreur {
            background: var(--amber-500);
            color: white;
        }

        .role-client {
            background: var(--bg-quaternary);
            color: var(--text-secondary);
        }

        /* Compact Header */
        .erp-header {
            background: linear-gradient(90deg, #1e3a8a 0%, #1e40af 50%, #2563eb 100%);
            border-bottom: 1px solid #1e3a8a;
            padding: var(--space-4) var(--space-6);
        }

        .erp-header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .erp-header-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #ffffff;
        }

        .erp-header-subtitle {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.8);
            margin-top: var(--space-1);
        }

        .erp-header-actions {
            display: flex;
            align-items: center;
            gap: var(--space-3);
        }

        /* Urgency Bar */
        .urgency-bar {
            background: var(--red-50);
            border-left: 4px solid var(--red-500);
            padding: var(--space-3) var(--space-4);
            margin: 0 var(--space-6) var(--space-4) var(--space-6);
            border-radius: var(--radius-md);
        }

        .urgency-bar-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: var(--space-4);
        }

        .urgency-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--red-600);
        }

        .urgency-items {
            display: flex;
            gap: var(--space-4);
            flex: 1;
        }

        .urgency-item {
            display: flex;
            align-items: center;
            gap: var(--space-2);
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .urgency-badge {
            background: var(--red-500);
            color: white;
            font-size: 0.75rem;
            font-weight: 600;
            padding: var(--space-1) var(--space-2);
            border-radius: 9999px;
        }

        /* Compact Cards System */
        .card-compact {
            background: var(--bg-primary);
            border: 1px solid var(--bg-quaternary);
            border-radius: var(--radius-lg);
            padding: var(--space-5);
            transition: all 0.15s ease;
        }

        .card-compact:hover {
            box-shadow: var(--shadow-md);
            border-color: var(--brand-gold-light);
        }

        .card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: var(--space-4);
        }

        .card-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-primary);
        }

        .card-subtitle {
            font-size: 0.75rem;
            color: var(--text-tertiary);
            margin-top: var(--space-1);
        }

        /* KPI Cards */
        .kpi-compact {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: var(--space-4);
            background: var(--bg-primary);
            border: 1px solid var(--bg-quaternary);
            border-radius: var(--radius-md);
            transition: all 0.15s ease;
        }

        .kpi-compact:hover {
            border-color: var(--brand-gold-light);
            box-shadow: var(--shadow-sm);
        }

        .kpi-value {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            line-height: 1;
        }

        .kpi-label {
            font-size: 0.75rem;
            color: var(--text-tertiary);
            margin-top: var(--space-1);
        }

        .kpi-change {
            font-size: 0.75rem;
            font-weight: 600;
            padding: var(--space-1) var(--space-2);
            border-radius: var(--radius-sm);
        }

        .kpi-change.positive {
            background: var(--green-50);
            color: var(--green-600);
        }

        .kpi-change.negative {
            background: var(--red-50);
            color: var(--red-600);
        }

        /* Status System */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: var(--space-1) var(--space-2);
            border-radius: var(--radius-sm);
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-success {
            background: var(--green-50);
            color: var(--green-600);
        }

        .status-warning {
            background: var(--amber-50);
            color: var(--amber-600);
        }

        .status-error {
            background: var(--red-50);
            color: var(--red-600);
        }

        .status-info {
            background: var(--blue-50);
            color: var(--blue-600);
        }

        /* Progress System */
        .progress-compact {
            width: 100%;
            height: 6px;
            background: var(--bg-quaternary);
            border-radius: var(--radius-sm);
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            border-radius: var(--radius-sm);
            transition: width 0.3s ease;
        }

        .progress-fill-success { background: var(--green-500); }
        .progress-fill-warning { background: var(--amber-500); }
        .progress-fill-error { background: var(--red-500); }
        .progress-fill-info { background: var(--blue-500); }
        .progress-fill-gold { background: var(--brand-gold); }

        /* Tables */
        .table-compact {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .table-compact th {
            text-align: left;
            padding: var(--space-2) var(--space-3);
            font-weight: 600;
            color: var(--text-tertiary);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--bg-quaternary);
        }

        .table-compact td {
            padding: var(--space-3);
            border-bottom: 1px solid var(--bg-tertiary);
        }

        .table-compact tr:hover td {
            background: var(--bg-tertiary);
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: var(--space-2);
            padding: var(--space-2) var(--space-3);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            font-weight: 500;
            border: 1px solid var(--bg-quaternary);
            background: var(--bg-primary);
            color: var(--text-primary);
            text-decoration: none;
            cursor: pointer;
            transition: all 0.15s ease;
        }

        .btn:hover {
            background: var(--bg-tertiary);
            border-color: var(--brand-gold-light);
        }

        .btn-primary {
            background: rgba(255, 255, 255, 0.9);
            color: #1e3a8a;
            border-color: rgba(255, 255, 255, 0.9);
        }

        .btn-primary:hover {
            background: #ffffff;
            color: #1e3a8a;
            border-color: #ffffff;
        }

        /* Page Content System */
        .page-content {
            display: none;
        }

        .page-content.active {
            display: block;
        }

        /* Responsive */
        @media (max-width: 1280px) {
            .erp-container {
                grid-template-columns: 260px 1fr;
            }
        }

        @media (max-width: 1024px) {
            .erp-container {
                grid-template-columns: 1fr;
                grid-template-rows: auto 1fr auto;
            }
            
            .erp-sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="erp-container">
        <!-- Professional Sidebar -->
        <aside class="erp-sidebar">
            <!-- Brand Section -->
            <div class="sidebar-brand">
                <img src="{{ asset('images/hero/logo-dollars.jpg') }}" alt="DOLLARS MENUISERIE" class="sidebar-brand-logo">
                <div>
                    <div class="sidebar-brand-text">DOLLARS MENUISERIE</div>
                    <div class="sidebar-brand-subtitle">Système de Production ERP</div>
                </div>
            </div>

            <!-- Navigation Section -->
            <nav class="sidebar-nav">
                <!-- ADMIN SECTION - Visible for admin, manager -->
                <div class="sidebar-nav-section" id="admin-section" style="display: none;">
                    <div class="sidebar-nav-section-header" onclick="toggleSection('admin-section')">
                        <span class="sidebar-nav-section-title">🏢 ADMINISTRATION</span>
                        <svg class="sidebar-nav-section-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="sidebar-nav-items">
                        <a href="#" class="sidebar-nav-item active" data-page="dashboard">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Tableau de bord
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="production">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Production
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="workshop">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                            </svg>
                            Atelier
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="orders">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Commandes
                            <span class="sidebar-nav-badge">3</span>
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="invoices">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Facturation
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="payments">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Paiements
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="stock">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Stock
                            <span class="sidebar-nav-badge">2</span>
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="suppliers">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Fournisseurs
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="hr">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            RH & Personnel
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="employees">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Employés
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="crm">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            CRM
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="analytics">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Analytics
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="config">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Configuration
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="system">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                            Système
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="reports">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Rapports
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="logistics">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                            Logistique
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="deliveries">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                            Livraisons
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="machines">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                            </svg>
                            Machines
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="permissions">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                            Permissions
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="users">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Utilisateurs
                        </a>
                    </div>
                </div>

                <!-- CLIENT SECTION - Visible for client -->
                <div class="sidebar-nav-section" id="client-section" style="display: none;">
                    <div class="sidebar-nav-section-header" onclick="toggleSection('client-section')">
                        <span class="sidebar-nav-section-title">👤 ESPACE CLIENT</span>
                        <svg class="sidebar-nav-section-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="sidebar-nav-items">
                        <a href="#" class="sidebar-nav-item active" data-page="client-dashboard">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Tableau de bord
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-orders">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                            Mes commandes
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-invoices">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Factures
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-payments">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Paiements
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-tracking">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                            Suivi livraison
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-quotations">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Devis
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-support">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            Support
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-progress">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Avancement projet
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="client-settings">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Paramètres compte
                        </a>
                    </div>
                </div>

                <!-- ARTISAN SECTION - Visible for artisan -->
                <div class="sidebar-nav-section" id="artisan-section" style="display: none;">
                    <div class="sidebar-nav-section-header" onclick="toggleSection('artisan-section')">
                        <span class="sidebar-nav-section-title">🔧 ESPACE ARTISAN</span>
                        <svg class="sidebar-nav-section-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="sidebar-nav-items">
                        <a href="#" class="sidebar-nav-item active" data-page="artisan-dashboard">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Mon tableau de bord
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="artisan-tasks">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                            Mes OF
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="artisan-planning">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            Planning
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="artisan-stock">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            Stock matières
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="artisan-quality">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Contrôle qualité
                        </a>
                    </div>
                </div>

                <!-- LIVREUR SECTION - Visible for livreur -->
                <div class="sidebar-nav-section" id="livreur-section" style="display: none;">
                    <div class="sidebar-nav-section-header" onclick="toggleSection('livreur-section')">
                        <span class="sidebar-nav-section-title">🚚 ESPACE LIVREUR</span>
                        <svg class="sidebar-nav-section-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                    <div class="sidebar-nav-items">
                        <a href="#" class="sidebar-nav-item active" data-page="livreur-dashboard">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            Mes livraisons
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="livreur-route">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                            </svg>
                            Feuille de route
                        </a>
                        <a href="#" class="sidebar-nav-item" data-page="livreur-history">
                            <svg class="sidebar-nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Historique
                        </a>
                    </div>
                </div>
            </nav>

            <!-- User Profile Section -->
            <div class="sidebar-user">
                <div class="sidebar-user-profile" onclick="navigateToUserProfile()">
                    <img src="https://ui-avatars.com/api/?name=User&background=1e3a8a&color=fff" alt="User" class="sidebar-user-avatar">
                    <div class="sidebar-user-info">
                        <div class="sidebar-user-name">Jean Dupont</div>
                        <div class="sidebar-user-role">
                            <span class="sidebar-user-role-badge role-admin">Administrateur</span>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="erp-main">
            <!-- Header -->
            <header class="erp-header">
                <div class="erp-header-content">
                    <div>
                        <h1 class="erp-header-title">Tableau de bord Production</h1>
                        <p class="erp-header-subtitle">Vue d'opération en temps réel • 9 Mai 2026</p>
                    </div>
                    <div class="erp-header-actions">
                        <button class="btn btn-primary" onclick="showModal('of')">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Nouvel OF
                        </button>
                        <button class="btn" onclick="exportData()">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                            </svg>
                            Exporter
                        </button>
                    </div>
                </div>
            </header>

            <!-- Urgency Bar -->
            <div class="urgency-bar">
                <div class="urgency-bar-content">
                    <div class="urgency-title">⚠️ Alertes critiques requérant une action immédiate</div>
                    <div class="urgency-items">
                        <div class="urgency-item">
                            <span>Commandes retardées</span>
                            <span class="urgency-badge">3</span>
                        </div>
                        <div class="urgency-item">
                            <span>Machines en panne</span>
                            <span class="urgency-badge">1</span>
                        </div>
                        <div class="urgency-item">
                            <span>Stock critique</span>
                            <span class="urgency-badge">2</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Dashboard Content -->
            <div class="p-6 overflow-y-auto">
                <!-- Page: Dashboard -->
                <div id="page-dashboard" class="page-content active">
                    <!-- Key Metrics Row -->
                    <div class="grid grid-cols-4 gap-4 mb-6">
                        <div class="kpi-compact">
                            <div>
                                <div class="kpi-value">12</div>
                                <div class="kpi-label">OF Actifs</div>
                                <div class="kpi-change positive">+2 vs hier</div>
                            </div>
                        </div>
                        <div class="kpi-compact">
                            <div>
                                <div class="kpi-value">87%</div>
                                <div class="kpi-label">Rendement</div>
                                <div class="kpi-change positive">+5% vs objectif</div>
                            </div>
                        </div>
                        <div class="kpi-compact">
                            <div>
                                <div class="kpi-value">9/11</div>
                                <div class="kpi-label">Présents</div>
                                <div class="kpi-change negative">-2 absents</div>
                            </div>
                        </div>
                        <div class="kpi-compact">
                            <div>
                                <div class="kpi-value">2.4M</div>
                                <div class="kpi-label">CA Mois</div>
                                <div class="kpi-change positive">+12% vs target</div>
                            </div>
                        </div>
                    </div>

                    <!-- Production Status & Orders Grid -->
                    <div class="grid grid-cols-2 gap-6 mb-6">
                        <!-- Production Queue -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">File de production</div>
                                    <div class="card-subtitle">OF en cours et programmés</div>
                                </div>
                                <span class="status-badge status-info">12 OF</span>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-3 border rounded-lg">
                                    <div class="flex-1">
                                        <div class="font-medium text-sm">OF-2025-00458</div>
                                        <div class="text-xs text-gray-500">Table salon • Client MARTIN</div>
                                    </div>
                                    <div class="text-right">
                                        <div class="status-badge status-success">75%</div>
                                        <div class="text-xs text-gray-500 mt-1">En assemblage</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-3 border rounded-lg">
                                    <div class="flex-1">
                                        <div class="font-medium text-sm">OF-2025-00459</div>
                                        <div class="text-xs text-gray-500">Armoire bureau • Client DUPONT</div>
                                    </div>
                                    <div class="text-right">
                                        <div class="status-badge status-warning">25%</div>
                                        <div class="text-xs text-gray-500 mt-1">Découpe</div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-3 border rounded-lg">
                                    <div class="flex-1">
                                        <div class="font-medium text-sm">OF-2025-00460</div>
                                        <div class="text-xs text-gray-500">Chaises dining • Client LEROY</div>
                                    </div>
                                    <div class="text-right">
                                        <div class="status-badge status-error">Retard</div>
                                        <div class="text-xs text-gray-500 mt-1">+2 jours</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Workshop Status -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">État atelier</div>
                                    <div class="card-subtitle">Machines et équipes</div>
                                </div>
                                <span class="status-badge status-success">Opérationnel</span>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <span class="text-sm">Scie circulaire</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Active</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                        <span class="text-sm">Dégauchisseuse</span>
                                    </div>
                                    <span class="text-xs text-red-600">Panne</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                        <span class="text-sm">Raboteuse</span>
                                    </div>
                                    <span class="text-xs text-gray-500">Active</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                                        <span class="text-sm">Toupie</span>
                                    </div>
                                    <span class="text-xs text-yellow-600">Maintenance</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders & Performance -->
                    <div class="grid grid-cols-2 gap-6">
                        <!-- Recent Orders -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Commandes récentes</div>
                                    <div class="card-subtitle">Dernières 24h</div>
                                </div>
                                <span class="status-badge status-info">5 nouvelles</span>
                            </div>
                            <table class="table-compact">
                                <thead>
                                    <tr>
                                        <th>Commande</th>
                                        <th>Client</th>
                                        <th>Montant</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="font-medium">CMD-2025-00123</td>
                                        <td>MARTIN</td>
                                        <td>850K</td>
                                        <td><span class="status-badge status-warning">Retard</span></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">CMD-2025-00124</td>
                                        <td>DUPONT</td>
                                        <td>1.2M</td>
                                        <td><span class="status-badge status-success">Confirmée</span></td>
                                    </tr>
                                    <tr>
                                        <td class="font-medium">CMD-2025-00125</td>
                                        <td>LEROY</td>
                                        <td>650K</td>
                                        <td><span class="status-badge status-info">En attente</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Performance Metrics -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Performance journée</div>
                                    <div class="card-subtitle">Productivité et rendement</div>
                                </div>
                                <span class="status-badge status-success">+8% vs hier</span>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span>Taux de complétion</span>
                                        <span class="font-medium">87%</span>
                                    </div>
                                    <div class="progress-compact">
                                        <div class="progress-fill progress-fill-success" style="width: 87%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span>Utilisation machines</span>
                                        <span class="font-medium">72%</span>
                                    </div>
                                    <div class="progress-compact">
                                        <div class="progress-fill progress-fill-warning" style="width: 72%"></div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-sm mb-1">
                                        <span>Efficacité équipe</span>
                                        <span class="font-medium">91%</span>
                                    </div>
                                    <div class="progress-compact">
                                        <div class="progress-fill progress-fill-success" style="width: 91%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Pages -->
                <div id="page-profile" class="page-content">
                    <div class="space-y-6">
                        <!-- Profile Header -->
                        <div class="card-compact">
                            <div class="flex items-center gap-6">
                                <div class="relative">
                                    <img src="https://ui-avatars.com/api/?name=Jean+Dupont&background=1e3a8a&color=fff&size=120" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="flex-1">
                                    <h2 class="text-2xl font-bold text-gray-900">Jean Dupont</h2>
                                    <p class="text-gray-600">Administrateur Système</p>
                                    <div class="flex items-center gap-4 mt-2">
                                        <span class="status-badge status-success">Actif</span>
                                        <span class="text-sm text-gray-500">Dernière connexion: Il y a 2 heures</span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="btn btn-primary" onclick="editProfile()">Modifier profil</button>
                                    <button class="btn" onclick="changePassword()">Changer mot de passe</button>
                                </div>
                            </div>
                        </div>

                        <!-- Profile Information Grid -->
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Personal Information -->
                            <div class="card-compact">
                                <div class="card-header">
                                    <div>
                                        <div class="card-title">Informations personnelles</div>
                                        <div class="card-subtitle">Détails de contact et identité</div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Nom</label>
                                            <p class="text-gray-900">Dupont</p>
                                        </div>
                                        <div>
                                            <label class="text-sm font-medium text-gray-700">Prénom</label>
                                            <p class="text-gray-900">Jean</p>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Email</label>
                                        <p class="text-gray-900">jean.dupont@dollars-menuiserie.com</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Téléphone</label>
                                        <p class="text-gray-900">+33 6 12 34 56 78</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Adresse</label>
                                        <p class="text-gray-900">123 Rue de l'Industrie, 75001 Paris</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Professional Information -->
                            <div class="card-compact">
                                <div class="card-header">
                                    <div>
                                        <div class="card-title">Informations professionnelles</div>
                                        <div class="card-subtitle">Rôle et permissions</div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Rôle</label>
                                        <p class="text-gray-900">Administrateur</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Département</label>
                                        <p class="text-gray-900">Direction Générale</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Date d'embauche</label>
                                        <p class="text-gray-900">15 Janvier 2020</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Matricule</label>
                                        <p class="text-gray-900">EMP-2020-001</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Niveau d'accès</label>
                                        <p class="text-gray-900">Accès complet - Tous les modules</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Activity Statistics -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Statistiques d'activité</div>
                                    <div class="card-subtitle">Utilisation du système</div>
                                </div>
                            </div>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="text-center p-4 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-blue-600">1,247</div>
                                    <div class="text-sm text-gray-600">Connexions totales</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-green-600">342</div>
                                    <div class="text-sm text-gray-600">OF créés</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-purple-600">89</div>
                                    <div class="text-sm text-gray-600">Rapports générés</div>
                                </div>
                                <div class="text-center p-4 bg-gray-50 rounded-lg">
                                    <div class="text-2xl font-bold text-orange-600">24</div>
                                    <div class="text-sm text-gray-600">Actions système</div>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Activity -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Activité récente</div>
                                    <div class="card-subtitle">Dernières actions dans le système</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium">Création OF-2025-00461</p>
                                        <p class="text-xs text-gray-500">Il y a 2 heures</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium">Validation facture FAC-2025-00123</p>
                                        <p class="text-xs text-gray-500">Il y a 4 heures</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg">
                                    <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium">Génération rapport mensuel</p>
                                        <p class="text-xs text-gray-500">Il y a 6 heures</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Profile -->
                <div id="page-client-profile" class="page-content">
                    <div class="space-y-6">
                        <!-- Client Profile Header -->
                        <div class="card-compact">
                            <div class="flex items-center gap-6">
                                <div class="relative">
                                    <img src="https://ui-avatars.com/api/?name=Martin+Client&background=10b981&color=fff&size=120" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="flex-1">
                                    <h2 class="text-2xl font-bold text-gray-900">Martin Client</h2>
                                    <p class="text-gray-600">Client Particulier</p>
                                    <div class="flex items-center gap-4 mt-2">
                                        <span class="status-badge status-success">Actif</span>
                                        <span class="text-sm text-gray-500">Client depuis: Mars 2023</span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="btn btn-primary" onclick="editClientProfile()">Modifier profil</button>
                                    <button class="btn" onclick="viewOrders()">Voir commandes</button>
                                </div>
                            </div>
                        </div>

                        <!-- Client Information -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="card-compact">
                                <div class="card-header">
                                    <div>
                                        <div class="card-title">Informations client</div>
                                        <div class="card-subtitle">Détails de contact et livraison</div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Référence client</label>
                                        <p class="text-gray-900">CLI-2023-045</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Email</label>
                                        <p class="text-gray-900">martin.client@email.com</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Téléphone</label>
                                        <p class="text-gray-900">+33 6 98 76 54 32</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Adresse de livraison</label>
                                        <p class="text-gray-900">45 Avenue des Champs, 75008 Paris</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-compact">
                                <div class="card-header">
                                    <div>
                                        <div class="card-title">Historique client</div>
                                        <div class="card-subtitle">Commandes et statistiques</div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Total commandes</label>
                                        <p class="text-gray-900">12 commandes</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Montant total</label>
                                        <p class="text-gray-900">3.2M FCFA</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Dernière commande</label>
                                        <p class="text-gray-900">CMD-2025-00125 (Il y a 3 jours)</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Statut paiement</label>
                                        <p class="text-gray-900">À jour</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Orders -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Commandes en cours</div>
                                    <div class="card-subtitle">Suivi des commandes actives</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 border rounded-lg">
                                    <div>
                                        <p class="font-medium">CMD-2025-00125</p>
                                        <p class="text-sm text-gray-500">Table salon moderne</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="status-badge status-warning">En production</span>
                                        <p class="text-sm text-gray-500 mt-1">Livraison prévue: 15 Mai</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-4 border rounded-lg">
                                    <div>
                                        <p class="font-medium">CMD-2025-00123</p>
                                        <p class="text-sm text-gray-500">Armoire bureau</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="status-badge status-success">Prête</span>
                                        <p class="text-sm text-gray-500 mt-1">En attente de livraison</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Artisan Profile -->
                <div id="page-artisan-profile" class="page-content">
                    <div class="space-y-6">
                        <!-- Artisan Profile Header -->
                        <div class="card-compact">
                            <div class="flex items-center gap-6">
                                <div class="relative">
                                    <img src="https://ui-avatars.com/api/?name=Pierre+Artisan&background=059669&color=fff&size=120" alt="Profile" class="w-24 h-24 rounded-full border-4 border-white shadow-lg">
                                    <div class="absolute bottom-0 right-0 w-6 h-6 bg-green-500 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="flex-1">
                                    <h2 class="text-2xl font-bold text-gray-900">Pierre Artisan</h2>
                                    <p class="text-gray-600">Ébéniste Senior</p>
                                    <div class="flex items-center gap-4 mt-2">
                                        <span class="status-badge status-success">Présent</span>
                                        <span class="text-sm text-gray-500">Specialité: Menuiserie fine</span>
                                    </div>
                                </div>
                                <div class="flex gap-2">
                                    <button class="btn btn-primary" onclick="editArtisanProfile()">Modifier profil</button>
                                    <button class="btn" onclick="viewArtisanTasks()">Voir tâches</button>
                                </div>
                            </div>
                        </div>

                        <!-- Artisan Information -->
                        <div class="grid grid-cols-2 gap-6">
                            <div class="card-compact">
                                <div class="card-header">
                                    <div>
                                        <div class="card-title">Informations professionnelles</div>
                                        <div class="card-subtitle">Compétences et spécialités</div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Matricule</label>
                                        <p class="text-gray-900">ART-2021-003</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Spécialité</label>
                                        <p class="text-gray-900">Ébénisterie, Finition</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Certifications</label>
                                        <p class="text-gray-900">CAP Menuisier, BP Ébéniste</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Machines maîtrisées</label>
                                        <p class="text-gray-900">Scie circulaire, Toupie, Dégauchisseuse</p>
                                    </div>
                                </div>
                            </div>

                            <div class="card-compact">
                                <div class="card-header">
                                    <div>
                                        <div class="card-title">Performance</div>
                                        <div class="card-subtitle">Statistiques de production</div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">OF complétés ce mois</label>
                                        <p class="text-gray-900">18 OF</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Taux de réussite</label>
                                        <p class="text-gray-900">96%</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Moyenne qualité</label>
                                        <p class="text-gray-900">4.8/5</p>
                                    </div>
                                    <div>
                                        <label class="text-sm font-medium text-gray-700">Productivité</label>
                                        <p class="text-gray-900">112% de l'objectif</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Current Tasks -->
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Tâches en cours</div>
                                    <div class="card-subtitle">Ordres de fabrication actifs</div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 border rounded-lg">
                                    <div>
                                        <p class="font-medium">OF-2025-00461</p>
                                        <p class="text-sm text-gray-500">Table basse chêne</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="status-badge status-info">Assemblage</span>
                                        <p class="text-sm text-gray-500 mt-1">75% complété</p>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between p-4 border rounded-lg">
                                    <div>
                                        <p class="font-medium">OF-2025-00462</p>
                                        <p class="text-sm text-gray-500">Chênes dining set</p>
                                    </div>
                                    <div class="text-right">
                                        <span class="status-badge status-warning">Finition</span>
                                        <p class="text-sm text-gray-500 mt-1">30% complété</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Production & Workshop Page -->
                <div id="page-production" class="page-content">
                    <div class="space-y-6">
                        <div class="card-compact">
                            <div class="card-header">
                                <div>
                                    <div class="card-title">Production & Atelier</div>
                                    <div class="card-subtitle">Gestion des ordres de fabrication</div>
                                </div>
                            </div>
                            <div class="text-center py-8 text-gray-500">
                                <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                <p>Module Production en cours de développement</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Role-based navigation display
            initializeRoleBasedNavigation();
            
            // Navigation functionality
            const navItems = document.querySelectorAll('.sidebar-nav-item');
            const pages = document.querySelectorAll('.page-content');
            
            // Function to navigate to a page
            function navigateToPage(pageId) {
                // Hide all pages
                pages.forEach(page => {
                    page.classList.remove('active');
                });
                
                // Show selected page
                const targetPage = document.getElementById('page-' + pageId);
                if (targetPage) {
                    targetPage.classList.add('active');
                }
                
                // Update active state in sidebar
                navItems.forEach(item => {
                    item.classList.remove('active');
                });
                
                // Find and activate corresponding menu
                const activeMenuItem = Array.from(navItems).find(item => {
                    return item.getAttribute('data-page') === pageId;
                });
                
                if (activeMenuItem) {
                    activeMenuItem.classList.add('active');
                }
                
                // Update page title
                updatePageTitle(pageId);
            }
            
            // Function to update page title
            function updatePageTitle(pageId) {
                const titleElement = document.querySelector('.erp-header-title');
                const subtitleElement = document.querySelector('.erp-header-subtitle');
                
                const titles = {
                    dashboard: { title: 'Tableau de bord Production', subtitle: 'Vue d\'opération en temps réel' },
                    production: { title: 'Production & Atelier', subtitle: 'Gestion des ordres de fabrication' },
                    workshop: { title: 'Atelier', subtitle: 'Gestion des machines et équipements' },
                    orders: { title: 'Gestion des Commandes', subtitle: 'Suivi des commandes clients' },
                    invoices: { title: 'Facturation', subtitle: 'Devis et factures' },
                    payments: { title: 'Paiements', subtitle: 'Suivi des paiements' },
                    stock: { title: 'Gestion des Stocks', subtitle: 'Matières premières et produits finis' },
                    suppliers: { title: 'Fournisseurs', subtitle: 'Gestion des fournisseurs' },
                    hr: { title: 'Ressources Humaines', subtitle: 'Gestion du personnel' },
                    employees: { title: 'Employés', subtitle: 'Gestion des employés' },
                    crm: { title: 'CRM', subtitle: 'Gestion de la relation client' },
                    analytics: { title: 'Analytics', subtitle: 'Analyse et reporting' },
                    config: { title: 'Configuration', subtitle: 'Paramètres du système' },
                    system: { title: 'Système', subtitle: 'Administration système' },
                    reports: { title: 'Rapports', subtitle: 'Rapports et exports' },
                    logistics: { title: 'Logistique', subtitle: 'Gestion logistique' },
                    deliveries: { title: 'Livraisons', subtitle: 'Gestion des livraisons' },
                    machines: { title: 'Machines', subtitle: 'Gestion des machines' },
                    permissions: { title: 'Permissions', subtitle: 'Gestion des permissions' },
                    users: { title: 'Utilisateurs', subtitle: 'Gestion des utilisateurs' },
                    profile: { title: 'Mon Profil', subtitle: 'Informations personnelles et professionnelles' },
                    'client-profile': { title: 'Mon Profil Client', subtitle: 'Mes informations et commandes' },
                    'artisan-profile': { title: 'Mon Profil Artisan', subtitle: 'Mes compétences et performances' },
                    'client-dashboard': { title: 'Tableau de bord Client', subtitle: 'Vue d\'ensemble de mes commandes' },
                    'client-orders': { title: 'Mes Commandes', subtitle: 'Historique et suivi des commandes' },
                    'client-invoices': { title: 'Mes Factures', subtitle: 'Factures et paiements' },
                    'client-payments': { title: 'Mes Paiements', subtitle: 'Historique des paiements' },
                    'client-tracking': { title: 'Suivi Livraison', subtitle: 'Suivi des livraisons en cours' },
                    'client-quotations': { title: 'Mes Devis', subtitle: 'Devis en attente et acceptés' },
                    'client-support': { title: 'Support Client', subtitle: 'Assistance et communication' },
                    'client-progress': { title: 'Avancement Projet', subtitle: 'Suivi des projets en cours' },
                    'client-settings': { title: 'Paramètres Compte', subtitle: 'Configuration du compte client' },
                    'artisan-dashboard': { title: 'Mon Tableau de bord', subtitle: 'Vue d\'activité artisanale' },
                    'artisan-tasks': { title: 'Mes OF', subtitle: 'Ordres de fabrication assignés' },
                    'artisan-planning': { title: 'Planning', subtitle: 'Planning et calendrier' },
                    'artisan-stock': { title: 'Stock Matières', subtitle: 'Gestion des matières premières' },
                    'artisan-quality': { title: 'Contrôle Qualité', subtitle: 'Validation et contrôle qualité' },
                    'livreur-dashboard': { title: 'Mes Livraisons', subtitle: 'Tableau de bord livreur' },
                    'livreur-route': { title: 'Feuille de Route', subtitle: 'Itinéraire et planification' },
                    'livreur-history': { title: 'Historique', subtitle: 'Historique des livraisons' }
                };
                
                if (titles[pageId]) {
                    titleElement.textContent = titles[pageId].title;
                    subtitleElement.textContent = titles[pageId].subtitle + ' • 9 Mai 2026';
                }
            }
            
            // Add event listeners to navigation items
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageId = this.getAttribute('data-page');
                    if (pageId) {
                        navigateToPage(pageId);
                    }
                });
            });
            
            // Profile functions
            window.editProfile = function() {
                alert('Modification profil - À implémenter avec Laravel');
            };
            
            window.changePassword = function() {
                alert('Changement mot de passe - À implémenter avec Laravel');
            };
            
            window.editClientProfile = function() {
                alert('Modification profil client - À implémenter avec Laravel');
            };
            
            window.viewOrders = function() {
                navigateToPage('client-orders');
            };
            
            window.editArtisanProfile = function() {
                alert('Modification profil artisan - À implémenter avec Laravel');
            };
            
            window.viewArtisanTasks = function() {
                navigateToPage('artisan-tasks');
            };
            
            // Modal functions (placeholders)
            window.showModal = function(type) {
                const messages = {
                    of: 'Formulaire Nouvel OF - À implémenter avec Laravel',
                    commande: 'Formulaire Nouvelle Commande - À implémenter avec Laravel',
                    stock: 'Formulaire Ajout Stock - À implémenter avec Laravel'
                };
                
                alert(messages[type] || 'Formulaire - À implémenter avec Laravel');
            };
            
            window.exportData = function() {
                alert('Exportation des données - À implémenter avec Laravel');
            };
            
            // Auto-refresh simulation
            setInterval(() => {
                console.log('Dashboard data refreshed');
            }, 30000);
        });

        // Toggle section collapse
        function toggleSection(sectionId) {
            const section = document.getElementById(sectionId);
            section.classList.toggle('collapsed');
        }

        // Initialize role-based navigation
        function initializeRoleBasedNavigation() {
            // This function will be called by backend to set the user role
            // For now, we'll simulate with admin role
            const userRole = 'admin'; // This should come from backend
            
            // Hide all sections first
            document.querySelectorAll('.sidebar-nav-section').forEach(section => {
                section.style.display = 'none';
            });
            
            // Show relevant sections based on role
            switch(userRole) {
                case 'admin':
                case 'manager':
                    document.getElementById('admin-section').style.display = 'block';
                    break;
                case 'client':
                    document.getElementById('client-section').style.display = 'block';
                    break;
                case 'artisan':
                    document.getElementById('artisan-section').style.display = 'block';
                    break;
                case 'livreur':
                    document.getElementById('livreur-section').style.display = 'block';
                    break;
            }
            
            // Update user profile section
            updateUserProfile(userRole);
        }

        // Update user profile display
        function updateUserProfile(role) {
            const roleNames = {
                'admin': 'Administrateur',
                'manager': 'Manager',
                'artisan': 'Artisan',
                'livreur': 'Livreur',
                'client': 'Client'
            };
            
            const roleBadge = document.querySelector('.sidebar-user-role-badge');
            const roleName = document.querySelector('.sidebar-user-role');
            
            if (roleBadge && roleName) {
                roleBadge.textContent = roleNames[role] || 'Utilisateur';
                roleBadge.className = `sidebar-user-role-badge role-${role}`;
            }
        }

        // Navigate to user profile based on role
        window.navigateToUserProfile = function() {
            const userRole = 'admin'; // This should come from backend
            
            switch(userRole) {
                case 'admin':
                case 'manager':
                    navigateToPage('profile');
                    break;
                case 'client':
                    navigateToPage('client-profile');
                    break;
                case 'artisan':
                    navigateToPage('artisan-profile');
                    break;
                case 'livreur':
                    // Livreur profile could be added here
                    alert('Profil livreur - À implémenter');
                    break;
                default:
                    navigateToPage('profile');
            }
        };

        // This function can be called by backend to update the role dynamically
        window.setUserRole = function(role) {
            initializeRoleBasedNavigation();
        };
    </script>
</body>
</html>
