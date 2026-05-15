@extends('layouts.dashboard')

@section('title', 'Congés Employés')
@section('subtitle', 'Gestion des demandes de congés')

@section('content')
<div id="employees-leaves">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Congés Employés</h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">Gérer les demandes de congés</p>
            </div>
            <div style="display:flex; gap:12px;">
                <a href="/employees/leaves/calendar" style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">📅 Calendrier</a>
                <a href="/employees/leaves/create" style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">➕ Nouvelle demande</a>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; display:flex; align-items:center; justify-content:center; font-size:20px;">📋</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Total</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">24</div>
                <div style="font-size:13px; color:#6b7280;">Demandes ce mois</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center; font-size:20px;">⏳</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">En attente</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#f59e0b; margin-bottom:8px;">8</div>
                <div style="font-size:13px; color:#f59e0b;">À traiter</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; display:flex; align-items:center; justify-content:center; font-size:20px;">✅</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Approuvées</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#16a34a; margin-bottom:8px;">14</div>
                <div style="font-size:13px; color:#16a34a;">Validées</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fee2e2; display:flex; align-items:center; justify-content:center; font-size:20px;">❌</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Refusées</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#dc2626; margin-bottom:8px;">2</div>
                <div style="font-size:13px; color:#dc2626;">Rejetées</div>
            </div>
        </div>

        <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">🔍 Rechercher</label>
                    <input type="text" placeholder="Employé, type..." style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">📊 Statut</label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les statuts</option>
                        <option value="pending">En attente</option>
                        <option value="approved">Approuvé</option>
                        <option value="rejected">Refusé</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">📅 Mois</label>
                    <input type="month" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>
        </div>

        <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; overflow:hidden;">
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:1.5fr 1fr 1fr 1fr 1fr 1fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">EMPLOYÉ</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">TYPE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">DATES</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">JOURS</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">STATUT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ACTIONS</div>
                </div>
            </div>

            <div style="padding:0;">
                <div style="display:grid; grid-template-columns:1.5fr 1fr 1fr 1fr 1fr 1fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='white'">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:40px; height:40px; border-radius:50%; background:#dbeafe; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#1e40af;">PM</div>
                        <div>
                            <div style="font-weight:600; color:#1f2937; font-size:14px;">Pierre Martin</div>
                            <div style="font-size:12px; color:#6b7280;">Artisan Menuisier</div>
                        </div>
                    </div>
                    <div style="font-size:14px; color:#374151;">Congé annuel</div>
                    <div style="font-size:14px; color:#374151;">15-20/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">5 jours</div>
                    <div><span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#b45309; font-size:12px; font-weight:600; border-radius:20px;">En attente</span></div>
                    <div style="display:flex; gap:8px;">
                        <a href="/employees/leaves/1" style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:4px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">Voir</a>
                        <a href="/employees/leaves/1/edit" style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:4px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">Modifier</a>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1.5fr 1fr 1fr 1fr 1fr 1fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='white'">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:40px; height:40px; border-radius:50%; background:#dcfce7; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#166534;">ML</div>
                        <div>
                            <div style="font-weight:600; color:#1f2937; font-size:14px;">Marie Laurent</div>
                            <div style="font-size:12px; color:#6b7280;">Artisane Menuisière</div>
                        </div>
                    </div>
                    <div style="font-size:14px; color:#374151;">Maladie</div>
                    <div style="font-size:14px; color:#374151;">10-12/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">3 jours</div>
                    <div><span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:12px; font-weight:600; border-radius:20px;">Approuvé</span></div>
                    <div style="display:flex; gap:8px;">
                        <a href="/employees/leaves/2" style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:4px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">Voir</a>
                        <a href="/employees/leaves/2/edit" style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:4px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">Modifier</a>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1.5fr 1fr 1fr 1fr 1fr 1fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;" onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='white'">
                    <div style="display:flex; align-items:center; gap:12px;">
                        <div style="width:40px; height:40px; border-radius:50%; background:#fce7f3; display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#9d174d;">JD</div>
                        <div>
                            <div style="font-weight:600; color:#1f2937; font-size:14px;">Jean Dupont</div>
                            <div style="font-size:12px; color:#6b7280;">Artisan Menuisier</div>
                        </div>
                    </div>
                    <div style="font-size:14px; color:#374151;">Congé familial</div>
                    <div style="font-size:14px; color:#374151;">01-03/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">3 jours</div>
                    <div><span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:20px;">Refusé</span></div>
                    <div style="display:flex; gap:8px;">
                        <a href="/employees/leaves/3" style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:4px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">Voir</a>
                        <a href="/employees/leaves/3/edit" style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:4px; font-size:12px; font-weight:500; text-decoration:none; cursor:pointer;">Modifier</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
