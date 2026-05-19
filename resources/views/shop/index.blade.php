@extends('layouts.shop')

@section('title', 'Catalogue')

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
        flex-wrap: wrap;
    }

    .shop-nav a {
        color: #fff;
        text-decoration: none;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.08em;
        opacity: 0.95;
        transition: opacity 0.2s, color 0.2s;
    }

    .shop-nav a:hover,
    .shop-nav a.is-active {
        opacity: 1;
        color: #fbbf24;
    }

    .shop-header-actions {
        display: flex;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
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
        width: 140px;
        outline: none;
    }

    .shop-search input::placeholder { color: rgba(255,255,255,0.7); }

    .shop-scallop {
        display: block;
        width: 100%;
        height: 28px;
        margin-bottom: -1px;
    }

    .catalogue-page {
        max-width: 1200px;
        margin: 0 auto;
        padding: 32px 24px 48px;
    }

    .catalogue-intro {
        margin-bottom: 28px;
    }

    .catalogue-intro h1 {
        font-size: 28px;
        font-weight: 800;
        color: var(--shop-primary-dark);
        margin: 0 0 8px;
        letter-spacing: -0.02em;
    }

    .catalogue-intro p {
        margin: 0;
        color: var(--shop-text-muted);
        font-size: 15px;
    }

    .catalogue-layout {
        display: grid;
        grid-template-columns: 240px 1fr;
        gap: 28px;
        align-items: start;
    }

    .catalogue-filters {
        background: #fff;
        border: 1px solid var(--shop-border);
        border-radius: 12px;
        padding: 20px;
        position: sticky;
        top: 16px;
    }

    .catalogue-filters h2 {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        color: var(--shop-text-muted);
        margin: 0 0 16px;
    }

    .filter-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 12px;
        margin-bottom: 4px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        color: var(--shop-text);
        transition: background 0.2s, color 0.2s;
    }

    .filter-link:hover {
        background: var(--shop-primary-bg);
        color: var(--shop-primary);
    }

    .filter-link.is-active {
        background: var(--shop-primary);
        color: #fff;
    }

    .filter-count {
        font-size: 12px;
        opacity: 0.85;
    }

    .catalogue-toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 20px;
        padding-bottom: 16px;
        border-bottom: 1px solid var(--shop-border);
    }

    .catalogue-toolbar .results-count {
        font-size: 14px;
        color: var(--shop-text-muted);
    }

    .catalogue-sort select {
        padding: 8px 12px;
        border: 1px solid var(--shop-border);
        border-radius: 8px;
        font-size: 14px;
        color: var(--shop-text);
        background: #fff;
        cursor: pointer;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
        gap: 24px;
    }

    .product-card {
        background: #fff;
        border: 1px solid var(--shop-border);
        border-radius: 12px;
        overflow: hidden;
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
    }

    .product-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(30, 64, 175, 0.12);
    }

    .product-card-image {
        aspect-ratio: 4/3;
        background: #f3f4f6;
        overflow: hidden;
    }

    .product-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .product-card-body {
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-card-category {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.06em;
        color: var(--shop-primary-light);
        margin-bottom: 6px;
    }

    .product-card-title {
        font-size: 16px;
        font-weight: 700;
        color: var(--shop-text);
        margin: 0 0 8px;
        line-height: 1.3;
    }

    .product-card-title a {
        color: inherit;
        text-decoration: none;
    }

    .product-card-title a:hover {
        color: var(--shop-primary);
    }

    .product-card-desc {
        font-size: 13px;
        color: var(--shop-text-muted);
        line-height: 1.5;
        margin: 0 0 12px;
        flex: 1;
    }

    .product-card-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-top: auto;
    }

    .product-card-price {
        font-size: 18px;
        font-weight: 800;
        color: var(--shop-accent);
    }

    .product-card-btn {
        padding: 8px 14px;
        background: var(--shop-primary);
        color: #fff;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        white-space: nowrap;
        transition: background 0.2s;
    }

    .product-card-btn:hover {
        background: var(--shop-primary-dark);
    }

    .badge-custom {
        display: inline-block;
        margin-top: 8px;
        padding: 3px 8px;
        background: #fef3c7;
        color: #92400e;
        font-size: 11px;
        font-weight: 600;
        border-radius: 4px;
    }

    .catalogue-empty {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 24px;
        background: #f9fafb;
        border-radius: 12px;
        border: 1px dashed var(--shop-border);
    }

    .catalogue-empty p {
        margin: 12px 0 0;
        color: var(--shop-text-muted);
    }

    .catalogue-pagination {
        margin-top: 32px;
        display: flex;
        justify-content: center;
    }

    @media (max-width: 900px) {
        .catalogue-layout {
            grid-template-columns: 1fr;
        }

        .catalogue-filters {
            position: static;
        }

        .shop-nav {
            display: none;
        }
    }
