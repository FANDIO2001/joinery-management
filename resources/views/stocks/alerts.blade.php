@extends('layouts.dashboard')

@section('title', 'Alertes Stock')
@section('subtitle', 'Notifications de rupture de stock')

@section('content')
<div id="stocks-alerts">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Alertes Stock
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les notifications de rupture de stock
                </p>
            </div>
            <button onclick="window.location.href='/stocks'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:white; border:2px solid #e5e7eb; 
                       border-radius:8px; color:#374151; font-size:14px; 
                       font-weight:500; cursor:pointer;">
                ← Voir tout le stock
            </button>
        </div>

        <!-- Stats Cards -->
        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fee2e2; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">🚨</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Critique</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#dc2626; margin-bottom:8px;">5</div>
                <div style="font-size:13px; color:#dc2626;">Stock épuisé</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">⚠️</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Faible</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#f59e0b; margin-bottom:8px;">12</div>
                <div style="font-size:13px; color:#f59e0b;">En dessous du seuil</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">📦</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">À commander</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#3b82f6; margin-bottom:8px;">8</div>
                <div style="font-size:13px; color:#3b82f6;">En attente de livraison</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">✅</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Réapprovisionnés</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#16a34a; margin-bottom:8px;">23</div>
                <div style="font-size:13px; color:#16a34a;">Ce mois</div>
            </div>
        </div>

        <!-- Critical Alerts -->
        <div style="background:white; border-radius:16px; padding:24px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <h2 style="font-size:18px; font-weight:700; color:#dc2626; margin:0;">
                    🚨 Alertes Critiques (Stock épuisé)
                </h2>
                <span style="padding:6px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:20px;">
                    5 articles
                </span>
            </div>

            <div style="display:grid; gap:12px;">
                <div style="display:flex; align-items:center; gap:16px; padding:16px; 
                           background:#fef2f2; border-radius:12px; border:1px solid #fecaca;">
                    <div style="width:50px; height:50px; background:white; border-radius:10px; 
                               display:flex; align-items:center; justify-content:center; font-size:24px;">🪵</div>
                    <div style="flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                            <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Bois de chêne</h3>
                            <span style="font-size:13px; font-weight:700; color:#dc2626;">0 m²</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                            <span style="color:#6b7280;">Seuil minimum: 10 m²</span>
                            <span style="color:#dc2626; font-weight:600;">-100%</span>
                        </div>
                    </div>
                    <button style="padding:8px 16px; background:#dc2626; color:white; border:none; 
                                   border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Commander
                    </button>
                </div>

                <div style="display:flex; align-items:center; gap:16px; padding:16px; 
                           background:#fef2f2; border-radius:12px; border:1px solid #fecaca;">
                    <div style="width:50px; height:50px; background:white; border-radius:10px; 
                               display:flex; align-items:center; justify-content:center; font-size:24px;">🎨</div>
                    <div style="flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                            <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Vernis mat</h3>
                            <span style="font-size:13px; font-weight:700; color:#dc2626;">0 L</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                            <span style="color:#6b7280;">Seuil minimum: 5 L</span>
                            <span style="color:#dc2626; font-weight:600;">-100%</span>
                        </div>
                    </div>
                    <button style="padding:8px 16px; background:#dc2626; color:white; border:none; 
                                   border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Commander
                    </button>
                </div>
            </div>
        </div>

        <!-- Low Stock Alerts -->
        <div style="background:white; border-radius:16px; padding:24px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <h2 style="font-size:18px; font-weight:700; color:#f59e0b; margin:0;">
                    ⚠️ Stock Faible (En dessous du seuil)
                </h2>
                <span style="padding:6px 12px; background:#fef3c7; color:#b45309; font-size:12px; font-weight:600; border-radius:20px;">
                    12 articles
                </span>
            </div>

            <div style="display:grid; gap:12px;">
                <div style="display:flex; align-items:center; gap:16px; padding:16px; 
                           background:#fffbeb; border-radius:12px; border:1px solid #fde68a;">
                    <div style="width:50px; height:50px; background:white; border-radius:10px; 
                               display:flex; align-items:center; justify-content:center; font-size:24px;">🔩</div>
                    <div style="flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                            <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Visserie</h3>
                            <span style="font-size:13px; font-weight:700; color:#f59e0b;">15 pièces</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                            <span style="color:#6b7280;">Seuil minimum: 50 pièces</span>
                            <span style="color:#f59e0b; font-weight:600;">-70%</span>
                        </div>
                    </div>
                    <button style="padding:8px 16px; background:#f59e0b; color:white; border:none; 
                                   border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Commander
                    </button>
                </div>

                <div style="display:flex; align-items:center; gap:16px; padding:16px; 
                           background:#fffbeb; border-radius:12px; border:1px solid #fde68a;">
                    <div style="width:50px; height:50px; background:white; border-radius:10px; 
                               display:flex; align-items:center; justify-content:center; font-size:24px;">🧴</div>
                    <div style="flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items-center; margin-bottom:4px;">
                            <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Colle bois</h3>
                            <span style="font-size:13px; font-weight:700; color:#f59e0b;">0.8 kg</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                            <span style="color:#6b7280;">Seuil minimum: 5 kg</span>
                            <span style="color:#f59e0b; font-weight:600;">-84%</span>
                        </div>
                    </div>
                    <button style="padding:8px 16px; background:#f59e0b; color:white; border:none; 
                                   border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Commander
                    </button>
                </div>
            </div>
        </div>

        <!-- Pending Orders -->
        <div style="background:white; border-radius:16px; padding:24px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <h2 style="font-size:18px; font-weight:700; color:#3b82f6; margin:0;">
                    📦 Commandes en attente de livraison
                </h2>
                <span style="padding:6px 12px; background:#dbeafe; color:#1e40af; font-size:12px; font-weight:600; border-radius:20px;">
                    8 commandes
                </span>
            </div>

            <div style="display:grid; gap:12px;">
                <div style="display:flex; align-items:center; gap:16px; padding:16px; 
                           background:#eff6ff; border-radius:12px; border:1px solid #bfdbfe;">
                    <div style="width:50px; height:50px; background:white; border-radius:10px; 
                               display:flex; align-items:center; justify-content:center; font-size:24px;">🪵</div>
                    <div style="flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                            <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Bois de merisier</h3>
                            <span style="font-size:13px; font-weight:700; color:#3b82f6;">CMD-2025-089</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                            <span style="color:#6b7280;">Quantité: 15 m²</span>
                            <span style="color:#3b82f6; font-weight:600;">Livraison prévue: 18/05/2025</span>
                        </div>
                    </div>
                </div>

                <div style="display:flex; align-items:center; gap:16px; padding:16px; 
                           background:#eff6ff; border-radius:12px; border:1px solid #bfdbfe;">
                    <div style="width:50px; height:50px; background:white; border-radius:10px; 
                               display:flex; align-items:center; justify-content:center; font-size:24px;">🔩</div>
                    <div style="flex:1;">
                        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:4px;">
                            <h3 style="font-size:15px; font-weight:600; color:#1f2937; margin:0;">Charnières</h3>
                            <span style="font-size:13px; font-weight:700; color:#3b82f6;">CMD-2025-090</span>
                        </div>
                        <div style="display:flex; justify-content:space-between; align-items:center; font-size:13px;">
                            <span style="color:#6b7280;">Quantité: 100 pièces</span>
                            <span style="color:#3b82f6; font-weight:600;">Livraison prévue: 20/05/2025</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
