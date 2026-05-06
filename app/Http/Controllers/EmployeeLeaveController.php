<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function index($employeeId)
    {
        return view('employees.leaves.index');
    }

    public function create($employeeId)
    {
        return view('employees.leaves.create');
    }

    public function store(Request $request, $employeeId)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'nullable|string',
        ]);

        // EmployeeLeave::create([
        //     'employee_id' => $employeeId,
        //     ...$validated
        // ]);

        return redirect()->route('employees.leaves.index', $employeeId)->with('success', 'Leave request created successfully');
    }

    public function edit($employeeId, $id)
    {
        return view('employees.leaves.edit');
    }

    public function update(Request $request, $employeeId, $id)
    {
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'reason' => 'nullable|string',
        ]);

        // EmployeeLeave::findOrFail($id)->update($validated);

        return redirect()->route('employees.leaves.index', $employeeId)->with('success', 'Leave request updated successfully');
    }

    public function destroy($employeeId, $id)
    {
        // EmployeeLeave::findOrFail($id)->delete();

        return redirect()->route('employees.leaves.index', $employeeId)->with('success', 'Leave request deleted successfully');
    }
}
