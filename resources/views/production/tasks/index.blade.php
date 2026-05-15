@extends('layouts.dashboard')

@section('title', 'Tâches Production')
@section('subtitle', 'Gestion des tâches de production')

@section('content')
<div id="production-tasks">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Tâches de Production
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les tâches des ordres de fabrication
                </p>
            </div>
            <button onclick="window.location.href='/production'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:white; border:2px solid #e5e7eb; 
                       border-radius:8px; color:#374151; font-size:14px; 
                       font-weight:500; cursor:pointer;">
                ← Voir les ordres
            </button>
        </div>

        <!-- Stats Cards -->
        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">📋</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Total</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:8px;">45</div>
                <div style="font-size:13px; color:#6b7280;">Tâches actives</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">⚙️</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">En cours</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#f59e0b; margin-bottom:8px;">12</div>
                <div style="font-size:13px; color:#f59e0b;">En progression</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">✅</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Terminées</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#16a34a; margin-bottom:8px;">28</div>
                <div style="font-size:13px; color:#16a34a;">Complétées</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fee2e2; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">⏰</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">En retard</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#dc2626; margin-bottom:8px;">5</div>
                <div style="font-size:13px; color:#dc2626;">Hors délai</div>
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
                    <input type="text" placeholder="Tâche, ordre..."
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
                        <option value="pending">En attente</option>
                        <option value="in_progress">En cours</option>
                        <option value="completed">Terminée</option>
                        <option value="delayed">En retard</option>
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
                        <option value="2">Marie Laurent</option>
                        <option value="3">Jean Dupont</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📅 Priorité
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Toutes les priorités</option>
                        <option value="high">Haute</option>
                        <option value="medium">Moyenne</option>
                        <option value="low">Basse</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Tasks Grid -->
        <div style="display:grid; grid-template-columns:repeat(2, 1fr); gap:24px;">
            
            <!-- Task Card 1 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#b45309; font-size:11px; font-weight:600; border-radius:20px; margin-bottom:8px;">
                            En cours
                        </span>
                        <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0;">
                            Découpe des pièces
                        </h3>
                    </div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:11px; font-weight:600; border-radius:20px;">
                        Haute
                    </span>
                </div>
                
                <div style="background:#f9fafb; border-radius:12px; padding:16px; margin-bottom:16px; border:1px solid #e5e7eb;">
                    <div style="font-size:13px; color:#6b7280; margin-bottom:8px;">Ordre de production</div>
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-001</div>
                </div>

                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <div style="width:40px; height:40px; border-radius:50%; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#1e40af;">
                        PM
                    </div>
                    <div>
                        <div style="font-weight:600; color:#1f2937; font-size:14px;">Pierre Martin</div>
                        <div style="font-size:12px; color:#6b7280;">Artisan Menuisier</div>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:13px;">
                        <span style="color:#6b7280;">Progression</span>
                        <span style="font-weight:600; color:#1f2937;">65%</span>
                    </div>
                    <div style="width:100%; height:6px; background:#f3f4f6; border-radius:3px; overflow:hidden;">
                        <div style="width:65%; height:100%; background:linear-gradient(90deg, #10b981, #059669); border-radius:3px;"></div>
                    </div>
                </div>

                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:13px;">
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date début</div>
                        <div style="font-weight:600; color:#1f2937;">08/05/2025</div>
                    </div>
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date fin</div>
                        <div style="font-weight:600; color:#1f2937;">12/05/2025</div>
                    </div>
                </div>

                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/production/1/tasks/1'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/production/1/tasks/1/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Task Card 2 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:11px; font-weight:600; border-radius:20px; margin-bottom:8px;">
                            Terminée
                        </span>
                        <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0;">
                            Assemblage du cadre
                        </h3>
                    </div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dbeafe; color:#1e40af; font-size:11px; font-weight:600; border-radius:20px;">
                        Moyenne
                    </span>
                </div>
                
                <div style="background:#f9fafb; border-radius:12px; padding:16px; margin-bottom:16px; border:1px solid #e5e7eb;">
                    <div style="font-size:13px; color:#6b7280; margin-bottom:8px;">Ordre de production</div>
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-001</div>
                </div>

                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <div style="width:40px; height:40px; border-radius:50%; background:#dcfce7; 
                               display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#166534;">
                        ML
                    </div>
                    <div>
                        <div style="font-weight:600; color:#1f2937; font-size:14px;">Marie Laurent</div>
                        <div style="font-size:12px; color:#6b7280;">Artisane Menuisière</div>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:13px;">
                        <span style="color:#6b7280;">Progression</span>
                        <span style="font-weight:600; color:#1f2937;">100%</span>
                    </div>
                    <div style="width:100%; height:6px; background:#f3f4f6; border-radius:3px; overflow:hidden;">
                        <div style="width:100%; height:100%; background:linear-gradient(90deg, #10b981, #059669); border-radius:3px;"></div>
                    </div>
                </div>

                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:13px;">
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date début</div>
                        <div style="font-weight:600; color:#1f2937;">10/05/2025</div>
                    </div>
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date fin</div>
                        <div style="font-weight:600; color:#1f2937;">12/05/2025</div>
                    </div>
                </div>

                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/production/1/tasks/2'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/production/1/tasks/2/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Task Card 3 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#f3f4f6; color:#374151; font-size:11px; font-weight:600; border-radius:20px; margin-bottom:8px;">
                            En attente
                        </span>
                        <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0;">
                            Finition vernis
                        </h3>
                    </div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:11px; font-weight:600; border-radius:20px;">
                        Haute
                    </span>
                </div>
                
                <div style="background:#f9fafb; border-radius:12px; padding:16px; margin-bottom:16px; border:1px solid #e5e7eb;">
                    <div style="font-size:13px; color:#6b7280; margin-bottom:8px;">Ordre de production</div>
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-002</div>
                </div>

                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <div style="width:40px; height:40px; border-radius:50%; background:#fce7f3; 
                               display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#9d174d;">
                        JD
                    </div>
                    <div>
                        <div style="font-weight:600; color:#1f2937; font-size:14px;">Jean Dupont</div>
                        <div style="font-size:12px; color:#6b7280;">Artisan Menuisier</div>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:13px;">
                        <span style="color:#6b7280;">Progression</span>
                        <span style="font-weight:600; color:#1f2937;">0%</span>
                    </div>
                    <div style="width:100%; height:6px; background:#f3f4f6; border-radius:3px; overflow:hidden;">
                        <div style="width:0%; height:100%; background:linear-gradient(90deg, #10b981, #059669); border-radius:3px;"></div>
                    </div>
                </div>

                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:13px;">
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date début</div>
                        <div style="font-weight:600; color:#1f2937;">18/05/2025</div>
                    </div>
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date fin</div>
                        <div style="font-weight:600; color:#1f2937;">22/05/2025</div>
                    </div>
                </div>

                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/production/2/tasks/3'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/production/2/tasks/3/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

            <!-- Task Card 4 -->
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:16px;">
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:11px; font-weight:600; border-radius:20px; margin-bottom:8px;">
                            En retard
                        </span>
                        <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0;">
                            Contrôle qualité
                        </h3>
                    </div>
                    <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dbeafe; color:#1e40af; font-size:11px; font-weight:600; border-radius:20px;">
                        Moyenne
                    </span>
                </div>
                
                <div style="background:#f9fafb; border-radius:12px; padding:16px; margin-bottom:16px; border:1px solid #e5e7eb;">
                    <div style="font-size:13px; color:#6b7280; margin-bottom:8px;">Ordre de production</div>
                    <div style="font-size:15px; font-weight:600; color:#1f2937;">OF-2025-003</div>
                </div>

                <div style="display:flex; align-items:center; gap:12px; margin-bottom:16px;">
                    <div style="width:40px; height:40px; border-radius:50%; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:14px; font-weight:600; color:#1e40af;">
                        PM
                    </div>
                    <div>
                        <div style="font-weight:600; color:#1f2937; font-size:14px;">Pierre Martin</div>
                        <div style="font-size:12px; color:#6b7280;">Artisan Menuisier</div>
                    </div>
                </div>

                <div style="margin-bottom:16px;">
                    <div style="display:flex; justify-content:space-between; margin-bottom:8px; font-size:13px;">
                        <span style="color:#6b7280;">Progression</span>
                        <span style="font-weight:600; color:#1f2937;">30%</span>
                    </div>
                    <div style="width:100%; height:6px; background:#f3f4f6; border-radius:3px; overflow:hidden;">
                        <div style="width:30%; height:100%; background:linear-gradient(90deg, #f59e0b, #d97706); border-radius:3px;"></div>
                    </div>
                </div>

                <div style="display:flex; justify-content:space-between; margin-bottom:16px; font-size:13px;">
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date début</div>
                        <div style="font-weight:600; color:#1f2937;">05/05/2025</div>
                    </div>
                    <div>
                        <div style="color:#6b7280; margin-bottom:4px;">Date fin</div>
                        <div style="font-weight:600; color:#dc2626;">10/05/2025</div>
                    </div>
                </div>

                <div style="display:flex; gap:8px;">
                    <button onclick="window.location.href='/production/3/tasks/4'"
                        style="flex:1; padding:10px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Voir détails
                    </button>
                    <button onclick="window.location.href='/production/3/tasks/4/edit'"
                        style="padding:10px 16px; background:#10b981; color:white; border:none; 
                               border-radius:6px; font-size:13px; font-weight:500; cursor:pointer;">
                        Modifier
                    </button>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
