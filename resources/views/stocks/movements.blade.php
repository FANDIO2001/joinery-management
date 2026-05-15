@extends('layouts.dashboard')

@section('title', 'Mouvements Stock')
@section('subtitle', 'Historique des mouvements de stock')

@section('content')
<div id="stocks-movements">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Mouvements de Stock
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Historique des entrées et sorties
                </p>
            </div>
            <button onclick="window.location.href='/stocks'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:white; border:2px solid #e5e7eb; 
                       border-radius:8px; color:#374151; font-size:14px; 
                       font-weight:500; cursor:pointer;">
                ← Voir le stock
            </button>
        </div>

        <!-- Stats Cards -->
        <div style="display:grid; grid-template-columns:repeat(4, 1fr); gap:24px; margin-bottom:32px;">
            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dcfce7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">📥</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Entrées</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#16a34a; margin-bottom:8px;">156</div>
                <div style="font-size:13px; color:#16a34a;">Ce mois</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fee2e2; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">📤</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Sorties</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#dc2626; margin-bottom:8px;">89</div>
                <div style="font-size:13px; color:#dc2626;">Ce mois</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#dbeafe; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">🔄</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Transferts</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#3b82f6; margin-bottom:8px;">23</div>
                <div style="font-size:13px; color:#3b82f6;">Ce mois</div>
            </div>

            <div style="background:white; border-radius:16px; padding:24px; 
                        box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <div style="display:flex; align-items:center; gap:12px; margin-bottom:12px;">
                    <div style="width:40px; height:40px; border-radius:10px; background:#fef3c7; 
                               display:flex; align-items:center; justify-content:center; font-size:20px;">⚠️</div>
                    <span style="font-size:13px; font-weight:600; color:#6b7280; text-transform:uppercase;">Ajustements</span>
                </div>
                <div style="font-size:32px; font-weight:700; color:#f59e0b; margin-bottom:8px;">7</div>
                <div style="font-size:13px; color:#f59e0b;">Ce mois</div>
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
                    <input type="text" placeholder="Matériau, référence..."
                           style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                  border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='#10b981'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📊 Type de mouvement
                    </label>
                    <select style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                   border-radius:8px; font-size:15px; outline:none; background:white; box-sizing:border-box;"
                            onfocus="this.style.borderColor='#10b981'"
                            onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les types</option>
                        <option value="in">Entrée</option>
                        <option value="out">Sortie</option>
                        <option value="transfer">Transfert</option>
                        <option value="adjustment">Ajustement</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📅 Date début
                    </label>
                    <input type="date"
                           style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                  border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='#10b981'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                        📅 Date fin
                    </label>
                    <input type="date"
                           style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; 
                                  border-radius:8px; font-size:15px; outline:none; box-sizing:border-box;"
                           onfocus="this.style.borderColor='#10b981'"
                           onblur="this.style.borderColor='#e5e7eb'">
                </div>
            </div>
        </div>

        <!-- Movements Table -->
        <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); 
                    border:1px solid #e5e7eb; overflow:hidden;">
            
            <!-- Table Header -->
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">DATE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">MATÉRIAU</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">TYPE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">QUANTITÉ</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">RÉFÉRENCE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">UTILISATEUR</div>
                </div>
            </div>

            <!-- Movement Rows -->
            <div style="padding:0;">
                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; color:#374151;">15/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Bois de chêne</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:12px; font-weight:600; border-radius:20px;">
                            Entrée
                        </span>
                    </div>
                    <div style="font-size:14px; font-weight:700; color:#16a34a;">+15 m²</div>
                    <div style="font-size:14px; color:#374151;">CMD-2025-089</div>
                    <div style="font-size:14px; color:#374151;">Jean Dupont</div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; color:#374151;">14/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Vernis mat</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:20px;">
                            Sortie
                        </span>
                    </div>
                    <div style="font-size:14px; font-weight:700; color:#dc2626;">-2 L</div>
                    <div style="font-size:14px; color:#374151;">OF-2025-001</div>
                    <div style="font-size:14px; color:#374151;">Pierre Martin</div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; color:#374151;">13/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Visserie</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dbeafe; color:#1e40af; font-size:12px; font-weight:600; border-radius:20px;">
                            Transfert
                        </span>
                    </div>
                    <div style="font-size:14px; font-weight:700; color:#3b82f6;">50 pièces</div>
                    <div style="font-size:14px; color:#374151;">TRF-2025-012</div>
                    <div style="font-size:14px; color:#374151;">Marie Laurent</div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; color:#374151;">12/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Colle bois</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#b45309; font-size:12px; font-weight:600; border-radius:20px;">
                            Ajustement
                        </span>
                    </div>
                    <div style="font-size:14px; font-weight:700; color:#f59e0b;">-0.5 kg</div>
                    <div style="font-size:14px; color:#374151;">AJT-2025-003</div>
                    <div style="font-size:14px; color:#374151;">Jean Dupont</div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; color:#374151;">11/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Bois de merisier</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#166534; font-size:12px; font-weight:600; border-radius:20px;">
                            Entrée
                        </span>
                    </div>
                    <div style="font-size:14px; font-weight:700; color:#16a34a;">+20 m²</div>
                    <div style="font-size:14px; color:#374151;">CMD-2025-090</div>
                    <div style="font-size:14px; color:#374151;">Jean Dupont</div>
                </div>

                <div style="display:grid; grid-template-columns:1fr 1.5fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; color:#374151;">10/05/2025</div>
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">Charnières</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:20px;">
                            Sortie
                        </span>
                    </div>
                    <div style="font-size:14px; font-weight:700; color:#dc2626;">-30 pièces</div>
                    <div style="font-size:14px; color:#374151;">OF-2025-002</div>
                    <div style="font-size:14px; color:#374151;">Pierre Martin</div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div style="display:flex; justify-content:space-between; align-items:center; margin-top:24px;">
            <div style="font-size:14px; color:#6b7280;">
                Affichage 1-6 sur 156 mouvements
            </div>
            <div style="display:flex; gap:8px;">
                <button style="padding:8px 16px; background:white; border:2px solid #e5e7eb; 
                               border-radius:6px; color:#374151; font-size:14px; font-weight:500; cursor:pointer;">
                    ← Précédent
                </button>
                <button style="padding:8px 16px; background:#3b82f6; color:white; border:none; 
                               border-radius:6px; font-size:14px; font-weight:500; cursor:pointer;">
                    1
                </button>
                <button style="padding:8px 16px; background:white; border:2px solid #e5e7eb; 
                               border-radius:6px; color:#374151; font-size:14px; font-weight:500; cursor:pointer;">
                    2
                </button>
                <button style="padding:8px 16px; background:white; border:2px solid #e5e7eb; 
                               border-radius:6px; color:#374151; font-size:14px; font-weight:500; cursor:pointer;">
                    3
                </button>
                <button style="padding:8px 16px; background:white; border:2px solid #e5e7eb; 
                               border-radius:6px; color:#374151; font-size:14px; font-weight:500; cursor:pointer;">
                    Suivant →
                </button>
            </div>
        </div>

    </div>
</div>
@endsection
