@extends('layouts.dashboard')

@section('title', 'Nouvelle Demande de Congé')
@section('subtitle', 'Créer une demande de congé')

@section('content')
<div id="employees-leave-create">
    <div style="padding:24px; max-width:1000px; margin:0 auto;">
        
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Nouvelle Demande de Congé</h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">Créer une nouvelle demande de congé</p>
            </div>
            <a href="/employees/leaves" style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">← Retour</a>
        </div>

        <form method="POST" action="/employees/leaves" style="background:white; border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
            @csrf

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Employé</label>
                    <select name="employee_id" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Sélectionner un employé</option>
                        <option value="1">Pierre Martin</option>
                        <option value="2">Marie Laurent</option>
                        <option value="3">Jean Dupont</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Type de congé</label>
                    <select name="leave_type" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Sélectionner le type</option>
                        <option value="annual">Congé annuel</option>
                        <option value="sick">Maladie</option>
                        <option value="family">Congé familial</option>
                        <option value="unpaid">Sans solde</option>
                        <option value="other">Autre</option>
                    </select>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Date de début</label>
                    <input type="date" name="start_date" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Date de fin</label>
                    <input type="date" name="end_date" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Motif</label>
                <textarea name="reason" rows="4" placeholder="Expliquer la raison de votre demande..." style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box; resize:vertical;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'"></textarea>
            </div>

            <div style="background:#f9fafb; border-radius:12px; padding:20px; margin-bottom:24px; border:1px solid #e5e7eb;">
                <h3 style="font-size:16px; font-weight:600; color:#1f2937; margin:0 0 16px 0;">📊 Solde de congés</h3>
                <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px;">
                    <div>
                        <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Congés annuels</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">18 jours</div>
                    </div>
                    <div>
                        <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Utilisés</div>
                        <div style="font-size:18px; font-weight:700; color:#f59e0b;">5 jours</div>
                    </div>
                    <div>
                        <div style="font-size:13px; color:#6b7280; margin-bottom:4px;">Restants</div>
                        <div style="font-size:18px; font-weight:700; color:#16a34a;">13 jours</div>
                    </div>
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:flex; align-items:center; gap:8px; font-size:14px; color:#374151;">
                    <input type="checkbox" name="notify_manager" style="width:18px; height:18px; accent-color:#10b981;">
                    <span>Notifier le manager par email</span>
                </label>
            </div>

            <div style="display:flex; gap:12px; justify-content:flex-end;">
                <a href="/employees/leaves" style="padding:12px 24px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">Annuler</a>
                <button type="submit" style="padding:12px 24px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">Envoyer la demande</button>
            </div>
        </form>
    </div>
</div>
@endsection
