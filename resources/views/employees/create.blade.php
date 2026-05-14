@extends('layouts.dashboard')

@section('content')
<div id="employees-create">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Ajouter un Employé
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Créer un nouveau profil employé
                </p>
            </div>
            <button onclick="window.location.href='/employees'"
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

            <!-- Nom complet -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Nom complet *
                </label>
                <input type="text" name="employee_name"
                    placeholder="Entrez le nom de l'employé"
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
                    <input type="email" name="employee_email"
                        placeholder="employe@email.com"
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
                    <input type="tel" name="employee_phone"
                        placeholder="+237 698 234 567"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <!-- Poste + Département -->
            <div style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        Poste *
                    </label>
                    <input type="text" name="employee_position"
                        placeholder="Artisan Menuisier"
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
                        Département *
                    </label>
                    <select name="employee_department"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;">
                        <option value="">Sélectionner...</option>
                        <option value="production">Production</option>
                        <option value="sales">Ventes</option>
                        <option value="logistics">Logistique</option>
                        <option value="admin">Administration</option>
                    </select>
                </div>
            </div>

            <!-- Salaire -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Salaire mensuel (FCFA) *
                </label>
                <input type="number" name="employee_salary"
                    placeholder="150000"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Adresse -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Adresse
                </label>
                <input type="text" name="employee_address"
                    placeholder="Adresse complète"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Date d'embauche -->
            <div style="margin-bottom:20px;">
                <label style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                    Date d'embauche *
                </label>
                <input type="date" name="employee_hire_date"
                    style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Options -->
            <div style="display:flex; gap:24px; margin-bottom:24px; flex-wrap:wrap;">
                <label style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                    <input type="checkbox" name="is_active" checked
                        style="width:18px; height:18px; cursor:pointer;">
                    ✅ Employé actif
                </label>
                <label style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                    <input type="checkbox" name="send_welcome_email"
                        style="width:18px; height:18px; cursor:pointer;">
                    📧 Envoyer email de bienvenue
                </label>
            </div>

            <!-- Boutons -->
            <div style="display:flex; gap:15px; padding-top:24px;
                        border-top:1px solid #e5e7eb; justify-content:flex-end;">
                <button onclick="window.location.href='/employees'"
                    style="padding:12px 28px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer;">
                    Annuler
                </button>
                <button type="button"
                    onclick="alert('Employé enregistré - À connecter avec Laravel')"
                    style="padding:12px 28px;
                           background:linear-gradient(135deg, #10b981, #059669);
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer;
                           box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                    💾 Enregistrer l'employé
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
