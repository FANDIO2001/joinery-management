@extends('layouts.dashboard')

@section('title', 'Commandes')
@section('subtitle', 'Gérer toutes les commandes clients')

@php
    $statusColors = [
        'pending' => ['bg' => '#fef3c7', 'text' => '#d97706', 'dot' => '#f59e0b', 'label' => 'En attente'],
        'confirmed' => ['bg' => '#dbeafe', 'text' => '#2563eb', 'dot' => '#3b82f6', 'label' => 'Confirmée'],
        'in_production' => ['bg' => '#e0e7ff', 'text' => '#4338ca', 'dot' => '#6366f1', 'label' => 'En production'],
        'ready' => ['bg' => '#cffafe', 'text' => '#0e7490', 'dot' => '#06b6d4', 'label' => 'Prête'],
        'delivering' => ['bg' => '#fce7f3', 'text' => '#be185d', 'dot' => '#ec4899', 'label' => 'En livraison'],
        'delivered' => ['bg' => '#d1fae5', 'text' => '#059669', 'dot' => '#10b981', 'label' => 'Livrée'],
        'cancelled' => ['bg' => '#fee2e2', 'text' => '#dc2626', 'dot' => '#ef4444', 'label' => 'Annulée'],
    ];
@endphp

@section('content')
<div id="orders-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb; flex-wrap:wrap; gap:12px;">
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Liste des commandes</h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    {{ $orders->total() }} commande{{ $orders->total() > 1 ? 's' : '' }} au total
                </p>
            </div>
            <a href="{{ route('orders.create') }}"
                style="display:inline-flex; align-items:center; gap:8px; padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border-radius:8px; font-size:14px; font-weight:500; text-decoration:none; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                Nouvelle commande
            </a>
        </div>

        @include('layouts.partials.alerts')

        <form method="GET" action="{{ route('orders.index') }}"
            style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr auto; gap:20px; align-items:end;">
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Rechercher</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Référence, client..."
                        style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box;">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Statut</label>
                    <select name="status" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; background:white; box-sizing:border-box;">
                        <option value="">Tous les statuts</option>
                        @foreach ($statusColors as $key => $meta)
                            <option value="{{ $key }}" @selected(request('status') === $key)>{{ $meta['label'] }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    style="padding:12px 24px; background:#3b82f6; color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer;">
                    Filtrer
                </button>
            </div>
        </form>

        <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; overflow:hidden;">
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">RÉFÉRENCE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">CLIENT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">DATE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">TOTAL</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">STATUT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase;">ACTIONS</div>
                </div>
            </div>

            <div style="padding:0;">
                @forelse ($orders as $order)
                    @php $status = $statusColors[$order->status] ?? $statusColors['pending']; @endphp
                    <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6;"
                        onmouseover="this.style.backgroundColor='#f9fafb'" onmouseout="this.style.backgroundColor='white'">
                        <div style="font-size:14px; font-weight:600; color:#1f2937;">{{ $order->reference ?? 'CMD-'.$order->id }}</div>
                        <div style="font-size:14px; color:#374151;">{{ $order->client->name ?? '—' }}</div>
                        <div style="font-size:14px; color:#374151;">{{ $order->created_at->format('d/m/Y') }}</div>
                        <div style="font-size:14px; color:#374151; font-weight:600;">{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</div>
                        <div>
                            <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:{{ $status['bg'] }}; color:{{ $status['text'] }}; font-size:12px; font-weight:600; border-radius:20px;">
                                <span style="width:6px; height:6px; background:{{ $status['dot'] }}; border-radius:50%;"></span>
                                {{ $status['label'] }}
                            </span>
                        </div>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('orders.show', $order) }}"
                                style="padding:6px 12px; background:#3b82f6; color:white; border-radius:6px; font-size:12px; font-weight:500; text-decoration:none;">
                                Voir
                            </a>
                            <a href="{{ route('orders.edit', $order) }}"
                                style="padding:6px 12px; background:#10b981; color:white; border-radius:6px; font-size:12px; font-weight:500; text-decoration:none;">
                                Modifier
                            </a>
                        </div>
                    </div>
                @empty
                    <div style="padding:48px; text-align:center; color:#6b7280;">
                        <p style="font-size:16px; margin:0;">Aucune commande trouvée</p>
                    </div>
                @endforelse
            </div>

            @if ($orders->hasPages())
                <div style="padding:20px 24px; display:flex; justify-content:center;">
                    {{ $orders->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
