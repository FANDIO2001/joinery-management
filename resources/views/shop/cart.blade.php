@extends('layouts.app')

@section('title', 'Mon Panier')
@section('subtitle', 'Gérez vos articles')

@section('content')
@php
    $total = 0;
@endphp
<div id="shop-cart">
    <div style="padding:24px; max-width:1200px; margin:0 auto; margin-top: 4rem;">
        
        <!-- Header -->
        <div style="margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <h1 style="font-size:32px; font-weight:700; color:#1f2937; margin:0;">
                🛒 Mon Panier
            </h1>
            <p style="color:#6b7280; margin:8px 0 0; font-size:16px;">
                {{ isset($cartItems) ? $cartItems->count() : 0 }} article(s) dans votre panier
            </p>
        </div>

        <div style="display:grid; grid-template-columns:1fr 350px; gap:32px;">
            
            <!-- Cart Items -->
            <div>
                <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; overflow:hidden;">
                    
                    @if(isset($cartItems) && $cartItems->count() > 0)
                        @foreach($cartItems as $item)
                            @php
                                $total += $item->unit_price * $item->quantity;
                                $primaryImage = $item->product->images->where('is_primary', true)->first() ?? $item->product->images->first();
                            @endphp
                            <!-- Cart Item -->
                            <div style="padding:24px; border-bottom:1px solid #f3f4f6; display:flex; gap:20px; {{ $item->customization ? 'background:#f9fafb;' : '' }}">
                                <div style="width:120px; height:120px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px solid #e5e7eb; overflow:hidden;">
                                    @if($primaryImage)
                                        <img src="{{ asset('storage/' . $primaryImage->image_path) }}" alt="{{ $item->product->name }}" style="max-width:100%; max-height:100%; object-fit:contain;">
                                    @else
                                        <span style="font-size:40px;">🪑</span>
                                    @endif
                                </div>
                                <div style="flex:1;">
                                    <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:12px;">
                                        <div>
                                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0;">{{ $item->product->name }}</h3>
                                                @if($item->customization)
                                                    <span style="padding:4px 8px; background:#6366f1; color:white; font-size:11px; font-weight:600; border-radius:12px;">Sur mesure</span>
                                                @endif
                                            </div>
                                            
                                            @if($item->customization)
                                                <p style="color:#6b7280; font-size:13px; margin:0; line-height: 1.5;">
                                                    @if(isset($item->customization['dimension'])) Dim: {{ $item->customization['dimension'] }} <br>@endif
                                                    @if(isset($item->customization['custom_width'])) Largeur: {{ $item->customization['custom_width'] }}cm <br>@endif
                                                    @if(isset($item->customization['custom_height'])) Hauteur: {{ $item->customization['custom_height'] }}cm @endif
                                                </p>
                                            @else
                                                <p style="color:#6b7280; font-size:14px; margin:0;">{{ $item->product->sku ?? 'Produit standard' }}</p>
                                            @endif
                                        </div>
                                        <form action="{{ route('shop.cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="padding:6px 12px; background:#fee2e2; color:#dc2626; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                                                🗑️ Supprimer
                                            </button>
                                        </form>
                                    </div>
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <div style="display:flex; align-items:center; gap:12px;">
                                            <form action="{{ route('shop.cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="action" value="decrease">
                                                <button type="submit" style="width:36px; height:36px; background:#f3f4f6; border:none; border-radius:8px; font-size:18px; cursor:pointer;">-</button>
                                            </form>
                                            <span style="font-size:16px; font-weight:600; color:#1f2937; min-width:40px; text-align:center;">{{ $item->quantity }}</span>
                                            <form action="{{ route('shop.cart.update', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="action" value="increase">
                                                <button type="submit" style="width:36px; height:36px; background:#f3f4f4; border:none; border-radius:8px; font-size:18px; cursor:pointer;">+</button>
                                            </form>
                                        </div>
                                        <div style="font-size:20px; font-weight:700; color:#1f2937;">{{ number_format($item->unit_price * $item->quantity, 0, ',', ' ') }} FCFA</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="padding:48px 24px; text-align:center;">
                            <span style="font-size:48px; display:block; margin-bottom:16px;">🛒</span>
                            <h3 style="font-size:18px; font-weight:600; color:#374151; margin-bottom:8px;">Votre panier est vide</h3>
                            <p style="color:#6b7280; margin-bottom:24px;">Découvrez nos produits et trouvez ce dont vous avez besoin.</p>
                        </div>
                    @endif

                </div>

                <!-- Continue Shopping -->
                <div style="margin-top:24px;">
                    <a href="{{ route('shop.index') }}" style="display:inline-flex; align-items:center; gap:8px; padding:12px 24px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">
                        ← Continuer mes achats
                    </a>
                </div>
            </div>

            <!-- Order Summary -->
            <div>
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; position:sticky; top:24px;">
                    <h2 style="font-size:20px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Résumé de la commande</h2>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Sous-total ({{ isset($cartItems) ? $cartItems->sum('quantity') : 0 }} articles)</span>
                        <span style="font-weight:600; color:#1f2937;">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Livraison</span>
                        <div>
                            <a href="#" style="font-weight:700; color:#3b82f6; font-size:15px; text-decoration:underline; z-index:10; position:relative;" onclick="event.stopPropagation();">Devis</a>
                        </div>
                    </div>

                    <div style="border-top:1px solid #e5e7eb; margin:16px 0;"></div>

                    <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
                        <span style="font-size:18px; font-weight:700; color:#1f2937;">Total</span>
                        <span style="font-size:24px; font-weight:700; color:#1f2937;">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>

                    <!-- Checkout Button -->
                    @if(isset($cartItems) && $cartItems->count() > 0)
                    <a href="{{ route('shop.checkout') }}" style="display:block; width:100%; padding:14px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:16px; font-weight:600; text-align:center; text-decoration:none; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                        Passer la commande →
                    </a>
                    @else
                    <button disabled style="display:block; width:100%; padding:14px 20px; background:#9ca3af; color:white; border:none; border-radius:8px; font-size:16px; font-weight:600; text-align:center; cursor:not-allowed;">
                        Passer la commande →
                    </button>
                    @endif

                    <!-- Security Note -->
                    <div style="margin-top:16px; display:flex; align-items:center; gap:8px; justify-content:center;">
                        <span style="font-size:14px; color:#6b7280;">🔒 Paiement sécurisé</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
