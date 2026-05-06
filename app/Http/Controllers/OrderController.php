<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return view('orders.index');
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function show($id)
    {
        return view('orders.show');
    }

    public function edit($id)
    {
        return view('orders.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,shipped,delivered,cancelled',
            'total_amount' => 'required|numeric|min:0',
        ]);

        // Order::findOrFail($id)->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        // Order::findOrFail($id)->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully');
    }
}
