@section('content')
<div id="profile-edit">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:24px;">
            <div>
                <h1 style="font-size:24px; font-weight:700; color:#1f2937; margin:0;">
                    Modifier mon profil
                </h1>
                <p style="color:#6b7280; margin:4px 0 0;">
                    Mettre à jour vos informations personnelles
                </p>
            </div>
            <a href="{{ route('dashboard') }}"
                style="display:flex; align-items:center; gap:8px;
                       padding:10px 18px; background:#6b7280;
                       color:white; border:none; border-radius:8px;
                       font-size:14px; font-weight:500; cursor:pointer; text-decoration:none;">
                <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Retour
            </a>
        </div>

        <!-- Profile Edit Form -->
        <div style="background:white; border-radius:12px; padding:32px; box-shadow:0 4px 6px rgba(0,0,0,0.05); border:1px solid #e5e7eb;">
            <form id="profileEditForm" onsubmit="saveProfile(event)">
                <!-- Avatar Section -->
                <div style="text-align:center; margin-bottom:32px;">
                    <div style="position:relative; display:inline-block;">
                        <img id="avatarPreview" src="https://ui-avatars.com/api/?name=Jean Dupont&background=1e3a8a&color=fff" 
                             alt="Avatar" style="width:120px; height:120px; border-radius:50%; border:4px solid #e5e7eb;">
                        <button type="button" onclick="document.getElementById('avatarInput').click()" 
                                style="position:absolute; bottom:0; right:0; background:#3b82f6; color:white; 
                                       border:2px solid white; border-radius:50%; width:36px; height:36px; 
                                       cursor:pointer; display:flex; align-items:center; justify-content:center;">
                            <svg width="16" height="16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h.93a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                        </button>
                        <input type="file" id="avatarInput" accept="image/*" style="display:none;" onchange="previewAvatar(event)">
                    </div>
                    <p style="margin-top:12px; color:#6b7280; font-size:14px;">
                        Cliquez sur l'icône pour changer votre photo
                    </p>
                </div>

                <!-- Personal Information -->
                <div style="margin-bottom:32px;">
                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 20px; padding-bottom:12px; border-bottom:1px solid #e5e7eb;">
                        Informations personnelles
                    </h3>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                                Nom
                            </label>
                            <input type="text" id="lastName" value="Dupont" required
                                   style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                          font-size:14px; transition:border-color 0.2s;"
                                   onfocus="this.style.borderColor='#3b82f6'" 
                                   onblur="this.style.borderColor='#d1d5db'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                                Prénom
                            </label>
                            <input type="text" id="firstName" value="Jean" required
                                   style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                          font-size:14px; transition:border-color 0.2s;"
                                   onfocus="this.style.borderColor='#3b82f6'" 
                                   onblur="this.style.borderColor='#d1d5db'">
                        </div>
                    </div>

                    <div style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                            Email
                        </label>
                        <input type="email" id="email" value="jean.dupont@dollars-menuiserie.com" required
                               style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                      font-size:14px; transition:border-color 0.2s;"
                               onfocus="this.style.borderColor='#3b82f6'" 
                               onblur="this.style.borderColor='#d1d5db'">
                    </div>

                    <div style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                            Téléphone
                        </label>
                        <input type="tel" id="phone" value="+33 6 12 34 56 78" 
                               style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                      font-size:14px; transition:border-color 0.2s;"
                               onfocus="this.style.borderColor='#3b82f6'" 
                               onblur="this.style.borderColor='#d1d5db'">
                    </div>

                    <div>
                        <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                            Adresse
                        </label>
                        <textarea id="address" rows="3" 
                                  style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                         font-size:14px; resize:vertical; transition:border-color 0.2s;"
                                  onfocus="this.style.borderColor='#3b82f6'" 
                                  onblur="this.style.borderColor='#d1d5db'">123 Rue de l'Industrie, 75001 Paris</textarea>
                    </div>
                </div>

                <!-- Password Section -->
                <div style="margin-bottom:32px;">
                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 20px; padding-bottom:12px; border-bottom:1px solid #e5e7eb;">
                        Mot de passe
                    </h3>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px; margin-bottom:20px;">
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                                Nouveau mot de passe
                            </label>
                            <input type="password" id="newPassword" 
                                   style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                          font-size:14px; transition:border-color 0.2s;"
                                   onfocus="this.style.borderColor='#3b82f6'" 
                                   onblur="this.style.borderColor='#d1d5db'"
                                   placeholder="Laisser vide pour ne pas changer">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:500; color:#374151; font-size:14px;">
                                Confirmer le mot de passe
                            </label>
                            <input type="password" id="confirmPassword" 
                                   style="width:100%; padding:12px; border:1px solid #d1d5db; border-radius:8px; 
                                          font-size:14px; transition:border-color 0.2s;"
                                   onfocus="this.style.borderColor='#3b82f6'" 
                                   onblur="this.style.borderColor='#d1d5db'"
                                   placeholder="Laisser vide pour ne pas changer">
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div style="display:flex; gap:15px; justify-content:flex-end; padding-top:24px; border-top:1px solid #e5e7eb;">
                    <a href="{{ route('dashboard') }}"
                            style="display:inline-flex; align-items:center; justify-content:center;
                                   padding:12px 28px; background:#6b7280;
                                   color:white; border:none; border-radius:8px;
                                   font-size:15px; font-weight:600; cursor:pointer; text-decoration:none;">
                        Annuler
                    </a>
                    <button type="submit" 
                            style="padding:12px 28px; background:linear-gradient(135deg, #3b82f6, #2563eb);
                                   color:white; border:none; border-radius:8px;
                                   font-size:15px; font-weight:600; cursor:pointer;
                                   box-shadow:0 4px 12px rgba(59,130,246,0.3);">
                        💾 Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
