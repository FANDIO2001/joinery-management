<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $query = Product::query()->with('category');

        // Filtre par recherche
        if ($request->has('search') && $request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
        }

        // Filtre par catégorie
        if ($request->has('category') && $request->filled('category')) {
            $query->where('category_id', $request->input('category'));
        }

        // Filtre par statut
        if ($request->has('status') && $request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $products = $query->paginate(15);
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
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
        $product = Product::with('category', 'variants')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id): View
    {
        $product = Product::with([
            'category',
            'images' => fn ($q) => $q->orderBy('order'),
        ])->findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'sku' => ['required', 'string', 'max:50', 'unique:products,sku,'.$product->id],
            'category_id' => ['required', 'exists:categories,id'],
            'base_price' => ['required', 'numeric', 'min:0'],
            'cost_price' => ['nullable', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'is_customizable' => ['nullable', 'boolean'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif,webp', 'max:5120'],
            'remove_images' => ['nullable', 'array'],
            'remove_images.*' => ['integer'],
            'primary_image_id' => ['nullable', 'integer'],
        ]);

        DB::transaction(function () use ($request, $validated, $product) {
            $product->update([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'short_description' => $validated['short_description'] ?? null,
                'base_price' => $validated['base_price'],
                'cost_price' => $validated['cost_price'] ?? null,
                'sku' => $validated['sku'],
                'status' => $request->boolean('is_active', true) ? 'active' : 'draft',
                'is_customizable' => $request->boolean('is_customizable'),
            ]);

            if ($request->filled('remove_images')) {
                $product->images()
                    ->whereIn('id', $request->input('remove_images'))
                    ->get()
                    ->each(function (ProductImage $image) {
                        Storage::disk('public')->delete($image->image_path);
                        $image->delete();
                    });
            }

            if ($request->filled('primary_image_id')) {
                $primaryId = (int) $request->input('primary_image_id');
                if ($product->images()->where('id', $primaryId)->exists()) {
                    $product->images()->update(['is_primary' => false]);
                    $product->images()->where('id', $primaryId)->update(['is_primary' => true]);
                }
            }

            if ($request->hasFile('images')) {
                $maxOrder = (int) $product->images()->max('order');
                $hasPrimary = $product->images()->where('is_primary', true)->exists();

                foreach ($request->file('images') as $index => $image) {
                    $maxOrder++;
                    ProductImage::create([
                        'product_id' => $product->id,
                        'image_path' => $image->store('products', 'public'),
                        'alt_text' => $product->name,
                        'order' => $maxOrder,
                        'is_primary' => ! $hasPrimary && $index === 0,
                    ]);
                    if (! $hasPrimary && $index === 0) {
                        $hasPrimary = true;
                    }
                }
            }

            $product->load('images');
            if ($product->images->isNotEmpty() && ! $product->images()->where('is_primary', true)->exists()) {
                $product->images()->orderBy('order')->first()?->update(['is_primary' => true]);
            }
        });

        return redirect()
            ->route('products.index')
            ->with('success', 'Produit modifié avec succès.');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
