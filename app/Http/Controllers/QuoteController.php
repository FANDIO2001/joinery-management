<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Quote;
use App\Support\OrderStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class QuoteController extends Controller
{
    public function index(Request $request): View
    {
        $query = Quote::query()
            ->with(['order.client', 'creator'])
            ->latest();

        $user = auth()->user();
        if ($user && $user->user_type === 'client') {
            $query->whereHas('order', fn ($q) => $q->where('client_id', $user->id));
        }

        if ($request->filled('search')) {
            $search = '%'.$request->string('search')->trim().'%';
            $query->where(function ($q) use ($search) {
                if (Schema::hasColumn('quotes', 'quote_number')) {
                    $q->where('quote_number', 'like', $search);
                }
                if (Schema::hasColumn('quotes', 'reference')) {
                    $q->orWhere('reference', 'like', $search);
                }
                $q->orWhereHas('order', function ($order) use ($search) {
                    $order->where('reference', 'like', $search)
                        ->orWhereHas('client', fn ($client) => $client
                            ->where('name', 'like', $search)
                            ->orWhere('email', 'like', $search));
                });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        if ($request->filled('period')) {
            match ($request->string('period')->toString()) {
                'today' => $query->whereDate('created_at', today()),
                'week' => $query->where('created_at', '>=', now()->startOfWeek()),
                'month' => $query->where('created_at', '>=', now()->startOfMonth()),
                'year' => $query->where('created_at', '>=', now()->startOfYear()),
                default => null,
            };
        }

        $quotes = $query->paginate(15)->withQueryString();

        return view('quotes.index', compact('quotes'));
    }

    public function createForOrder(Order $order): View|RedirectResponse
    {
        $this->authorizeAdmin();

        if ($order->status !== OrderStatus::PENDING_QUOTE) {
            return redirect()
                ->route('orders.show', $order)
                ->with('error', 'Cette commande n\'est pas en attente de devis.');
        }

        if ($order->quote) {
            return redirect()
                ->route('quotes.show', $order->quote)
                ->with('info', 'Un devis existe déjà pour cette commande.');
        }

        $order->load(['items.product', 'client']);

        return view('quotes.create', compact('order'));
    }

    public function storeForOrder(Request $request, Order $order): RedirectResponse
    {
        $this->authorizeAdmin();

        if ($order->status !== OrderStatus::PENDING_QUOTE || $order->quote) {
            return redirect()
                ->route('orders.show', $order)
                ->with('error', 'Impossible de créer un devis pour cette commande.');
        }

        $validated = $request->validate([
            'subtotal' => 'required|numeric|min:0',
            'discount_amount' => 'nullable|numeric|min:0',
            'tax_amount' => 'nullable|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'pricing_notes' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        $quoteNumber = 'DEV-'.$order->id.'-'.now()->format('YmdHis');

        $quote = Quote::create([
            'reference' => $quoteNumber,
            'quote_number' => $quoteNumber,
            'client_id' => $order->client_id,
            'order_id' => $order->id,
            'quote_date' => now()->toDateString(),
            'valid_until' => now()->addDays(15)->toDateString(),
            'subtotal' => $validated['subtotal'],
            'discount_amount' => $validated['discount_amount'] ?? 0,
            'tax_amount' => $validated['tax_amount'] ?? 0,
            'total_amount' => $validated['total_amount'],
            'pricing_notes' => $validated['pricing_notes'] ?? null,
            'notes' => $validated['notes'] ?? null,
            'status' => 'draft',
            'created_by' => auth()->id(),
        ]);

        return redirect()
            ->route('quotes.show', $quote)
            ->with('success', 'Devis créé. Envoyez-le au client pour validation.');
    }

    public function show(Quote $quote): View
    {
        $this->authorizeQuoteAccess($quote);

        $quote->load(['order.items.product', 'order.client', 'creator']);

        $layout = auth()->user()?->user_type === 'client' ? 'layouts.app' : 'layouts.dashboard';

        return view('quotes.show', compact('quote', 'layout'));
    }

    public function send(Quote $quote): RedirectResponse
    {
        $this->authorizeAdmin();

        if ($quote->status !== 'draft') {
            return redirect()->back()->with('error', 'Ce devis a déjà été envoyé.');
        }

        $quote->update([
            'status' => 'sent',
            'sent_at' => now(),
            'expires_at' => now()->addDays(15),
        ]);

        $quote->order->update([
            'status' => OrderStatus::QUOTE_SENT,
            'subtotal' => $quote->subtotal,
            'discount_amount' => $quote->discount_amount,
            'tax_amount' => $quote->tax_amount,
            'total_amount' => $quote->total_amount,
        ]);

        return redirect()->back()->with('success', 'Devis envoyé au client pour approbation.');
    }

    public function approve(Quote $quote): RedirectResponse
    {
        if (auth()->id() !== $quote->order->client_id) {
            abort(403);
        }

        if ($quote->status !== 'sent') {
            return redirect()
                ->route('customer.orders.show', $quote->order_id)
                ->with('error', 'Ce devis ne peut plus être approuvé.');
        }

        $quote->update([
            'status' => 'approved',
            'approved_at' => now(),
        ]);

        $quote->order->update([
            'status' => OrderStatus::PENDING,
            'subtotal' => $quote->subtotal,
            'discount_amount' => $quote->discount_amount,
            'tax_amount' => $quote->tax_amount,
            'total_amount' => $quote->total_amount,
        ]);

        return redirect()
            ->route('customer.orders.show', $quote->order_id)
            ->with('success', 'Devis approuvé. Votre commande est en attente de confirmation.');
    }

    public function reject(Quote $quote): RedirectResponse
    {
        if (auth()->id() !== $quote->order->client_id) {
            abort(403);
        }

        if ($quote->status !== 'sent') {
            return redirect()
                ->route('customer.orders.show', $quote->order_id)
                ->with('error', 'Ce devis ne peut plus être rejeté.');
        }

        $quote->update([
            'status' => 'rejected',
            'rejected_at' => now(),
        ]);

        $quote->order->update([
            'status' => OrderStatus::CANCELLED,
            'cancelled_at' => now(),
        ]);

        return redirect()
            ->route('customer.orders.show', $quote->order_id)
            ->with('info', 'Devis rejeté. La commande a été annulée.');
    }

    public function edit(Quote $quote): View
    {
        $this->authorizeAdmin();

        $quote->load(['order.client']);

        return view('quotes.edit', compact('quote'));
    }

    public function update(Request $request, Quote $quote): RedirectResponse
    {
        $this->authorizeAdmin();

        $validated = $request->validate([
            'subtotal' => ['required', 'numeric', 'min:0'],
            'discount_amount' => ['nullable', 'numeric', 'min:0'],
            'tax_amount' => ['nullable', 'numeric', 'min:0'],
            'total_amount' => ['required', 'numeric', 'min:0'],
            'notes' => ['nullable', 'string'],
            'pricing_notes' => ['nullable', 'string'],
        ]);

        $quote->update([
            'subtotal' => $validated['subtotal'],
            'discount_amount' => $validated['discount_amount'] ?? 0,
            'tax_amount' => $validated['tax_amount'] ?? 0,
            'total_amount' => $validated['total_amount'],
            'notes' => $validated['notes'] ?? null,
            'pricing_notes' => $validated['pricing_notes'] ?? null,
        ]);

        return redirect()
            ->route('quotes.show', $quote)
            ->with('success', 'Devis mis à jour avec succès.');
    }

    public function destroy(Quote $quote): RedirectResponse
    {
        $this->authorizeAdmin();

        if ($quote->status !== 'draft') {
            return redirect()->back()->with('error', 'Seuls les devis brouillon peuvent être supprimés.');
        }

        $order = $quote->order;
        $quote->delete();

        if ($order && $order->status === OrderStatus::PENDING_QUOTE) {
            // order stays pending_quote
        }

        return redirect()
            ->route('quotes.index')
            ->with('success', 'Devis supprimé avec succès.');
    }

    public function pdf(Quote $quote): View
    {
        $this->authorizeQuoteAccess($quote);

        $quote->load(['order.items.product', 'order.client', 'creator']);

        return view('quotes.show', ['quote' => $quote, 'layout' => 'layouts.dashboard']);
    }

    private function authorizeAdmin(): void
    {
        if (auth()->user()?->user_type === 'client') {
            abort(403);
        }
    }

    private function authorizeQuoteAccess(Quote $quote): void
    {
        $user = auth()->user();

        if (! $user) {
            abort(403);
        }

        if ($user->user_type === 'client' && $quote->order->client_id !== $user->id) {
            abort(403);
        }
    }
}
