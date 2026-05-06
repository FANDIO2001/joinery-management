<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string',
            'position' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        // Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function show($id)
    {
        return view('employees.show');
    }

    public function edit($id)
    {
        return view('employees.edit');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string',
            'position' => 'nullable|string',
            'department' => 'nullable|string',
        ]);

        // Employee::findOrFail($id)->update($validated);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        // Employee::findOrFail($id)->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }
}
