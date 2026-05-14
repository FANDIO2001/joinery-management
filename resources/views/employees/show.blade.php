@extends('layouts.dashboard')

@section('content')
<div id="employees-show">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Détails de l'Employé
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Informations complètes de l'employé
                </p>
            </div>
            <div style="display:flex; gap:12px;">
                <button onclick="window.location.href='/employees'"
                    style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;">
                    ← Retour
                </button>
                <button onclick="window.location.href='/employees/1/edit'"
                    style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:linear-gradient(135deg, #3b82f6, #2563eb);
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;
                           box-shadow:0 4px 12px rgba(59,130,246,0.3);">
                    ✏️ Modifier
                </button>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">
            
            <!-- Left Column -->
            <div>
                
                <!-- Employee Info Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                    <div style="display:flex; gap:24px; align-items:flex-start;">
                        <div style="width:80px; height:80px; border-radius:50%; 
                                   background:linear-gradient(135deg, #8b5cf6, #7c3aed);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb; color:white; font-weight:700; font-size:28px;">
                            PM
                        </div>
                        <div style="flex:1;">
                            <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                                Pierre Martin
                            </h2>
                            <p style="color:#6b7280; margin:0 0 16px; font-size:16px;">
                                Artisan Menuisier
                            </p>
                            <div style="display:flex; gap:20px; flex-wrap:wrap;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#3b82f6; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Email</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">pierre.martin@email.com</div>
                                    </div>
                                </div>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#10b981; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Téléphone</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">+237 698 234 567</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Details Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#3b82f6; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </span>
                            Détails du poste
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Département</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">Production</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Date d'embauche</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">15/01/2023</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Salaire mensuel</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">150 000 FCFA</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Ancienneté</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">1 an 4 mois</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Address Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#10b981; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </span>
                            Adresse
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <p style="color:#4b5563; line-height:1.6; margin:0;">
                            456 Avenue des Artisans<br>
                            Douala, Cameroun
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Column (Sidebar) -->
            <div>
                
                <!-- Status Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <div style="padding:16px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#f59e0b; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Statut
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:6px 16px; background:#dcfce7; color:#16a34a; font-size:14px; font-weight:600; border-radius:20px;">
                            <div style="width:8px; height:8px; background:#22c55e; border-radius:50%;"></div>
                            Actif
                        </span>
                    </div>
                </div>

                <!-- Actions Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <div style="padding:16px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#ef4444; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </span>
                            Actions
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px; display:flex; flex-direction:column; gap:12px;">
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(16,185,129,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                            📧 Envoyer un email
                        </button>
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(59,130,246,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(59,130,246,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.3)'">
                            📅 Gérer les congés
                        </button>
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #ef4444, #dc2626); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(239,68,68,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(239,68,68,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(239,68,68,0.3)'">
                            🗑️ Archiver l'employé
                        </button>
                    </div>
                </div>

                <!-- History Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                    <div style="padding:16px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#6b7280; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Historique
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="position:relative; padding-left:20px;">
                            <div style="position:absolute; left:6px; top:0; bottom:0; width:2px; background:#e5e7eb;"></div>
                            <div style="position:relative; margin-bottom:16px;">
                                <div style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#10b981; border-radius:50%; border:2px solid white;"></div>
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Embauche</div>
                                    <div style="font-size:12px; color:#6b7280;">15/01/2023 par Admin</div>
                                </div>
                            </div>
                            <div style="position:relative; margin-bottom:16px;">
                                <div style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#3b82f6; border-radius:50%; border:2px solid white;"></div>
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Dernière modification</div>
                                    <div style="font-size:12px; color:#6b7280;">20/03/2024 par Admin</div>
                                </div>
                            </div>
                            <div style="position:relative;">
                                <div style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#f59e0b; border-radius:50%; border:2px solid white;"></div>
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Dernier congé</div>
                                    <div style="font-size:12px; color:#6b7280;">05/04/2024</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
