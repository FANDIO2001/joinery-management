@extends('layouts.dashboard')

@section('title', 'Tableau de Bord')
@section('subtitle', 'BIENVENUE ' . auth()->user()->name . ' • ' . date('d/m/Y'))

@section('content')

    {{-- Alertes critiques --}}
    @if (!empty($criticalAlerts))
        <div class="mb-6">
            @foreach ($criticalAlerts as $alert)
                <div
                    class="p-4 mb-3 rounded-lg {{ $alert['severity'] === 'critical' ? 'bg-red-50 border-l-4 border-red-500' : 'bg-yellow-50 border-l-4 border-yellow-500' }}">
                    <div class="flex items-start">
                        <div class="text-2xl mr-3">{{ $alert['icon'] }}</div>
                        <div>
                            <h3
                                class="font-semibold {{ $alert['severity'] === 'critical' ? 'text-red-800' : 'text-yellow-800' }}">
                                {{ $alert['title'] }}
                            </h3>
                            <p
                                class="{{ $alert['severity'] === 'critical' ? 'text-red-700' : 'text-yellow-700' }} text-sm mt-1">
                                {{ $alert['message'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    {{-- Statistiques --}}
    <div class="stats-grid">
        @if ($userType === 'admin')
            <div class="stat-card">
                <div class="stat-title">Commandes du jour</div>
                <div class="stat-value">{{ $stats['ordersToday'] }}</div>
                <div class="stat-change positive">{{ now()->format('d/m/Y') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Chiffre d'affaires (mois)</div>
                <div class="stat-value">{{ number_format($stats['revenue'], 0, ',', ' ') }} FCFA</div>
                <div class="stat-change positive">Depuis le {{ now()->startOfMonth()->format('d/m') }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Clients actifs</div>
                <div class="stat-value">{{ $stats['activeClients'] }}</div>
                <div class="stat-change positive">Actuellement actifs</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Stock critique</div>
                <div class="stat-value">{{ $stats['criticalStock'] }}</div>
                <div class="stat-change negative">À réapprovisionner</div>
            </div>
        @elseif($userType === 'client')
            <div class="stat-card">
                <div class="stat-title">Mes commandes</div>
                <div class="stat-value">{{ $stats['totalOrders'] }}</div>
                <div class="stat-change positive">Total</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Commandes en cours</div>
                <div class="stat-value">{{ $stats['pendingOrders'] }}</div>
                <div class="stat-change positive">En traitement</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Total dépensé</div>
                <div class="stat-value">{{ number_format($stats['totalSpent'], 0, ',', ' ') }} FCFA</div>
                <div class="stat-change positive">Commandes payées</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Factures impayées</div>
                <div class="stat-value">{{ $stats['unpaidInvoices'] }}</div>
                <div class="stat-change {{ $stats['unpaidInvoices'] > 0 ? 'negative' : 'positive' }}">
                    {{ $stats['unpaidInvoices'] > 0 ? 'À payer' : 'Toutes payées' }}
                </div>
            </div>
        @else
            {{-- Employee/Technician --}}
            <div class="stat-card">
                <div class="stat-title">Tickets actifs</div>
                <div class="stat-value">{{ $stats['activeTickets'] }}</div>
                <div class="stat-change positive">En attente</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Tâches complétées</div>
                <div class="stat-value">{{ $stats['tasksCompleted'] }}</div>
                <div class="stat-change positive">Terminées</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Tâches en cours</div>
                <div class="stat-value">{{ $stats['pendingTasks'] }}</div>
                <div class="stat-change positive">À faire</div>
            </div>
            <div class="stat-card">
                <div class="stat-title">Présent aujourd'hui</div>
                <div class="stat-value">{{ $stats['attendance'] > 0 ? 'Oui' : 'Non' }}</div>
                <div class="stat-change positive">{{ now()->format('d/m/Y') }}</div>
            </div>
        @endif
    </div>

    {{-- Commandes récentes --}}
    <div class="card mt-6">
        <h2 class="card-title">
            {{ $userType === 'admin' ? 'Commandes récentes' : ($userType === 'client' ? 'Mes commandes récentes' : 'Commandes en cours') }}
        </h2>

        @if ($recentOrders->count() > 0)
            <div class="overflow-x-auto">
                <table class="table w-full">
                    <thead>
                        <tr>
                            <th>N° Commande</th>
                            <th>{{ $userType === 'admin' ? 'Client' : 'Produits' }}</th>
                            <th>Statut</th>
                            <th>Montant</th>
                            <th>Date</th>
                            @if ($userType === 'admin')
                                <th>Paiement</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recentOrders as $order)
                            <tr>
                                <td>
                                    <a href="{{ route('orders.index') }}"
                                        class="text-blue-600 hover:text-blue-800 font-semibold">
                                        {{ $order->reference }}
                                    </a>
                                </td>
                                <td>
                                    @if ($userType === 'admin')
                                        {{ $order->client->name ?? 'N/A' }}
                                    @else
                                        @if ($order->items->count() > 0)
                                            {{ $order->items->first()->product_name ?? 'Produit' }}
                                            @if ($order->items->count() > 1)
                                                <span class="text-sm text-gray-500">(+{{ $order->items->count() - 1 }}
                                                    produit(s))</span>
                                            @endif
                                        @else
                                            -
                                        @endif
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $statusColors = [
                                            'pending' => 'warning',
                                            'confirmed' => 'info',
                                            'in_production' => 'info',
                                            'ready_for_delivery' => 'success',
                                            'delivered' => 'success',
                                            'cancelled' => 'danger',
                                        ];
                                        $statusLabels = [
                                            'pending' => 'En attente',
                                            'confirmed' => 'Confirmée',
                                            'in_production' => 'En production',
                                            'ready_for_delivery' => 'Prête',
                                            'delivered' => 'Livrée',
                                            'cancelled' => 'Annulée',
                                        ];
                                    @endphp
                                    <span class="badge badge-{{ $statusColors[$order->status] ?? 'secondary' }}">
                                        {{ $statusLabels[$order->status] ?? $order->status }}
                                    </span>
                                </td>
                                <td>{{ number_format($order->total_amount, 0, ',', ' ') }} FCFA</td>
                                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                @if ($userType === 'admin')
                                    <td>
                                        @php
                                            $paymentStatusColors = [
                                                'pending' => 'warning',
                                                'partial' => 'info',
                                                'paid' => 'success',
                                                'failed' => 'danger',
                                            ];
                                            $paymentStatusLabels = [
                                                'pending' => 'En attente',
                                                'partial' => 'Partiel',
                                                'paid' => 'Payé',
                                                'failed' => 'Échoué',
                                            ];
                                        @endphp
                                        <span
                                            class="badge badge-{{ $paymentStatusColors[$order->payment_status] ?? 'secondary' }}">
                                            {{ $paymentStatusLabels[$order->payment_status] ?? $order->payment_status }}
                                        </span>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500">
                    {{ $userType === 'client' ? 'Aucune commande trouvée' : 'Aucune commande récente' }}
                </p>
            </div>
        @endif
    </div>

    {{-- Tâches prioritaires (Admin) --}}
    @if ($userType === 'admin' && !empty($criticalAlerts))
        <div class="card mt-6">
            <h2 class="card-title">Tâches prioritaires</h2>
            <div style="display: grid; gap: 1rem;">
                @foreach (array_slice($criticalAlerts, 0, 2) as $alert)
                    <div
                        style="padding: 1rem; border: 1px solid #e5e7eb; border-radius: 0.5rem; display: flex; justify-content: space-between; align-items: center;">
                        <div>
                            <div style="font-weight: 600;">{{ $alert['title'] }}</div>
                            <div style="font-size: 0.875rem; color: #6b7280;">{{ $alert['message'] }}</div>
                        </div>
                        <span class="badge {{ $alert['severity'] === 'critical' ? 'badge-danger' : 'badge-warning' }}">
                            {{ ucfirst($alert['severity']) }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

@endsection
