@extends('layouts.dashboard')

@section('content')
<div id="orders-edit">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Modifier la Commande
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Mettre à jour la commande CMD-2024-001
                </p>
            </div>
            <button onclick="window.location.href='/orders'"
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

            <!-- Client -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Client *
                </label>
                <select name="order_customer"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; background:white;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
                    <option value="">Sélectionner un client...</option>
                    <option value="1" selected>Jean Dupont</option>
                    <option value="2">Marie Kouassi</option>
                </select>
            </div>

            <!-- Date de commande -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Date de commande *
                </label>
                <input type="date" name="order_date" value="2024-04-05"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Date de livraison souhaitée -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Date de livraison souhaitée
                </label>
                <input type="date" name="order_delivery_date" value="2024-04-20"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Statut -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Statut *
                </label>
                <select name="order_status"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; background:white;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
                    <option value="pending">En attente</option>
                    <option value="processing" selected>En cours</option>
                    <option value="completed">Terminée</option>
                    <option value="cancelled">Annulée</option>
                </select>
            </div>

            <!-- Notes -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Notes
                </label>
                <textarea name="order_notes" rows="4"
                    placeholder="Informations supplémentaires..."
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; resize:vertical;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">Client préfère livraison le samedi matin</textarea>
            </div>

            <!-- Boutons -->
            <div style="display:flex; gap:15px; padding-top:24px;
                        border-top:1px solid #e5e7eb; justify-content:flex-end;">
                <button onclick="window.location.href='/orders'"
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
