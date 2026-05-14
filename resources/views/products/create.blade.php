@extends('layouts.dashboard')

@section('content')
<div id="products-create">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Ajouter un Produit
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Créer un nouveau produit dans le catalogue
                </p>
            </div>
            <a href="{{ route('products.index') }}"
                style="display:flex; align-items:center; gap:8px;
                       padding:10px 18px; background:#6b7280;
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
                ← Retour
            </a>
        </div>

        <!-- Formulaire -->
        <div style="background:white; border-radius:12px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:32px;">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

            <!-- Nom du produit -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Nom du produit *
                </label>
                <input type="text" name="product_name"
                    placeholder="Entrez le nom du produit"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Référence -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Référence *
                </label>
                <input type="text" name="product_reference"
                    placeholder="REF-XXXX"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Catégorie + Prix -->
            <div style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Catégorie *
                    </label>
                    <select name="product_category"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;">
                        <option value="">Sélectionner...</option>
                        <option value="furniture">Meubles</option>
                        <option value="windows">Fenêtres</option>
                        <option value="doors">Portes</option>
                        <option value="accessories">Accessoires</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Prix (FCFA) *
                    </label>
                    <input type="number" name="product_price"
                        placeholder="0"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <!-- Stock actuel + min + max -->
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Stock actuel
                    </label>
                    <input type="number" name="current_stock"
                        placeholder="0"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box; outline:none;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Stock minimum
                    </label>
                    <input type="number" name="min_stock"
                        placeholder="0"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box; outline:none;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Stock maximum
                    </label>
                    <input type="number" name="max_stock"
                        placeholder="100"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box; outline:none;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <!-- Description -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Description
                </label>
                <textarea name="product_description" rows="4"
                    placeholder="Décrivez le produit..."
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; resize:vertical;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'"></textarea>
            </div>

            <!-- Image -->
            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Image du produit
                </label>
                <input type="file" name="product_image" accept="image/*"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:14px; box-sizing:border-box;
                           background:#f9fafb;">
            </div>

            <!-- Options -->
            <div style="display:flex; gap:24px; margin-bottom:24px; flex-wrap:wrap;">
                <label style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                    <input type="checkbox" name="is_active" checked
                        style="width:18px; height:18px; cursor:pointer;">
                    ✅ Produit actif
                </label>
                <label style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                    <input type="checkbox" name="is_featured"
                        style="width:18px; height:18px; cursor:pointer;">
                    ⭐ Produit en vedette
                </label>
                <label style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                    <input type="checkbox" name="track_stock" checked
                        style="width:18px; height:18px; cursor:pointer;">
                    📦 Suivre le stock
                </label>
            </div>

            <!-- Boutons -->
            <div style="display:flex; gap:15px; padding-top:24px;
                        border-top:1px solid #e5e7eb; justify-content:flex-end;">
                <a href="{{ route('products.index') }}"
                    style="display:inline-flex; align-items:center; justify-content:center;
                           padding:12px 28px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer; text-decoration:none;">
                    Annuler
                </a>
                <button type="submit"
                    style="padding:12px 28px;
                           background:linear-gradient(135deg, #10b981, #059669);
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer;
                           box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                    💾 Enregistrer le produit
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection