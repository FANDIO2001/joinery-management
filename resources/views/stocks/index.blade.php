@extends('layouts.dashboard')

@section('content')
<div id="stocks-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Liste des Stocks
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les stocks de matières et produits
                </p>
            </div>
            <button onclick="window.location.href='/stocks/create'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                ➕ Nouveau Stock
            </button>
        </div>

        <!-- Search and Filters -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" id="search" name="search"
                        placeholder="Nom, référence..."
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📦 Type
                    </label>
                    <select id="type" name="type"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les types</option>
                        <option value="material">Matière première</option>
                        <option value="product">Produit fini</option>
                        <option value="accessory">Accessoire</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📊 État du stock
                    </label>
                    <select id="status" name="status"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les états</option>
                        <option value="in-stock">En stock</option>
                        <option value="low-stock">Stock faible</option>
                        <option value="out-of-stock">Rupture</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Stocks Table -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; overflow:hidden;">
            
            <!-- Table Header -->
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">NOM</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">TYPE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">QUANTITÉ</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">UNITÉ</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ÉTAT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ACTIONS</div>
                </div>
            </div>

            <!-- Stock Rows -->
            <div style="padding:0;">
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Chêne massif</div>
                    <div style="font-size:14px; color:#374151;">Matière première</div>
                    <div style="font-size:14px; color:#374151; font-weight:600;">150</div>
                    <div style="font-size:14px; color:#374151;">m²</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:20px;">
                            <div style="width:6px; height:6px; background:#22c55e; border-radius:50%;"></div>
                            En stock
                        </span>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="window.location.href='/stocks/1'"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            👁️ Voir
                        </button>
                        <button onclick="window.location.href='/stocks/1/edit'"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            ✏️ Modifier
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
