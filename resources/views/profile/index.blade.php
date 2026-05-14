@extends('layouts.dashboard')

@section('content')
<div id="profile">
    <div style="padding:24px; max-width:1000px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">
                    Mon profil
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Informations personnelles et paramètres du compte
                </p>
            </div>
            <a href="/profile/edit" 
               style="display:flex; align-items:center; gap:8px; text-decoration:none;
                      padding:10px 18px; background:linear-gradient(135deg, #3b82f6, #2563eb);
                      color:white; border:none; border-radius:8px;
                      font-size:14px; font-weight:500;">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828L8.586-8.586z"></path>
                </svg>
                Modifier mon profil
            </a>
        </div>

        <!-- Profile Information -->
        <div style="display:grid; grid-template-columns:1fr 2fr; gap:24px;">
            
            <!-- Avatar Section -->
            <div style="background:white; border-radius:12px; padding:32px; box-shadow:0 4px 6px rgba(0,0,0,0.05); border:1px solid #e5e7eb; text-align:center;">
                <img src="https://ui-avatars.com/api/?name=Jean Dupont&background=1e3a8a&color=fff" 
                     alt="Avatar" style="width:150px; height:150px; border-radius:50%; border:4px solid #e5e7eb; margin-bottom:16px;">
                <h2 style="font-size:20px; font-weight:600; color:#1f2937; margin:0 0 8px;">
                    Jean Dupont
                </h2>
                <p style="color:#6b7280; margin:0 0 16px;">
                    Administrateur
                </p>
                <div style="display:inline-flex; align-items:center; gap:8px; padding:6px 12px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:12px;">
                    <div style="width:8px; height:8px; background:#22c55e; border-radius:50%;"></div>
                    Compte actif
                </div>
            </div>

            <!-- Details Section -->
            <div style="background:white; border-radius:12px; padding:32px; box-shadow:0 4px 6px rgba(0,0,0,0.05); border:1px solid #e5e7eb;">
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 24px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
                    Informations personnelles
                </h3>
                
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                    <div>
                        <h4 style="font-size:14px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase; letter-spacing:0.05em;">
                            Nom complet
                        </h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">
                            Jean Dupont
                        </p>
                    </div>
                    <div>
                        <h4 style="font-size:14px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase; letter-spacing:0.05em;">
                            Email
                        </h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">
                            jean.dupont@dollars-menuiserie.com
                        </p>
                    </div>
                    <div>
                        <h4 style="font-size:14px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase; letter-spacing:0.05em;">
                            Téléphone
                        </h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">
                            +237 6 70 83 53 55
                        </p>
                    </div>
                    <div>
                        <h4 style="font-size:14px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase; letter-spacing:0.05em;">
                            Rôle
                        </h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">
                            Administrateur
                        </p>
                    </div>
                    <div style="grid-column: span 2;">
                        <h4 style="font-size:14px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase; letter-spacing:0.05em;">
                            Adresse
                        </h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">
                            123 Rue de l'Industrie, 75001 Paris, France
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Account Statistics -->
        <div style="margin-top:24px; background:white; border-radius:12px; padding:32px; box-shadow:0 4px 6px rgba(0,0,0,0.05); border:1px solid #e5e7eb;">
            <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 24px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
                Statistiques du compte
            </h3>
            
            <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:20px;">
                <div style="text-align:center; padding:20px; background:#f9fafb; border-radius:8px;">
                    <div style="font-size:24px; font-weight:700; color:#3b82f6; margin-bottom:8px;">
                        127
                    </div>
                    <div style="font-size:14px; color:#6b7280;">
                        Commandes créées
                    </div>
                </div>
                <div style="text-align:center; padding:20px; background:#f9fafb; border-radius:8px;">
                    <div style="font-size:24px; font-weight:700; color:#10b981; margin-bottom:8px;">
                        89
                    </div>
                    <div style="font-size:14px; color:#6b7280;">
                        Projets complétés
                    </div>
                </div>
                <div style="text-align:center; padding:20px; background:#f9fafb; border-radius:8px;">
                    <div style="font-size:24px; font-weight:700; color:#f59e0b; margin-bottom:8px;">
                        45
                    </div>
                    <div style="font-size:14px; color:#6b7280;">
                        Clients gérés
                    </div>
                </div>
                <div style="text-align:center; padding:20px; background:#f9fafb; border-radius:8px;">
                    <div style="font-size:24px; font-weight:700; color:#8b5cf6; margin-bottom:8px;">
                        2.5
                    </div>
                    <div style="font-size:14px; color:#6b7280;">
                        Années d'expérience
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div style="margin-top:24px; background:white; border-radius:12px; padding:32px; box-shadow:0 4px 6px rgba(0,0,0,0.05); border:1px solid #e5e7eb;">
            <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 24px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
                Actions rapides
            </h3>
            
            <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px;">
                <a href="/profile/edit" 
                   style="display:flex; align-items:center; gap:12px; padding:16px; background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; text-decoration:none; transition:all 0.2s;"
                   onmouseover="this.style.background='#f3f4f6'" 
                   onmouseout="this.style.background='#f9fafb'">
                    <svg width="20" height="20" fill="none" stroke="#3b82f6" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828L8.586-8.586z"></path>
                    </svg>
                    <div style="text-align:left;">
                        <div style="font-weight:600; color:#1f2937; margin-bottom:4px;">
                            Modifier profil
                        </div>
                        <div style="font-size:12px; color:#6b7280;">
                            Mettre à jour vos informations
                        </div>
                    </div>
                </a>
                
                <a href="/security" 
                   style="display:flex; align-items:center; gap:12px; padding:16px; background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; text-decoration:none; transition:all 0.2s;"
                   onmouseover="this.style.background='#f3f4f6'" 
                   onmouseout="this.style.background='#f9fafb'">
                    <svg width="20" height="20" fill="none" stroke="#10b981" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                    <div style="text-align:left;">
                        <div style="font-weight:600; color:#1f2937; margin-bottom:4px;">
                            Sécurité
                        </div>
                        <div style="font-size:12px; color:#6b7280;">
                            Mot de passe et 2FA
                        </div>
                    </div>
                </a>
                
                <a href="/preferences" 
                   style="display:flex; align-items:center; gap:12px; padding:16px; background:#f9fafb; border:1px solid #e5e7eb; border-radius:8px; text-decoration:none; transition:all 0.2s;"
                   onmouseover="this.style.background='#f3f4f6'" 
                   onmouseout="this.style.background='#f9fafb'">
                    <svg width="20" height="20" fill="none" stroke="#8b5cf6" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c.94-1.543-.826-3.31-2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <div style="text-align:left;">
                        <div style="font-weight:600; color:#1f2937; margin-bottom:4px;">
                            Préférences
                        </div>
                        <div style="font-size:12px; color:#6b7280;">
                            Notifications et apparence
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
