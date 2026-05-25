@extends('layouts.dashboard')

@section('content')
<div id="quotes-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Liste des Devis
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les devis clients
                </p>
            </div>
            <button onclick="window.location.href='/quotes/create'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                ➕ Nouveau Devis
            </button>
        </div>

        <!-- Search and Filters -->
        <form action="{{ route('quotes.index') }}" method="GET" style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" id="search" name="search"
                        value="{{ request('search') }}"
                        placeholder="Référence, client..."
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'"
                        onchange="this.form.submit()">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut
                    </label>
                    <select id="status" name="status"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'"
                        onchange="this.form.submit()">
                        <option value="">Tous les statuts</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="sent" {{ request('status') == 'sent' ? 'selected' : '' }}>Envoyé</option>
                        <option value="accepted" {{ request('status') == 'accepted' ? 'selected' : '' }}>Accepté</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Refusé</option>
                        <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expiré</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📅 Période
                    </label>
                    <select id="period" name="period"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'"
                        onchange="this.form.submit()">
                        <option value="">Toutes les périodes</option>
                        <option value="today" {{ request('period') == 'today' ? 'selected' : '' }}>Aujourd'hui</option>
                        <option value="week" {{ request('period') == 'week' ? 'selected' : '' }}>Cette semaine</option>
                        <option value="month" {{ request('period') == 'month' ? 'selected' : '' }}>Ce mois</option>
                        <option value="year" {{ request('period') == 'year' ? 'selected' : '' }}>Cette année</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- Quotes Table -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; overflow:hidden;">
            
            <!-- Table Header -->
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">RÉFÉRENCE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">CLIENT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">DATE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">TOTAL</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">STATUT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ACTIONS</div>
                </div>
            </div>

            <!-- Quote Rows -->
            <div style="padding:0;">
                @forelse($quotes as $quote)
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">{{ $quote->quote_number ?? $quote->reference ?? 'DEV-'.$quote->id }}</div>
                    <div style="font-size:14px; color:#374151;">{{ $quote->order?->client?->name ?? 'Client inconnu' }}</div>
                    <div style="font-size:14px; color:#374151;">{{ $quote->created_at->format('d/m/Y') }}</div>
                    <div style="font-size:14px; color:#374151; font-weight:600;">{{ number_format($quote->total_amount, 0, ',', ' ') }} FCFA</div>
                    <div>
                        @php
                            $statusColors = [
                                'draft' => ['bg' => '#f3f4f6', 'text' => '#4b5563', 'dot' => '#9ca3af', 'label' => 'Brouillon'],
                                'sent' => ['bg' => '#dbeafe', 'text' => '#2563eb', 'dot' => '#3b82f6', 'label' => 'Envoyé'],
                                'accepted' => ['bg' => '#d1fae5', 'text' => '#059669', 'dot' => '#10b981', 'label' => 'Accepté'],
                                'approved' => ['bg' => '#d1fae5', 'text' => '#059669', 'dot' => '#10b981', 'label' => 'Approuvé'],
                                'rejected' => ['bg' => '#fee2e2', 'text' => '#dc2626', 'dot' => '#ef4444', 'label' => 'Refusé'],
                                'expired' => ['bg' => '#fef3c7', 'text' => '#d97706', 'dot' => '#f59e0b', 'label' => 'Expiré'],
                            ];
                            $color = $statusColors[$quote->status] ?? $statusColors['draft'];
                        @endphp
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:{{ $color['bg'] }}; color:{{ $color['text'] }}; font-size:12px; font-weight:600; border-radius:20px;">
                            <div style="width:6px; height:6px; background:{{ $color['dot'] }}; border-radius:50%;"></div>
                            {{ $color['label'] }}
                        </span>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="window.location.href='{{ route('quotes.show', $quote->id) }}'"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            👁️ Voir
                        </button>
                        <button onclick="window.location.href='{{ route('quotes.edit', $quote->id) }}'"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            ✏️ Modifier
                        </button>
                    </div>
                </div>
                @empty
                <div style="padding:40px; text-align:center; color:#6b7280;">
                    <p style="font-size:16px;">Aucun devis trouvé.</p>
                </div>
                @endforelse
            </div>
            
            <div style="padding: 16px 24px; border-top: 1px solid #e5e7eb;">
                {{ $quotes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
