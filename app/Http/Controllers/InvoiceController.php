<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }

    public function create()
    {
        return view('invoices.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'invoice_date' => 'required|date',
            'due_date' => 'required|date|after:invoice_date',
            'status' => 'required|in:draft,sent,paid,overdue,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Invoice::create($validated);

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully');
    }

    public function show($id)
    {
        return view('invoices.show');
    }

    public function pdf($id)
    {
        // Generate PDF
        return view('invoices.pdf');
    }
}
