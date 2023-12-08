<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Employee;
use App\Models\User;
use Faker\Factory as Faker;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompanyRequest $request)
    {
            $logoPath = $request->file('logo')->store('logos', 'public');

            // Create a new company with the validated data
            $company = Company::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'logo' => $logoPath,
                'website_link' => $request->input('website_link'),
            ]);

            // Create a new employee with random data
            $faker = Faker::create();

            $user = new User([
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
            ]);
            
            // Saving the user
            $user->save();

            
            $employee = new Employee([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'phone' => $faker->phoneNumber,
            ]);

            $employee->user()->associate($user);
            // Associate the employee with the company
            $company->employees()->save($employee);



           // Redirect to the company details page or any other appropriate route
            return redirect()->route('company.show', compact('company'));

       
    }



    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $company->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website_link' => $request->input('website_link'),
        ]);

        // Handle logo upload if a new file is provided
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $company->update(['logo' => $logoPath]);
        }

        // Redirect back to the edit page with the updated data and a success message
        return redirect()->route('dashboard')
        ->with('status', 'Company updated successfully!')->withInput();
    
    }

    public function destroy(Company $company)
    {
        try {
            // Delete associated employees and their users
            $company->employees()->each(function ($employee) {
                $employee->delete(); // This will delete the associated user as well
            });

            // Delete the company
            $company->delete();

            return redirect()->route('dashboard')->with('success', 'Company deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the company.');
        }
    }



}
