@extends('layouts.dashboard')

@section('title', 'Production')
@section('subtitle', 'Calendrier de production')

@section('content')
<div style="padding: 24px; max-width: 1200px; margin: 0 auto;">
    <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:16px; margin-bottom:24px; flex-wrap:wrap;">
        <div>
            <h1 style="font-size:28px; font-weight:700; color:#111827; margin:0;">Production</h1>
            <p style="color:#6b7280; margin-top:8px; max-width:680px;">Suivez vos tâches de production, planifiez les étapes et consultez le calendrier de l’atelier.</p>
        </div>
        <a href="{{ route('production.calendar') }}" style="padding:12px 20px; background:#10b981; color:#fff; border-radius:12px; display:inline-flex; align-items:center; gap:8px; text-decoration:none; font-weight:600;">? Actualiser</a>
    </div>

    <div style="display:grid; grid-template-columns:minmax(0,1fr); gap:24px;">
        <div style="background:#ffffff; border:1px solid #e5e7eb; border-radius:16px; padding:24px; box-shadow:0 10px 30px rgba(15,23,42,0.05);">
            <div style="display:flex; justify-content:space-between; align-items:center; gap:16px; margin-bottom:20px;">
                <div>
                    <h2 style="font-size:18px; font-weight:700; margin:0; color:#111827;">Calendrier de production</h2>
                    <p style="color:#6b7280; margin:8px 0 0;">Tableau de bord de production en cours.</p>
                </div>
                <a href="{{ route('stocks.materials') }}" style="color:#10b981; font-weight:600; text-decoration:none;">Voir matériaux</a>
            </div>
            <div style="min-height:320px; border:1px dashed #d1d5db; border-radius:14px; display:flex; justify-content:center; align-items:center; padding:32px; color:#4b5563;">
                <div style="text-align:center;">
                    <div style="font-size:48px; margin-bottom:16px;">??</div>
                    <p style="font-size:16px; margin:0 0 12px;">Aucun calendrier disponible pour le moment.</p>
                    <p style="font-size:14px; color:#6b7280; margin:0;">La fonctionnalité frontend est prête. Les données de production seront affichées ici dès que l’API sera connectée.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
