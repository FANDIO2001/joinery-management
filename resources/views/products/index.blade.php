@extends('layouts.dashboard')
@section('title', 'Produits')
@section('subtitle', 'Liste des produits')
@section('content')
    <div id="products-index">
        <div style="padding:24px; max-width:1400px; margin:0 auto;">

            <!-- Header -->
            <div
                style="display:flex; justify-content:space-between; 
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
                <a href="/products/create"
                    style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);
                       transition:all 0.2s; text-decoration:none;"
                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                    ➕ Ajouter un Produit
                </a>
            </div>

            <!-- Search and Filters -->
            <div
                style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                <form method="GET" action="{{ route('products.index') }}"
                    style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:20px;">
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            🔍 Rechercher
                        </label>
                        <input type="text" id="search" name="search" placeholder="Nom, référence..."
                            value="{{ request('search') }}"
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            📁 Catégorie
                        </label>
                        <select id="category" name="category"
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                            <option value="">Toutes les catégories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            📊 Statut
                        </label>
                        <select id="status" name="status"
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                            <option value="">Tous les statuts</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Actif</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                        </select>
                    </div>
                    <button type="submit"
                        style="grid-column:1 / -1; padding:12px 20px; background:#10b981; color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                        onmouseover="this.style.backgroundColor='#059669'"
                        onmouseout="this.style.backgroundColor='#10b981'">
                        🔎 Filtrer
                    </button>
                </form>
            </div>

            <!-- Products Table -->
            <div
                style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; overflow:hidden;">

                <!-- Table Header -->
                <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                    <div
                        style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            PRODUIT</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            RÉFÉRENCE</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            CATÉGORIE</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            PRIX</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            STOCK</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            STATUT</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            ACTIONS</div>
                    </div>
                </div>

                <!-- Product Rows -->
                <div style="padding:0;">
                    @forelse($products as $product)
                        <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                            onmouseover="this.style.backgroundColor='#f9fafb'"
                            onmouseout="this.style.backgroundColor='white'">
                            <div style="display:flex; align-items:center; gap:16px;">
                                <div
                                    style="width:48px; height:48px; border-radius:12px; 
                                       background:linear-gradient(135deg, #f3f4f6, #e5e7eb);
                                       display:flex; align-items:center; justify-content:center;
                                       border:2px solid #e5e7eb;">
                                    <svg style="width:24px; height:24px; color:#9ca3af;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div style="font-size:15px; font-weight:600; color:#1f2937; margin-bottom:2px;">
                                        {{ $product->name }}</div>
                                    <div style="font-size:13px; color:#6b7280;">
                                        {{ $product->short_description ?? $product->description }}</div>
                                </div>
                            </div>
                            <div style="font-size:14px; color:#374151; font-weight:500;">{{ $product->sku }}</div>
                            <div style="font-size:14px; color:#374151;">{{ $product->category->name ?? 'N/A' }}</div>
                            <div style="font-size:14px; color:#374151; font-weight:600;">
                                {{ number_format($product->base_price, 2, ',', ' ') }} FCFA</div>
                            <div style="font-size:14px; color:#374151; font-weight:500;">
                                {{ $product->variants->sum('stock') ?? 0 }}</div>
                            <div>
                                @if ($product->status === 'active')
                                    <span
                                        style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:20px;">
                                        <div style="width:6px; height:6px; background:#22c55e; border-radius:50%;"></div>
                                        Actif
                                    </span>
                                @else
                                    <span
                                        style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#fef3c7; color:#d97706; font-size:12px; font-weight:600; border-radius:20px;">
                                        <div style="width:6px; height:6px; background:#f59e0b; border-radius:50%;"></div>
                                        Brouillon
                                    </span>
                                @endif
                            </div>
                            <div style="display:flex; gap:8px;">
                                <a href="{{ route('products.show', $product->id) }}"
                                    style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s; text-decoration:none;"
                                    onmouseover="this.style.backgroundColor='#2563eb'"
                                    onmouseout="this.style.backgroundColor='#3b82f6'">
                                    👁️ Voir
                                </a>
                                <a href="{{ route('products.edit', $product->id) }}"
                                    style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s; text-decoration:none;"
                                    onmouseover="this.style.backgroundColor='#059669'"
                                    onmouseout="this.style.backgroundColor='#10b981'">
                                    ✏️ Modifier
                                </a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        style="padding:6px 12px; background:#ef4444; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                                        onmouseover="this.style.backgroundColor='#dc2626'"
                                        onmouseout="this.style.backgroundColor='#ef4444'">
                                        🗑️ Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div style="padding:40px; text-align:center;">
                            <div style="font-size:18px; font-weight:600; color:#6b7280; margin-bottom:8px;">
                                Aucun produit trouvé
                            </div>
                            <div style="color:#9ca3af; font-size:14px;">
                                Créez votre premier produit ou modifiez les filtres de recherche.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Pagination -->
            <div
                style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-top:24px;">
                <div style="display:flex; justify-content:space-between; align-items:center;">
                    <div style="font-size:14px; color:#6b7280;">
                        Affichage de <span style="font-weight:600; color:#1f2937;">{{ $products->firstItem() ?? 0 }}</span>
                        à <span style="font-weight:600; color:#1f2937;">{{ $products->lastItem() ?? 0 }}</span> sur <span
                            style="font-weight:600; color:#1f2937;">{{ $products->total() }}</span> résultats
                    </div>
                    <div style="display:flex; gap:8px;">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
