<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Support\OrderCustomization;
use App\Support\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $cartItems = CartItem::with('product')->where('session_id', $sessionId)
            ->orWhere('user_id', auth()->id())
            ->get();
            
        if ($cartItems->isEmpty()) {
            return redirect()->route('shop.cart')->with('error', 'Votre panier est vide.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->unit_price * $item->quantity;
        });

        return view('shop.checkout', compact('cartItems', 'total'));
    }

    public function process(Request $request)
    {
        $cartItems = CartItem::where('user_id', auth()->id())->get();
        
        if ($cartItems->isEmpty()) {
            return redirect()->route('shop.cart')->with('error', 'Votre panier est vide.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->unit_price * $item->quantity;
        });

        // Handle address
        $address = \App\Models\ClientAddress::where('user_id', auth()->id())->first();
        if (!$address) {
            $address = \App\Models\ClientAddress::create([
                'user_id' => auth()->id(),
                'type' => 'home',
                'street' => 'Non renseignée',
                'city' => 'Non renseignée',
                'postal_code' => '00000',
                'country' => 'Non renseigné',
                'is_default' => true
            ]);
        }

        // Map delivery type
        $deliveryType = $request->delivery_method === 'pickup' ? 'pickup' : 'delivery';

        // Vérifier si la commande contient des articles avec dimensions personnalisées
        $hasCustomizations = $cartItems->some(function ($item) {
            $customization = is_string($item->customization) ? json_decode($item->customization, true) : $item->customization;
            return !empty($customization) && (
                isset($customization['custom_width']) || 
                isset($customization['custom_height']) || 
                isset($customization['dimension'])
            );
        });

        // Si la commande a des dimensions personnalisées, mettre le statut à 'pending_quote'
        $status = $hasCustomizations ? 'pending_quote' : 'pending';

        // Create the order
        $order = \App\Models\Order::create([
            'reference' => 'CMD-' . strtoupper(uniqid()),
            'client_id' => auth()->id(),
            'address_id' => $address->id,
            'status' => $status,
            'subtotal' => $total,
            'discount_amount' => 0,
            'delivery_fee' => 0,
            'tax_amount' => 0,
            'total_amount' => $total,
            'paid_amount' => 0,
            'payment_status' => 'unpaid',
            'delivery_type' => $deliveryType,
            'created_by' => auth()->id(),
        ]);

        // Create order items
        foreach ($cartItems as $item) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price,
                'customization' => $item->customization,
                'status' => 'pending',
            ]);
        }

        // Clear cart
        CartItem::where('user_id', auth()->id())->delete();

        $message = $hasCustomizations
            ? 'Votre commande sur mesure a été enregistrée. Un devis vous sera proposé sous peu.'
            : 'Votre commande a été confirmée avec succès !';

        return redirect()
            ->route('customer.orders.show', $order->id)
            ->with('success', $message);
    }
}
