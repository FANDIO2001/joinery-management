<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        return view('stocks.index');
    }

    public function create()
    {
        return view('stocks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'warehouse' => 'nullable|string',
            'reorder_level' => 'required|integer|min:0',
        ]);

        // Stock::create($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock created successfully');
    }

    public function show($id)
    {
        return view('stocks.show');
    }

    public function edit($id)
    {
        return view('stocks.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'warehouse' => 'nullable|string',
            'reorder_level' => 'required|integer|min:0',
        ]);

        // Stock::findOrFail($id)->update($validated);

        return redirect()->route('stocks.index')->with('success', 'Stock updated successfully');
    }

    public function destroy($id)
    {
        // Stock::findOrFail($id)->delete();

        return redirect()->route('stocks.index')->with('success', 'Stock deleted successfully');
    }
}
