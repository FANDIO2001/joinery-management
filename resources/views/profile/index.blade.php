@extends('layouts.dashboard')

@section('title', 'Mon profil')
@section('subtitle', 'Informations personnelles et paramètres du compte')

@php
    $avatarUrl = $user->avatar
        ? asset('storage/'.$user->avatar)
        : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=1e40af&color=fff&size=256';

    $roleLabels = [
        'admin' => 'Administrateur',
        'manager' => 'Manager',
        'artisan' => 'Artisan',
        'livreur' => 'Livreur',
        'client' => 'Client',
    ];
    $roleLabel = $roleLabels[$user->user_type] ?? $user->user_type;

    $addressLine = $defaultAddress
        ? collect([$defaultAddress->street, $defaultAddress->postal_code.' '.$defaultAddress->city, $defaultAddress->country])
            ->filter()
            ->implode(', ')
        : null;
@endphp

@section('content')
    <div id="profile" style="max-width:1000px; margin:0 auto;">
        @include('layouts.partials.alerts')

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px; flex-wrap:wrap; gap:12px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">Mon profil</h1>
                <p style="color:#6b7280; margin:4px 0 0;">Informations personnelles et paramètres du compte</p>
            </div>
            <a href="{{ route('profile.edit') }}"
                style="display:inline-flex; align-items:center; gap:8px; padding:10px 18px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border-radius:8px; font-size:14px; font-weight:500; text-decoration:none;">
                Modifier mon profil
            </a>
        </div>

        <div style="display:grid; grid-template-columns:1fr 2fr; gap:24px;">
            <div style="background:white; border-radius:12px; padding:32px; border:1px solid #e5e7eb; text-align:center;">
                <img src="{{ $avatarUrl }}" alt="{{ $user->name }}"
                    style="width:150px; height:150px; border-radius:50%; object-fit:cover; border:4px solid #e5e7eb; margin-bottom:16px;">
                <h2 style="font-size:20px; font-weight:600; color:#1f2937; margin:0 0 8px;">{{ $user->name }}</h2>
                <p style="color:#6b7280; margin:0 0 16px;">{{ $roleLabel }}</p>
                @if ($user->is_active)
                    <span style="display:inline-flex; align-items:center; gap:8px; padding:6px 12px; background:#dcfce7; color:#16a34a; font-size:12px; font-weight:600; border-radius:12px;">
                        <span style="width:8px; height:8px; background:#22c55e; border-radius:50%;"></span>
                        Compte actif
                    </span>
                @else
                    <span style="display:inline-flex; padding:6px 12px; background:#fee2e2; color:#dc2626; font-size:12px; font-weight:600; border-radius:12px;">
                        Compte inactif
                    </span>
                @endif
            </div>

            <div style="background:white; border-radius:12px; padding:32px; border:1px solid #e5e7eb;">
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 24px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
                    Informations personnelles
                </h3>
                <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                    <div>
                        <h4 style="font-size:12px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase;">Nom complet</h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">{{ $user->name }}</p>
                    </div>
                    <div>
                        <h4 style="font-size:12px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase;">Email</h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">{{ $user->email }}</p>
                    </div>
                    <div>
                        <h4 style="font-size:12px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase;">Téléphone</h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">{{ $user->phone ?? '—' }}</p>
                    </div>
                    <div>
                        <h4 style="font-size:12px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase;">Rôle</h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">{{ $roleLabel }}</p>
                    </div>
                    <div style="grid-column: span 2;">
                        <h4 style="font-size:12px; font-weight:600; color:#6b7280; margin:0 0 8px; text-transform:uppercase;">Adresse</h4>
                        <p style="font-size:16px; color:#1f2937; margin:0;">{{ $addressLine ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if ($user->user_type === 'client')
            <div style="margin-top:24px; background:white; border-radius:12px; padding:32px; border:1px solid #e5e7eb;">
                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 24px; padding-bottom:16px; border-bottom:1px solid #e5e7eb;">
                    Activité
                </h3>
                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(180px, 1fr)); gap:20px;">
                    <div style="text-align:center; padding:20px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:24px; font-weight:700; color:#3b82f6; margin-bottom:8px;">{{ $ordersCount }}</div>
                        <div style="font-size:14px; color:#6b7280;">Commandes</div>
                    </div>
                    <div style="text-align:center; padding:20px; background:#f9fafb; border-radius:8px;">
                        <div style="font-size:14px; color:#6b7280;">Membre depuis</div>
                        <div style="font-size:16px; font-weight:600; color:#1f2937; margin-top:8px;">{{ $user->created_at->format('d/m/Y') }}</div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
