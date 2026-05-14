@extends('layouts.dashboard')

@section('content')
<div id="invoices-show">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Détails de la Facture
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    FAC-2024-001
                </p>
            </div>
            <div style="display:flex; gap:12px;">
                <button onclick="window.location.href='/invoices'"
                    style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;">
                    ← Retour
                </button>
                <button onclick="alert('Téléchargement PDF - À connecter avec Laravel')"
                    style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:linear-gradient(135deg, #10b981, #059669);
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;
                           box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                    📄 Télécharger PDF
                </button>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">
            
            <!-- Left Column -->
            <div>
                
                <!-- Invoice Info Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                    <div style="display:flex; gap:24px; align-items:flex-start;">
                        <div style="width:80px; height:80px; border-radius:16px; 
                                   background:linear-gradient(135deg, #10b981, #059669);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb; color:white; font-weight:700; font-size:32px;">
                            📄
                        </div>
                        <div style="flex:1;">
                            <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                                FAC-2024-001
                            </h2>
                            <p style="color:#6b7280; margin:0 0 16px; font-size:16px;">
                                Facture pour Jean Dupont
                            </p>
                            <div style="display:flex; gap:20px; flex-wrap:wrap;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#3b82f6; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Date</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">05/04/2024</div>
                                    </div>
                                </div>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#10b981; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Échéance</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">20/04/2024</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Customer Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#3b82f6; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </span>
                            Client
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="display:flex; align-items:center; gap:16px;">
                            <div style="width:48px; height:48px; border-radius:50%; 
                                       background:linear-gradient(135deg, #3b82f6, #2563eb);
                                       display:flex; align-items:center; justify-content:center;
                                       border:2px solid #e5e7eb; color:white; font-weight:700; font-size:18px;">
                                JD
                            </div>
                            <div>
                                <div style="font-size:15px; font-weight:600; color:#1f2937;">Jean Dupont</div>
                                <div style="font-size:13px; color:#6b7280;">jean.dupont@email.com</div>
                                <div style="font-size:13px; color:#6b7280;">+237 699 123 456</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#f59e0b; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </span>
                            Commande associée
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="font-size:15px; font-weight:600; color:#1f2937;">CMD-2024-001</div>
                        <div style="font-size:13px; color:#6b7280;">Table en chêne massif</div>
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
                            Payée
                        </span>
                    </div>
                </div>

                <!-- Amount Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <div style="padding:16px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#10b981; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Montant
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px; text-align:center;">
                        <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:4px;">450 000 FCFA</div>
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
                            📧 Envoyer par email
                        </button>
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(59,130,246,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(59,130,246,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.3)'">
                            📄 Marquer comme envoyée
                        </button>
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #ef4444, #dc2626); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(239,68,68,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(239,68,68,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(239,68,68,0.3)'">
                            🗑️ Annuler la facture
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
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Création</div>
                                    <div style="font-size:12px; color:#6b7280;">05/04/2024 par Admin</div>
                                </div>
                            </div>
                            <div style="position:relative;">
                                <div style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#3b82f6; border-radius:50%; border:2px solid white;"></div>
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Paiement reçu</div>
                                    <div style="font-size:12px; color:#6b7280;">10/04/2024</div>
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
