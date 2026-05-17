@extends('layouts.shop')

@section('title', $product->name)

@php
    $sortedImages = $product->images->sortBy('order')->values();
    $primaryImage = $sortedImages->firstWhere('is_primary', true) ?? $sortedImages->first();
    $placeholder = 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=800&h=800&fit=crop';

    $breadcrumbCategories = collect();
    $cat = $product->category;
    while ($cat) {
        $breadcrumbCategories->prepend($cat);
        $cat = $cat->parent;
    }

    $dimensions = is_array($product->dimensions) ? $product->dimensions : [];
@endphp

@push('styles')
<style>
    :root {
        --shop-primary: var(--dollars-blue, #1e40af);
        --shop-primary-dark: #1e3a8a;
        --shop-primary-light: var(--dollars-blue-light, #3b82f6);
        --shop-primary-bg: #eff6ff;
        --shop-accent: var(--dollars-red, #dc2626);
        --shop-text: var(--dollars-gray, #374151);
        --shop-text-muted: var(--dollars-gray-light, #6b7280);
        --shop-border: #e5e7eb;
    }

    .shop-header {
        background: linear-gradient(135deg, var(--shop-primary-dark) 0%, var(--shop-primary-light) 100%);
        position: relative;
        padding: 0 24px;
    }

    .shop-header-inner {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        min-height: 72px;
        gap: 24px;
        flex-wrap: wrap;
    }

    .shop-logo {
        display: flex;
        align-items: center;
        gap: 10px;
        text-decoration: none;
        color: #fff;
        font-weight: 800;
        font-size: 18px;
        letter-spacing: 0.02em;
    }

    .shop-nav {
        display: flex;
        gap: 28px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .shop-nav a {
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.08em;
        opacity: 0.95;
        transition: opacity 0.2s;
    }

    .shop-nav a:hover { opacity: 1; }

    .shop-header-actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .shop-header-actions a {
        color: #fff;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
    }

    .shop-search {
        display: flex;
        align-items: center;
        background: rgba(255,255,255,0.2);
        border-radius: 4px;
        padding: 6px 12px;
        gap: 8px;
    }

    .shop-search input {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 13px;
        width: 120px;
        outline: none;
    }

    .shop-search input::placeholder { color: rgba(255,255,255,0.7); }

    .shop-scallop {
        display: block;
        width: 100%;
        height: 28px;
        margin-bottom: -1px;
    }

    .shop-scallop path { fill: #fff; }

    .product-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 32px 24px 64px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 48px;
        align-items: start;
    }

    @media (max-width: 900px) {
        .product-grid { grid-template-columns: 1fr; gap: 32px; }
        .shop-nav { display: none; }
    }

    .gallery-main {
        position: relative;
        background: #fafafa;
        border: 1px solid var(--shop-border);
        border-radius: 4px;
        padding: 40px 24px 24px;
        text-align: center;
        min-height: 380px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .gallery-main img {
        max-width: 100%;
        max-height: 320px;
        object-fit: contain;
        transition: opacity 0.3s;
    }

    .discount-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        width: 64px;
        height: 64px;
        background: var(--shop-accent);
        color: #fff;
        font-weight: 800;
        font-size: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        clip-path: polygon(
            50% 0%, 61% 10%, 75% 6%, 80% 20%, 94% 25%, 88% 38%,
            100% 50%, 88% 62%, 94% 75%, 80% 80%, 75% 94%, 61% 90%,
            50% 100%, 39% 90%, 25% 94%, 20% 80%, 6% 75%, 12% 62%,
            0% 50%, 12% 38%, 6% 25%, 20% 20%, 25% 6%, 39% 10%
        );
    }

    .gallery-dots {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin-top: 20px;
    }

    .gallery-dot {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        border: none;
        background: #d1d5db;
        cursor: pointer;
        padding: 0;
        transition: background 0.2s, transform 0.2s;
    }

    .gallery-dot.active {
        background: var(--shop-primary);
        transform: scale(1.15);
    }

    .variations-title {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.12em;
        color: var(--shop-text-muted);
        margin: 28px 0 12px;
        text-transform: uppercase;
    }

    .variations-grid {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .variation-thumb {
        width: 72px;
        height: 72px;
        border: 2px solid var(--shop-border);
        border-radius: 4px;
        padding: 6px;
        background: #fff;
        cursor: pointer;
        transition: border-color 0.2s, box-shadow 0.2s;
        display: block;
        text-decoration: none;
    }

    .variation-thumb:hover,
    .variation-thumb.active {
        border-color: var(--shop-primary);
        box-shadow: 0 0 0 1px var(--shop-primary);
    }

    .variation-thumb img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .product-info { padding-top: 8px; }

    .breadcrumbs {
        font-size: 11px;
        color: var(--shop-text-muted);
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .breadcrumbs a {
        color: var(--shop-text-muted);
        text-decoration: none;
    }

    .breadcrumbs a:hover { color: var(--shop-primary); }

    .product-code {
        font-size: 12px;
        color: var(--shop-text-muted);
        margin-bottom: 12px;
    }

    .product-title {
        font-size: clamp(1.5rem, 3vw, 2rem);
        font-weight: 800;
        color: var(--shop-primary);
        text-transform: uppercase;
        letter-spacing: 0.02em;
        line-height: 1.2;
        margin: 0 0 16px;
    }

    .product-price {
        font-size: 1.75rem;
        font-weight: 800;
        color: var(--shop-primary);
        margin-bottom: 12px;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 20px;
    }

    .stars { color: var(--shop-primary); font-size: 18px; letter-spacing: 2px; }

    .reviews-link {
        font-size: 13px;
        color: var(--shop-text);
        text-decoration: underline;
    }

    .product-description {
        font-size: 14px;
        line-height: 1.7;
        color: var(--shop-text);
        margin-bottom: 28px;
    }

    .size-label {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        color: var(--shop-text-muted);
        margin-bottom: 10px;
        display: block;
    }

    .size-row {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }

    .size-select {
        flex: 1;
        min-width: 100px;
        max-width: 160px;
        padding: 12px 14px;
        border: 1px solid var(--shop-border);
        border-radius: 2px;
        font-size: 14px;
        color: var(--shop-text-muted);
        background: #fff;
        appearance: auto;
    }

    .size-guide {
        margin-left: auto;
        font-size: 12px;
        color: var(--shop-text);
        text-decoration: underline;
    }

    .action-buttons {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px;
        margin-bottom: 24px;
    }

    @media (max-width: 500px) {
        .action-buttons { grid-template-columns: 1fr; }
    }

    .btn-cart {
        padding: 16px 24px;
        background: linear-gradient(135deg, var(--shop-primary-light) 0%, #2563eb 100%);
        color: #fff;
        border: none;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: 0.08em;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity 0.2s, box-shadow 0.2s;
        box-shadow: 0 4px 12px rgba(30, 64, 175, 0.25);
    }

    .btn-cart:hover {
        opacity: 0.95;
        box-shadow: 0 6px 16px rgba(30, 64, 175, 0.35);
    }

    .btn-wishlist {
        padding: 16px 24px;
        background: #fff;
        color: var(--shop-text-muted);
        border: 2px solid var(--shop-border);
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.06em;
        cursor: pointer;
        transition: border-color 0.2s, color 0.2s;
    }

    .btn-wishlist:hover {
        border-color: var(--shop-primary);
        color: var(--shop-primary);
    }

    .delivery-box {
        border-top: 1px solid var(--shop-border);
        padding-top: 20px;
    }

    .delivery-box h4 {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.1em;
        color: var(--shop-text-muted);
        margin: 0 0 8px;
        text-transform: uppercase;
    }

    .delivery-box a {
        font-size: 13px;
        color: var(--shop-text);
        text-decoration: underline;
    }

    .product-tabs-section {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 24px 64px;
    }

    .product-tabs {
        display: flex;
        border-bottom: 1px solid var(--shop-border);
        gap: 0;
        overflow-x: auto;
    }

    .product-tab {
        padding: 14px 24px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        color: var(--shop-text-muted);
        background: none;
        border: none;
        border-bottom: 3px solid transparent;
        cursor: pointer;
        white-space: nowrap;
        transition: color 0.2s, border-color 0.2s;
    }

    .product-tab:hover { color: var(--shop-primary); }

    .product-tab.active {
        color: var(--shop-primary);
        border-bottom-color: var(--shop-primary);
    }

    .tab-panel {
        display: none;
        padding: 24px 0;
    }

    .tab-panel.active { display: block; }

    .detail-table {
        width: 100%;
        border-collapse: collapse;
    }

    .detail-table tr {
        border-bottom: 1px solid var(--shop-border);
    }

    .detail-table td {
        padding: 14px 0;
        font-size: 14px;
        vertical-align: top;
    }

    .detail-table td:first-child {
        font-weight: 700;
        color: var(--shop-text);
        width: 220px;
        padding-right: 24px;
    }

    .detail-table td:last-child {
        color: var(--shop-text);
    }

    .tab-text {
        font-size: 14px;
        line-height: 1.8;
        color: var(--shop-text);
        max-width: 720px;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-active { background: #dcfce7; color: #166534; }
    .status-draft { background: #fef3c7; color: #92400e; }
</style>
@endpush

@section('content')
    {{-- En-tête boutique (style maquette) --}}
    <header class="shop-header">
        <div class="shop-header-inner">
            <a href="{{ route('shop.index') }}" class="shop-logo">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <path d="M16 10a4 4 0 01-8 0"/>
                </svg>
                DOLLARS MENUISERIE
            </a>

            <ul class="shop-nav">
                <li><a href="{{ route('shop.index') }}">CATALOGUE</a></li>
                <li><a href="{{ route('shop.index') }}">SUR MESURE</a></li>
                @if($product->category)
                    <li><a href="{{ route('shop.index') }}">{{ strtoupper($product->category->name) }}</a></li>
                @endif
                <li><a href="{{ route('shop.index') }}">PROMOTIONS</a></li>
            </ul>

            <div class="shop-header-actions">
                <a href="{{ route('shop.cart') }}">PANIER</a>
                <a href="{{ route('login') }}">COMPTE</a>
                <div class="shop-search">
                    <svg width="16" height="16" fill="none" stroke="rgba(255,255,255,0.9)" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/>
                    </svg>
                    <input type="search" placeholder="Rechercher…" aria-label="Rechercher">
                </div>
            </div>
        </div>
        <svg class="shop-scallop" viewBox="0 0 1200 28" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,28 L0,14 C50,0 100,28 150,14 C200,0 250,28 300,14 C350,0 400,28 450,14 C500,0 550,28 600,14 C650,0 700,28 750,14 C800,0 850,28 900,14 C950,0 1000,28 1050,14 C1100,0 1150,28 1200,14 L1200,28 Z"/>
        </svg>
    </header>

    <div class="product-page">
        <div class="product-grid">
            {{-- Galerie images --}}
            <div class="product-gallery">
                <div class="gallery-main">
                    <img id="mainProductImage"
                        src="{{ $primaryImage ? asset('storage/'.$primaryImage->image_path) : $placeholder }}"
                        alt="{{ $product->name }}">
                </div>

                @if($sortedImages->count() > 1)
                    <div class="gallery-dots" id="galleryDots">
                        @foreach($sortedImages as $index => $image)
                            <button type="button"
                                class="gallery-dot {{ $index === 0 ? 'active' : '' }}"
                                data-src="{{ asset('storage/'.$image->image_path) }}"
                                data-index="{{ $index }}"
                                aria-label="Image {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                @endif

                @if($product->variants->isNotEmpty() || $relatedProducts->isNotEmpty())
                    <p class="variations-title">Autres variations</p>
                    <div class="variations-grid">
                        @foreach($product->variants as $variant)
                            <button type="button" class="variation-thumb" title="{{ $variant->name }}"
                                data-variant="{{ $variant->name }}">
                                <span style="font-size:10px;color:var(--shop-text-muted);display:flex;align-items:center;justify-content:center;height:100%;text-align:center;padding:4px;">
                                    {{ Str::limit($variant->name, 12) }}
                                </span>
                            </button>
                        @endforeach
                        @foreach($relatedProducts as $related)
                            @php
                                $relImg = $related->images->firstWhere('is_primary', true) ?? $related->images->first();
                            @endphp
                            <a href="{{ route('shop.show', $related) }}"
                                class="variation-thumb {{ $related->id === $product->id ? 'active' : '' }}"
                                title="{{ $related->name }}">
                                <img src="{{ $relImg ? asset('storage/'.$relImg->image_path) : $placeholder }}"
                                    alt="{{ $related->name }}">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Informations produit --}}
            <div class="product-info">
                <nav class="breadcrumbs" aria-label="Fil d'Ariane">
                    <a href="{{ route('shop.index') }}">Boutique</a>
                    @foreach($breadcrumbCategories as $crumb)
                        / <a href="{{ route('shop.index') }}">{{ strtoupper($crumb->name) }}</a>
                    @endforeach
                    / <span>{{ strtoupper($product->name) }}</span>
                </nav>

                <p class="product-code">CODE PRODUIT : {{ strtoupper($product->sku) }}</p>

                <h1 class="product-title">{{ $product->name }}</h1>

                <p class="product-price">
                    {{ number_format($product->base_price, 0, ',', ' ') }} FCFA
                    @if($product->cost_price && $product->cost_price != $product->base_price)
                        <span style="font-size:14px;font-weight:500;color:var(--shop-text-muted);text-decoration:line-through;margin-left:8px;">
                            {{ number_format($product->cost_price, 0, ',', ' ') }} FCFA
                        </span>
                    @endif
                </p>

                <div class="product-rating">
                    <span class="stars" aria-hidden="true">★★★★★</span>
                    <a href="#reviews" class="reviews-link">{{ $product->views_count }} vue(s)</a>
                </div>

                <div class="product-description">
                    @if($product->short_description)
                        <p><strong>{{ $product->short_description }}</strong></p>
                    @endif
                    <p>{{ $product->description ?: 'Découvrez ce produit artisanal réalisé par DOLLARS MENUISERIE. Qualité premium, finitions soignées et fabrication sur mesure disponible.' }}</p>
                </div>

                @if($product->variants->isNotEmpty() || !empty($dimensions))
                    <span class="size-label">OPTIONS</span>
                    <div class="size-row">
                        @if($product->variants->isNotEmpty())
                            <select class="size-select" id="variantSelect" name="variant_id">
                                @foreach($product->variants as $variant)
                                    <option value="{{ $variant->id }}"
                                        data-price-modifier="{{ $variant->price_modifier }}">
                                        {{ $variant->name }}
                                        @if($variant->price_modifier != 0)
                                            ({{ $variant->price_modifier > 0 ? '+' : '' }}{{ number_format($variant->price_modifier, 0, ',', ' ') }} FCFA)
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        @if(!empty($dimensions))
                            <select class="size-select" id="dimensionSelect">
                                <option value="">Dimensions</option>
                                @foreach($dimensions as $key => $value)
                                    <option value="{{ $value }}">{{ ucfirst($key) }} : {{ $value }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if($product->is_customizable)
                            <a href="{{ route('shop.customize', $product) }}" class="size-guide">Personnaliser</a>
                        @endif
                    </div>
                @endif

                <div class="action-buttons">
                    <a href="{{ route('shop.cart') }}" class="btn-cart">AJOUTER AU PANIER</a>
                    <button type="button" class="btn-wishlist" onclick="alert('Liste de souhaits — bientôt disponible')">
                        AJOUTER AUX FAVORIS
                    </button>
                </div>

                <div class="delivery-box">
                    <h4>ESTIMATION DE LIVRAISON</h4>
                    <p style="font-size:13px;color:var(--shop-text);margin:0 0 8px;">
                        Délai de fabrication estimé :
                        <strong>{{ $product->min_fabrication_days }} jour(s)</strong>
                        @if($product->weight_kg)
                            — Poids : {{ $product->weight_kg }} kg
                        @endif
                    </p>
                    <a href="#">Conditions générales de vente</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Onglets détails --}}
    <section class="product-tabs-section">
        <div class="product-tabs" role="tablist">
            <button type="button" class="product-tab active" data-tab="detail" role="tab" aria-selected="true">
                DÉTAIL
            </button>
            <button type="button" class="product-tab" data-tab="size" role="tab" aria-selected="false">
                DIMENSIONS
            </button>
            <button type="button" class="product-tab" data-tab="return" role="tab" aria-selected="false">
                RETOURS
            </button>
            <button type="button" class="product-tab" data-tab="delivery" role="tab" aria-selected="false">
                LIVRAISON
            </button>
        </div>

        <div id="tab-detail" class="tab-panel active" role="tabpanel">
            <table class="detail-table">
                <tbody>
                    <tr>
                        <td>SKU</td>
                        <td>{{ $product->sku }}</td>
                    </tr>
                    <tr>
                        <td>Catégorie</td>
                        <td>{{ $product->category?->name ?? '—' }}</td>
                    </tr>
                    <tr>
                        <td>Statut</td>
                        <td>
                            <span class="status-badge status-{{ $product->status === 'active' ? 'active' : 'draft' }}">
                                {{ $product->status === 'active' ? 'Disponible' : ucfirst($product->status) }}
                            </span>
                        </td>
                    </tr>
                    @if($product->weight_kg)
                        <tr>
                            <td>Poids</td>
                            <td>{{ $product->weight_kg }} kg</td>
                        </tr>
                    @endif
                    <tr>
                        <td>Personnalisable</td>
                        <td>{{ $product->is_customizable ? 'Oui' : 'Non' }}</td>
                    </tr>
                    @if($product->meta_title)
                        <tr>
                            <td>Titre SEO</td>
                            <td>{{ $product->meta_title }}</td>
                        </tr>
                    @endif
                    @foreach($dimensions as $key => $value)
                        <tr>
                            <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                            <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="tab-size" class="tab-panel" role="tabpanel">
            @if(!empty($dimensions))
                <table class="detail-table">
                    <tbody>
                        @foreach($dimensions as $key => $value)
                            <tr>
                                <td>{{ ucfirst(str_replace('_', ' ', $key)) }}</td>
                                <td>{{ is_array($value) ? json_encode($value) : $value }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="tab-text">Les dimensions détaillées de ce produit seront communiquées sur demande. Contactez-nous pour un devis sur mesure.</p>
            @endif
        </div>

        <div id="tab-return" class="tab-panel" role="tabpanel">
            <p class="tab-text">
                Les articles sur mesure ne sont pas éligibles au retour standard. Pour les produits du catalogue,
                vous disposez de 14 jours après réception pour signaler tout défaut de fabrication.
                Contactez notre service client avec votre numéro de commande.
            </p>
        </div>

        <div id="tab-delivery" class="tab-panel" role="tabpanel">
            <table class="detail-table">
                <tbody>
                    <tr>
                        <td>Délai de fabrication</td>
                        <td>{{ $product->min_fabrication_days }} jour(s) ouvré(s) minimum</td>
                    </tr>
                    <tr>
                        <td>Zone de livraison</td>
                        <td>Yaoundé, Douala et environs — autres villes sur devis</td>
                    </tr>
                    <tr>
                        <td>Installation</td>
                        <td>Service optionnel selon le type de meuble</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>
@endsection

@push('scripts')
<script>
(function () {
    const mainImg = document.getElementById('mainProductImage');
    const dots = document.querySelectorAll('.gallery-dot');

    dots.forEach(function (dot) {
        dot.addEventListener('click', function () {
            const src = dot.getAttribute('data-src');
            if (!src || !mainImg) return;
            mainImg.style.opacity = '0';
            setTimeout(function () {
                mainImg.src = src;
                mainImg.style.opacity = '1';
            }, 150);
            dots.forEach(function (d) { d.classList.remove('active'); });
            dot.classList.add('active');
        });
    });

    document.querySelectorAll('.product-tab').forEach(function (tab) {
        tab.addEventListener('click', function () {
            const target = tab.getAttribute('data-tab');
            document.querySelectorAll('.product-tab').forEach(function (t) {
                t.classList.remove('active');
                t.setAttribute('aria-selected', 'false');
            });
            document.querySelectorAll('.tab-panel').forEach(function (p) {
                p.classList.remove('active');
            });
            tab.classList.add('active');
            tab.setAttribute('aria-selected', 'true');
            const panel = document.getElementById('tab-' + target);
            if (panel) panel.classList.add('active');
        });
    });

    const thumbs = document.querySelectorAll('.variation-thumb[data-src]');
    thumbs.forEach(function (thumb) {
        thumb.addEventListener('click', function () {
            const src = thumb.getAttribute('data-src');
            if (src && mainImg) mainImg.src = src;
        });
    });
})();
</script>
@endpush
