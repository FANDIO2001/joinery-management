@extends('layouts.dashboard')

@section('title', 'Détail Ordre de Production')
@section('subtitle', 'Informations détaillées de l\'ordre')

@section('content')
<div id="production-show">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    OF-2025-001
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Commande: CMD-2025-045
                </p>
            </div>
            <div style="display:flex; gap:12px;">
                <a href="/production" 
                   style="display:inline-flex; align-items:center; gap:8px; 
                          padding:12px 20px; background:white; border:2px solid #e5e7eb; 
                          border-radius:8px; color:#374151; font-size:14px; 
                          font-weight:500; text-decoration:none; cursor:pointer;">
                    ← Retour
                </a>
                <a href="/production/1/edit"
                   style="display:inline-flex; align-items:center; gap:8px; 
                          padding:12px 20px; background:linear-gradient(135deg, #3b82f6, #2563eb); 
                          color:white; border:none; border-radius:8px; font-size:14px; 
                          font-weight:500; text-decoration:none; cursor:pointer;">
                    ✏️ Modifier
                </a>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:2fr 1fr; gap:24px;">
            
            <!-- Main Content -->
            <div>
                
                <!-- Status Card -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                        <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">
                            📊 Statut de production
                        </h2>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:6px 16px; background:#fef3c7; color:#b45309; font-size:13px; font-weight:600; border-radius:20px;">
                            En cours
                        </span>
                    </div>
                    
                    <!-- Progress Bar -->
                    <div style="margin-bottom:20px;">
                        <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:14px;">
                            <span style="color:#6b7280;">Progression</span>
                            <span style="font-weight:600; color:#1f2937;">65%</span>
                        </div>
                        <div style="width:100%; height:8px; background:#f3f4f6; border-radius:4px; overflow:hidden;">
                            <div style="width:65%; height:100%; background:linear-gradient(90deg, #10b981, #059669); border-radius:4px;"></div>
                        </div>
                    </div>

                    <!-- Status Steps -->
                    <div style="display:flex; gap:8px;">
                        <div style="flex:1; height:4px; background:#10b981; border-radius:2px;"></div>
                        <div style="flex:1; height:4px; background:#10b981; border-radius:2px;"></div>
                        <div style="flex:1; height:4px; background:#10b981; border-radius:2px;"></div>
                        <div style="flex:1; height:4px; background:#f3f4f6; border-radius:2px;"></div>
                        <div style="flex:1; height:4px; background:#f3f4f6; border-radius:2px;"></div>
                    </div>
                    <div style="display:flex; justify-content:space-between; margin-top:8px; font-size:12px; color:#6b7280;">
                        <span>Planifié</span>
                        <span>Découpe</span>
                        <span>Assemblage</span>
                        <span>Finition</span>
                        <span>Livraison</span>
                    </div>
                </div>

                <!-- Product Details -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">
                        📦 Produit à fabriquer
                    </h2>
                    
                    <div style="display:flex; gap:20px; margin-bottom:20px;">
                        <div style="width:120px; height:120px; background:#f9fafb; border-radius:12px; 
                                   display:flex; align-items:center; justify-content:center; border:2px solid #e5e7eb;">
                            <span style="font-size:40px;">🪑</span>
                        </div>
                        <div style="flex:1;">
                            <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                                Chaise en bois de chêne
                            </h3>
                            <p style="color:#6b7280; font-size:14px; margin:0 0 12px;">
                                Modèle classique - Finition vernis - Quantité: 2
                            </p>
                            <div style="display:flex; gap:16px;">
                                <div>
                                    <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Prix unitaire</div>
                                    <div style="font-size:16px; font-weight:600; color:#1f2937;">45,000 FCFA</div>
                                </div>
                                <div>
                                    <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Total</div>
                                    <div style="font-size:16px; font-weight:600; color:#1f2937;">90,000 FCFA</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="background:#f9fafb; border-radius:12px; padding:16px; border:1px solid #e5e7eb;">
                        <div style="font-size:13px; color:#6b7280; margin-bottom:8px;">Description</div>
                        <p style="font-size:14px; color:#374151; margin:0;">
                            Chaise en chêne massif avec dossier sculpté à la main. Assise rembourrée en cuir naturel. Pieds coniques avec finition vernis mat.
                        </p>
                    </div>
                </div>

                <!-- Tasks -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                        <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">
                            ✅ Tâches de production
                        </h2>
                        <a href="/production/1/tasks/create"
                           style="padding:8px 16px; background:#10b981; color:white; border:none; 
                                  border-radius:6px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">
                            + Ajouter une tâche
                        </a>
                    </div>

                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div style="display:flex; align-items:center; gap:12px; padding:16px; 
                                   background:#f0fdf4; border-radius:12px; border:1px solid #bbf7d0;">
                            <div style="width:24px; height:24px; background:#10b981; border-radius:50%; 
                                       display:flex; align-items:center; justify-content:center; color:white; font-size:12px;">✓</div>
                            <div style="flex:1;">
                                <div style="font-weight:600; color:#1f2937; font-size:14px;">Découpe des pièces</div>
                                <div style="font-size:12px; color:#6b7280;">Terminé le 10/05/2025</div>
                            </div>
                        </div>

                        <div style="display:flex; align-items:center; gap:12px; padding:16px; 
                                   background:#f0fdf4; border-radius:12px; border:1px solid #bbf7d0;">
                            <div style="width:24px; height:24px; background:#10b981; border-radius:50%; 
                                       display:flex; align-items:center; justify-content:center; color:white; font-size:12px;">✓</div>
                            <div style="flex:1;">
                                <div style="font-weight:600; color:#1f2937; font-size:14px;">Assemblage du cadre</div>
                                <div style="font-size:12px; color:#6b7280;">Terminé le 12/05/2025</div>
                            </div>
                        </div>

                        <div style="display:flex; align-items:center; gap:12px; padding:16px; 
                                   background:#fef3c7; border-radius:12px; border:1px solid #fde68a;">
                            <div style="width:24px; height:24px; background:#f59e0b; border-radius:50%; 
                                       display:flex; align-items:center; justify-content:center; color:white; font-size:12px;">⚙</div>
                            <div style="flex:1;">
                                <div style="font-weight:600; color:#1f2937; font-size:14px;">Finition vernis</div>
                                <div style="font-size:12px; color:#6b7280;">En cours - 80% complété</div>
                            </div>
                        </div>

                        <div style="display:flex; align-items:center; gap:12px; padding:16px; 
                                   background:#f9fafb; border-radius:12px; border:1px solid #e5e7eb;">
                            <div style="width:24px; height:24px; background:#e5e7eb; border-radius:50%; 
                                       display:flex; align-items:center; justify-content:center; color:white; font-size:12px;">○</div>
                            <div style="flex:1;">
                                <div style="font-weight:600; color:#1f2937; font-size:14px;">Contrôle qualité</div>
                                <div style="font-size:12px; color:#6b7280;">En attente</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sidebar -->
            <div>
                
                <!-- Assigned Artisan -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <h2 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px 0;">
                        👤 Artisan assigné
                    </h2>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:48px; height:48px; border-radius:50%; background:#dbeafe; 
                                   display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:600; color:#1e40af;">
                            PM
                        </div>
                        <div>
                            <div style="font-weight:600; color:#1f2937; font-size:15px;">Pierre Martin</div>
                            <div style="font-size:13px; color:#6b7280;">Artisan Menuisier</div>
                        </div>
                    </div>
                </div>

                <!-- Timeline -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <h2 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px 0;">
                        📅 Calendrier
                    </h2>
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        <div>
                            <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Date de début</div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937;">08/05/2025</div>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Date de fin prévue</div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937;">18/05/2025</div>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Jours restants</div>
                            <div style="font-size:15px; font-weight:600; color:#16a34a;">3 jours</div>
                        </div>
                    </div>
                </div>

                <!-- Priority -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <h2 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px 0;">
                        ⚡ Priorité
                    </h2>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:6px 16px; background:#fee2e2; color:#dc2626; font-size:13px; font-weight:600; border-radius:20px;">
                        Urgent
                    </span>
                </div>

                <!-- Materials -->
                <div style="background:white; border-radius:16px; padding:24px; 
                            box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                    <h2 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px 0;">
                        📦 Matériaux
                    </h2>
                    <div style="display:flex; flex-direction:column; gap:8px;">
                        <div style="display:flex; justify-content:space-between; font-size:14px;">
                            <span style="color:#6b7280;">Bois de chêne</span>
                            <span style="font-weight:600; color:#1f2937;">2.5 m²</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; font-size:14px;">
                            <span style="color:#6b7280;">Vernis mat</span>
                            <span style="font-weight:600; color:#1f2937;">0.5 L</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; font-size:14px;">
                            <span style="color:#6b7280;">Visserie</span>
                            <span style="font-weight:600; color:#1f2937;">24 pièces</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
