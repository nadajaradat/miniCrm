<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $companies = Company::paginate(10);
    return view('welcome', compact('companies'));
})->name('welcome');

Route::get('/dashboard', function () {
    $user = auth()->user();
    
    if ($user->admin) {
        $companies = Company::paginate(10);
        return view('admin.dashboard', compact('companies'));
    } elseif ($user->employee) {

        $currentCompany = $user->employee->company;

        // Retrieve other employees in the same company (excluding the current user)
        $employees = $currentCompany->employees()->where('id', '!=', $user->employee->id)->paginate(10);

        return view('employee.dashboard', compact('employees'));
    }

})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('company', CompanyController::class)->except([
    'index',
])->middleware(['auth', 'admin']);


Route::resource('employee', EmployeeController::class)->except([
    'index',
])->middleware(['auth', 'employee']);

require __DIR__.'/auth.php';
