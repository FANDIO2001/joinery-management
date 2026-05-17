<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return view('shop.index');
    }

    public function show(\App\Models\Product $product)
    {
        $product->load(['images', 'category.parent.parent', 'variants']);

        $relatedProducts = \App\Models\Product::query()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->with('images')
            ->limit(4)
            ->get();

        $product->increment('views_count');

        return view('shop.show', compact('product', 'relatedProducts'));
    }

    public function customize(\App\Models\Product $product)
    {
        return view('shop.customize', compact('product'));
    }
}
