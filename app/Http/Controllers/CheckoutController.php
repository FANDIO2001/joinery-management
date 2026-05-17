<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
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
}
