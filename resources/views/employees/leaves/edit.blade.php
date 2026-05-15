@extends('layouts.dashboard')

@section('title', 'Modifier Congé')
@section('subtitle', 'Mettre à jour la demande de congé')

@section('content')
<div id="employees-leaves-edit">
    <div style="padding:24px; max-width:1000px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Modifier le Congé
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Employé: {{ $employee->name ?? 'Pierre Martin' }}
                </p>
            </div>
            <a href="/employees/{{ $employeeId ?? 1 }}/leaves" 
               style="display:inline-flex; align-items:center; gap:8px; 
                      padding:12px 20px; background:white; border:2px solid #e5e7eb; 
                      border-radius:8px; color:#374151; font-size:14px; 
                      font-weight:500; text-decoration:none; cursor:pointer;">
                ← Retour
            </a>
        </div>

        <!-- Edit Form -->
        <div style="background:white; border-radius:16px; padding:32px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
            
            <form method="POST" action="/employees/{{ $employeeId ?? 1 }}/leaves/{{ $leaveId ?? 1 }}">
                @csrf
                @method('PUT')

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                    
                    <!-- Start Date -->
                    <div>
                        <label style="display:block; margin-bottom:8px; 
                                      font-weight:600; color:#374151; font-size:14px;">
                            📅 Date de début *
                        </label>
                        <input type="date" name="start_date" value="2025-06-01"
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
                            📅 Date de fin *
                        </label>
                        <input type="date" name="end_date" value="2025-06-10"
                               style="width:100%; padding:12px 16px; 
                                      border:2px solid #e5e7eb; border-radius:8px; 
                                      font-size:15px; outline:none; box-sizing:border-box;"
                               onfocus="this.style.borderColor='#10b981'"
                               onblur="this.style.borderColor='#e5e7eb'">
                    </div>

                </div>

                <!-- Leave Type -->
                <div style="margin-bottom:24px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        🏷️ Type de congé *
                    </label>
                    <select name="leave_type"
                            style="width:100%; padding:12px 16px; 
                                   border:2px solid #e5e7eb; border-radius:8px; 
                                   font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="annual">Congé annuel</option>
                        <option value="sick">Congé maladie</option>
                        <option value="maternity">Congé maternité/paternité</option>
                        <option value="unpaid">Sans solde</option>
                        <option value="recovery">Récupération</option>
                    </select>
                </div>

                <!-- Reason -->
                <div style="margin-bottom:24px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        📝 Motif
                    </label>
                    <textarea name="reason" rows="4" 
                              placeholder="Expliquez la raison de ce congé..."
                              style="width:100%; padding:12px 16px; 
                                     border:2px solid #e5e7eb; border-radius:8px; 
                                     font-size:15px; outline:none; resize:vertical; 
                                     box-sizing:border-box; font-family:inherit;"
                              onfocus="this.style.borderColor='#10b981'"
                              onblur="this.style.borderColor='#e5e7eb'">Congé personnel pour raisons familiales</textarea>
                </div>

                <!-- Status -->
                <div style="margin-bottom:32px;">
                    <label style="display:block; margin-bottom:8px; 
                                  font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut
                    </label>
                    <select name="status"
                            style="width:100%; padding:12px 16px; 
                                   border:2px solid #e5e7eb; border-radius:8px; 
                                   font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="pending">En attente</option>
                        <option value="approved">Approuvé</option>
                        <option value="rejected">Refusé</option>
                        <option value="cancelled">Annulé</option>
                    </select>
                </div>

                <!-- Leave Info Card -->
                <div style="background:#f9fafb; border-radius:12px; padding:20px; 
                            margin-bottom:32px; border:1px solid #e5e7eb;">
                    <h3 style="font-size:16px; font-weight:600; color:#1f2937; margin:0 0 16px 0;">
                        Informations sur le congé
                    </h3>
                    <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px;">
                        <div>
                            <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Durée totale</div>
                            <div style="font-size:18px; font-weight:700; color:#1f2937;">10 jours</div>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Solde restant</div>
                            <div style="font-size:18px; font-weight:700; color:#16a34a;">15 jours</div>
                        </div>
                        <div>
                            <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Jours ouvrés</div>
                            <div style="font-size:18px; font-weight:700; color:#1f2937;">8 jours</div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display:flex; gap:12px; justify-content:flex-end;">
                    <a href="/employees/{{ $employeeId ?? 1 }}/leaves" 
                       style="padding:12px 24px; background:white; border:2px solid #e5e7eb; 
                              border-radius:8px; color:#374151; font-size:14px; 
                              font-weight:500; text-decoration:none; cursor:pointer;">
                        Annuler
                    </a>
                    <button type="submit"
                            style="padding:12px 24px; background:linear-gradient(135deg, #10b981, #059669); 
                                   color:white; border:none; border-radius:8px; font-size:14px; 
                                   font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                        💾 Enregistrer les modifications
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
