@extends('layouts.dashboard')

@section('title', 'Notifications')
@section('subtitle', 'Gérez vos notifications')

@section('content')
<div style="padding: 24px; max-width: 900px; margin: 0 auto;">
    <!-- Header -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 32px; padding-bottom: 20px; border-bottom: 1px solid #e5e7eb;">
        <div>
            <h1 style="font-size: 28px; font-weight: 700; color: #1f2937; margin: 0;">
                Notifications
            </h1>
            <p style="color: #6b7280; margin: 4px 0 0; font-size: 16px;">
                {{ $unreadCount > 0 ? $unreadCount . ' non lu(e)s' : 'Toutes vos notifications' }}
            </p>
        </div>
        @if($notifications->count() > 0)
            <div style="display: flex; gap: 12px;">
                @if($unreadCount > 0)
                    <form action="{{ route('notifications.markAllAsRead') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="padding: 12px 20px; background: #3b82f6; color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer;">
                            ✓ Marquer tous comme lus
                        </button>
                    </form>
                @endif
                <form action="{{ route('notifications.destroyAll') }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer toutes les notifications ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="padding: 12px 20px; background: #ef4444; color: white; border: none; border-radius: 8px; font-size: 14px; font-weight: 500; cursor: pointer;">
                        🗑️ Tout supprimer
                    </button>
                </form>
            </div>
        @endif
    </div>

    @if(session('success'))
        <div style="padding: 16px; background: #d1fae5; border: 1px solid #6ee7b7; border-radius: 8px; color: #065f46; margin-bottom: 24px;">
            {{ session('success') }}
        </div>
    @endif

    @if($notifications->count() > 0)
        <div style="display: flex; flex-direction: column; gap: 16px;">
            @foreach($notifications as $notification)
                <div style="background: white; border: 1px solid #e5e7eb; border-radius: 12px; padding: 20px; box-shadow: 0 2px 8px rgba(0,0,0,0.05); {{ $notification->is_read ? 'opacity: 0.8;' : 'border-left: 4px solid #3b82f6;' }}">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 16px;">
                        <div style="flex: 1;">
                            <!-- Type badge -->
                            <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                                @php
                                    $typeBadges = [
                                        'order' => ['🛒', '#3b82f6', 'Commande'],
                                        'invoice' => ['📄', '#8b5cf6', 'Facture'],
                                        'payment' => ['💰', '#10b981', 'Paiement'],
                                        'delivery' => ['🚚', '#f59e0b', 'Livraison'],
                                        'quote' => ['📋', '#6366f1', 'Devis'],
                                        'system' => ['⚙️', '#6b7280', 'Système'],
                                        'alert' => ['⚠️', '#ef4444', 'Alerte'],
                                    ];
                                    $badge = $typeBadges[$notification->type] ?? ['📬', '#6b7280', ucfirst($notification->type)];
                                @endphp
                                <span style="font-size: 18px;">{{ $badge[0] }}</span>
                                <span style="padding: 4px 12px; background: {{ $badge[1] }}20; color: {{ $badge[1] }}; border-radius: 6px; font-size: 12px; font-weight: 600;">
                                    {{ $badge[2] }}
                                </span>
                                @if(!$notification->is_read)
                                    <span style="padding: 4px 12px; background: #dbeafe; color: #0284c7; border-radius: 6px; font-size: 12px; font-weight: 600;">
                                        Non lu
                                    </span>
                                @endif
                            </div>

                            <!-- Subject -->
                            <h3 style="font-size: 16px; font-weight: 600; color: #1f2937; margin: 0 0 8px 0;">
                                {{ $notification->subject }}
                            </h3>

                            <!-- Message -->
                            <p style="color: #6b7280; font-size: 14px; margin: 0 0 12px 0; line-height: 1.5;">
                                {{ $notification->message }}
                            </p>

                            <!-- Timestamp -->
                            <div style="display: flex; gap: 16px; font-size: 12px; color: #9ca3af;">
                                <span>📅 {{ $notification->created_at->format('d/m/Y') }}</span>
                                <span>🕐 {{ $notification->created_at->format('H:i') }}</span>
                                @if($notification->is_read && $notification->read_at)
                                    <span>✓ Lue le {{ $notification->read_at->format('d/m/Y à H:i') }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Actions -->
                        <div style="display: flex; flex-direction: column; gap: 8px;">
                            @if(!$notification->is_read)
                                <form action="{{ route('notifications.markAsRead', $notification->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button type="submit" style="padding: 8px 12px; background: #dbeafe; color: #0284c7; border: none; border-radius: 6px; font-size: 12px; font-weight: 500; cursor: pointer;">
                                        ✓ Lire
                                    </button>
                                </form>
                            @endif
                            <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="padding: 8px 12px; background: #fee2e2; color: #dc2626; border: none; border-radius: 6px; font-size: 12px; font-weight: 500; cursor: pointer;">
                                    🗑️ Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($notifications->hasPages())
            <div style="margin-top: 32px; display: flex; justify-content: center;">
                {{ $notifications->links() }}
            </div>
        @endif
    @else
        <!-- Empty state -->
        <div style="text-align: center; padding: 60px 20px; background: white; border-radius: 12px; border: 2px dashed #e5e7eb;">
            <div style="font-size: 48px; margin-bottom: 16px;">📭</div>
            <h2 style="font-size: 20px; font-weight: 600; color: #1f2937; margin: 0 0 8px 0;">
                Aucune notification
            </h2>
            <p style="color: #6b7280; font-size: 14px; margin: 0;">
                Vous êtes à jour ! Vous recevrez des notifications pour vos commandes, factures et autres événements importants.
            </p>
        </div>
    @endif
</div>

<style>
    a {
        color: #3b82f6;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .pagination {
        display: flex;
        gap: 8px;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .pagination a,
    .pagination span {
        padding: 8px 12px;
        border: 1px solid #e5e7eb;
        border-radius: 6px;
        color: #3b82f6;
        font-size: 14px;
    }

    .pagination span.disabled {
        color: #9ca3af;
        cursor: not-allowed;
    }

    .pagination .active span {
        background: #3b82f6;
        color: white;
        border-color: #3b82f6;
    }
</style>
@endsection
