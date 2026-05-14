@extends('layouts.dashboard')

@section('content')
<div id="products-show">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Détails du Produit
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Informations complètes du produit
                </p>
            </div>
            <div style="display:flex; gap:12px;">
                <a href="{{ route('products.index') }}"
                    style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
                    ← Retour
                </a>
                <a href="{{ route('products.edit', 1) }}"
                    style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:linear-gradient(135deg, #3b82f6, #2563eb);
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;
                           box-shadow:0 4px 12px rgba(59,130,246,0.3); text-decoration:none;">
                    ✏️ Modifier
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">
            
            <!-- Left Column -->
            <div>
                
                <!-- Product Info Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                    <div style="display:flex; gap:24px; align-items:flex-start;">
                        <div style="width:120px; height:120px; border-radius:16px; 
                                   background:linear-gradient(135deg, #f3f4f6, #e5e7eb);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb; flex-shrink:0;">
                            <svg style="width:48px; height:48px; color:#9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div style="flex:1;">
                            <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                                Table en chêne
                            </h2>
                            <p style="color:#6b7280; margin:0 0 16px; font-size:16px;">
                                Table de salle à manger en chêne massif
                            </p>
                            <div style="display:flex; gap:20px; flex-wrap:wrap;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#3b82f6; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Référence</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">TAB-001</div>
                                    </div>
                                </div>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#10b981; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Catégorie</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">Meubles</div>
                                    </div>
                                </div>
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#22c55e; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Statut</div>
                                        <div style="display:flex; align-items:center; gap:6px; padding:2px 8px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:12px;">
                                            <div style="width:4px; height:4px; background:#22c55e; border-radius:50%;"></div>
                                            Actif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#3b82f6; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </span>
                            Description
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <p style="color:#4b5563; line-height:1.6; margin:0;">
                            Table de salle à manger en chêne massif, fabrication artisanale française. 
                            Dimensions: 180x90x75 cm. Finition vernis naturel. 
                            Convient pour 6 à 8 personnes. Garantie 5 ans.
                        </p>
                    </div>
                </div>

                <!-- Specifications Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#10b981; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                            </span>
                            Caractéristiques
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Dimensions</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">180x90x75 cm</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Poids</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">45 kg</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Matière</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">Chêne massif</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Finition</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">Vernis naturel</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Capacité</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">6-8 personnes</div>
                            </div>
                            <div style="background:#f9fafb; padding:16px; border-radius:8px; border:1px solid #e5e7eb;">
                                <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Garantie</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">5 ans</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column (Sidebar) -->
            <div>
                
                <!-- Price Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <div style="padding:16px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#f59e0b; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </span>
                            Prix
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px; text-align:center;">
                        <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:4px;">450,00 €</div>
                        <div style="font-size:14px; color:#6b7280;">TTC</div>
                    </div>
                </div>

                <!-- Stock Card -->
                <div style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <div style="padding:16px 24px 8px;">
                        <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span style="width:24px; height:24px; background:#8b5cf6; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                            </span>
                            Stock
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                            <div style="font-size:13px; color:#6b7280;">Stock actuel</div>
                            <div style="font-size:18px; font-weight:700; color:#10b981;">12</div>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                            <div style="font-size:13px; color:#6b7280;">Stock minimum</div>
                            <div style="font-size:14px; font-weight:600; color:#1f2937;">5</div>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div style="font-size:13px; color:#6b7280;">Stock maximum</div>
                            <div style="font-size:14px; font-weight:600; color:#1f2937;">50</div>
                        </div>
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
                            📦 Mettre à jour le stock
                        </button>
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(59,130,246,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(59,130,246,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.3)'">
                            📋 Dupliquer le produit
                        </button>
                        <button style="padding:12px 16px; background:linear-gradient(135deg, #ef4444, #dc2626); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(239,68,68,0.3);"
                                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(239,68,68,0.4)'"
                                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(239,68,68,0.3)'">
                            🗑️ Archiver le produit
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
                            <!-- Timeline line -->
                            <div style="position:absolute; left:6px; top:0; bottom:0; width:2px; background:#e5e7eb;"></div>
                            
                            <!-- Timeline items -->
                            <div style="position:relative; margin-bottom:16px;">
                                <div style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#10b981; border-radius:50%; border:2px solid white;"></div>
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Création</div>
                                    <div style="font-size:12px; color:#6b7280;">15/01/2024 par Admin</div>
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
                                <div style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#ef4444; border-radius:50%; border:2px solid white;"></div>
                                <div>
                                    <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">Dernière vente</div>
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