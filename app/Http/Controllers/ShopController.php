<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query()
            ->where('status', 'active')
            ->with(['images', 'category']);

        if ($request->filled('search')) {
            $search = $request->string('search')->trim();
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('sku', 'like', "%{$search}%")
                    ->orWhere('short_description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->integer('category'));
        }

        if ($request->boolean('custom')) {
            $query->where('is_customizable', true);
        }

        $sort = $request->string('sort', 'latest')->toString();
        match ($sort) {
            'price_asc' => $query->orderBy('base_price'),
            'price_desc' => $query->orderByDesc('base_price'),
            'name' => $query->orderBy('name'),
            default => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();

        $categories = Category::query()
            ->whereHas('products', fn ($q) => $q->where('status', 'active'))
            ->withCount(['products' => fn ($q) => $q->where('status', 'active')])
            ->orderBy('name')
            ->get();

        $activeCategory = $request->filled('category')
            ? $categories->firstWhere('id', $request->integer('category'))
            : null;

        $activeNav = $request->boolean('custom') ? 'sur-mesure' : 'catalogue';

        return view('shop.index', compact('products', 'categories', 'activeCategory', 'activeNav'));
    }

    public function show(Product $product)
    {
        $product->load(['images', 'category.parent.parent', 'variants']);

        $relatedProducts = Product::query()
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->where('status', 'active')
            ->with('images')
            ->limit(4)
            ->get();

        $product->increment('views_count');

        return view('shop.show', compact('product', 'relatedProducts'));
    }

    public function customize(Product $product)
    {
        return view('shop.customize', compact('product'));
    }
}
