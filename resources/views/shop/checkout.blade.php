@extends('layouts.app')

@section('title', 'Finaliser la Commande')
@section('subtitle', 'Dernières étapes avant validation')

@section('content')
<div id="shop-checkout">
    <div style="padding:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Header -->
        <div style="margin-bottom:32px; padding-bottom:20px; border-bottom:1px solid #e5e7eb;">
            <h1 style="font-size:32px; font-weight:700; color:#1f2937; margin:0;">
                🛍️ Finaliser la Commande
            </h1>
            <p style="color:#6b7280; margin:8px 0 0; font-size:16px;">
                Vérifiez vos informations avant de valider
            </p>
        </div>

        <!-- Progress Steps -->
        <div style="display:flex; gap:8px; margin-bottom:32px;">
            <div style="flex:1; height:4px; background:#10b981; border-radius:2px;"></div>
            <div style="flex:1; height:4px; background:#10b981; border-radius:2px;"></div>
            <div style="flex:1; height:4px; background:#10b981; border-radius:2px;"></div>
        </div>

        <form action="{{ route('shop.checkout.process') }}" method="POST" style="display:grid; grid-template-columns:1fr 380px; gap:32px;">
            @csrf
            <!-- Checkout Form -->
            <div>
                
                <!-- Contact Information -->
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">📧 Informations de contact</h2>
                    
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Nom complet *</label>
                            <input type="text" name="name" value="{{ auth()->check() ? auth()->user()->name : '' }}" required placeholder="Ex: Jean Dupont" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Email *</label>
                            <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" required placeholder="Ex: jean@email.com" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                        <div style="grid-column:span 2;">
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Téléphone *</label>
                            <input type="tel" name="phone" value="{{ auth()->check() ? auth()->user()->phone : '' }}" required placeholder="Ex: +237 600 000 000" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                    </div>
                </div>

                <!-- Delivery Address -->
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                        <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">📍 Adresse de livraison</h2>
                        <button style="padding:8px 16px; background:#3b82f6; color:white; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer;">
                            + Nouvelle adresse
                        </button>
                    </div>
                    
                    <!-- Saved Addresses -->
                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:20px;">
                        <input type="hidden" name="saved_address" id="address_method" value="home">
                        <div class="address-option" onclick="selectOption('address', 'home', this)" style="padding:16px; border:2px solid #10b981; border-radius:12px; background:#f0fdf4; cursor:pointer;">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                                <div class="radio-circle" style="width:16px; height:16px; background:#10b981; border-radius:50%; border:3px solid white; box-shadow:0 0 0 1px #10b981;"></div>
                                <span style="font-weight:600; color:#1f2937; font-size:14px;">Domicile</span>
                            </div>
                        </div>
                        <div class="address-option" onclick="selectOption('address', 'work', this)" style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; background:white; cursor:pointer;" onmouseover="if(this.style.borderColor !== 'rgb(16, 185, 129)') this.style.borderColor='#3b82f6'" onmouseout="if(this.style.borderColor !== 'rgb(16, 185, 129)') this.style.borderColor='#e5e7eb'">
                            <div style="display:flex; align-items:center; gap:8px; margin-bottom:8px;">
                                <div class="radio-circle" style="width:16px; height:16px; background:white; border-radius:50%; border:2px solid #e5e7eb; transition:all 0.2s;"></div>
                                <span style="font-weight:600; color:#1f2937; font-size:14px;">Bureau</span>
                            </div>
                        </div>
                    </div>

                    <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                        <div style="grid-column:span 2;">
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Adresse *</label>
                            <input type="text" value="123 Rue de l'Indépendance" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Ville *</label>
                            <input type="text" value="Yaoundé" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                        <div>
                            <label style="display:block; margin-bottom:8px; font-weight:600; color:#374151; font-size:14px;">Code postal</label>
                            <input type="text" value="00237" style="width:100%; padding:12px 16px; border:2px solid #e5e7eb; border-radius:8px; font-size:15px; outline:none;" onfocus="this.style.borderColor='#10b981'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>
                    </div>
                </div>

                <!-- Delivery Method -->
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; margin-bottom:24px;">
                    <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">🚚 Mode de livraison</h2>
                    
                    <div style="display:grid; gap:12px;">
                        <input type="hidden" name="delivery_method" id="delivery_method" value="home">
                        <div class="delivery-option" onclick="selectOption('delivery', 'home', this)" style="padding:16px; border:2px solid #10b981; border-radius:12px; background:#f0fdf4; cursor:pointer; display:flex; justify-content:space-between; align-items:center;">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="radio-circle" style="width:20px; height:20px; background:#10b981; border-radius:50%; border:4px solid white; box-shadow:0 0 0 1px #10b981;"></div>
                                <div>
                                    <div style="font-weight:600; color:#1f2937; font-size:15px;">Livraison à domicile</div>
                                    <div style="color:#6b7280; font-size:13px;">Livré dans 3-5 jours ouvrés</div>
                                </div>
                            </div>
                            <div>
                                <a href="#" style="font-weight:700; color:#3b82f6; font-size:15px; text-decoration:underline; z-index:10; position:relative;" onclick="event.stopPropagation();">Devis</a>
                            </div>
                        </div>
                        
                        <div class="delivery-option" onclick="selectOption('delivery', 'pickup', this)" style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; background:white; cursor:pointer; display:flex; justify-content:space-between; align-items:center;" onmouseover="if(this.style.borderColor !== 'rgb(16, 185, 129)') this.style.borderColor='#3b82f6'" onmouseout="if(this.style.borderColor !== 'rgb(16, 185, 129)') this.style.borderColor='#e5e7eb'">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div class="radio-circle" style="width:20px; height:20px; background:white; border-radius:50%; border:2px solid #e5e7eb; transition:all 0.2s;"></div>
                                <div>
                                    <div style="font-weight:600; color:#1f2937; font-size:15px;">Retrait en atelier</div>
                                    <div style="color:#6b7280; font-size:13px;">Disponible dès fabrication terminée</div>
                                </div>
                            </div>
                            <div style="font-weight:700; color:#1f2937; font-size:16px;">Gratuit</div>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb;">
                    <div style="display:flex; align-items:center; margin-bottom:20px;">
                        <h2 style="font-size:18px; font-weight:700; color:#1f2937; margin:0;">💳 Mode de paiement</h2>
                        <span style="font-size:11px; font-weight:600; background:#fef3c7; color:#d97706; padding:4px 8px; border-radius:12px; margin-left:12px; border:1px solid #fde68a;">Bientôt disponible</span>
                    </div>
                    
                    <div style="display:grid; gap:12px;">
                        <input type="hidden" name="payment_method" id="payment_method" value="pending">
                        <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; background:#f9fafb; cursor:not-allowed; opacity:0.6; display:flex; justify-content:space-between; align-items:center;">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:20px; height:20px; background:white; border-radius:50%; border:2px solid #d1d5db;"></div>
                                <div>
                                    <div style="font-weight:600; color:#4b5563; font-size:15px;">Mobile Money</div>
                                    <div style="color:#9ca3af; font-size:13px;">Orange Money / MTN MoMo</div>
                                </div>
                            </div>
                            <div style="display:flex; gap:8px;">
                                <span style="font-size:24px; filter: grayscale(100%);">🟠</span>
                                <span style="font-size:24px; filter: grayscale(100%);">🟡</span>
                            </div>
                        </div>
                        
                        <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; background:#f9fafb; cursor:not-allowed; opacity:0.6; display:flex; justify-content:space-between; align-items:center;">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:20px; height:20px; background:white; border-radius:50%; border:2px solid #d1d5db;"></div>
                                <div>
                                    <div style="font-weight:600; color:#4b5563; font-size:15px;">Virement bancaire</div>
                                    <div style="color:#9ca3af; font-size:13px;">Transfert direct vers notre compte</div>
                                </div>
                            </div>
                            <span style="font-size:24px; filter: grayscale(100%);">🏦</span>
                        </div>

                        <div style="padding:16px; border:2px solid #e5e7eb; border-radius:12px; background:#f9fafb; cursor:not-allowed; opacity:0.6; display:flex; justify-content:space-between; align-items:center;">
                            <div style="display:flex; align-items:center; gap:12px;">
                                <div style="width:20px; height:20px; background:white; border-radius:50%; border:2px solid #d1d5db;"></div>
                                <div>
                                    <div style="font-weight:600; color:#4b5563; font-size:15px;">Espèces</div>
                                    <div style="color:#9ca3af; font-size:13px;">Paiement à la livraison</div>
                                </div>
                            </div>
                            <span style="font-size:24px; filter: grayscale(100%);">💵</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Order Summary -->
            <div>
                <div style="background:white; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,0.08); border:1px solid #e5e7eb; position:sticky; top:24px;">
                    <h2 style="font-size:20px; font-weight:700; color:#1f2937; margin:0 0 20px 0;">Récapitulatif</h2>
                    
                    <!-- Items Summary -->
                    <div style="margin-bottom:20px;">
                        @foreach($cartItems as $item)
                        <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:14px;">
                            <span style="color:#6b7280;">{{ $item->product->name }} (x{{ $item->quantity }})
                                @if($item->customization)
                                    <br><small style="color:#9ca3af;">Sur mesure</small>
                                @endif
                            </span>
                            <span style="font-weight:600; color:#1f2937;">{{ number_format($item->unit_price * $item->quantity, 0, ',', ' ') }} FCFA</span>
                        </div>
                        @endforeach
                    </div>

                    <div style="border-top:1px solid #e5e7eb; margin:16px 0;"></div>

                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Sous-total</span>
                        <span style="font-weight:600; color:#1f2937;">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>
                    
                    <div style="display:flex; justify-content:space-between; margin-bottom:12px; font-size:15px;">
                        <span style="color:#6b7280;">Livraison</span>
                        <span style="font-weight:600; color:#16a34a;">À calculer</span>
                    </div>

                    <div style="border-top:1px solid #e5e7eb; margin:16px 0;"></div>

                    <div style="display:flex; justify-content:space-between; margin-bottom:20px;">
                        <span style="font-size:18px; font-weight:700; color:#1f2937;">Total estimé</span>
                        <span style="font-size:24px; font-weight:700; color:#1f2937;">{{ number_format($total, 0, ',', ' ') }} FCFA</span>
                    </div>

                    <!-- Terms -->
                    <div style="margin-bottom:20px;">
                        <label style="display:flex; align-items:start; gap:8px; font-size:13px; color:#6b7280;">
                            <input type="checkbox" checked style="margin-top:2px;">
                            <span>J'accepte les conditions générales de vente et la politique de confidentialité</span>
                        </label>
                    </div>

                    <!-- Place Order Button -->
                    <button type="submit" style="display:block; width:100%; padding:14px 20px; background:linear-gradient(135deg, #10b981, #059669); color:white; border:none; border-radius:8px; font-size:16px; font-weight:600; cursor:pointer; box-shadow:0 4px 12px rgba(16,185,129,0.3);">
                        ✅ Confirmer la commande
                    </button>

                    <!-- Security Note -->
                    <div style="margin-top:16px; display:flex; align-items:center; gap:8px; justify-content:center;">
                        <span style="font-size:13px; color:#6b7280;">🔒 Transaction sécurisée • Données protégées</span>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function selectOption(groupName, value, element) {
        // Set the hidden input value
        document.getElementById(groupName + '_method').value = value;
        
        // Reset all visual states in the group
        const options = document.querySelectorAll('.' + groupName + '-option');
        options.forEach(opt => {
            opt.style.borderColor = '#e5e7eb';
            opt.style.background = 'white';
            const radioCircle = opt.querySelector('.radio-circle');
            if(radioCircle) {
                radioCircle.style.background = 'white';
                radioCircle.style.borderColor = '#e5e7eb';
                radioCircle.style.boxShadow = 'none';
                radioCircle.style.borderWidth = '2px';
            }
        });
        
        // Set active visual state
        element.style.borderColor = '#10b981';
        element.style.background = '#f0fdf4';
        const activeRadio = element.querySelector('.radio-circle');
        if(activeRadio) {
            activeRadio.style.background = '#10b981';
            activeRadio.style.borderColor = 'white';
            activeRadio.style.boxShadow = '0 0 0 1px #10b981';
            activeRadio.style.borderWidth = groupName === 'address' ? '3px' : '4px';
        }
    }
</script>
@endsection
