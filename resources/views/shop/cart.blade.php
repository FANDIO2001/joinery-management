@extends('layouts.app')

@section('title', 'Mon Panier')
@section('subtitle', 'Gérez vos articles')

@section('content')
<div id="shop-cart">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <h1 style="font-size:32px; font-weight:700; color:#1f2937; margin:0;">
                🛒 Mon Panier
            </h1>
            <p style="color:#6b7280; margin:8px 0 0; font-size:16px;">
                {{ $cartItems ?? 0 }} article(s) dans votre panier
            </p>
        </div>

        <div style="display:grid; grid-template-columns:1fr 350px; gap:32px;">
            
            <!-- Cart Items -->
            <div>
                <div style="background:white; border-radius:16px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; overflow:hidden;">
                    
                    <!-- Cart Item 1 -->
                    <div style="padding:24px; border-bottom:1px solid #f3f4f6; display:flex; gap:20px;">
                        <div style="width:120px; height:120px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px solid #e5e7eb;">
                            <span style="font-size:40px;">🪑</span>
                        </div>
                        <div style="flex:1;">
                            <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:12px;">
                                <div>
                                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 4px 0;">Chaise en bois de chêne</h3>
                                    <p style="color:#6b7280; font-size:14px; margin:0;">Modèle classique - Finition vernis</p>
                                </div>
                                <button style="padding:6px 12px; background:#fee2e2; color:#dc2626; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                                    🗑️ Supprimer
                                </button>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <button style="width:36px; height:36px; background:#f3f4f6; border:none; border-radius:8px; font-size:18px; cursor:pointer;">-</button>
                                    <span style="font-size:16px; font-weight:600; color:#1f2937; min-width:40px; text-align:center;">2</span>
                                    <button style="width:36px; height:36px; background:#f3f4f4; border:none; border-radius:8px; font-size:18px; cursor:pointer;">+</button>
                                </div>
                                <div style="font-size:20px; font-weight:700; color:#1f2937;">45,000 FCFA</div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 2 -->
                    <div style="padding:24px; border-bottom:1px solid #f3f4f6; display:flex; gap:20px;">
                        <div style="width:120px; height:120px; background:#f9fafb; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px solid #e5e7eb;">
                            <span style="font-size:40px;">🗄️</span>
                        </div>
                        <div style="flex:1;">
                            <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:12px;">
                                <div>
                                    <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0 0 4px 0;">Bibliothèque sur mesure</h3>
                                    <p style="color:#6b7280; font-size:14px; margin:0;">200cm x 80cm - Bois de merisier</p>
                                </div>
                                <button style="padding:6px 12px; background:#fee2e2; color:#dc2626; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                                    🗑️ Supprimer
                                </button>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <button style="width:36px; height:36px; background:#f3f4f6; border:none; border-radius:8px; font-size:18px; cursor:pointer;">-</button>
                                    <span style="font-size:16px; font-weight:600; color:#1f2937; min-width:40px; text-align:center;">1</span>
                                    <button style="width:36px; height:36px; background:#f3f4f4; border:none; border-radius:8px; font-size:18px; cursor:pointer;">+</button>
                                </div>
                                <div style="font-size:20px; font-weight:700; color:#1f2937;">120,000 FCFA</div>
                            </div>
                        </div>
                    </div>

                    <!-- Cart Item 3 - Customized -->
                    <div style="padding:24px; display:flex; gap:20px; background:#f9fafb;">
                        <div style="width:120px; height:120px; background:#e0e7ff; border-radius:12px; display:flex; align-items:center; justify-content:center; border:2px solid #6366f1;">
                            <span style="font-size:40px;">🎨</span>
                        </div>
                        <div style="flex:1;">
                            <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:12px;">
                                <div>
                                    <div style="display:flex; align-items:center; gap:8px; margin-bottom:4px;">
                                        <h3 style="font-size:18px; font-weight:600; color:#1f2937; margin:0;">Table basse personnalisée</h3>
                                        <span style="padding:4px 8px; background:#6366f1; color:white; font-size:11px; font-weight:600; border-radius:12px;">Sur mesure</span>
                                    </div>
                                    <p style="color:#6b7280; font-size:14px; margin:0;">120cm x 60cm - Teinte noyer - Vernis mat</p>
                                </div>
                                <button style="padding:6px 12px; background:#fee2e2; color:#dc2626; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                                    🗑️ Supprimer
                                </button>
                            </div>
                            <div style="display:flex; justify-content:space-between; align-items:center;">
                                <div style="display:flex; align-items:center; gap:12px;">
                                    <button style="width:36px; height:36px; background:#f3f4f6; border:none; border-radius:8px; font-size:18px; cursor:pointer;">-</button>
                                    <span style="font-size:16px; font-weight:600; color:#1f2937; min-width:40px; text-align:center;">1</span>
                                    <button style="width:36px; height:36px; background:#f3f4f4; border:none; border-radius:8px; font-size:18px; cursor:pointer;">+</button>
                                </div>
                                <div style="font-size:20px; font-weight:700; color:#1f2937;">85,000 FCFA</div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Continue Shopping -->
                <div style="margin-top:24px;">
                    <a href="/shop" style="display:inline-flex; align-items:center; gap:8px; padding:12px 24px; background:white; border:2px solid #e5e7eb; border-radius:8px; color:#374151; font-size:14px; font-weight:500; text-decoration:none; cursor:pointer;">
                        ← Continuer mes achats
                    </a>
                </div>
            </div>

            <!-- Order Summary -->
            <div>
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; position:sticky; top:24px;">
                    <h2 style="font-size:20px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Résumé de la commande</h2>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Sous-total (4 articles)</span>
                        <span style="font-weight:600; color:#1f2937;">250,000 FCFA</span>
                    </div>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Livraison</span>
                        <span style="font-weight:600; color:#16a34a;">Gratuite</span>
                    </div>

                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Remise (code: BIENVENUE10)</span>
                        <span style="font-weight:600; color:#dc2626;">-25,000 FCFA</span>
                    </div>

                    <div style="border-top:1px solid #e5e7eb; margin:16px 0;"></div>

                    <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
                        <span style="font-size:18px; font-weight:700; color:#1f2937;">Total</span>
                        <span style="font-size:24px; font-weight:700; color:#1f2937;">225,000 FCFA</span>
                    </div>

                    <!-- Promo Code -->
                    <div style="margin-bottom:20px;">
                        <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Code promo</label>
                        <div style="display:flex; gap:8px;">
                            <input type="text" placeholder="Entrez votre code" style="flex:1; padding:10px 14px; border:2px solid #e5e7eb; border-radius:8px; font-size:14px; outline:none;">
                            <button style="padding:10px 16px; background:#f3f4f6; color:#374151; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer;">Appliquer</button>
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <a href="/shop/checkout" style="display:block; width:100%; padding:14px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:16px; font-weight:600; text-align:center; text-decoration:none; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                        Passer la commande →
                    </a>

                    <!-- Security Note -->
                    <div style="margin-top:16px; display:flex; align-items:center; gap:8px; justify-content:center;">
                        <span style="font-size:14px; color:#6b7280;">🔒 Paiement sécurisé</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
