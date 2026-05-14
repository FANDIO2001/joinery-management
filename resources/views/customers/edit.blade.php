@extends('layouts.dashboard')

@section('content')
<div id="customers-edit">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Modifier un Client
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Mettre à jour les informations du client
                </p>
            </div>
            <button onclick="window.location.href='/customers'"
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

            <!-- Type de client -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Type de client *
                </label>
                <select name="customer_type"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; background:white;">
                    <option value="">Sélectionner...</option>
                    <option value="individual" selected>Particulier</option>
                    <option value="business">Entreprise</option>
                </select>
            </div>

            <!-- Nom complet -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Nom complet *
                </label>
                <input type="text" name="customer_name" value="Jean Dupont"
                    placeholder="Entrez le nom du client"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Email + Téléphone -->
            <div style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Email *
                    </label>
                    <input type="email" name="customer_email" value="jean.dupont@email.com"
                        placeholder="client@email.com"
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
                        Téléphone *
                    </label>
                    <input type="tel" name="customer_phone" value="+237 699 123 456"
                        placeholder="+237 699 123 456"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <!-- Adresse -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Adresse
                </label>
                <input type="text" name="customer_address" value="123 Rue de la République"
                    placeholder="Adresse complète"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Ville + Pays -->
            <div style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Ville
                    </label>
                    <input type="text" name="customer_city" value="Douala"
                        placeholder="Douala"
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
                        Pays
                    </label>
                    <input type="text" name="customer_country" value="Cameroun"
                        placeholder="Cameroun"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <!-- Notes -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Notes
                </label>
                <textarea name="customer_notes" rows="4"
                    placeholder="Informations supplémentaires..."
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; resize:vertical;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">Client fidèle, préfère les paiements Mobile Money</textarea>
            </div>

            <!-- Options -->
            <div style="display:flex; gap:24px; margin-bottom:24px; flex-wrap:wrap;">
                <label style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                    <input type="checkbox" name="is_active" checked
                        style="width:18px; height:18px; cursor:pointer;">
                    ✅ Client actif
                </label>
            </div>

            <!-- Boutons -->
            <div style="display:flex; gap:15px; padding-top:24px;
                        border-top:1px solid #e5e7eb; justify-content:flex-end;">
                <button onclick="window.location.href='/customers'"
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
