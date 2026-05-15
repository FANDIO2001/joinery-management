<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function company()
    {
        return view('settings.company');
    }

    public function updateCompany(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_email' => 'required|email',
            'company_phone' => 'nullable|string',
            'company_address' => 'nullable|string',
            'logo' => 'nullable|image|max:5120',
        ]);

        // Update company settings
        // Settings::updateOrCreate(['key' => 'company_name'], ['value' => $validated['company_name']]);

        return redirect()->route('settings.index')->with('success', 'Company settings updated successfully');
    }

    public function categories()
    {
        $categories = \App\Models\Category::whereNull('parent_id')->with('children')->get();
        return view('settings.categories', ['categories' => $categories]);
    }

    public function updateCategories(Request $request)
    {
        $validated = $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'string|max:255',
        ]);

        // Update categories settings

        return redirect()->route('settings.index')->with('success', 'Categories updated successfully');
    }

    public function materials()
    {
        $materials = \App\Models\Material::all();
        return view('settings.materials', ['materials' => $materials]);
    }

    public function updateMaterials(Request $request)
    {
        $validated = $request->validate([
            'materials' => 'required|array',
            'materials.*.name' => 'required|string|max:255',
            'materials.*.unit_price' => 'required|numeric|min:0',
        ]);

        // Update materials settings

        return redirect()->route('settings.index')->with('success', 'Materials updated successfully');
    }

    public function createCategory()
    {
        $parentCategories = \App\Models\Category::whereNull('parent_id')->get();
        return view('settings.categories-create', ['parentCategories' => $parentCategories]);
    }

    public function storeCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        \App\Models\Category::create($validated);

        return redirect()->route('settings.categories')->with('success', 'Catégorie créée avec succès');
    }

    public function editCategory(\App\Models\Category $category)
    {
        $parentCategories = \App\Models\Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();
        return view('settings.categories-edit', [
            'category' => $category,
            'parentCategories' => $parentCategories
        ]);
    }

    public function updateCategory(Request $request, \App\Models\Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($category->image);
            }
            $validated['image'] = $request->file('image')->store('categories', 'public');
        }

        $validated['slug'] = \Illuminate\Support\Str::slug($validated['name']);

        $category->update($validated);

        return redirect()->route('settings.categories')->with('success', 'Catégorie mise à jour avec succès');
    }

    public function destroyCategory(\App\Models\Category $category)
    {
        // Delete image if exists
        if ($category->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($category->image);
        }

        // Delete subcategories
        $category->children()->delete();

        $category->delete();

        return redirect()->route('settings.categories')->with('success', 'Catégorie supprimée avec succès');
    }
}
