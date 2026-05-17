<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $sessionId = Session::getId();
        $cartItems = CartItem::with(['product', 'product.images'])->where('session_id', $sessionId)
            ->orWhere('user_id', auth()->id())
            ->get();
        return view('shop.cart', compact('cartItems'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'variant_id' => 'nullable|exists:product_variants,id',
            'dimension' => 'nullable|string',
            'custom_width' => 'nullable|numeric|min:10',
            'custom_height' => 'nullable|numeric|min:10',
        ]);

        $product = Product::findOrFail($request->product_id);
        
        $customization = [];
        if ($request->variant_id) $customization['variant_id'] = $request->variant_id;
        if ($request->dimension) $customization['dimension'] = $request->dimension;
        if ($request->custom_width) $customization['custom_width'] = $request->custom_width;
        if ($request->custom_height) $customization['custom_height'] = $request->custom_height;

        $unitPrice = $product->base_price;
        // Here you would add variant modifiers if necessary.

        $finalCustomization = empty($customization) ? null : $customization;

        $existingCartItem = CartItem::where('product_id', $product->id)
            ->where(function($query) {
                if (auth()->check()) {
                    $query->where('user_id', auth()->id());
                } else {
                    $query->where('session_id', Session::getId());
                }
            })
            ->get()
            ->first(function($item) use ($finalCustomization) {
                $dbCustomization = is_string($item->customization) ? json_decode($item->customization, true) : $item->customization;
                return $dbCustomization == $finalCustomization;
            });

        if ($existingCartItem) {
            $existingCartItem->increment('quantity');
        } else {
            CartItem::create([
                'session_id' => Session::getId(),
                'user_id' => auth()->id(),
                'product_id' => $product->id,
                'quantity' => 1,
                'customization' => $finalCustomization,
                'unit_price' => $unitPrice,
            ]);
        }

        return redirect()->route('shop.cart')->with('success', 'Produit ajouté au panier avec succès.');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->user_id !== auth()->id() && $cartItem->session_id !== Session::getId()) {
            abort(403);
        }

        $request->validate([
            'action' => 'required|in:increase,decrease'
        ]);

        if ($request->action === 'increase') {
            $cartItem->increment('quantity');
        } elseif ($request->action === 'decrease') {
            if ($cartItem->quantity > 1) {
                $cartItem->decrement('quantity');
            } else {
                $cartItem->delete();
                return redirect()->route('shop.cart')->with('success', 'Produit retiré du panier.');
            }
        }

        return redirect()->route('shop.cart');
    }

    public function remove(CartItem $cartItem)
    {
        if ($cartItem->user_id !== auth()->id() && $cartItem->session_id !== Session::getId()) {
            abort(403);
        }

        $cartItem->delete();
        return redirect()->route('shop.cart')->with('success', 'Produit retiré du panier.');
    }
}
