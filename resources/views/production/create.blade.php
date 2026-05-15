@extends('layouts.dashboard')

@section('title', 'Nouvel Ordre de Production')
@section('subtitle', 'Créer un ordre de fabrication')

@section('content')
<div id="production-create">
    <div style="padding:24px; max-width:1000px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Nouvel Ordre de Production
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Créer un nouvel ordre de fabrication
                </p>
            </div>
            <a href="/production" 
               style="display:inline-flex; align-items:center; gap:8px; 
                      padding:12px 20px; background:white; border:2px solid #e5e7eb; 
                      border-radius:8px; color:#374151; font-size:14px; 
                      font-weight:500; text-decoration:none; cursor:pointer;">
                ← Retour
            </a>
        </div>

        <!-- Create Form -->
        <div style="background:white; border-radius:16px; padding:32px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
            
            <form method="POST" action="/production">
                @csrf

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                    
                    <!-- Order Reference -->
                    <div>
                        <label style="display:block; margin-bottom:8px; 
                                      font-weight:600; color:#374151; font-size:14px;">
                            📋 Commande associée *
                        </label>
                        <select name="order_id"
                                style="width:100%; padding:12px 16px; 
                                       border:2px solid #e5e7eb; border-radius:8px; 
                                       font-size:15px; outline:none; background:white; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#10b981'"
                                onblur="this.style.borderColor='#e5e7eb'">
                            <option value="">Sélectionner une commande</option>
                            <option value="45">CMD-2025-045 - Chaise en bois</option>
                            <option value="46">CMD-2025-046 - Bibliothèque</option>
                            <option value="47">CMD-2025-047 - Table basse</option>
                        </select>
                    </div>

                    <!-- Priority -->
                    <div>
                        <label style="display:block; margin-bottom:8px; 
                                      font-weight:600; color:#374151; font-size:14px;">
                            ⚡ Priorité *
                        </label>
                        <select name="priority"
                                style="width:100%; padding:12px 16px; 
                                       border:2px solid #e5e7eb; border-radius:8px; 
                                       font-size:15px; outline:none; background:white; box-sizing:border-box;"
                                onfocus="this.style.borderColor='#10b981'"
                                onblur="this.style.borderColor='#e5e7eb'">
                            <option value="low">Basse</option>
                            <option value="normal" selected>Normale</option>
                            <option value="high">Haute</option>
                            <option value="urgent">Urgente</option>
                        </select>
                    </div>

                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                    
                    <!-- Start Date -->
                    <div>
                        <label style="display:block; margin-bottom:8px; 
                                      font-weight:600; color:#374151; font-size:14px;">
                            📅 Date de début *
                        </label>
                        <input type="date" name="start_date"
                               style="width:100%; padding:12px 16px; 
                                      border:2px solid #e5e7eb; border-radius:8px; 
                                      font-size:15px; outline:none; box-sizing:border-box;"
                               onfocus="this.style.borderColor='#10b981'"
                               onblur="this.style.borderColor='#e5e7eb'">
                    </div>

                    <!-- End Date -->
                    <div>
                        <label style="display:block; margin-bottom:8px; 
                                      font-weight:600; color:#374151; font-size:14px;">
                            📅 Date de fin prévue *
                        </label>
                        <input type="date" name="end_date"
                               style="width:100%; padding:12px 16px; 
                                      border:2px solid #e5e7eb; border-radius:8px; 
                                      font-size:15px; outline:none; box-sizing:border-box;"
                               onfocus="this.style.borderColor='#10b981'"
                               onblur="this.style.borderColor='#e5e7eb'">
                    </div>

                </div>

                <!-- Assigned Artisan -->
                <div style="margin-bottom:24px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        👤 Artisan assigné *
                    </label>
                    <select name="assigned_to"
                            style="width:100%; padding:12px 16px; 
                                   border:2px solid #e5e7eb; border-radius:8px; 
                                   font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Sélectionner un artisan</option>
                        <option value="1">Pierre Martin - Artisan Menuisier</option>
                        <option value="2">Jean Dupont - Artisan Ébéniste</option>
                        <option value="3">Marie Laurent - Artisane Finition</option>
                    </select>
                </div>

                <!-- Status -->
                <div style="margin-bottom:24px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut initial *
                    </label>
                    <select name="status"
                            style="width:100%; padding:12px 16px; 
                                   border:2px solid #e5e7eb; border-radius:8px; 
                                   font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="planning" selected>Planifié</option>
                        <option value="in_progress">En cours</option>
                        <option value="on_hold">En attente</option>
                    </select>
                </div>

                <!-- Estimated Hours -->
                <div style="margin-bottom:24px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        ⏱️ Heures estimées
                    </label>
                    <input type="number" name="estimated_hours" placeholder="Ex: 8"
                           style="width:100%; padding:12px 16px; 
                                  border:2px solid #e5e7eb; border-radius:8px; 
                                  font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='#10b981'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <!-- Notes -->
                <div style="margin-bottom:32px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        📝 Notes / Instructions
                    </label>
                    <textarea name="notes" rows="4" 
                              placeholder="Instructions spéciales pour la fabrication..."
                              style="width:100%; padding:12px 16px; 
                                     border:2px solid #e5e7eb; border-radius:8px; 
                                     font-size:15px; outline:none; resize:vertical; 
                                     box-sizing:border-box; font-family:inherit;"
                              onfocus="this.style.borderColor='#10b981'"
                              onblur="this.style.borderColor='#e5e7eb'"></textarea>
                </div>

                <!-- Materials Preview -->
                <div style="background:#f9fafb; border-radius:12px; padding:20px; 
                            margin-bottom:32px; border:1px solid #e5e7eb;">
                    <h3 style="font-size:16px; font-weight:600; color:#1f2937; margin:0 0 16px 0;">
                        📦 Matériaux requis (estimé)
                    </h3>
                    <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:12px;">
                        <div style="padding:12px; background:white; border-radius:8px; border:1px solid #e5e7eb;">
                            <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Bois de chêne</div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937;">2.5 m²</div>
                        </div>
                        <div style="padding:12px; background:white; border-radius:8px; border:1px solid #e5e7eb;">
                            <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Vernis mat</div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937;">0.5 L</div>
                        </div>
                        <div style="padding:12px; background:white; border-radius:8px; border:1px solid #e5e7eb;">
                            <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Visserie</div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937;">24 pièces</div>
                        </div>
                        <div style="padding:12px; background:white; border-radius:8px; border:1px solid #e5e7eb;">
                            <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Colle bois</div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937;">0.2 kg</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display:flex; gap:12px; justify-content:flex-end;">
                    <a href="/production" 
                       style="padding:12px 24px; background:white; border:2px solid #e5e7eb; 
                              border-radius:8px; color:#374151; font-size:14px; 
                              font-weight:500; text-decoration:none; cursor:pointer;">
                        Annuler
                    </a>
                    <button type="submit"
                            style="padding:12px 24px; background:linear-gradient(135deg, #10b981, #059669); 
                                   color:white; border:none; border-radius:8px; font-size:14px; 
                                   font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                        ➕ Créer l'ordre de production
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
