@extends($layout ?? 'layouts.dashboard')

@section('content')
    <div style="padding:24px; max-width:1200px; margin:50px auto;" class="animate-fade-in">

        <!-- Header -->
        <div
            style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">Devis</h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">{{ $quote->quote_number }}</p>
            </div>
            <div style="display:flex; gap:12px;">
                <a href="javascript:history.back()"
                    style="display:flex; align-items:center; gap:8px; padding:10px 18px; background:#6b7280; color:white; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
                    ← Retour
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div style="display:grid; grid-template-columns:1fr 380px; gap:32px;">

            <!-- Left Column -->
            <div>

                <!-- Quote Info Card -->
                <div
                    style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <div style="display:flex; gap:24px; align-items:flex-start;">
                        <div
                            style="width:80px; height:80px; border-radius:16px; background:linear-gradient(135deg, #3b82f6, #2563eb); display:flex; align-items:center; justify-content:center; border:2px solid #e5e7eb; color:white; font-weight:700; font-size:32px;">
                            📋
                        </div>
                        <div style="flex:1;">
                            <h2 style="font-size:24px; font-weight:700; color:#1f2937; margin:0 0 8px;">
                                {{ $quote->quote_number }}</h2>
                            <p style="color:#6b7280; margin:0 0 16px; font-size:16px;">Devis pour
                                {{ $quote->order->client->name }}</p>
                            <div style="display:flex; gap:20px; flex-wrap:wrap;">
                                <div style="display:flex; align-items:center; gap:8px;">
                                    <div style="width:8px; height:8px; background:#3b82f6; border-radius:50%;"></div>
                                    <div>
                                        <div style="font-size:12px; color:#6b7280;">Créé le</div>
                                        <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                            {{ $quote->created_at->format('d/m/Y H:i') }}</div>
                                    </div>
                                </div>
                                @if ($quote->sent_at)
                                    <div style="display:flex; align-items:center; gap:8px;">
                                        <div style="width:8px; height:8px; background:#10b981; border-radius:50%;"></div>
                                        <div>
                                            <div style="font-size:12px; color:#6b7280;">Envoyé le</div>
                                            <div style="font-size:14px; font-weight:600; color:#1f2937;">
                                                {{ $quote->sent_at->format('d/m/Y H:i') }}</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Client Card -->
                <div
                    style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
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
                                style="width:48px; height:48px; border-radius:50%; background:linear-gradient(135deg, #3b82f6, #2563eb); display:flex; align-items:center; justify-content:center; border:2px solid #e5e7eb; color:white; font-weight:700; font-size:18px;">
                                {{ strtoupper(substr($quote->order->client->name ?? 'C', 0, 2)) }}
                            </div>
                            <div>
                                <div style="font-size:15px; font-weight:600; color:#1f2937;">
                                    {{ $quote->order->client->name }}</div>
                                <div style="font-size:13px; color:#6b7280;">{{ $quote->order->client->email }}</div>
                                <div style="font-size:13px; color:#6b7280;">{{ $quote->order->client->phone ?? 'N/A' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Details Card -->
                <div
                    style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <div style="padding:24px 24px 8px;">
                        <h3
                            style="font-size:18px; font-weight:700; color:#1f2937; margin:0; display:flex; align-items:center; gap:8px;">
                            <span
                                style="width:24px; height:24px; background:#f59e0b; border-radius:6px; display:flex; align-items:center; justify-content:center;">
                                <svg style="width:14px; height:14px; color:white;" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </span>
                            Commande associée
                        </h3>
                    </div>
                    <div style="padding:0 24px 24px;">
                        <div style="font-size:15px; font-weight:600; color:#1f2937;">{{ $quote->order->reference }}</div>
                        <div style="font-size:13px; color:#6b7280;">{{ $quote->order->items->count() }} article(s)
                            commandé(s)</div>
                    </div>
                </div>

                <!-- Items Table -->
                <div
                    style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 16px;">Articles du Devis</h3>

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
                            @forelse($quote->order->items as $item)
                                <tr style="border-bottom:1px solid #e5e7eb;">
                                    <td style="padding:12px;">
                                        <div style="color:#1f2937; font-weight:500;">{{ $item->product->name }}</div>
                                        @if ($item->customization)
                                            <div style="font-size:12px; color:#6b7280; margin-top:4px;">
                                                @php
                                                    $custom = is_string($item->customization)
                                                        ? json_decode($item->customization, true)
                                                        : $item->customization;
                                                @endphp
                                                @if (isset($custom['custom_width']))
                                                    ⤫ {{ $custom['custom_width'] }}cm
                                                @endif
                                                @if (isset($custom['custom_height']))
                                                    × {{ $custom['custom_height'] }}cm
                                                @endif
                                            </div>
                                        @endif
                                    </td>
                                    <td style="padding:12px; text-align:right; color:#1f2937;">{{ $item->quantity }}</td>
                                    <td style="padding:12px; text-align:right; color:#1f2937;">
                                        {{ number_format($item->unit_price, 0, ',', ' ') }} FCFA</td>
                                    <td style="padding:12px; text-align:right; color:#1f2937; font-weight:600;">
                                        {{ number_format($item->unit_price * $item->quantity, 0, ',', ' ') }} FCFA</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" style="padding:20px; text-align:center; color:#6b7280;">Aucun article
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pricing Notes -->
                @if ($quote->pricing_notes)
                    <div
                        style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                        <h3 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 12px;">Notes de Tarification
                        </h3>
                        <div style="color:#374151; font-size:14px; line-height:1.6; white-space:pre-wrap;">
                            {{ $quote->pricing_notes }}</div>
                    </div>
                @endif
            </div>

            <!-- Right Column (Sidebar) -->
            <div>

                <!-- Status Card -->
                <div
                    style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <h3 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 16px;">Statut</h3>
                    @php
                        $statusColors = [
                            'draft' => [
                                'bg' => '#f3f4f6',
                                'text' => '#4b5563',
                                'label' => 'Brouillon',
                                'dot' => '#6b7280',
                            ],
                            'sent' => ['bg' => '#e0e7ff', 'text' => '#4338ca', 'label' => 'Envoyé', 'dot' => '#4f46e5'],
                            'approved' => [
                                'bg' => '#dcfce7',
                                'text' => '#16a34a',
                                'label' => 'Approuvé',
                                'dot' => '#22c55e',
                            ],
                            'rejected' => [
                                'bg' => '#fee2e2',
                                'text' => '#dc2626',
                                'label' => 'Rejeté',
                                'dot' => '#ef4444',
                            ],
                            'expired' => [
                                'bg' => '#fef3c7',
                                'text' => '#b45309',
                                'label' => 'Expiré',
                                'dot' => '#f59e0b',
                            ],
                        ];
                        $status = $statusColors[$quote->status] ?? $statusColors['draft'];
                    @endphp
                    <span
                        style="display:inline-flex; align-items:center; gap:6px; padding:8px 16px; background:{{ $status['bg'] }}; color:{{ $status['text'] }}; font-size:14px; font-weight:600; border-radius:20px;">
                        <div style="width:8px; height:8px; background:{{ $status['dot'] }}; border-radius:50%;"></div>
                        {{ $status['label'] }}
                    </span>
                </div>

                <!-- Amount Card -->
                <div
                    style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                    <h3 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px;">Montants</h3>

                    <div
                        style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #e5e7eb;">
                        <span style="color:#6b7280; font-size:13px;">Sous-total</span>
                        <span style="color:#1f2937; font-weight:600;">{{ number_format($quote->subtotal, 0, ',', ' ') }}
                            FCFA</span>
                    </div>

                    @if ($quote->discount_amount > 0)
                        <div
                            style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #e5e7eb;">
                            <span style="color:#6b7280; font-size:13px;">Réduction</span>
                            <span
                                style="color:#10b981; font-weight:600;">-{{ number_format($quote->discount_amount, 0, ',', ' ') }}
                                FCFA</span>
                        </div>
                    @endif

                    @if ($quote->tax_amount > 0)
                        <div
                            style="display:flex; justify-content:space-between; padding:8px 0; border-bottom:1px solid #e5e7eb;">
                            <span style="color:#6b7280; font-size:13px;">Taxes</span>
                            <span
                                style="color:#1f2937; font-weight:600;">{{ number_format($quote->tax_amount, 0, ',', ' ') }}
                                FCFA</span>
                        </div>
                    @endif

                    <div style="display:flex; justify-content:space-between; padding:12px 0; font-size:16px;">
                        <span style="color:#1f2937; font-weight:700;">Total</span>
                        <span
                            style="color:#1f2937; font-weight:700;">{{ number_format($quote->total_amount, 0, ',', ' ') }}
                            FCFA</span>
                    </div>
                </div>

                <!-- Actions Card -->
                @if (auth()->id() === $quote->order->client_id && $quote->status === 'sent')
                    <div
                        style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                        <h3 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px;">Vos Actions</h3>

                        <div style="display:flex; flex-direction:column; gap:12px;">
                            <form action="{{ route('quotes.approve', $quote->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    style="width:100%; padding:12px 16px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                                    ✓ Approuver
                                </button>
                            </form>

                            <form action="{{ route('quotes.reject', $quote->id) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    style="width:100%; padding:12px 16px; background:linear-gradient(135deg, #ef4444, #dc2626); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(239,68,68,0.3);"
                                    onclick="return confirm('Êtes-vous sûr de vouloir rejeter ce devis?')">
                                    ✗ Rejeter
                                </button>
                            </form>
                        </div>
                    </div>
                @elseif(auth()->user()?->user_type !== 'client' && $quote->status === 'draft')
                    <div
                        style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; margin-bottom:24px;">
                        <h3 style="font-size:16px; font-weight:700; color:#1f2937; margin:0 0 16px;">Actions Admin</h3>

                        <form action="{{ route('quotes.send', $quote->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                style="width:100%; padding:12px 16px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(59,130,246,0.3);">
                                📧 Envoyer au Client
                            </button>
                        </form>
                    </div>
                @endif

                <!-- Validity Card -->
                @if ($quote->expires_at)
                    <div
                        style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px;">
                        <h3 style="font-size:14px; font-weight:700; color:#6b7280; margin:0 0 8px;">Validité du Devis</h3>
                        <div style="font-size:18px; font-weight:700; color:#1f2937;">
                            {{ $quote->expires_at->format('d/m/Y') }}</div>
                        <p style="color:#6b7280; font-size:12px; margin:4px 0 0;">Expire dans
                            {{ $quote->expires_at->diffInDays(now()) }} jours</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
