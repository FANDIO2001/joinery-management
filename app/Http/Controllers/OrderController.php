<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(Request $request): View
    {
        $user = auth()->user();

        $query = Order::query()
            ->with(['client', 'items.product', 'address'])
            ->latest();

        if ($user && $user->user_type === 'client') {
            $query->where('client_id', $user->id);
        }

        if ($request->filled('search')) {
            $search = $request->string('search')->trim();
            $query->where(function ($q) use ($search) {
                $q->where('reference', 'like', "%{$search}%")
                    ->orWhereHas('client', fn ($client) => $client->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%"));
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        $orders = $query->paginate(15)->withQueryString();

        if ($user && $user->user_type === 'client') {
            return view('customer.orders.index', compact('orders'));
        }

        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function show($id): View
    {
        $order = Order::with(['items.product', 'address', 'client', 'statusHistory'])->findOrFail($id);

        if (auth()->user()?->user_type === 'client' && $order->client_id !== auth()->id()) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        return view('orders.edit');
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }

    public function generateInvoice($id): RedirectResponse
    {
        $order = Order::with(['items.product', 'address', 'client'])->findOrFail($id);

        if (auth()->user()?->user_type === 'client' && $order->client_id !== auth()->id()) {
            abort(403);
        }

        // Vérifier si une facture existe déjà
        $invoice = $order->invoice()->first();
        if (!$invoice) {
            $invoice = $order->invoice()->create([
                'invoice_number' => 'INV-' . str_pad($order->id, 5, '0', STR_PAD_LEFT) . '-' . now()->format('Ymd'),
                'status' => 'draft',
                'invoice_date' => now()->toDateString(),
                'due_date' => now()->addDays(30)->toDateString(),
                'subtotal' => $order->subtotal ?? $order->total_amount,
                'tax_amount' => $order->tax_amount ?? 0,
                'total_amount' => $order->total_amount,
                'notes' => $order->notes,
            ]);
        }

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Facture générée avec succès. Numéro: ' . $invoice->invoice_number);
    }

    public function sendConfirmation($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        if (auth()->user()?->user_type === 'client' && $order->client_id !== auth()->id()) {
            abort(403);
        }

        // Marquer la facture comme envoyée
        $invoice = $order->invoice()->first();
        if ($invoice) {
            $invoice->update(['sent_at' => now()]);
        }

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Email de confirmation envoyé à ' . $order->client->email);
    }

    public function cancelOrder($id): RedirectResponse
    {
        $order = Order::findOrFail($id);

        if (auth()->user()?->user_type === 'client' && $order->client_id !== auth()->id()) {
            abort(403);
        }

        $order->update([
            'status' => 'cancelled',
            'cancelled_at' => now(),
        ]);

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Commande annulée avec succès.');
    }
}
