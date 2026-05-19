@extends('layouts.dashboard')

@section('title', 'Modifier mon profil')
@section('subtitle', 'Mettre à jour vos informations personnelles')

@php
    $avatarUrl = $user->avatar
        ? asset('storage/'.$user->avatar)
        : 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=1e40af&color=fff&size=256';
@endphp

@section('content')
    <div id="profile-edit" style="max-width:800px; margin:0 auto;">
        @include('layouts.partials.alerts')

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">Modifier mon profil</h1>
                <p style="color:#6b7280; margin:4px 0 0;">Mettre à jour vos informations personnelles</p>
            </div>
            <a href="{{ route('profile.index') }}"
                style="display:inline-flex; align-items:center; gap:8px; padding:10px 18px; background:#6b7280; color:white; border-radius:8px; font-size:14px; font-weight:500; text-decoration:none;">
                ← Retour au profil
            </a>
        </div>

        {{-- Avatar --}}
        <div style="background:white; border-radius:12px; padding:24px; margin-bottom:24px; border:1px solid #e5e7eb; text-align:center;">
            <img src="{{ $avatarUrl }}" alt="Avatar" id="avatarPreview"
                style="width:120px; height:120px; border-radius:50%; object-fit:cover; border:4px solid #e5e7eb;">
            <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data" style="margin-top:16px;">
                @csrf
                <label style="display:inline-block; padding:8px 16px; background:#3b82f6; color:white; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer;">
                    Changer la photo
                    <input type="file" name="avatar" accept="image/*" style="display:none;" onchange="this.form.submit()">
                </label>
            </form>
        </div>

        {{-- Informations --}}
        <div style="background:white; border-radius:12px; padding:32px; border:1px solid #e5e7eb;">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 20px; padding-bottom:12px; border-bottom:1px solid #e5e7eb;">
                    Informations personnelles
                </h3>

                <div style="margin-bottom:20px;">
                    <label for="name" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Nom complet *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required
                        style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
                    <div>
                        <label for="email" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                    <div>
                        <label for="phone" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Téléphone</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}"
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                </div>

                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:24px 0 20px; padding-bottom:12px; border-bottom:1px solid #e5e7eb;">
                    Adresse
                </h3>

                <div style="margin-bottom:20px;">
                    <label for="street" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Rue</label>
                    <input type="text" id="street" name="street" value="{{ old('street', $defaultAddress?->street) }}"
                        style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                </div>

                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:16px; margin-bottom:20px;">
                    <div>
                        <label for="city" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Ville</label>
                        <input type="text" id="city" name="city" value="{{ old('city', $defaultAddress?->city) }}"
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                    <div>
                        <label for="postal_code" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Code postal</label>
                        <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code', $defaultAddress?->postal_code) }}"
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                    <div>
                        <label for="country" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Pays</label>
                        <input type="text" id="country" name="country" value="{{ old('country', $defaultAddress?->country ?? 'Cameroun') }}"
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                </div>

                <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:24px 0 20px; padding-bottom:12px; border-bottom:1px solid #e5e7eb;">
                    Mot de passe
                </h3>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:24px;">
                    <div>
                        <label for="password" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Nouveau mot de passe</label>
                        <input type="password" id="password" name="password" autocomplete="new-password"
                            placeholder="Laisser vide pour ne pas changer"
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                    <div>
                        <label for="password_confirmation" style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">Confirmer</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" autocomplete="new-password"
                            placeholder="Confirmer le nouveau mot de passe"
                            style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; font-size:14px; box-sizing:border-box;">
                    </div>
                </div>

                <div style="display:flex; gap:15px; justify-content:flex-end; padding-top:24px; border-top:1px solid #e5e7eb;">
                    <a href="{{ route('profile.index') }}"
                        style="padding:12px 28px; background:#6b7280; color:white; border-radius:8px; font-size:15px; font-weight:600; text-decoration:none;">
                        Annuler
                    </a>
                    <button type="submit"
                        style="padding:12px 28px; background:linear-gradient(135deg, #3b82f6, #2563eb); color:white; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer;">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
