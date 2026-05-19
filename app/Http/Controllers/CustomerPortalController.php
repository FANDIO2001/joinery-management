<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerPortalController extends Controller
{
    public function dashboard()
    {
        return view('customer.dashboard');
    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function addresses()
    {
        return view('customer.addresses');
    }

    public function products()
    {
        $productIds = \App\Models\OrderItem::whereHas('order', function($query) {
            $query->where('client_id', auth()->id());
        })->pluck('product_id')->unique();

        $products = \App\Models\Product::with('images')
            ->whereIn('id', $productIds)
            ->paginate(10);

        return view('customer.orders.products.index', compact('products'));
    }
}
