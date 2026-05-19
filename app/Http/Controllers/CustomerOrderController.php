<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerOrderController extends Controller
{
    public function index(Request $request): View
    {
        $query = Order::query()
            ->with(['items.product', 'address', 'client'])
            ->where('client_id', auth()->id())
            ->latest();

        if ($request->filled('search')) {
            $search = $request->string('search')->trim();
            $query->where('reference', 'like', "%{$search}%");
        }

        if ($request->filled('status')) {
            $query->where('status', $request->string('status'));
        }

        $orders = $query->paginate(10)->withQueryString();

        return view('customer.orders.index', compact('orders'));
    }

    public function show($id): View
    {
        $order = Order::with(['items.product', 'address'])
            ->where('client_id', auth()->id())
            ->findOrFail($id);

        return view('customer.orders.show', compact('order'));
    }
}
