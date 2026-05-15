@extends('layouts.dashboard')

@section('title', 'Ordres de Production')
@section('subtitle', 'Gestion des ordres de fabrication')

@section('content')
<div id="production-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Ordres de Production
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les ordres de fabrication
                </p>
            </div>
            <button onclick="window.location.href='/production/create'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                ➕ Nouvel Ordre
            </button>
        </div>

        <!-- Stats Cards -->
        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">📋</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Total OF</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">142</div>
                <div style="font-size:13px; color:#6b7280;">Ce mois</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">⚙️</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">En cours</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">23</div>
                <div style="font-size:13px; color:#f59e0b;">En fabrication</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">✅</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Terminés</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">115</div>
                <div style="font-size:13px; color:#16a34a;">Livrés</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fee2e2; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">⚠️</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Retard</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#dc2626; margin-bottom:8px;">4</div>
                <div style="font-size:13px; color:#dc2626;">À traiter urgemment</div>
            </div>
        </div>

        <!-- Filters -->
        <div style="background:white; border-radius:16px; padding:24px; 
                    box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr; gap:16px;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" placeholder="N° OF, commande..."
                           style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                  border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='#10b981'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les statuts</option>
                        <option value="planning">Planifié</option>
                        <option value="in_progress">En cours</option>
                        <option value="completed">Terminé</option>
                        <option value="on_hold">En attente</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        👤 Artisan
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les artisans</option>
                        <option value="1">Pierre Martin</option>
                        <option value="2">Jean Dupont</option>
                        <option value="3">Marie Laurent</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📅 Période
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Toutes les périodes</option>
                        <option value="today">Aujourd'hui</option>
                        <option value="week">Cette semaine</option>
                        <option value="month">Ce mois</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Production Orders Table -->
        <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); 
                    border:1px solid #e5e7eb; overflow:hidden;">
            
            <!-- Table Header -->
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">N° OF</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">COMMANDE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ARTISAN</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">STATUT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">PRIORITÉ</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">LIVRAISON</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ACTIONS</div>
                </div>
            </div>

            <!-- Production Order Rows -->
            <div style="padding:0;">
                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-001</div>
                    <div style="font-size:14px; color:#374151;">CMD-2025-045</div>
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#dbeafe; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:600; color:#1e40af;">PM</div>
                        <span style="font-size:14px; color:#374151;">Pierre Martin</span>
                    </div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#b45309; font-size:12px; font-weight:600; border-radius:20px;">
                            En cours
                        </span>
                    </div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:20px;">
                            Urgent
                        </span>
                    </div>
                    <div style="font-size:14px; color:#374151;">15/05/2025</div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="window.location.href='/production/1'"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            👁️
                        </button>
                        <button onclick="window.location.href='/production/1/edit'"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            ✏️
                        </button>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-002</div>
                    <div style="font-size:14px; color:#374151;">CMD-2025-046</div>
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#dcfce7; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:600; color:#166534;">JD</div>
                        <span style="font-size:14px; color:#374151;">Jean Dupont</span>
                    </div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dbeafe; color:#1e40af; font-size:12px; font-weight:600; border-radius:20px;">
                            Planifié
                        </span>
                    </div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#f3f4f6; color:#374151; font-size:12px; font-weight:600; border-radius:20px;">
                            Normal
                        </span>
                    </div>
                    <div style="font-size:14px; color:#374151;">20/05/2025</div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="window.location.href='/production/2'"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            👁️
                        </button>
                        <button onclick="window.location.href='/production/2/edit'"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            ✏️
                        </button>
                    </div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-003</div>
                    <div style="font-size:14px; color:#374151;">CMD-2025-047</div>
                    <div style="display:flex; align-items:center; gap:8px;">
                        <div style="width:32px; height:32px; border-radius:50%; background:#fce7f3; display:flex; align-items:center; justify-content:center; font-size:12px; font-weight:600; color:#9d174d;">ML</div>
                        <span style="font-size:14px; color:#374151;">Marie Laurent</span>
                    </div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:12px; font-weight:600; border-radius:20px;">
                            Terminé
                        </span>
                    </div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#f3f4f6; color:#374151; font-size:12px; font-weight:600; border-radius:20px;">
                            Normal
                        </span>
                    </div>
                    <div style="font-size:14px; color:#374151;">12/05/2025</div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="window.location.href='/production/3'"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            👁️
                        </button>
                        <button onclick="window.location.href='/production/3/edit'"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            ✏️
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
