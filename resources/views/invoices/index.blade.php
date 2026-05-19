@extends('layouts.dashboard')
@section('title', 'Factures')
@section('subtitle', 'Gérer les factures')
@section('content')
<div id="invoices-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Liste des Factures
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer les factures clients
                </p>
            </div>
            <a href="{{ route('invoices.create') }}"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);"
                onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                ➕ Nouvelle Facture
            </a>
        </div>

        <!-- Search and Filters -->
        <form method="GET" action="{{ route('invoices.index') }}" style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr 1fr 120px; gap:20px; align-items:flex-end;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Numéro facture, client..."
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📊 Statut
                    </label>
                    <select name="status"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Tous les statuts</option>
                        <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="sent" {{ request('status') === 'sent' ? 'selected' : '' }}>Envoyée</option>
                        <option value="paid" {{ request('status') === 'paid' ? 'selected' : '' }}>Payée</option>
                        <option value="overdue" {{ request('status') === 'overdue' ? 'selected' : '' }}>En retard</option>
                    </select>
                </div>
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        📅 Période
                    </label>
                    <select name="period"
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;"
                        onfocus="this.style.borderColor='#10b981'"
                        onblur="this.style.borderColor='#e5e7eb'">
                        <option value="">Toutes les périodes</option>
                        <option value="today" {{ request('period') === 'today' ? 'selected' : '' }}>Aujourd'hui</option>
                        <option value="week" {{ request('period') === 'week' ? 'selected' : '' }}>Cette semaine</option>
                        <option value="month" {{ request('period') === 'month' ? 'selected' : '' }}>Ce mois</option>
                        <option value="year" {{ request('period') === 'year' ? 'selected' : '' }}>Cette année</option>
                    </select>
                </div>
                <button type="submit"
                    style="padding:12px 16px; background:#10b981; color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer;">
                    🔎 Filtrer
                </button>
            </div>
        </form>

        <!-- Invoices Table -->
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

            <!-- Invoice Rows -->
            <div style="padding:0;">
                @forelse($invoices as $invoice)
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="font-size:14px; font-weight:600; color:#1f2937;">{{ $invoice->invoice_number }}</div>
                    <div style="font-size:14px; color:#374151;">{{ $invoice->order->client->name ?? 'Client supprimé' }}</div>
                    <div style="font-size:14px; color:#374151;">{{ $invoice->invoice_date->format('d/m/Y') }}</div>
                    <div style="font-size:14px; color:#374151; font-weight:600;">{{ number_format($invoice->total_amount, 0, ',', ' ') }} FCFA</div>
                    <div>
                        <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:{{ $invoice->status === 'paid' ? '#dcfce7' : ($invoice->status === 'sent' ? '#dbeafe' : '#fef3c7') }}; color:{{ $invoice->status === 'paid' ? '#16a34a' : ($invoice->status === 'sent' ? '#2563eb' : '#b45309') }}; font-size:12px; font-weight:600; border-radius:20px;">
                            <div style="width:6px; height:6px; background:{{ $invoice->status === 'paid' ? '#22c55e' : ($invoice->status === 'sent' ? '#3b82f6' : '#f59e0b') }}; border-radius:50%;"></div>
                            {{ $invoice->status === 'paid' ? 'Payée' : ($invoice->status === 'sent' ? 'Envoyée' : ($invoice->status === 'draft' ? 'Brouillon' : 'En retard')) }}
                        </span>
                    </div>
                    <div style="display:flex; gap:8px;">
                        <a href="{{ route('invoices.show', $invoice->id) }}"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; text-decoration:none;">
                            👁️ Voir
                        </a>
                        <a href="#"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; text-decoration:none;">
                            📄 PDF
                        </a>
                    </div>
                </div>
                @empty
                <div style="padding:40px; text-align:center; color:#6b7280;">
                    <div style="font-size:16px; margin-bottom:8px;">📭 Aucune facture</div>
                    <p style="margin:0;">Aucune facture trouvée avec les critères de recherche.</p>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if($invoices->hasPages())
            <div style="padding:20px 24px; border-top:1px solid #e5e7eb; display:flex; justify-content:center;">
                {{ $invoices->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
