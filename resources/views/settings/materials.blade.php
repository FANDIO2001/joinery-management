@extends('layouts.dashboard')

@section('content')
<div id="materials-settings">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div style="display:flex; align-items:center;">
                <a href="/settings" style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; background:#f3f4f6; border-radius:8px; text-decoration:none; color:#6b7280; margin-right:16px; transition:all 0.2s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                    ←
                </a>
                <div>
                    <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">
                        📦 Gestion des Matériaux
                    </h1>
                    <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                        Créer et gérer les matériaux disponibles
                    </p>
                </div>
            </div>
            <button onclick="showAddMaterialForm()" 
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);
                       transition:all 0.2s;"
                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                ➕ Ajouter un Matériau
            </button>
        </div>

        <!-- Materials Table -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; overflow-x:auto;">
            @if($materials->isEmpty())
                <div style="text-align:center; padding:40px; color:#6b7280;">
                    <p style="font-size:16px; margin:0 0 12px;">
                        Aucun matériau trouvé. Créez votre premier matériau.
                    </p>
                    <button onclick="showAddMaterialForm()" style="padding:10px 20px; background:#10b981; color:white; border:none; border-radius:6px; cursor:pointer; font-size:14px;">
                        ➕ Ajouter un Matériau
                    </button>
                </div>
            @else
                <table style="width:100%; border-collapse:collapse;">
                    <thead>
                        <tr style="border-bottom:2px solid #e5e7eb;">
                            <th style="text-align:left; padding:16px; color:#374151; font-weight:600; font-size:14px;">Nom</th>
                            <th style="text-align:left; padding:16px; color:#374151; font-weight:600; font-size:14px;">Unité</th>
                            <th style="text-align:right; padding:16px; color:#374151; font-weight:600; font-size:14px;">Prix Unitaire</th>
                            <th style="text-align:left; padding:16px; color:#374151; font-weight:600; font-size:14px;">Stock</th>
                            <th style="text-align:center; padding:16px; color:#374151; font-weight:600; font-size:14px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materials as $material)
                            <tr style="border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;" 
                                onmouseover="this.style.backgroundColor='#f9fafb'" 
                                onmouseout="this.style.backgroundColor='white'">
                                <td style="padding:16px; color:#1f2937; font-weight:500;">{{ $material->name ?? 'N/A' }}</td>
                                <td style="padding:16px; color:#6b7280;">{{ $material->unit ?? 'Kg' }}</td>
                                <td style="padding:16px; color:#1f2937; font-weight:500; text-align:right;">{{ number_format($material->unit_price ?? 0, 2, ',', ' ') }} €</td>
                                <td style="padding:16px; color:#6b7280;">
                                    <span style="display:inline-block; background:#f3f4f6; padding:4px 12px; border-radius:12px; font-size:12px;">
                                        {{ $material->quantity ?? 0 }}
                                    </span>
                                </td>
                                <td style="padding:16px; text-align:center;">
                                    <button onclick="editMaterial({{ $material->id ?? 0 }})" 
                                        style="background:#3b82f6; color:white; border:none; padding:6px 12px; border-radius:6px; cursor:pointer; font-size:12px; margin-right:6px;"
                                        onmouseover="this.style.background='#2563eb'"
                                        onmouseout="this.style.background='#3b82f6'">
                                        ✏️ Éditer
                                    </button>
                                    <button onclick="deleteMaterial({{ $material->id ?? 0 }})" 
                                        style="background:#ef4444; color:white; border:none; padding:6px 12px; border-radius:6px; cursor:pointer; font-size:12px;"
                                        onmouseover="this.style.background='#dc2626'"
                                        onmouseout="this.style.background='#ef4444'">
                                        🗑️ Supprimer
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<script>
function showAddMaterialForm() {
    alert('Ajouter un matériau - À implémenter');
}

function editMaterial(id) {
    alert('Éditer le matériau ' + id + ' - À implémenter');
}

function deleteMaterial(id) {
    if(confirm('Êtes-vous sûr de vouloir supprimer ce matériau?')) {
        alert('Supprimer le matériau ' + id + ' - À implémenter');
    }
}
</script>
@endsection