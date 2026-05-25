<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture {{ $invoice->invoice_number }}</title>
    <style>
        body { font-family: 'Helvetica', 'Arial', sans-serif; color: #333; font-size: 14px; }
        .header { width: 100%; margin-bottom: 30px; }
        .header table { width: 100%; }
        .logo { font-size: 24px; font-weight: bold; color: #1e40af; }
        .company-info { text-align: right; font-size: 12px; color: #666; }
        .invoice-title { font-size: 28px; font-weight: bold; margin-bottom: 20px; color: #1f2937; text-align: center; }
        .details-table { width: 100%; margin-bottom: 30px; border-collapse: collapse; }
        .details-table td { vertical-align: top; width: 50%; }
        .details-box { background: #f9fafb; padding: 15px; border-radius: 8px; border: 1px solid #e5e7eb; }
        .details-box h3 { margin-top: 0; font-size: 16px; color: #111827; margin-bottom: 10px; }
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 30px; }
        .items-table th { background: #1e40af; color: white; padding: 10px; text-align: left; font-size: 13px; }
        .items-table td { padding: 10px; border-bottom: 1px solid #e5e7eb; }
        .totals-table { width: 40%; float: right; border-collapse: collapse; }
        .totals-table td { padding: 8px; }
        .totals-table .label { font-weight: bold; text-align: left; }
        .totals-table .value { text-align: right; }
        .totals-table .grand-total { font-size: 18px; font-weight: bold; color: #1e40af; border-top: 2px solid #1e40af; }
        .footer { position: fixed; bottom: -30px; left: 0px; right: 0px; height: 50px; text-align: center; font-size: 11px; color: #999; border-top: 1px solid #e5e7eb; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <table>
            <tr>
                <td>
                    <div class="logo">DOLLARS MENUISERIE</div>
                    <div style="margin-top: 5px; font-size: 12px; color: #666;">
                        123 Rue des Artisans, Douala<br>
                        Tél: +237 93387100<br>
                        contact@dollars-menuiserie.com
                    </div>
                </td>
                <td class="company-info">
                    <h2 style="margin: 0; color: #1e40af; font-size: 20px;">FACTURE</h2>
                    <div style="margin-top: 10px;">
                        <strong>Référence :</strong> {{ $invoice->invoice_number }}<br>
                        <strong>Date d'émission :</strong> {{ $invoice->invoice_date->format('d/m/Y') }}<br>
                        <strong>Échéance :</strong> {{ $invoice->due_date->format('d/m/Y') }}
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <table class="details-table">
        <tr>
            <td style="padding-right: 15px;">
                <div class="details-box">
                    <h3>Facturé à :</h3>
                    <strong>{{ $invoice->order->client->name ?? 'Client' }}</strong><br>
                    {{ $invoice->order->client->email ?? '' }}<br>
                    {{ $invoice->order->client->phone ?? '' }}<br>
                    @if($invoice->order && $invoice->order->address)
                        {{ $invoice->order->address->street }}<br>
                        {{ $invoice->order->address->city }}, {{ $invoice->order->address->postal_code }}<br>
                        {{ $invoice->order->address->country }}
                    @endif
                </div>
            </td>
            <td style="padding-left: 15px;">
                <div class="details-box">
                    <h3>Informations Commande :</h3>
                    <strong>N° Commande :</strong> {{ $invoice->order->reference ?? 'N/A' }}<br>
                    <strong>Statut Facture :</strong> 
                    @php
                        $statuses = ['draft' => 'Brouillon', 'sent' => 'Envoyée', 'paid' => 'Payée', 'overdue' => 'En retard', 'cancelled' => 'Annulée'];
                    @endphp
                    {{ $statuses[$invoice->status] ?? $invoice->status }}<br>
                </div>
            </td>
        </tr>
    </table>

    <table class="items-table">
        <thead>
            <tr>
                <th>Désignation</th>
                <th>Quantité</th>
                <th>Prix Unitaire</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @if($invoice->order && $invoice->order->items)
                @foreach($invoice->order->items as $item)
                <tr>
                    <td>
                        {{ $item->product->name ?? 'Produit' }}
                        @if($item->customizations)
                            @php
                                $customs = is_string($item->customizations) ? json_decode($item->customizations, true) : $item->customizations;
                                $customText = is_array($customs) ? collect($customs)->map(fn($v, $k) => "$k: $v")->implode(', ') : '';
                            @endphp
                            @if($customText)
                                <br><span style="font-size: 11px; color: #666;">Perso: {{ $customText }}</span>
                            @endif
                        @endif
                    </td>
                    <td style="text-align: center;">{{ $item->quantity }}</td>
                    <td style="text-align: right;">{{ number_format($item->unit_price, 0, ',', ' ') }} FCFA</td>
                    <td style="text-align: right;">{{ number_format($item->subtotal, 0, ',', ' ') }} FCFA</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4" style="text-align: center;">Aucun article détaillé</td>
                </tr>
            @endif
        </tbody>
    </table>

    <table class="totals-table">
        <tr>
            <td class="label">Sous-total :</td>
            <td class="value">{{ number_format($invoice->subtotal, 0, ',', ' ') }} FCFA</td>
        </tr>
        <tr>
            <td class="label">Taxe :</td>
            <td class="value">{{ number_format($invoice->tax_amount, 0, ',', ' ') }} FCFA</td>
        </tr>
        <tr>
            <td class="label">Frais Livraison :</td>
            <td class="value">{{ number_format($invoice->order->delivery_fee ?? 0, 0, ',', ' ') }} FCFA</td>
        </tr>
        <tr>
            <td class="label grand-total">TOTAL À PAYER :</td>
            <td class="value grand-total">{{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA</td>
        </tr>
    </table>

    <div style="clear: both; margin-top: 50px;">
        <p style="font-size: 12px; color: #666;">
            <strong>Notes :</strong> {{ $invoice->notes ?? 'Merci pour votre confiance ! Le paiement est attendu dans les délais impartis.' }}
        </p>
    </div>

    <div class="footer">
        DOLLARS MENUISERIE - NUI: XXXXXXXX - RCCM: XXXXXX - Page 1/1
    </div>
</body>
</html>
