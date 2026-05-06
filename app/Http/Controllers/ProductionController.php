<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function index()
    {
        return view('production.index');
    }

    public function create()
    {
        return view('production.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
        ]);

        // Production::create($validated);

        return redirect()->route('production.index')->with('success', 'Production created successfully');
    }

    public function show($id)
    {
        return view('production.show');
    }

    public function edit($id)
    {
        return view('production.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:planning,in_progress,completed,on_hold',
        ]);

        // Production::findOrFail($id)->update($validated);

        return redirect()->route('production.index')->with('success', 'Production updated successfully');
    }

    public function destroy($id)
    {
        // Production::findOrFail($id)->delete();

        return redirect()->route('production.index')->with('success', 'Production deleted successfully');
    }
}
