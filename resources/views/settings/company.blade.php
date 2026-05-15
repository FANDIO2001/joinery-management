@extends('layouts.dashboard')

@section('content')
<div id="company-settings">
    <div style="padding:24px; max-width:800px; margin:0 auto;">
        
        <!-- Header -->
        <div style="display:flex; align-items:center; margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <a href="/settings" style="display:flex; align-items:center; justify-content:center; width:40px; height:40px; background:#f3f4f6; border-radius:8px; text-decoration:none; color:#6b7280; margin-right:16px; transition:all 0.2s;" onmouseover="this.style.background='#e5e7eb'" onmouseout="this.style.background='#f3f4f6'">
                ←
            </a>
            <div>
                <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">
                    🏢 Paramètres Entreprise
                </h1>
                <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                    Modifiez les informations de votre entreprise
                </p>
            </div>
        </div>

        <!-- Company Form -->
        <form action="/settings/company" method="POST" enctype="multipart/form-data" style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:32px;">
            @csrf
            
            <!-- Company Name -->
            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                    Nom de l'Entreprise
                </label>
                <input type="text" name="company_name" value="{{ old('company_name', 'Mon Entreprise') }}" 
                    style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Company Email -->
            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                    Email Professionnel
                </label>
                <input type="email" name="company_email" value="{{ old('company_email', 'contact@example.com') }}" 
                    style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Company Phone -->
            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                    Téléphone
                </label>
                <input type="tel" name="company_phone" value="{{ old('company_phone', '+33 1 23 45 67 89') }}" 
                    style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none; transition:border-color 0.2s;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">
            </div>

            <!-- Company Address -->
            <div style="margin-bottom:24px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                    Adresse
                </label>
                <textarea name="company_address" rows="4"
                    style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; box-sizing:border-box; outline:none; transition:border-color 0.2s; font-family:inherit; resize:vertical;"
                    onfocus="this.style.borderColor='#10b981'"
                    onblur="this.style.borderColor='#e5e7eb'">{{ old('company_address', '123 Rue de l\'Exemple\n75000 Paris\nFrance') }}</textarea>
            </div>

            <!-- Logo Upload -->
            <div style="margin-bottom:32px;">
                <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">
                    Logo de l'Entreprise
                </label>
                <div style="border:2px dashed #e5e7eb; border-radius:8px; padding:20px; text-align:center; background:#f9fafb; cursor:pointer; transition:all 0.2s;" 
                    id="logoDropZone"
                    onmouseover="this.style.borderColor='#10b981'; this.style.background='#ecfdf5'"
                    onmouseout="this.style.borderColor='#e5e7eb'; this.style.background='#f9fafb'">
                    <input type="file" name="logo" id="logoInput" accept="image/*" style="display:none;" onchange="updateFileName(this)">
                    <div style="font-size:24px; margin-bottom:8px;">📤</div>
                    <p style="color:#6b7280; margin:0; font-size:14px;">
                        Cliquez ou glissez une image (Max 5MB)
                    </p>
                </div>
                <script>
                document.getElementById('logoDropZone').addEventListener('click', function() {
                    document.getElementById('logoInput').click();
                });
                function updateFileName(input) {
                    if(input.files && input.files[0]) {
                        document.getElementById('logoDropZone').innerHTML = '✅ ' + input.files[0].name;
                    }
                }
                </script>
            </div>

            <!-- Submit Button -->
            <div style="display:flex; gap:12px;">
                <button type="submit" 
                    style="flex:1; padding:12px 24px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3); transition:all 0.2s;"
                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(16,185,129,0.4)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(16,185,129,0.3)'">
                    💾 Enregistrer
                </button>
                <a href="/settings" style="padding:12px 24px; background:#f3f4f6; color:#374151; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; text-decoration:none; display:flex; align-items:center; transition:all 0.2s;"
                    onmouseover="this.style.background='#e5e7eb'"
                    onmouseout="this.style.background='#f3f4f6'">
                    ✕ Annuler
                </a>
            </div>
        </form>
    </div>
</div>
@endsection