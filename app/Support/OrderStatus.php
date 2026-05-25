<?php

namespace App\Support;

class OrderStatus
{
    public const PENDING_QUOTE = 'pending_quote';
    public const QUOTE_SENT = 'pending_quote';
    public const PENDING = 'pending';
    public const CONFIRMED = 'confirmed';
    public const IN_PRODUCTION = 'in_production';
    public const READY = 'ready';
    public const DELIVERING = 'delivering';
    public const DELIVERED = 'delivered';
    public const CANCELLED = 'cancelled';

    public static function meta($status)
    {
        $statuses = [
            'pending_quote' => [
                'label' => 'En attente de devis',
                'bg' => '#fef3c7',
                'text' => '#b45309',
                'dot' => '#b45309',
                'icon' => '📋',
            ],
            'pending' => [
                'label' => 'En attente de confirmation',
                'bg' => '#fef3c7',
                'text' => '#b45309',
                'dot' => '#b45309',
                'icon' => '⏳',
            ],
            'confirmed' => [
                'label' => 'Confirmée',
                'bg' => '#e0e7ff',
                'text' => '#3730a3',
                'dot' => '#3730a3',
                'icon' => '✓',
            ],
            'in_production' => [
                'label' => 'En production',
                'bg' => '#fce7f3',
                'text' => '#be185d',
                'dot' => '#be185d',
                'icon' => '🏭',
            ],
            'ready' => [
                'label' => 'Prête à être livrée',
                'bg' => '#d1fae5',
                'text' => '#065f46',
                'dot' => '#065f46',
                'icon' => '📦',
            ],
            'delivering' => [
                'label' => 'En cours de livraison',
                'bg' => '#e0e7ff',
                'text' => '#4338ca',
                'dot' => '#4338ca',
                'icon' => '🚚',
            ],
            'delivered' => [
                'label' => 'Livrée',
                'bg' => '#dcfce7',
                'text' => '#16a34a',
                'dot' => '#16a34a',
                'icon' => '✓✓',
            ],
            'cancelled' => [
                'label' => 'Annulée',
                'bg' => '#f3f4f6',
                'text' => '#6b7280',
                'dot' => '#6b7280',
                'icon' => '✕',
            ],
        ];

        return $statuses[$status] ?? $statuses['pending'];
    }

    public static function all()
    {
        return [
            'pending_quote' => 'En attente de devis',
            'pending' => 'En attente de confirmation',
            'confirmed' => 'Confirmée',
            'in_production' => 'En production',
            'ready' => 'Prête à être livrée',
            'delivering' => 'En cours de livraison',
            'delivered' => 'Livrée',
            'cancelled' => 'Annulée',
        ];
    }

    public static function labels()
    {
        return [
            'pending_quote' => [
                'label' => 'En attente de devis',
                'bg' => '#fef3c7',
                'text' => '#b45309',
                'dot' => '#b45309',
            ],
            'pending' => [
                'label' => 'En attente de confirmation',
                'bg' => '#fef3c7',
                'text' => '#b45309',
                'dot' => '#b45309',
            ],
            'confirmed' => [
                'label' => 'Confirmée',
                'bg' => '#e0e7ff',
                'text' => '#3730a3',
                'dot' => '#3730a3',
            ],
            'in_production' => [
                'label' => 'En production',
                'bg' => '#fce7f3',
                'text' => '#be185d',
                'dot' => '#be185d',
            ],
            'ready' => [
                'label' => 'Prête à être livrée',
                'bg' => '#d1fae5',
                'text' => '#065f46',
                'dot' => '#065f46',
            ],
            'delivering' => [
                'label' => 'En cours de livraison',
                'bg' => '#e0e7ff',
                'text' => '#4338ca',
                'dot' => '#4338ca',
            ],
            'delivered' => [
                'label' => 'Livrée',
                'bg' => '#dcfce7',
                'text' => '#16a34a',
                'dot' => '#16a34a',
            ],
            'cancelled' => [
                'label' => 'Annulée',
                'bg' => '#f3f4f6',
                'text' => '#6b7280',
                'dot' => '#6b7280',
            ],
        ];
    }
}
