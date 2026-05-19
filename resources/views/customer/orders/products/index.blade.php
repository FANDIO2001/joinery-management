@extends('layouts.dashboard')

@section('content')
    <div id="orders-products-index">
        <div style="padding:24px; max-width:1400px; margin:0 auto;">

            <!-- Header -->
            <div
                style="display:flex; justify-content:space-between;
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
                <div>
                    <h1 style="font-size:28px; font-weight:700;
                           color:#1f2937; margin:0;">
                        Mes Produits
                    </h1>
                    <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                        Produits achetés dans vos commandes
                    </p>
                </div>
            </div>

            <!-- Products Table -->
            <div
                style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; overflow:hidden;">

                <!-- Table Header -->
                <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                    <div
                        style="display:grid; grid-template-columns:80px 120px 1.5fr 2fr 1fr 1fr; gap:16px; align-items:center;">
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            IMAGE</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            RÉF.</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            NOM</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            DESCRIPTION</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            PRIX</div>
                        <div
                            style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">
                            ACTIONS</div>
                    </div>
                </div>

                <!-- Table Rows -->
                <div style="padding:0;">
                    @forelse($products as $product)
                        <div style="display:grid; grid-template-columns:80px 120px 1.5fr 2fr 1fr 1fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                            onmouseover="this.style.backgroundColor='#f9fafb'"
                            onmouseout="this.style.backgroundColor='white'">
                            <div>
                                @if ($product->images && $product->images->first())
                                    <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                        alt="{{ $product->name }}"
                                        style="width:64px; height:64px; object-fit:cover; border-radius:8px; border:1px solid #e5e7eb;">
                                @else
                                    <div
                                        style="width:64px; height:64px; background:#f3f4f6; border-radius:8px; border:1px solid #e5e7eb; display:flex; align-items:center; justify-content:center; font-size:24px;">
                                        📦
                                    </div>
                                @endif
                            </div>
                            <div style="font-size:13px; font-weight:600; color:#6b7280;">
                                {{ $product->sku ?? '—' }}
                            </div>
                            <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                {{ $product->name }}
                            </div>
                            <div style="font-size:14px; color:#6b7280; line-height:1.5;">
                                {{ Str::limit($product->description ?? $product->short_description ?? '—', 80) }}
                            </div>
                            <div style="font-size:14px; font-weight:600; color:#059669;">
                                @if ($product->base_price)
                                    {{ number_format($product->base_price, 0, ',', ' ') }} FCFA
                                @else
                                    <span style="color:#9ca3af; font-weight:400;">—</span>
                                @endif
                            </div>
                            <div>
                                <a href="{{ route('shop.show', $product) }}"
                                    style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; text-decoration:none; display:inline-block;">
                                    👁️ Voir
                                </a>
                            </div>
                        </div>
                    @empty
                        <div style="padding:60px 24px; text-align:center; color:#6b7280;">
                            <span style="font-size:48px; display:block; margin-bottom:12px;">📦</span>
                            <p style="font-size:16px; margin:0;">Aucun produit trouvé dans vos commandes</p>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination -->
                @if ($products->hasPages())
                    <div style="padding:20px 24px; display:flex; justify-content:center;">
                        {{ $products->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
