@extends('layouts.dashboard')
@php use App\Support\OrderStatus; @endphp
@section('title', 'Commandes')
@section('subtitle', 'Détails de la commande')
@section('content')
    <div id="orders-show">
        <div style="padding:24px; max-width:1200px; margin:0 auto;">

            <!-- Header -->
            <div
                style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
                <div>
                    <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                        Détails de la Commande
                    </h1>
                    <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                        {{ $order->reference }}
                    </p>
                </div>
                <div style="display:flex; gap:12px;">
                    <a href="{{ route('orders.index') }}"
                        style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
                        ← Retour
                    </a>
                    <a href="{{ route('orders.edit', $order->id) }}"
                        style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:linear-gradient(135deg, #3b82f6, #2563eb);
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;
                           box-shadow:0 4px 12px rgba(59,130,246,0.3);">
                        ✏️ Modifier
                    </a>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">

                <!-- Left Column -->
                <div>

                    <!-- Order Info Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                        <div style="display:flex; gap:24px; align-items:flex-start;">
                            <div
                                style="width:80px; height:80px; border-radius:16px; 
                                   background:linear-gradient(135deg, #f59e0b, #d97706);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb; color:white; font-weight:700; font-size:32px;">
                                📦
                            </div>
                            <div style="flex:1;">
                                <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                                    {{ $order->reference }}
                                </h2>
                                <p style="color:#6b7280; margin:0 0 16px; font-size:16px;">
                                    Commande de {{ $order->client->name }}
                                </p>
                                <div style="display:flex; gap:20px; flex-wrap:wrap;">
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:8px; height:8px; background:#3b82f6; border-radius:50%;"></div>
                                        <div>
                                            <div style="font-size:12px; color:#6b7280;">Date</div>
                                            <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                                {{ $order->created_at->format('d/m/Y') }}</div>
                                        </div>
                                    </div>
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:8px; height:8px; background:#10b981; border-radius:50%;"></div>
                                        <div>
                                            <div style="font-size:12px; color:#6b7280;">Livraison</div>
                                            <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                                {{ $order->confirmed_at?->format('d/m/Y') ?? 'À confirmer' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Card -->
                    <div
                        style="background:white; border-radius:16px;
                                box-shadow:0 4px 20px rgba(0,0,0,0.08);
                                border:1px solid #e5e7eb; margin-top:24px;">
                        <div style="padding:24px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#f59e0b; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14v11a2 2 0 01-2 2H7a2 2 0 01-2-2V9z"></path>
                                    </svg>
                                </span>
                                Produits commandés
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            <table style="width:100%; border-collapse:collapse;">
                                <thead>
                                    <tr style="border-bottom:2px solid #e5e7eb;">
                                        <th
                                            style="text-align:left; padding:12px 0; font-size:13px; font-weight:600; color:#6b7280;">
                                            Produit</th>
                                        <th
                                            style="text-align:center; padding:12px 0; font-size:13px; font-weight:600; color:#6b7280;">
                                            Quantité</th>
                                        <th
                                            style="text-align:right; padding:12px 0; font-size:13px; font-weight:600; color:#6b7280;">
                                            P.U.</th>
                                        <th
                                            style="text-align:right; padding:12px 0; font-size:13px; font-weight:600; color:#6b7280;">
                                            Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($order->items ?? [] as $item)
                                        <tr style="border-bottom:1px solid #e5e7eb;">
                                            <td style="padding:12px 0; font-size:14px; color:#1f2937;">
                                                {{ $item->product->name ?? 'Produit supprimé' }}</td>
                                            <td style="text-align:center; padding:12px 0; font-size:14px; color:#1f2937;">
                                                {{ $item->quantity }}</td>
                                            <td style="text-align:right; padding:12px 0; font-size:14px; color:#1f2937;">
                                                {{ number_format($item->unit_price, 0, ',', ' ') }} FCFA</td>
                                            <td
                                                style="text-align:right; padding:12px 0; font-size:14px; font-weight:600; color:#1f2937;">
                                                {{ number_format($item->quantity * $item->unit_price, 0, ',', ' ') }} FCFA
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4"
                                                style="padding:12px 0; text-align:center; color:#6b7280; font-size:14px;">
                                                Aucun produit</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <div style="margin-top:16px; padding-top:16px; border-top:2px solid #e5e7eb;">
                                <div style="display:flex; justify-content:flex-end; gap:40px; margin-bottom:8px;">
                                    <div style="font-size:13px; color:#6b7280;">Sous-total:</div>
                                    <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                        {{ number_format($order->subtotal ?? $order->total_amount, 0, ',', ' ') }} FCFA
                                    </div>
                                </div>
                                @if ($order->discount_amount)
                                    <div style="display:flex; justify-content:flex-end; gap:40px; margin-bottom:8px;">
                                        <div style="font-size:13px; color:#6b7280;">Réduction:</div>
                                        <div style="font-size:14px; font-weight:600; color:#ef4444;">
                                            -{{ number_format($order->discount_amount, 0, ',', ' ') }} FCFA</div>
                                    </div>
                                @endif
                                @if ($order->delivery_fee)
                                    <div style="display:flex; justify-content:flex-end; gap:40px; margin-bottom:8px;">
                                        <div style="font-size:13px; color:#6b7280;">Frais de livraison:</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                            {{ number_format($order->delivery_fee, 0, ',', ' ') }} FCFA</div>
                                    </div>
                                @endif
                                <div
                                    style="display:flex; justify-content:flex-end; gap:40px; margin-top:12px; padding-top:12px; border-top:1px solid #e5e7eb;">
                                    <div style="font-size:14px; font-weight:700; color:#1f2937;">TOTAL:</div>
                                    <div style="font-size:18px; font-weight:700; color:#10b981;">
                                        {{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                        <div style="padding:24px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#3b82f6; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </span>
                                Client
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            <div style="display:flex; align-items:center; gap:16px;">
                                <div
                                    style="width:48px; height:48px; border-radius:50%; 
                                       background:linear-gradient(135deg, #3b82f6, #2563eb);
                                       display:flex; align-items:center; justify-content:center;
                                       border:2px solid #e5e7eb; color:white; font-weight:700; font-size:18px;">
                                    {{ strtoupper(substr($order->client->name, 0, 1)) }}{{ strtoupper(substr(explode(' ', $order->client->name)[1] ?? '', 0, 1)) }}
                                </div>
                                <div>
                                    <div style="font-size:15px; font-weight:600; color:#1f2937;">{{ $order->client->name }}
                                    </div>
                                    <div style="font-size:13px; color:#6b7280;">{{ $order->client->email }}</div>
                                    <div style="font-size:13px; color:#6b7280;">{{ $order->client->phone }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; margin-top:24px;">
                        <div style="padding:24px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#10b981; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                </span>
                                Notes
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            <p style="color:#4b5563; line-height:1.6; margin:0;">
                                {{ $order->notes ?? 'Aucune note' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sidebar) -->
                <div>

                    <!-- Status Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                        <div style="padding:16px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#f59e0b; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Statut
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            <span
                                style="display:inline-flex; align-items:center; gap:6px; padding:6px 16px; background:{{ $order->status === 'confirmed' ? '#dbeafe' : ($order->status === 'delivered' ? '#d1fae5' : '#fef3c7') }}; color:{{ $order->status === 'confirmed' ? '#2563eb' : ($order->status === 'delivered' ? '#059669' : '#b45309') }}; font-size:14px; font-weight:600; border-radius:20px;">
                                <div
                                    style="width:8px; height:8px; background:{{ $order->status === 'confirmed' ? '#3b82f6' : ($order->status === 'delivered' ? '#10b981' : '#f59e0b') }}; border-radius:50%;">
                                </div>
                                {{ OrderStatus::meta($order->status)['label'] }}
                            </span>

                            @if ($order->status === 'confirmed' && $order->confirmed_at)
                                <div
                                    style="margin-top:12px; padding:12px; background:#f0fdf4; border-left:3px solid #10b981; border-radius:4px;">
                                    <div style="font-size:12px; color:#059669; font-weight:600;">✓ Confirmée le</div>
                                    <div style="font-size:13px; color:#065f46; margin-top:2px;">
                                        {{ $order->confirmed_at->format('d/m/Y à H:i') }}</div>
                                </div>
                            @elseif($order->status === 'pending')
                                <div
                                    style="margin-top:12px; padding:12px; background:#fef3c7; border-left:3px solid #f59e0b; border-radius:4px;">
                                    <div style="font-size:12px; color:#b45309; font-weight:600;">⏳ En attente de
                                        confirmation</div>
                                    <div style="font-size:12px; color:#92400e; margin-top:2px;">L'administrateur doit
                                        confirmer cette commande</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Total Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                        <div style="padding:16px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#10b981; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </span>
                                Total
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px; text-align:center;">
                            <div style="font-size:32px; font-weight:700; color:#1f2937; margin-bottom:4px;">
                                {{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</div>
                        </div>
                    </div>

                    <!-- Actions Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                        <div style="padding:16px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#ef4444; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </span>
                                Actions
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px; display:flex; flex-direction:column; gap:12px;">
                            @if ($order->status === 'pending' && auth()->user()?->user_type === 'admin')
                                <button type="button"
                                    onclick="document.getElementById('confirmModal').style.display='flex'"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(16,185,129,0.3);"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                                    ✅ Confirmer la commande
                                </button>
                            @elseif($order->status === 'pending_quote' && !$order->quote && auth()->user()?->user_type !== 'client')
                                <a href="{{ route('quotes.create', $order) }}"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #f59e0b, #d97706); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(245,158,11,0.3); width:100%; display:block; text-align:center; text-decoration:none;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(245,158,11,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(245,158,11,0.3)'">
                                    📋 Créer un Devis
                                </a>
                            @elseif($order->quote && $order->quote->status === 'draft' && auth()->user()?->user_type !== 'client')
                                <a href="{{ route('quotes.show', $order->quote) }}"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #f59e0b, #d97706); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(245,158,11,0.3); width:100%; display:block; text-align:center; text-decoration:none;">
                                    📋 Finaliser et envoyer le devis
                                </a>
                            @elseif($order->quote && $order->quote->status === 'approved')
                                <a href="{{ route('quotes.show', $order->quote->id) }}"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #8b5cf6, #7c3aed); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(139,92,246,0.3); width:100%; display:block; text-align:center; text-decoration:none;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(139,92,246,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(139,92,246,0.3)'">
                                    📋 Voir le Devis Approuvé
                                </a>
                            @elseif($order->quote && $order->quote->status === 'sent')
                                <a href="{{ route('quotes.show', $order->quote->id) }}"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #06b6d4, #0891b2); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(6,182,212,0.3); width:100%; display:block; text-align:center; text-decoration:none;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(6,182,212,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(6,182,212,0.3)'">
                                    📋 Devis en Attente d'Approbation
                                </a>
                            @endif

                            <form action="{{ route('orders.generateInvoice', $order->id) }}" method="POST"
                                style="margin:0;">
                                @csrf
                                <button type="submit"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(16,185,129,0.3); width:100%;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                                    📄 Générer facture
                                </button>
                            </form>
                            <form action="{{ route('orders.sendConfirmation', $order->id) }}" method="POST"
                                style="margin:0;">
                                @csrf
                                <button type="submit"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(59,130,246,0.3); width:100%;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(59,130,246,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.3)'">
                                    📧 Envoyer confirmation
                                </button>
                            </form>
                            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="margin:0;"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir annuler cette commande ?');">
                                @csrf
                                <button type="submit"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #ef4444, #dc2626); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(239,68,68,0.3); width:100%;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(239,68,68,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(239,68,68,0.3)'">
                                    🗑️ Annuler la commande
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- History Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                        <div style="padding:16px 24px 8px;">
                            <h3
                                style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                                <span
                                    style="width:24px; height:24px; background:#6b7280; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                    <svg style="width:14px; height:14px; color:white;" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </span>
                                Historique
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            <div style="position:relative; padding-left:20px;">
                                <div style="position:absolute; left:6px; top:0; bottom:0; width:2px; background:#e5e7eb;">
                                </div>
                                @forelse($order->statusHistory ?? [] as $history)
                                    <div style="position:relative; margin-bottom:20px;">
                                        <div
                                            style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:{{ $history->status === 'confirmed' ? '#10b981' : ($history->status === 'delivered' ? '#3b82f6' : ($history->status === 'in_production' ? '#f59e0b' : '#6b7280')) }}; border-radius:50%; border:2px solid white; box-shadow:0 0 0 2px {{ $history->status === 'confirmed' ? '#10b981' : ($history->status === 'delivered' ? '#3b82f6' : ($history->status === 'in_production' ? '#f59e0b' : '#6b7280')) }};">
                                        </div>
                                        <div
                                            style="background:{{ $history->status === 'confirmed' ? '#f0fdf4' : '#f9fafb' }}; padding:12px; border-radius:8px; border-left:3px solid {{ $history->status === 'confirmed' ? '#10b981' : '#e5e7eb' }};">
                                            <div style="font-size:13px; font-weight:600; color:#1f2937;">
                                                @php
                                                    $statusLabels = [
                                                        'pending' => '⏳ En attente',
                                                        'confirmed' => '✅ Confirmée',
                                                        'in_production' => '🏭 En production',
                                                        'ready' => '📦 Prête',
                                                        'delivering' => '🚚 En livraison',
                                                        'delivered' => '✓✓ Livrée',
                                                        'cancelled' => '✕ Annulée',
                                                    ];
                                                @endphp
                                                {{ $statusLabels[$history->status] ?? ucfirst($history->status) }}
                                            </div>
                                            <div style="font-size:12px; color:#6b7280; margin-top:4px;">
                                                {{ $history->changed_at->format('d/m/Y à H:i') }}
                                                @if ($history->changedByUser)
                                                    • par {{ $history->changedByUser->name }}
                                                @endif
                                            </div>
                                            @if ($history->notes)
                                                <div style="font-size:12px; color:#4b5563; margin-top:6px; italic;">
                                                    {{ $history->notes }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @empty
                                    <div style="position:relative;">
                                        <div
                                            style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#10b981; border-radius:50%; border:2px solid white; box-shadow:0 0 0 2px #10b981;">
                                        </div>
                                        <div
                                            style="background:#f0fdf4; padding:12px; border-radius:8px; border-left:3px solid #10b981;">
                                            <div
                                                style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:4px;">
                                                📝 Commande créée</div>
                                            <div style="font-size:12px; color:#6b7280;">
                                                {{ $order->created_at->format('d/m/Y à H:i') }}</div>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Confirmation -->
    @if ($order->status === 'pending' && auth()->user()?->user_type === 'admin')
        <div id="confirmModal"
            style="display:none; position:fixed; top:0; left:0; right:0; bottom:0; background:rgba(0,0,0,0.5); z-index:1000; align-items:center; justify-content:center;">
            <div
                style="background:white; border-radius:16px; box-shadow:0 20px 60px rgba(0,0,0,0.3); max-width:500px; width:90%; padding:32px;">
                <div style="margin-bottom:24px;">
                    <div style="font-size:28px; margin-bottom:12px;">⚠️</div>
                    <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                        Confirmer la commande
                    </h2>
                    <p style="color:#6b7280; margin:0; font-size:15px;">
                        Êtes-vous sûr de vouloir confirmer cette commande ? Cette action marquera le début de la production.
                    </p>
                </div>

                <div
                    style="background:#f0fdf4; border:1px solid #bbf7d0; border-radius:8px; padding:16px; margin-bottom:24px;">
                    <div style="font-size:13px; color:#065f46; font-weight:600; margin-bottom:8px;">Détails de la
                        confirmation:</div>
                    <ul style="margin:0; padding-left:20px; font-size:13px; color:#059669;">
                        <li style="margin-bottom:4px;">Commande: <strong>{{ $order->reference }}</strong></li>
                        <li style="margin-bottom:4px;">Client: <strong>{{ $order->client->name }}</strong></li>
                        <li style="margin-bottom:4px;">Montant:
                            <strong>{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</strong></li>
                        <li>Date: <strong>{{ now()->format('d/m/Y à H:i') }}</strong></li>
                    </ul>
                </div>

                <div style="display:flex; gap:12px; justify-content:flex-end;">
                    <button type="button" onclick="document.getElementById('confirmModal').style.display='none'"
                        style="padding:10px 20px; background:#e5e7eb; color:#374151; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s;"
                        onmouseover="this.style.background='#d1d5db'" onmouseout="this.style.background='#e5e7eb'">
                        ❌ Annuler
                    </button>
                    <form action="{{ route('orders.confirm', $order->id) }}" method="POST" style="margin:0;">
                        @csrf
                        <button type="submit"
                            style="padding:10px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s; box-shadow:0 4px 12px rgba(16,185,129,0.3);"
                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                            ✅ Confirmer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection
