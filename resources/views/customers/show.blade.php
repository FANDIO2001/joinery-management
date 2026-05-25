@extends('layouts.dashboard')

@section('content')
    <div id="customers-show">
        <div style="padding:24px; max-width:1200px; margin:0 auto;">

            <!-- Header -->
            <div
                style="display:flex; justify-content:space-between; 
                    align-items:center; margin-bottom:32px; padding-bottom:20px;
                    border-bottom:1px solid #e5e7eb;">
                <div>
                    <h1 style="font-size:28px; font-weight:700; 
                           color:#1f2937; margin:0;">
                        Détails du Client
                    </h1>
                    <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                        Informations complètes du client
                    </p>
                </div>
                <div style="display:flex; gap:12px;">
                    <button onclick="window.location.href='/customers'"
                        style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;">
                        ← Retour
                    </button>
                    <button onclick="window.location.href='{{ route('customers.edit', $customer->id) }}'"
                        style="display:flex; align-items:center; gap:8px;
                           padding:10px 18px; background:linear-gradient(135deg, #3b82f6, #2563eb);
                           color:white; border:none; border-radius:8px;
                           font-size:14px; font-weight:500; cursor:pointer;
                           box-shadow:0 4px 12px rgba(59,130,246,0.3);">
                        ✏️ Modifier
                    </button>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">

                <!-- Left Column -->
                <div>

                    <!-- Customer Info Card -->
                    <div
                        style="background:white; border-radius:16px;
                            box-shadow:0 4px 20px rgba(0,0,0,0.08);
                            border:1px solid #e5e7eb; padding:24px;">
                        <div style="display:flex; gap:24px; align-items:flex-start;">
                            <div
                                style="width:80px; height:80px; border-radius:50%; 
                                   background:linear-gradient(135deg, #3b82f6, #2563eb);
                                   display:flex; align-items:center; justify-content:center;
                                   border:2px solid #e5e7eb; color:white; font-weight:700; font-size:28px;">
                                {{ strtoupper(substr($customer->name, 0, 2)) }}
                            </div>
                            <div style="flex:1;">
                                <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                                    {{ $customer->name }}
                                </h2>
                                <p style="color:#6b7280; margin:0 0 16px; font-size:16px;">
                                    Client depuis {{ $customer->created_at->format('Y') }}
                                </p>
                                <div style="display:flex; gap:20px; flex-wrap:wrap;">
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:8px; height:8px; background:#3b82f6; border-radius:50%;"></div>
                                        <div>
                                            <div style="font-size:12px; color:#6b7280;">Email</div>
                                            <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                                {{ $customer->email }}</div>
                                        </div>
                                    </div>
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:8px; height:8px; background:#10b981; border-radius:50%;"></div>
                                        <div>
                                            <div style="font-size:12px; color:#6b7280;">Téléphone</div>
                                            <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                                {{ $customer->phone ?? 'Non renseigné' }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Address Card -->
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
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                        </path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </span>
                                Adresse
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            @if ($customer->clientAddresses && $customer->clientAddresses->count() > 0)
                                <p style="color:#4b5563; line-height:1.6; margin:0;">
                                    {{ $customer->clientAddresses->first()->street }}<br>
                                    {{ $customer->clientAddresses->first()->city }},
                                    {{ $customer->clientAddresses->first()->postal_code }}<br>
                                    {{ $customer->clientAddresses->first()->country }}
                                </p>
                            @else
                                <p style="color:#6b7280; font-style:italic; margin:0;">Aucune adresse enregistrée.</p>
                            @endif
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
                            <p style="color:#4b5563; line-height:1.6; margin:0; font-style:italic;">
                                Aucune note spécifique enregistrée pour ce client.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Right Column (Sidebar) -->
                <div>

                    <!-- Stats Card -->
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
                                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                        </path>
                                    </svg>
                                </span>
                                Statistiques
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px;">
                            <div
                                style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div style="font-size:13px; color:#6b7280;">Commandes totales</div>
                                <div style="font-size:18px; font-weight:700; color:#1f2937;">
                                    {{ $customer->orders->count() }}</div>
                            </div>
                            <div
                                style="display:flex; justify-content:space-between; align-items:center; margin-bottom:12px;">
                                <div style="font-size:13px; color:#6b7280;">Total dépensé</div>
                                <div style="font-size:18px; font-weight:700; color:#10b981;">
                                    {{ number_format($customer->orders->where('status', '!=', 'cancelled')->sum('total_amount'), 0, ',', ' ') }}
                                    FCFA</div>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div style="font-size:13px; color:#6b7280;">Dernière commande</div>
                                <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                    {{ $customer->orders->count() > 0 ? $customer->orders->sortByDesc('created_at')->first()->created_at->format('d/m/Y') : 'Aucune' }}
                                </div>
                            </div>
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
                                    <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                    </svg>
                                </span>
                                Actions
                            </h3>
                        </div>
                        <div style="padding:0 24px 24px; display:flex; flex-direction:column; gap:12px;">
                            @if (auth()->user()->user_type === 'admin')
                                <button disabled
                                    style="padding:12px 16px; background:#d1d5db; color:#9ca3af; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:not-allowed; opacity:0.6;"
                                    title="Fonctionnalité non disponible">
                                    📧 Envoyer un email
                                </button>
                                <button disabled
                                    style="padding:12px 16px; background:#d1d5db; color:#9ca3af; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:not-allowed; opacity:0.6;"
                                    title="Fonctionnalité non disponible">
                                    📋 Créer une commande
                                </button>
                                <button disabled
                                    style="padding:12px 16px; background:#d1d5db; color:#9ca3af; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:not-allowed; opacity:0.6;"
                                    title="Fonctionnalité non disponible">
                                    🗑️ Archiver le client
                                </button>
                            @else
                                <a href="{{ route('shop.index') }}"
                                    style="padding:12px 16px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none;
                                    border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:all 0.2s;
                                    box-shadow:0 4px 12px rgba(16,185,129,0.3); text-decoration:none;"
                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                                    📦 CATALOGUE

                                </a>
                            @endif

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
                                <div style="position:relative; margin-bottom:16px;">
                                    <div
                                        style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#10b981; border-radius:50%; border:2px solid white;">
                                    </div>
                                    <div>
                                        <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">
                                            Création</div>
                                        <div style="font-size:12px; color:#6b7280;">
                                            {{ $customer->created_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                <div style="position:relative; margin-bottom:16px;">
                                    <div
                                        style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#3b82f6; border-radius:50%; border:2px solid white;">
                                    </div>
                                    <div>
                                        <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">
                                            Dernière modification</div>
                                        <div style="font-size:12px; color:#6b7280;">
                                            {{ $customer->updated_at->format('d/m/Y') }}</div>
                                    </div>
                                </div>
                                <div style="position:relative;">
                                    <div
                                        style="position:absolute; left:-14px; top:2px; width:12px; height:12px; background:#f59e0b; border-radius:50%; border:2px solid white;">
                                    </div>
                                    <div>
                                        <div style="font-size:13px; font-weight:600; color:#1f2937; margin-bottom:2px;">
                                            Dernière commande</div>
                                        <div style="font-size:12px; color:#6b7280;">
                                            {{ $customer->orders->count() > 0 ? $customer->orders->sortByDesc('created_at')->first()->created_at->format('d/m/Y') : 'Aucune' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
