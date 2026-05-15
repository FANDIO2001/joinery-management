@extends('layouts.dashboard')

@section('title', 'Matériaux')
@section('subtitle', 'Gestion des matériaux et fournitures')

@section('content')
<div id="stocks-materials">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Matériaux
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les matériaux et fournitures
                </p>
            </div>
            <button onclick="window.location.href='/stocks/create'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                ➕ Nouveau Matériau
            </button>
        </div>

        <!-- Stats Cards -->
        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">🪵</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Bois</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">8</div>
                <div style="font-size:13px; color:#6b7280;">Types disponibles</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">🎨</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Finitions</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">12</div>
                <div style="font-size:13px; color:#6b7280;">Types disponibles</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">🔩</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Quincaillerie</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">15</div>
                <div style="font-size:13px; color:#6b7280;">Types disponibles</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fce7f3; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">🧴</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Divers</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">6</div>
                <div style="font-size:13px; color:#6b7280;">Types disponibles</div>
            </div>
        </div>

        <!-- Filters -->
        <div style="background:white; border-radius:16px; padding:24px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" placeholder="Nom, référence..."
                           style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                  border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='#10b981'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📂 Catégorie
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Toutes les catégories</option>
                        <option value="wood">Bois</option>
                        <option value="finish">Finitions</option>
                        <option value="hardware">Quincaillerie</option>
                        <option value="other">Divers</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les statuts</option>
                        <option value="in_stock">En stock</option>
                        <option value="low_stock">Stock faible</option>
                        <option value="out_of_stock">Rupture</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Materials Grid -->
        <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:24px;">
            
            <!-- Material Card 1 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div style="width:60px; height:60px; background:#dbeafe; border-radius:12px; 
                               display:flex; align-items:center; justify-content:center; font-size:28px;">🪵</div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:11px; font-weight:600; border-radius:20px;">
                        En stock
                    </span>
                </div>
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                    Bois de chêne
                </h3>
                <p style="color:#6b7280; font-size:14px; margin:0 0 16px;">
                    Bois massif de qualité premium
                </p>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Stock actuel</span>
                    <span style="font-weight:600; color:#1f2937;">45 m²</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Prix unitaire</span>
                    <span style="font-weight:600; color:#1f2937;">15,000 FCFA/m²</span>
                </div>
                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/stocks/1'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/stocks/1/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Material Card 2 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div style="width:60px; height:60px; background:#dcfce7; border-radius:12px; 
                               display:flex; align-items:center; justify-content:center; font-size:28px;">🎨</div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#b45309; font-size:11px; font-weight:600; border-radius:20px;">
                        Stock faible
                    </span>
                </div>
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                    Vernis mat
                </h3>
                <p style="color:#6b7280; font-size:14px; margin:0 0 16px;">
                    Vernis polyuréthane mat de haute qualité
                </p>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Stock actuel</span>
                    <span style="font-weight:600; color:#f59e0b;">2.5 L</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Prix unitaire</span>
                    <span style="font-weight:600; color:#1f2937;">8,000 FCFA/L</span>
                </div>
                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/stocks/2'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/stocks/2/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Material Card 3 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div style="width:60px; height:60px; background:#fef3c7; border-radius:12px; 
                               display:flex; align-items:center; justify-content:center; font-size:28px;">🔩</div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:11px; font-weight:600; border-radius:20px;">
                        En stock
                    </span>
                </div>
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                    Visserie
                </h3>
                <p style="color:#6b7280; font-size:14px; margin:0 0 16px;">
                    Vis à bois assorties (4mm x 40mm)
                </p>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Stock actuel</span>
                    <span style="font-weight:600; color:#1f2937;">500 pièces</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Prix unitaire</span>
                    <span style="font-weight:600; color:#1f2937;">50 FCFA/pièce</span>
                </div>
                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/stocks/3'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/stocks/3/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Material Card 4 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div style="width:60px; height:60px; background:#fce7f3; border-radius:12px; 
                               display:flex; align-items:center; justify-content:center; font-size:28px;">🧴</div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:11px; font-weight:600; border-radius:20px;">
                        Rupture
                    </span>
                </div>
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                    Colle bois
                </h3>
                <p style="color:#6b7280; font-size:14px; margin:0 0 16px;">
                    Colle vinylique pour bois
                </p>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Stock actuel</span>
                    <span style="font-weight:600; color:#dc2626;">0 kg</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Prix unitaire</span>
                    <span style="font-weight:600; color:#1f2937;">12,000 FCFA/kg</span>
                </div>
                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/stocks/4'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/stocks/4/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Material Card 5 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div style="width:60px; height:60px; background:#dbeafe; border-radius:12px; 
                               display:flex; align-items:center; justify-content:center; font-size:28px;">🪵</div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:11px; font-weight:600; border-radius:20px;">
                        En stock
                    </span>
                </div>
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                    Bois de merisier
                </h3>
                <p style="color:#6b7280; font-size:14px; margin:0 0 16px;">
                    Bois de merisier sélection
                </p>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Stock actuel</span>
                    <span style="font-weight:600; color:#1f2937;">32 m²</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Prix unitaire</span>
                    <span style="font-weight:600; color:#1f2937;">18,000 FCFA/m²</span>
                </div>
                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/stocks/5'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/stocks/5/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Material Card 6 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div style="width:60px; height:60px; background:#fef3c7; border-radius:12px; 
                               display:flex; align-items:center; justify-content:center; font-size:28px;">🔗</div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:11px; font-weight:600; border-radius:20px;">
                        En stock
                    </span>
                </div>
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                    Charnières
                </h3>
                <p style="color:#6b7280; font-size:14px; margin:0 0 16px;">
                    Charnières à piano 50mm
                </p>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Stock actuel</span>
                    <span style="font-weight:600; color:#1f2937;">200 pièces</span>
                </div>
                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:14px;">
                    <span style="color:#6b7280;">Prix unitaire</span>
                    <span style="font-weight:600; color:#1f2937;">150 FCFA/pièce</span>
                </div>
                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/stocks/6'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/stocks/6/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
