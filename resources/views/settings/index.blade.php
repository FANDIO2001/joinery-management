@extends('layouts.dashboard')

@section('content')
<div id="settings-index">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <h1 style="font-size:28px; font-weight:700; color:#1f2937; margin:0;">
                ⚙️ Paramètres
            </h1>
            <p style="color:#6b7280; margin:4px 0 0; font-size:16px;">
                Configurez les paramètres de votre application
            </p>
        </div>

        <!-- Settings Menu -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(250px, 1fr)); gap:20px;">
            
            <!-- Company Settings Card -->
            <a href="/settings/company" style="text-decoration:none; color:inherit;">
                <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; transition:all 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.08)'">
                    <div style="font-size:32px; margin-bottom:12px;">🏢</div>
                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                        Paramètres Entreprise
                    </h3>
                    <p style="color:#6b7280; margin:0; font-size:14px;">
                        Informations sur votre entreprise
                    </p>
                </div>
            </a>

            <!-- Categories Settings Card -->
            <a href="/settings/categories" style="text-decoration:none; color:inherit;">
                <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; transition:all 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.08)'">
                    <div style="font-size:32px; margin-bottom:12px;">📁</div>
                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                        Catégories
                    </h3>
                    <p style="color:#6b7280; margin:0; font-size:14px;">
                        Gérer les catégories de produits
                    </p>
                </div>
            </a>

            <!-- Materials Settings Card -->
            <a href="/settings/materials" style="text-decoration:none; color:inherit;">
                <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; padding:24px; transition:all 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-4px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.12)'"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.08)'">
                    <div style="font-size:32px; margin-bottom:12px;">📦</div>
                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 8px 0;">
                        Matériaux
                    </h3>
                    <p style="color:#6b7280; margin:0; font-size:14px;">
                        Gérer les matériaux disponibles
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection