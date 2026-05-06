<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionTaskController extends Controller
{
    public function index($productionId)
    {
        return view('production.tasks.index');
    }

    public function edit($productionId, $id)
    {
        return view('production.tasks.edit');
    }

    public function update(Request $request, $productionId, $id)
    {
        $validated = $request->validate([
            'description' => 'required|string',
            'assigned_to' => 'required|exists:employees,id',
            'status' => 'required|in:pending,in_progress,completed,blocked',
            'priority' => 'required|in:low,medium,high',
        ]);

        // ProductionTask::findOrFail($id)->update($validated);

        return redirect()->route('production.tasks.index', $productionId)->with('success', 'Task updated successfully');
    }
}
