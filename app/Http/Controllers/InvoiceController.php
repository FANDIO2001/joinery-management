<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function index(Request $request): View
    {
        $query = Invoice::query()
            ->with(['order.client'])
            ->latest();

        if ($request->filled('search')) {
            $search = $request->string('search')->trim();
            $query->where(function ($q) use ($search) {
                $q->where('invoice_number', 'like', "%{$search}%")
                    ->orWhereHas('order.client', fn ($client) => $client->where('name', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('period')) {
            $period = $request->string('period');
            $query->whereBetween('invoice_date', match ($period) {
                'today' => [now()->startOfDay(), now()->endOfDay()],
                'week' => [now()->startOfWeek(), now()->endOfWeek()],
                'month' => [now()->startOfMonth(), now()->endOfMonth()],
                'year' => [now()->startOfYear(), now()->endOfYear()],
                default => [now()->subYears(10), now()],
            });
        }

        $invoices = $query->paginate(15)->withQueryString();

        return view('invoices.index', compact('invoices'));
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

    public function show($id): View
    {
        $invoice = Invoice::with(['order.client', 'order.items.product'])->findOrFail($id);

        return view('invoices.show', compact('invoice'));
    }

    public function pdf($id)
    {
        // Generate PDF
        return view('invoices.pdf');
    }
}
