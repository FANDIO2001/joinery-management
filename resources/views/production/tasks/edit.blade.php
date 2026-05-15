@extends('layouts.dashboard')

@section('title', 'Modifier Tâche')
@section('subtitle', 'Modifier les informations de la tâche')

@section('content')
<div id="production-task-edit">
    <div style="padding:24px; max-width:1000px; margin:0 auto;">
        
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Modifier Tâche</h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">Découpe des pièces - OF-2025-001</p>
            </div>
            <a href="/production/1/tasks" style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">← Retour</a>
        </div>

        <form method="POST" action="/production/1/tasks/1" style="background:white; border-radius:16px; padding:32px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
            @csrf
            @method('PUT')

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Titre de la tâche</label>
                    <input type="text" name="title" value="Découpe des pièces" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Statut</label>
                    <select name="status" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        <option value="pending">En attente</option>
                        <option value="in_progress" selected>En cours</option>
                        <option value="completed">Terminée</option>
                        <option value="delayed">En retard</option>
                    </select>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Artisan assigné</label>
                    <select name="assigned_to" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        <option value="1" selected>Pierre Martin</option>
                        <option value="2">Marie Laurent</option>
                        <option value="3">Jean Dupont</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Priorité</label>
                    <select name="priority" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        <option value="high" selected>Haute</option>
                        <option value="medium">Moyenne</option>
                        <option value="low">Basse</option>
                    </select>
                </div>
            </div>

            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:24px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Date de début</label>
                    <input type="date" name="start_date" value="2025-05-08" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Date de fin</label>
                    <input type="date" name="end_date" value="2025-05-12" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Progression (%)</label>
                <input type="range" name="progress" min="0" max="100" value="65" style="width:100%; margin-bottom:8px;">
                <div style="font-size:14px; color:#6b7280;">65% complété</div>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Description</label>
                <textarea name="description" rows="4" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box; resize:vertical;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">Découpe précise des pièces de bois selon les plans techniques. Utilisation de la scie circulaire et de la scie à onglet pour les coupes d'angle.</textarea>
            </div>

            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Notes</label>
                <textarea name="notes" rows="3" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none; box-sizing:border-box; resize:vertical;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">Vérifier les dimensions avant chaque coupe. Porter les équipements de protection.</textarea>
            </div>

            <div style="display:flex; gap:12px; justify-content:flex-end;">
                <a href="/production/1/tasks" style="padding:12px 24px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">Annuler</a>
                <button type="submit" style="padding:12px 24px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">Enregistrer</button>
            </div>
        </form>
    </div>
</div>
@endsection
