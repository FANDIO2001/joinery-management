@extends('layouts.dashboard')

@section('content')
<div style="padding:24px; max-width:1200px; margin:0 auto;">
    
    <!-- Header -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
        <div>
            <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Créer un Devis</h1>
            <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">Commande {{ $order->reference }}</p>
        </div>
        <a href="{{ route('orders.show', $order->id) }}" style="display:flex; align-items:center; gap:8px; padding:10px 18px; background:#6b7280; color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
            ← Retour
        </a>
    </div>

    <!-- Main Content -->
    <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">
        
        <!-- Left Column -->
        <div>
            <!-- Order Details Card -->
            <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                <h2 style="font-size:20px; font-weight:700; color:#1f2937; margin:0 0 20px;">Détails de la Commande</h2>
                
                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">Référence</span>
                    <span style="color:#1f2937; font-weight:600;">{{ $order->reference }}</span>
                </div>
                
                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">Client</span>
                    <span style="color:#1f2937; font-weight:600;">{{ $order->client->name }}</span>
                </div>
                
                <div style="display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #e5e7eb;">
                    <span style="color:#6b7280; font-size:14px;">Date</span>
                    <span style="color:#1f2937; font-weight:600;">{{ $order->created_at->format('d/m/Y') }}</span>
                </div>
            </div>

            <!-- Items Table -->
            <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 16px;">Articles Commandés</h3>
                
                <table style="width:100%; border-collapse:collapse; font-size:14px;">
                    <thead>
                        <tr style="border-bottom:2px solid #e5e7eb;">
                            <th style="text-align:left; padding:12px; color:#6b7280; font-weight:600;">Produit</th>
                            <th style="text-align:right; padding:12px; color:#6b7280; font-weight:600;">Qté</th>
                            <th style="text-align:right; padding:12px; color:#6b7280; font-weight:600;">Prix U.</th>
                            <th style="text-align:right; padding:12px; color:#6b7280; font-weight:600;">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order->items as $item)
                            <tr style="border-bottom:1px solid #e5e7eb;">
                                <td style="padding:12px;">
                                    <div style="color:#1f2937; font-weight:500;">{{ $item->product->name }}</div>
                                    @if($item->customization)
                                        <div style="font-size:12px; color:#6b7280; margin-top:4px;">
                                            @php
                                                $custom = is_string($item->customization) ? json_decode($item->customization, true) : $item->customization;
                                            @endphp
                                            @if(isset($custom['custom_width']))
                                                Largeur: {{ $custom['custom_width'] }}cm
                                            @endif
                                            @if(isset($custom['custom_height']))
                                                Hauteur: {{ $custom['custom_height'] }}cm
                                            @endif
                                        </div>
                                    @endif
                                </td>
                                <td style="padding:12px; text-align:right; color:#1f2937;">{{ $item->quantity }}</td>
                                <td style="padding:12px; text-align:right; color:#1f2937;">{{ number_format($item->unit_price, 0, ',', ' ') }} FCFA</td>
                                <td style="padding:12px; text-align:right; color:#1f2937; font-weight:600;">{{ number_format($item->unit_price * $item->quantity, 0, ',', ' ') }} FCFA</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="padding:20px; text-align:center; color:#6b7280;">Aucun article</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Quote Form -->
            <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px;">
                <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px;">Détails du Devis</h3>
                
                <form action="{{ route('quotes.store', $order) }}" method="POST">
                    @csrf
                    
                    <!-- Subtotal -->
                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-size:14px; font-weight:600; color:#1f2937; margin-bottom:6px;">Sous-total *</label>
                        <input type="number" 
                            name="subtotal" 
                            step="0.01" 
                            required 
                            value="{{ old('subtotal', $order->subtotal) }}"
                            style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px;">
                        @error('subtotal')
                            <p style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Discount -->
                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-size:14px; font-weight:600; color:#1f2937; margin-bottom:6px;">Réduction</label>
                        <input type="number" 
                            name="discount_amount" 
                            step="0.01" 
                            value="{{ old('discount_amount', 0) }}"
                            style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px;">
                    </div>

                    <!-- Tax -->
                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-size:14px; font-weight:600; color:#1f2937; margin-bottom:6px;">Taxes</label>
                        <input type="number" 
                            name="tax_amount" 
                            step="0.01" 
                            value="{{ old('tax_amount', 0) }}"
                            style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px;">
                    </div>

                    <!-- Total -->
                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-size:14px; font-weight:600; color:#1f2937; margin-bottom:6px;">Montant Total *</label>
                        <input type="number" 
                            name="total_amount" 
                            step="0.01" 
                            required 
                            value="{{ old('total_amount', $order->total_amount) }}"
                            style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; font-weight:600; background:#f9fafb;">
                        @error('total_amount')
                            <p style="color:#dc2626; font-size:12px; margin-top:4px;">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Pricing Notes -->
                    <div style="margin-bottom:16px;">
                        <label style="display:block; font-size:14px; font-weight:600; color:#1f2937; margin-bottom:6px;">Notes de Tarification</label>
                        <textarea name="pricing_notes" 
                            style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; min-height:80px;"
                            placeholder="Ex: Frais de fabrication personnalisée, délais, matériaux spéciaux...">{{ old('pricing_notes') }}</textarea>
                    </div>

                    <!-- Notes -->
                    <div style="margin-bottom:20px;">
                        <label style="display:block; font-size:14px; font-weight:600; color:#1f2937; margin-bottom:6px;">Notes Internes</label>
                        <textarea name="notes" 
                            style="width:100%; padding:10px 12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; min-height:80px;"
                            placeholder="Remarques internes pour le suivi...">{{ old('notes') }}</textarea>
                    </div>

                    <!-- Buttons -->
                    <div style="display:flex; gap:12px;">
                        <button type="submit" 
                            style="flex:1; padding:12px 16px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                            ✓ Créer le Devis
                        </button>
                        <a href="{{ route('orders.show', $order->id) }}" 
                            style="flex:1; padding:12px 16px; background:#e5e7eb; color:#1f2937; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; text-decoration:none; text-align:center;">
                            Annuler
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right Column (Summary) -->
        <div>
            <!-- Order Summary -->
            <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; sticky; top:24px;">
                <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px;">Résumé</h3>
                
                <div style="display:flex; justify-content:space-between; padding:12px 0; border-bottom:1px solid #e5e7eb;">
                    <span style="color:#6b7280;">Articles</span>
                    <span style="color:#1f2937; font-weight:600;">{{ $order->items->count() }}</span>
                </div>
                
                <div style="display:flex; justify-content:space-between; padding:12px 0; border-bottom:1px solid #e5e7eb;">
                    <span style="color:#6b7280;">Quantité totale</span>
                    <span style="color:#1f2937; font-weight:600;">{{ $order->items->sum('quantity') }}</span>
                </div>
                
                <div style="display:flex; justify-content:space-between; padding:12px 0; font-size:16px;">
                    <span style="color:#1f2937; font-weight:700;">Montant Base</span>
                    <span style="color:#1f2937; font-weight:700;">{{ number_format($order->subtotal, 0, ',', ' ') }} FCFA</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
