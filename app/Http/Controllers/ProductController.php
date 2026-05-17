<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        return view('products.index');
    }

    public function create(Request $request): View
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'sku' => ['required', 'string', 'max:50', 'unique:products,sku'],
            'category_id' => ['required', 'exists:categories,id'],
            'base_price' => ['required', 'numeric', 'min:0'],
            'cost_price' => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'is_customizable' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
        ]);

        DB::transaction(function () use ($request, $validated) {
            $product = Product::create([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'slug' => $this->generateUniqueSlug($validated['name']),
                'description' => $validated['description'] ?? null,
                'short_description' => $validated['short_description'] ?? null,
                'base_price' => $validated['base_price'],
                'cost_price' => $validated['cost_price'] ?? null,
                'sku' => $validated['sku'],
                'status' => $request->boolean('is_active', true) ? 'active' : 'draft',
                'is_customizable' => $request->boolean('is_customizable'),
            ]);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $index => $image) {
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $image->store('products', 'public'),
                        'alt_text' => $product->name,
                        'order' => $index,
                        'is_primary' => $index === 0,
                    ]);
                }
            }
        });

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit créé avec succès.');
    }

    private function generateUniqueSlug(string $name): string
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;
        $counter = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug.'-'.$counter++;
        }

        return $slug;
    }

    public function show($id)
    {
        return view('products.show');
    }

    public function edit($id)
    {
        return view('products.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sku' => 'required|string|unique:products,sku,' . $id,
            'stock' => 'required|integer|min:0',
        ]);

        // Product::findOrFail($id)->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    public function destroy($id)
    {
        // Product::findOrFail($id)->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
}
