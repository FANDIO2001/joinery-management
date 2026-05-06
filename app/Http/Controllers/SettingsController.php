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
        return view('settings.categories');
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
        return view('settings.materials');
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
}
