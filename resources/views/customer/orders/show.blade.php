@extends('layouts.app')

@section('title', 'Détails de la commande ' . $order->reference)
@section('subtitle', 'Suivez l\'état d\'avancement de votre commande')

@section('content')
<div id="customer-order-show">
    <div style="padding:24px; max-width:1000px; margin:0 auto;">

        @if(session('success'))
            <div style="background:#d1fae5; color:#065f46; padding:16px; border-radius:12px; margin-bottom:24px; font-weight:600; display:flex; align-items:center; gap:12px; box-shadow: 0 4px 12px rgba(16, 185, 129, 0.1);">
                <span style="font-size:24px;">🎉</span>
                {{ session('success') }}
            </div>
        @endif

        <!-- Order Header -->
        <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px; display:flex; justify-content:space-between; align-items:center;">
            <div>
                <h1 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px 0;">
                    Commande {{ $order->reference }}
                </h1>
                <p style="color:#6b7280; font-size:14px; margin:0;">
                    Effectuée le {{ $order->created_at->format('d/m/Y à H:i') }}
                </p>
            </div>
            <div>
                @php
                    $statusColors = [
                        'pending' => ['bg' => '#fef3c7', 'text' => '#d97706', 'label' => 'En attente'],
                        'confirmed' => ['bg' => '#e0e7ff', 'text' => '#4338ca', 'label' => 'Confirmée'],
                        'in_production' => ['bg' => '#fce7f3', 'text' => '#be185d', 'label' => 'En fabrication'],
                        'ready' => ['bg' => '#f3e8ff', 'text' => '#7e22ce', 'label' => 'Prête'],
                        'delivering' => ['bg' => '#e0f2fe', 'text' => '#0369a1', 'label' => 'En livraison'],
                        'delivered' => ['bg' => '#d1fae5', 'text' => '#059669', 'label' => 'Livrée'],
                        'cancelled' => ['bg' => '#fee2e2', 'text' => '#dc2626', 'label' => 'Annulée'],
                    ];
                    $status = $statusColors[$order->status] ?? $statusColors['pending'];
                @endphp
                <span style="background:{{ $status['bg'] }}; color:{{ $status['text'] }}; padding:6px 16px; border-radius:20px; font-size:14px; font-weight:600;">
                    {{ $status['label'] }}
                </span>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:2fr 1fr; gap:24px;">
            <!-- Order Items -->
            <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Produits commandés</h2>
                
                <div style="display:grid; gap:16px;">
                    @foreach($order->items as $item)
                    <div style="display:flex; gap:16px; padding-bottom:16px; border-bottom:1px solid #f3f4f6;">
                        <div style="width:80px; height:80px; background:#f9fafb; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                            @if($item->product && $item->product->images->count() > 0)
                                <img src="{{ asset('storage/' . $item->product->images->first()->image_path) }}" alt="{{ $item->product->name }}" style="width:100%; height:100%; object-fit:cover;">
                            @else
                                <span style="font-size:32px;">🪑</span>
                            @endif
                        </div>
                        <div style="flex:1;">
                            <div style="display:flex; justify-content:space-between;">
                                <h3 style="font-size:16px; font-weight:600; color:#1f2937; margin:0 0 4px 0;">
                                    {{ $item->product ? $item->product->name : 'Produit introuvable' }}
                                </h3>
                                <div style="font-weight:700; color:#1f2937; font-size:16px;">
                                    {{ number_format($item->unit_price * $item->quantity, 0, ',', ' ') }} FCFA
                                </div>
                            </div>
                            <p style="color:#6b7280; font-size:13px; margin:0 0 8px 0;">
                                Prix unitaire: {{ number_format($item->unit_price, 0, ',', ' ') }} FCFA x {{ $item->quantity }}
                            </p>
                            
                            @if($item->customization)
                                <div style="background:#f9fafb; padding:8px 12px; border-radius:6px; font-size:12px; color:#4b5563;">
                                    <strong style="color:#374151;">Détails sur mesure:</strong><br>
                                    @php
                                        $customs = is_string($item->customization) ? json_decode($item->customization, true) : $item->customization;
                                    @endphp
                                    @if(isset($customs['dimension'])) Dim: {{ $customs['dimension'] }} <br>@endif
                                    @if(isset($customs['custom_width'])) Largeur: {{ $customs['custom_width'] }} cm <br>@endif
                                    @if(isset($customs['custom_height'])) Hauteur: {{ $customs['custom_height'] }} cm @endif
                                </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Summary & Details -->
            <div style="display:grid; gap:24px; align-content:start;">
                
                <!-- Summary -->
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Récapitulatif</h2>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Sous-total</span>
                        <span style="font-weight:600; color:#1f2937;">{{ number_format($order->subtotal, 0, ',', ' ') }} FCFA</span>
                    </div>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Livraison</span>
                        <span style="font-weight:600; color:#1f2937;">{{ $order->delivery_fee > 0 ? number_format($order->delivery_fee, 0, ',', ' ') . ' FCFA' : 'Offerte' }}</span>
                    </div>

                    <div style="border-top:1px solid #e5e7eb; margin:16px 0;"></div>

                    <div style="display:flex; justify-content:space-between;">
                        <span style="font-size:18px; font-weight:700; color:#1f2937;">Total</span>
                        <span style="font-size:24px; font-weight:700; color:#10b981;">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</span>
                    </div>
                </div>

                <!-- Info -->
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Informations</h2>
                    
                    <div style="margin-bottom:16px;">
                        <span style="display:block; font-size:12px; font-weight:600; color:#9ca3af; text-transform:uppercase; margin-bottom:4px;">Mode de paiement</span>
                        <div style="color:#374151; font-weight:500;">
                            @if($order->payment_status === 'unpaid')
                                <span style="color:#dc2626;">Non payé</span><br>
                                <span style="font-size:12px; color:#6b7280;">(Paiement à la livraison ou ultérieur)</span>
                            @else
                                {{ ucfirst($order->payment_status) }}
                            @endif
                        </div>
                    </div>

                    <div style="margin-bottom:16px;">
                        <span style="display:block; font-size:12px; font-weight:600; color:#9ca3af; text-transform:uppercase; margin-bottom:4px;">Mode de livraison</span>
                        <div style="color:#374151; font-weight:500;">
                            {{ $order->delivery_type === 'pickup' ? 'Retrait en atelier' : 'Livraison à domicile' }}
                        </div>
                    </div>

                    @if($order->address)
                    <div>
                        <span style="display:block; font-size:12px; font-weight:600; color:#9ca3af; text-transform:uppercase; margin-bottom:4px;">Adresse de référence</span>
                        <div style="color:#374151; font-size:14px; line-height:1.5;">
                            {{ $order->address->street }}<br>
                            {{ $order->address->city }}, {{ $order->address->postal_code }}<br>
                            {{ $order->address->country }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Back Link -->
        <div style="margin-top:24px; text-align:center;">
            <a href="{{ route('shop.index') }}" style="color:#3b82f6; text-decoration:none; font-weight:600; display:inline-block; padding:12px 24px; background:white; border-radius:8px; border:2px solid #e5e7eb; transition:border-color 0.2s;" onmouseover="this.style.borderColor='#3b82f6'" onmouseout="this.style.borderColor='#e5e7eb'">
                ← Retour à la boutique
            </a>
        </div>

    </div>
</div>
@endsection
