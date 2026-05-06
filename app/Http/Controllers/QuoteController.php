<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('quotes.index');
    }

    public function create()
    {
        return view('quotes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'quote_date' => 'required|date',
            'valid_until' => 'required|date|after:quote_date',
            'status' => 'required|in:draft,sent,accepted,rejected,expired',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Quote::create($validated);

        return redirect()->route('quotes.index')->with('success', 'Quote created successfully');
    }

    public function show($id)
    {
        return view('quotes.show');
    }

    public function edit($id)
    {
        return view('quotes.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'quote_date' => 'required|date',
            'valid_until' => 'required|date|after:quote_date',
            'status' => 'required|in:draft,sent,accepted,rejected,expired',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Quote::findOrFail($id)->update($validated);

        return redirect()->route('quotes.index')->with('success', 'Quote updated successfully');
    }

    public function destroy($id)
    {
        // Quote::findOrFail($id)->delete();

        return redirect()->route('quotes.index')->with('success', 'Quote deleted successfully');
    }

    public function pdf($id)
    {
        // Generate PDF
        return view('quotes.pdf');
    }
}
