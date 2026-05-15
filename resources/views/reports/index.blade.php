@extends('layouts.dashboard')

@section('title', 'Rapports & Analytics')
@section('subtitle', 'Analyse des performances de l\'entreprise')

@section('content')
<div id="reports-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Rapports & Analytics
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Analyse des performances de l'entreprise
                </p>
            </div>
            <div style="display:flex; gap:12px;">
                <select style="padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:14px; background:white;">
                    <option>Ce mois</option>
                    <option>Cette semaine</option>
                    <option>Cette année</option>
                    <option>Personnalisé</option>
                </select>
                <button style="padding:12px 20px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer;">
                    📊 Exporter
                </button>
            </div>
        </div>

        <!-- KPI Cards -->
        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; display:flex; align-items:center; justify-content:center; font-size:20px;">💰</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Chiffre d'affaires</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">2,450,000 FCFA</div>
                <div style="display:flex; align-items:center; gap:6px;">
                    <span style="color:#16a34a; font-size:13px; font-weight:600;">+12.5%</span>
                    <span style="color:#6b7280; font-size:12px;">vs mois dernier</span>
                </div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; display:flex; align-items:center; justify-content:center; font-size:20px;">📦</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Commandes</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">156</div>
                <div style="display:flex; align-items:center; gap:6px;">
                    <span style="color:#16a34a; font-size:13px; font-weight:600;">+8.2%</span>
                    <span style="color:#6b7280; font-size:12px;">vs mois dernier</span>
                </div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; display:flex; align-items:center; justify-content:center; font-size:20px;">👥</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Clients</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">89</div>
                <div style="display:flex; align-items:center; gap:6px;">
                    <span style="color:#16a34a; font-size:13px; font-weight:600;">+5 nouveaux</span>
                    <span style="color:#6b7280; font-size:12px;">ce mois</span>
                </div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fce7f3; display:flex; align-items:center; justify-content:center; font-size:20px;">⚡</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Production</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">78%</div>
                <div style="display:flex; align-items:center; gap:6px;">
                    <span style="color:#16a34a; font-size:13px; font-weight:600;">+3.1%</span>
                    <span style="color:#6b7280; font-size:12px;">efficacité</span>
                </div>
            </div>
        </div>

        <!-- Reports Grid -->
        <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:24px; margin-bottom:32px;">
            
            <!-- Sales Report -->
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">Rapport des Ventes</h2>
                    <button style="padding:8px 16px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                </div>
                <div style="height:200px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px dashed #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">📊 Graphique des ventes</span>
                </div>
                <div style="margin-top:16px; display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Total</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">2.4M FCFA</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Moyenne</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">15.7K FCFA</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Commandes</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">156</div>
                    </div>
                </div>
            </div>

            <!-- Production Report -->
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">Rapport de Production</h2>
                    <button style="padding:8px 16px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                </div>
                <div style="height:200px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px dashed #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">📈 Graphique de production</span>
                </div>
                <div style="margin-top:16px; display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">OF traités</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">142</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">En cours</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">23</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Retard</div>
                        <div style="font-size:18px; font-weight:700; color:#dc2626;">3</div>
                    </div>
                </div>
            </div>

            <!-- Stock Report -->
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">Rapport des Stocks</h2>
                    <button style="padding:8px 16px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                </div>
                <div style="height:200px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px dashed #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">📦 État des stocks</span>
                </div>
                <div style="margin-top:16px; display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Valorisation</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">5.8M FCFA</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Alertes</div>
                        <div style="font-size:18px; font-weight:700; color:#dc2626;">7</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Mouvements</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">234</div>
                    </div>
                </div>
            </div>

            <!-- HR Report -->
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">Rapport RH</h2>
                    <button style="padding:8px 16px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                </div>
                <div style="height:200px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px dashed #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">👥 Effectifs & absences</span>
                </div>
                <div style="margin-top:16px; display:grid; grid-template-columns:repeat(3, 1fr); gap:12px;">
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Effectifs</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">24</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Absences</div>
                        <div style="font-size:18px; font-weight:700; color:#f59e0b;">3</div>
                    </div>
                    <div style="text-align:center; padding:12px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:12px; color:#6b7280; margin-bottom:4px;">Masse salariale</div>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">1.2M FCFA</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Available Reports List -->
        <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
            <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Rapports Disponibles</h2>
            <div style="display:grid; grid-template-columns:repeat(3, 1fr); gap:16px;">
                <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f9fafb'" onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                    <div style="font-size:16px; font-weight:600; color:#1f2937; margin-bottom:8px;">📊 Ventes par période</div>
                    <div style="font-size:13px; color:#6b7280;">Analyse des ventes par jour, semaine, mois</div>
                </div>
                <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f9fafb'" onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                    <div style="font-size:16px; font-weight:600; color:#1f2937; margin-bottom:8px;">📦 Ventes par catégorie</div>
                    <div style="font-size:13px; color:#6b7280;">Répartition des ventes par catégorie de produits</div>
                </div>
                <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f9fafb'" onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                    <div style="font-size:16px; font-weight:600; color:#1f2937; margin-bottom:8px;">👤 Ventes par client</div>
                    <div style="font-size:13px; color:#6b7280;">Historique des achats par client</div>
                </div>
                <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f9fafb'" onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                    <div style="font-size:16px; font-weight:600; color:#1f2937; margin-bottom:8px;">⚙️ Production OF</div>
                    <div style="font-size:13px; color:#6b7280;">Ordres de fabrication traités et délais</div>
                </div>
                <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f9fafb'" onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                    <div style="font-size:16px; font-weight:600; color:#1f2937; margin-bottom:8px;">📈 Productivité artisan</div>
                    <div style="font-size:13px; color:#6b7280;">Performance par artisan</div>
                </div>
                <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; cursor:pointer; transition:all 0.2s;" onmouseover="this.style.borderColor='#3b82f6'; this.style.backgroundColor='#f9fafb'" onmouseout="this.style.borderColor='#e5e7eb'; this.style.backgroundColor='white'">
                    <div style="font-size:16px; font-weight:600; color:#1f2937; margin-bottom:8px;">💰 Rapport financier</div>
                    <div style="font-size:13px; color:#6b7280;">Recettes, charges, marges, factures impayées</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