</style>
@endpush

@section('content')
    @include('shop.partials.header', [
        'activeNav' => $activeNav,
        'highlightCategory' => $activeCategory,
    ])

    <main class="catalogue-page">
        <div class="catalogue-intro">
            <h1>
                @if ($activeCategory)
                    {{ $activeCategory->name }}
                @elseif (request()->boolean('custom'))
                    Sur mesure
                @else
                    Catalogue produits
                @endif
            </h1>
            <p>
                @if (request('search'))
                    Résultats pour « {{ request('search') }} » —
                @endif
                {{ $products->total() }} produit{{ $products->total() > 1 ? 's' : '' }} disponible{{ $products->total() > 1 ? 's' : '' }}
            </p>
        </div>

        <div class="catalogue-layout">
            <aside class="catalogue-filters">
                <h2>Catégories</h2>
                <a href="{{ route('shop.index', request()->except('category', 'page')) }}"
                    class="filter-link {{ !request('category') && !request('custom') ? 'is-active' : '' }}">
                    <span>Tous les produits</span>
                </a>
                <a href="{{ route('shop.index', array_merge(request()->except('category', 'page'), ['custom' => 1])) }}"
                    class="filter-link {{ request()->boolean('custom') ? 'is-active' : '' }}">
                    <span>Sur mesure</span>
                </a>
                @foreach ($categories as $category)
                    <a href="{{ route('shop.index', array_merge(request()->except('page', 'custom'), ['category' => $category->id])) }}"
                        class="filter-link {{ (int) request('category') === $category->id ? 'is-active' : '' }}">
                        <span>{{ $category->name }}</span>
                        <span class="filter-count">{{ $category->products_count }}</span>
                    </a>
                @endforeach
            </aside>

            <section>
                <div class="catalogue-toolbar">
                    <span class="results-count">
                        Affichage {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}
                        sur {{ $products->total() }}
                    </span>
                    <form method="GET" action="{{ route('shop.index') }}" class="catalogue-sort">
                        @foreach (request()->except('sort', 'page') as $key => $value)
                            @if (is_scalar($value) && $value !== '')
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach
                        <select name="sort" onchange="this.form.submit()" aria-label="Trier les produits">
                            <option value="latest" @selected(request('sort', 'latest') === 'latest')>Plus récents</option>
                            <option value="name" @selected(request('sort') === 'name')>Nom A–Z</option>
                            <option value="price_asc" @selected(request('sort') === 'price_asc')>Prix croissant</option>
                            <option value="price_desc" @selected(request('sort') === 'price_desc')>Prix décroissant</option>
                        </select>
                    </form>
                </div>

                <div class="products-grid">
                    @forelse ($products as $product)
                        @php
                            $image = $product->images->firstWhere('is_primary', true) ?? $product->images->first();
                            $placeholder = 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=600&h=450&fit=crop';
                        @endphp
                        <article class="product-card">
                            <a href="{{ route('shop.show', $product) }}" class="product-card-image">
                                <img src="{{ $image ? asset('storage/' . $image->image_path) : $placeholder }}"
                                    alt="{{ $product->name }}" loading="lazy">
                            </a>
                            <div class="product-card-body">
                                @if ($product->category)
                                    <span class="product-card-category">{{ $product->category->name }}</span>
                                @endif
                                <h2 class="product-card-title">
                                    <a href="{{ route('shop.show', $product) }}">{{ $product->name }}</a>
                                </h2>
                                <p class="product-card-desc">
                                    {{ Str::limit($product->short_description ?? $product->description, 90) }}
                                </p>
                                @if ($product->is_customizable)
                                    <span class="badge-custom">Personnalisable</span>
                                @endif
                                <div class="product-card-footer">
                                    <span class="product-card-price">
                                        {{ number_format($product->base_price, 0, ',', ' ') }} FCFA
                                    </span>
                                    <a href="{{ route('shop.show', $product) }}" class="product-card-btn">Voir</a>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="catalogue-empty">
                            <span style="font-size:48px;">📦</span>
                            <p>Aucun produit ne correspond à votre recherche.</p>
                            <a href="{{ route('shop.index') }}" class="product-card-btn" style="display:inline-block; margin-top:16px;">
                                Voir tout le catalogue
                            </a>
                        </div>
                    @endforelse
                </div>

                @if ($products->hasPages())
                    <div class="catalogue-pagination">
                        {{ $products->links() }}
                    </div>
                @endif
            </section>
        </div>
    </main>
@endsection
