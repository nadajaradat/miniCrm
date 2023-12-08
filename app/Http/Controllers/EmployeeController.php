<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('employee.dashboard');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.StoreEmployeeRequest
     */
    public function store(StoreEmployeeRequest $request)
    {
        

        // Create a new User
        $user = new User([
            'email' => $request->email,
            'password' => bcrypt('password'),
        ]);

        // Saving the user
        $user->save();

        // Get the currently authenticated user (assuming you're using authentication)
        $currentUser = Auth::user();

        // Create a new Employee and associate it with the new User and the current user's company
        $employee = new Employee([
            'user_id' => $user->id,
            'company_id' => $currentUser->employee->company_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,


        ]);

        $employee->save();

        return redirect()->route('employee.show', compact('employee'))->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreEmployeeRequest $request, Employee $employee)
    {
        $employee->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            // Add other fields as needed
        ]);

        // Update the associated user's email
        $user = $employee->user;
        if ($user) {
            $user->update([
                'email' => $request->input('email'),
                // Add other user fields as needed
            ]);
        }

        return redirect()->route('employee.show', compact('employee'))->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->exists() && $employee->user()->exists()) {
            // Delete both employee and associated user
            $employee->user->delete();
            $employee->delete();

            return redirect()->route('employee.dashboard')->with('success', 'Employee and associated user deleted successfully.');
        } else {
            // Handle the case where either the employee or user doesn't exist
            return redirect()->route('employee.dashboard')->with('error', 'Employee not found or user associated with the employee does not exist.');
        }
    }
}
