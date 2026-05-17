@extends('layouts.dashboard')

@section('title', 'Tableau de Bord')
@section('subtitle','BIENVENUE' . ' ' . auth()->user()->name)

@section('content')
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-title">Commandes du jour</div>
        <div class="stat-value">12</div>
        <div class="stat-change positive">+8% par rapport à hier</div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Chiffre d'affaires</div>
        <div class="stat-value">45,230 FCFA</div>
        <div class="stat-change positive">+12% ce mois</div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Clients actifs</div>
        <div class="stat-value">89</div>
        <div class="stat-change positive">+5 nouveaux</div>
    </div>
    <div class="stat-card">
        <div class="stat-title">Stock critique</div>
        <div class="stat-value">3</div>
        <div class="stat-change negative">À réapprovisionner</div>
    </div>
</div>

<div class="card">
    <h2 class="card-title">Commandes récentes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>N° Commande</th>
                <th>Client</th>
                <th>Statut</th>
                <th>Montant</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>CMD-2025-001</td>
                <td>Marie Dupont</td>
                <td><span class="badge badge-warning">En cours</span></td>
                <td>15,000 FCFA</td>
                <td>10/05/2025</td>
            </tr>
            <tr>
                <td>CMD-2025-002</td>
                <td>Jean Martin</td>
                <td><span class="badge badge-success">Terminée</span></td>
                <td>8,500 FCFA</td>
                <td>09/05/2025</td>
            </tr>
            <tr>
                <td>CMD-2025-003</td>
                <td>Sophie Laurent</td>
                <td><span class="badge badge-danger">Annulée</span></td>
                <td>22,000 FCFA</td>
                <td>08/05/2025</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="card">
    <h2 class="card-title">Tâches prioritaires</h2>
    <div style="display: grid; gap: 1rem;">
        <div style="padding: 1rem; border: 1px solid #e5e7eb; border-radius: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <div style="font-weight: 600;">Finaliser commande #CMD-2025-002</div>
                <div style="font-size: 0.875rem; color: #6b7280;">Étagère sur mesure - Client: Sophie Laurent</div>
            </div>
            <span class="badge badge-warning">Urgent</span>
        </div>
        <div style="padding: 1rem; border: 1px solid #e5e7eb; border-radius: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
            <div>
                <div style="font-weight: 600;">Réapprovisionner bois de chêne</div>
                <div style="font-size: 0.875rem; color: #6b7280;">Stock critique - 5 pièces restantes</div>
            </div>
            <span class="badge badge-danger">Critique</span>
        </div>
    </div>
</div>
@endsection