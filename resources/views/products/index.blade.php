@section('content')
<div id="products-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Liste des Produits
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer le catalogue de produits
                </p>
            </div>
            <button onclick="showPage('products-create')"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);
                       transition:all 0.2s;"
                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                ➕ Ajouter un Produit
            </button>
        </div>

        <!-- Search and Filters -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" id="search" name="search"
                        placeholder="Nom, référence..."
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📁 Catégorie
                    </label>
                    <select id="category" name="category"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Toutes les catégories</option>
                        <option value="furniture">Meubles</option>
                        <option value="windows">Fenêtres</option>
                        <option value="doors">Portes</option>
                        <option value="accessories">Accessoires</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut
                    </label>
                    <select id="status" name="status"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les statuts</option>
                        <option value="active">Actif</option>
                        <option value="inactive">Inactif</option>
                        <option value="out-of-stock">Rupture de stock</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; overflow:hidden;">
            
            <!-- Table Header -->
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">PRODUIT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">RÉFÉRENCE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">CATÉGORIE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">PRIX</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">STOCK</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">STATUT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ACTIONS</div>
                </div>
            </div>

            <!-- Product Rows -->
            <div style="padding:0;">
                <!-- Product Row 1 -->
                <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:48px; height:48px; border-radius:12px; 
                                   background:linear-gradient(135deg, #f3f4f6, #e5e7eb);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb;">
                            <svg style="width:24px; height:24px; color:#9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937; margin-bottom:2px;">Table en chêne</div>
                            <div style="font-size:13px; color:#6b7280;">Table de salle à manger</div>
                        </div>
                    </div>
                    <div style="font-size:14px; color:#374151; font-weight:500;">TAB-001</div>
                    <div style="font-size:14px; color:#374151;">Meubles</div>
                    <div style="font-size:14px; color:#374151; font-weight:600;">450,00 €</div>
                    <div style="font-size:14px; color:#374151; font-weight:500;">12</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:20px;">
                            <div style="width:6px; height:6px; background:#22c55e; border-radius:50%;"></div>
                            Actif
                        </span>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="showPage('products-show')"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#2563eb'"
                            onmouseout="this.style.backgroundColor='#3b82f6'">
                            👁️ Voir
                        </button>
                        <button onclick="showPage('products-edit')"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#059669'"
                            onmouseout="this.style.backgroundColor='#10b981'">
                            ✏️ Modifier
                        </button>
                        <button
                            style="padding:6px 12px; background:#ef4444; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#dc2626'"
                            onmouseout="this.style.backgroundColor='#ef4444'">
                            🗑️ Supprimer
                        </button>
                    </div>
                </div>

                <!-- Product Row 2 -->
                <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:48px; height:48px; border-radius:12px; 
                                   background:linear-gradient(135deg, #f3f4f6, #e5e7eb);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb;">
                            <svg style="width:24px; height:24px; color:#9ca3af;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937; margin-bottom:2px;">Fenêtre PVC</div>
                            <div style="font-size:13px; color:#6b7280;">Fenêtre double vitrage</div>
                        </div>
                    </div>
                    <div style="font-size:14px; color:#374151; font-weight:500;">FEN-002</div>
                    <div style="font-size:14px; color:#374151;">Fenêtres</div>
                    <div style="font-size:14px; color:#374151; font-weight:600;">280,00 €</div>
                    <div style="font-size:14px; color:#374151; font-weight:500;">0</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:20px;">
                            <div style="width:6px; height:6px; background:#ef4444; border-radius:50%;"></div>
                            Rupture
                        </span>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="showPage('products-show')"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#2563eb'"
                            onmouseout="this.style.backgroundColor='#3b82f6'">
                            👁️ Voir
                        </button>
                        <button onclick="showPage('products-edit')"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#059669'"
                            onmouseout="this.style.backgroundColor='#10b981'">
                            ✏️ Modifier
                        </button>
                        <button
                            style="padding:6px 12px; background:#ef4444; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#dc2626'"
                            onmouseout="this.style.backgroundColor='#ef4444'">
                            🗑️ Supprimer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-top:24px;">
            <div style="display:flex; justify-content:space-between; align-items:center;">
                <div style="font-size:14px; color:#6b7280;">
                    Affichage de <span style="font-weight:600; color:#1f2937;">1</span> à <span style="font-weight:600; color:#1f2937;">10</span> sur <span style="font-weight:600; color:#1f2937;">25</span> résultats
                </div>
                <div style="display:flex; gap:8px;">
                    <button style="padding:8px 12px; background:#f3f4f6; color:#6b7280; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#e5e7eb'"
                            onmouseout="this.style.backgroundColor='#f3f4f6'">
                        ← Précédent
                    </button>
                    <button style="padding:8px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:14px; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#059669'"
                            onmouseout="this.style.backgroundColor='#10b981'">
                        1
                    </button>
                    <button style="padding:8px 12px; background:#f3f4f6; color:#6b7280; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#e5e7eb'"
                            onmouseout="this.style.backgroundColor='#f3f4f6'">
                        2
                    </button>
                    <button style="padding:8px 12px; background:#f3f4f6; color:#6b7280; border:1px solid #e5e7eb; border-radius:6px; font-size:14px; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#e5e7eb'"
                            onmouseout="this.style.backgroundColor='#f3f4f6'">
                        3
                    </button>
                    <button style="padding:8px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:14px; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#059669'"
                            onmouseout="this.style.backgroundColor='#10b981'">
                        Suivant →
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection