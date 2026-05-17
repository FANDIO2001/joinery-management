@extends('layouts.dashboard')

@section('content')
    <div id="users-create">
        <div style="padding:24px; max-width:800px; margin:0 auto;">

            <!-- Header -->
            <div
                style="display:flex; justify-content:space-between;
                    align-items:center; margin-bottom:24px;">
                <div>
                    <h1 style="font-size:24px; font-weight:700;
                           color:#1f2937; margin:0;">
                        Ajouter un utilisateur
                    </h1>
                    <p style="color:#6b7280; margin:4px 0 0;">
                        Créer un nouveau compte utilisateur
                    </p>
                </div>
                <a href="{{ route('users.index') }}"
                    style="display:flex; align-items:center; gap:8px;
                       padding:10px 18px; background:#6b7280;
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; text-decoration:none;">
                    ← Retour
                </a>
            </div>

            @if ($errors->any())
                <div
                    style="background:#fef2f2; border:1px solid #fecaca; color:#b91c1c;
                        border-radius:8px; padding:16px; margin-bottom:24px;">
                    <ul style="margin:0; padding-left:20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulaire -->
            <form method="POST" action="{{ route('users.store') }}"
                style="background:white; border-radius:12px;
                    box-shadow:0 4px 20px rgba(0,0,0,0.08);
                    border:1px solid #e5e7eb; padding:32px;">
                @csrf

                <!-- Nom complet -->
                <div style="margin-bottom:20px;">
                    <label
                        style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                        Nom complet *
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        placeholder="Entrez le nom de l'utilisateur" required
                        style="width:100%; padding:12px 16px;
                           border:2px solid #e5e7eb; border-radius:8px;
                           font-size:15px; box-sizing:border-box;
                           outline:none; transition:border-color 0.2s;"
                        onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                </div>

                <!-- Email + Téléphone -->
                <div
                    style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            Email *
                        </label>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="utilisateur@email.com" required
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            Téléphone *
                        </label>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                            placeholder="+237 698 234 567" required
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>
                </div>

                <!-- Rôle -->
                <div style="margin-bottom:20px;">
                    <label
                        style="display:block; margin-bottom:8px;
                              font-weight:600; color:#374151; font-size:14px;">
                        Rôle *
                    </label>
                    <select name="user_type" required
                        style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; background:white;">
                        <option value="">Sélectionner...</option>
                        <option value="admin" @selected(old('user_type') === 'admin')>Administrateur</option>
                        <option value="manager" @selected(old('user_type') === 'manager')>Manager</option>
                        <option value="artisan" @selected(old('user_type') === 'artisan')>Personnel</option>
                        <option value="livreur" @selected(old('user_type') === 'livreur')>Livreur</option>
                        <option value="client" @selected(old('user_type') === 'client')>Client</option>
                    </select>
                </div>

                <!-- Mot de passe -->
                <div
                    style="display:grid; grid-template-columns:1fr 1fr;
                        gap:20px; margin-bottom:20px;">
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            Mot de passe *
                        </label>
                        <input type="password" name="password" required minlength="8"
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>
                    <div>
                        <label
                            style="display:block; margin-bottom:8px;
                                  font-weight:600; color:#374151; font-size:14px;">
                            Confirmer le mot de passe *
                        </label>
                        <input type="password" name="password_confirmation" required minlength="8"
                            style="width:100%; padding:12px 16px;
                               border:2px solid #e5e7eb; border-radius:8px;
                               font-size:15px; box-sizing:border-box;
                               outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                    </div>
                </div>

                <!-- Options -->
                <div style="display:flex; gap:24px; margin-bottom:24px; flex-wrap:wrap;">
                    <label
                        style="display:flex; align-items:center; gap:10px;
                              font-size:15px; color:#374151; cursor:pointer;
                              background:#f9fafb; padding:12px 16px;
                              border-radius:8px; border:1px solid #e5e7eb;">
                        <input type="checkbox" name="is_active" value="1"
                            @checked(old('is_active', true)) style="width:18px; height:18px; cursor:pointer;">
                        Compte actif
                    </label>
                </div>

                <!-- Boutons -->
                <div
                    style="display:flex; gap:15px; padding-top:24px;
                        border-top:1px solid #e5e7eb; justify-content:flex-end;">
                    <a href="{{ route('users.index') }}"
                        style="padding:12px 28px; background:#6b7280;
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; text-decoration:none;">
                        Annuler
                    </a>
                    <button type="submit"
                        style="padding:12px 28px;
                           background:linear-gradient(135deg, #10b981, #059669);
                           color:white; border:none; border-radius:8px;
                           font-size:15px; font-weight:600; cursor:pointer;
                           box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                        Enregistrer l'utilisateur
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
