@extends('layouts.dashboard')

@section('content')
<div id="stocks-edit">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Modifier le Stock
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Mettre à jour le stock
                </p>
            </div>
            <button onclick="window.location.href='/stocks'"
                style="display:flex; align-items:center; gap:8px;
                       padding:10px 18px; background:#6b7280;
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;">
                ← Retour
            </button>
        </div>

        <!-- Formulaire -->
        <div style="background:white; border-radius:12px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:32px;">

            <!-- Nom -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Nom *
                </label>
                <input type="text" name="stock_name" value="Chêne massif"
                    placeholder="Chêne massif"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Type -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Type *
                </label>
                <select name="stock_type"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; background:white;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
                    <option value="">Sélectionner...</option>
                    <option value="material" selected>Matière première</option>
                    <option value="product">Produit fini</option>
                    <option value="accessory">Accessoire</option>
                </select>
            </div>

            <!-- Quantité + Unité -->
            <div style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Quantité *
                    </label>
                    <input type="number" name="stock_quantity" value="150"
                        placeholder="150"
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
                        Unité *
                    </label>
                    <select name="stock_unit"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Sélectionner...</option>
                        <option value="m²" selected>m²</option>
                        <option value="kg">kg</option>
                        <option value="unité">unité</option>
                        <option value="litre">litre</option>
                    </select>
                </div>
            </div>

            <!-- Seuil d'alerte -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Seuil d'alerte
                </label>
                <input type="number" name="stock_threshold" value="20"
                    placeholder="20"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Emplacement -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Emplacement
                </label>
                <input type="text" name="stock_location" value="Entrepôt A, Rayon 3"
                    placeholder="Entrepôt A, Rayon 3"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Notes -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Notes
                </label>
                <textarea name="stock_notes" rows="4"
                    placeholder="Informations supplémentaires..."
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; resize:vertical;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">Bois de qualité premium</textarea>
            </div>

            <!-- Boutons -->
            <div style="display:flex; gap:15px; padding-top:24px;
                        border-top:1px solid #e5e7eb; justify-content:flex-end;">
                <button onclick="window.location.href='/stocks'"
                    style="padding:12px 28px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer;">
                    Annuler
                </button>
                <button type="button"
                    onclick="alert('Modification enregistrée - À connecter avec Laravel')"
                    style="padding:12px 28px;
                           background:linear-gradient(135deg, #10b981, #059669);
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer;
                           box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                    💾 Enregistrer les modifications
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
