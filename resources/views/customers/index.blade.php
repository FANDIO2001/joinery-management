@extends('layouts.dashboard')

@section('content')
<div id="customers-index">
    <div style="padding:24px; max-width:1400px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                    Liste des Clients
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Gérer la base de données clients
                </p>
            </div>
            <button onclick="window.location.href='/customers/create'"
                style="display:flex; align-items:center; gap:8px;
                       padding:12px 20px; background:linear-gradient(135deg, #10b981, #059669);
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer;
                       box-shadow:0 4px 12px rgba(16,185,129,0.3);
                       transition:all 0.2s;"
                onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                ➕ Ajouter un Client
            </button>
        </div>

        <!-- Search and Filters -->
        <form method="GET" action="{{ route('customers.index') }}" style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                <div>
                    <label style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                        🔍 Rechercher
                    </label>
                    <input type="text" id="search" name="search"
                        value="{{ request('search') }}"
                        placeholder="Nom, email, téléphone..."
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
                        📈 Statut
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
                        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Actif</option>
                        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactif</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- Customers Table -->
        <div style="background:white; border-radius:16px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; overflow:hidden;">
            
            <!-- Table Header -->
            <div style="background:#f9fafb; padding:16px 24px; border-bottom:1px solid #e5e7eb;">
                <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center;">
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">CLIENT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">TYPE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">TÉLÉPHONE</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">COMMANDES</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">STATUT</div>
                    <div style="font-size:12px; font-weight:600; color:#6b7280; text-transform:uppercase; letter-spacing:0.5px;">ACTIONS</div>
                </div>
            </div>

            <!-- Customer Rows -->
            <div style="padding:0;">
                @forelse($customers as $customer)
                <!-- Customer Row -->
                <div style="display:grid; grid-template-columns:2fr 1fr 1fr 1fr 1fr 1.5fr; gap:16px; align-items:center; padding:20px 24px; border-bottom:1px solid #f3f4f6; transition:background-color 0.2s;"
                     onmouseover="this.style.backgroundColor='#f9fafb'"
                     onmouseout="this.style.backgroundColor='white'">
                    <div style="display:flex; align-items:center; gap:16px;">
                        <div style="width:48px; height:48px; border-radius:50%; 
                                   background:linear-gradient(135deg, #3b82f6, #2563eb);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb; color:white; font-weight:700; font-size:18px;">
                            {{ strtoupper(substr($customer->name, 0, 2)) }}
                        </div>
                        <div>
                            <div style="font-size:15px; font-weight:600; color:#1f2937; margin-bottom:2px;">{{ $customer->name }}</div>
                            <div style="font-size:13px; color:#6b7280;">{{ $customer->email }}</div>
                        </div>
                    </div>
                    <div style="font-size:14px; color:#374151;">Particulier</div>
                    <div style="font-size:14px; color:#374151; font-weight:500;">{{ $customer->phone ?? '-' }}</div>
                    <div style="font-size:14px; color:#374151; font-weight:600;">{{ $customer->orders_count ?? 0 }}</div>
                    <div>
                        @if($customer->is_active)
                            <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:20px;">
                                <div style="width:6px; height:6px; background:#22c55e; border-radius:50%;"></div>
                                Actif
                            </span>
                        @else
                            <span style="display:inline-flex; align-items:center; gap:6px; padding:4px 12px; background:#f3f4f6; color:#6b7280; font-size:12px; font-weight:600; border-radius:20px;">
                                <div style="width:6px; height:6px; background:#9ca3af; border-radius:50%;"></div>
                                Inactif
                            </span>
                        @endif
                    </div>
                    <div style="display:flex; gap:8px;">
                        <button onclick="window.location.href='{{ route('customers.show', $customer->id) }}'"
                            style="padding:6px 12px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#2563eb'"
                            onmouseout="this.style.backgroundColor='#3b82f6'">
                            👁️ Voir
                        </button>
                        <button onclick="window.location.href='{{ route('customers.edit', $customer->id) }}'"
                            style="padding:6px 12px; background:#10b981; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; transition:all 0.2s;"
                            onmouseover="this.style.backgroundColor='#059669'"
                            onmouseout="this.style.backgroundColor='#10b981'">
                            ✏️ Modifier
                        </button>
                    </div>
                </div>
                @empty
                <div style="padding:40px 24px; text-align:center; color:#6b7280;">
                    Aucun client trouvé.
                </div>
                @endforelse
            </div>
        </div>

        <!-- Pagination -->
        <div style="margin-top:24px;">
            {{ $customers->links() }}
        </div>
    </div>
</div>
@endsection
