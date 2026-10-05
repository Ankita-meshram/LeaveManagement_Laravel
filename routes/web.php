<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Employee Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'employee'])->group(function () {

    Route::get('/employee/dashboard', [LeaveController::class, 'dashboard'])
        ->name('employee.dashboard');

    Route::get('/employee/apply-leave', [LeaveController::class, 'create'])
        ->name('employee.apply-leave');

    Route::post('/employee/apply-leave', [LeaveController::class, 'store'])
        ->name('employee.apply-leave.store');

    Route::get('/employee/leaves', [LeaveController::class, 'index'])
        ->name('employee.leaves');

    Route::delete('/employee/leaves/{leave}', [LeaveController::class, 'cancel'])
        ->name('employee.leave.cancel');

});


/*
|--------------------------------------------------------------------------
| Manager Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'manager'])->group(function () {

    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])
        ->name('manager.dashboard');

    Route::post('/manager/leaves/{leave}/status', [ManagerController::class, 'updateLeaveStatus'])
        ->name('manager.leave.status');

    Route::get('/manager/employees', [ManagerController::class, 'employees'])
        ->name('manager.employees');

    Route::get('/manager/employees/{user}', [ManagerController::class, 'employeeDetails'])
        ->name('manager.employee.details');

    Route::get('/manager/leave-types', [ManagerController::class, 'leaveTypes'])
        ->name('manager.leave-types');

    Route::post('/manager/leave-types', [ManagerController::class, 'storeLeaveType'])
        ->name('manager.leave-types.store');

    Route::put('/manager/leave-types/{leaveType}', [ManagerController::class, 'updateLeaveType'])
        ->name('manager.leave-types.update');

    Route::delete('/manager/leave-types/{leaveType}', [ManagerController::class, 'deleteLeaveType'])
        ->name('manager.leave-types.delete');

});


/*
|--------------------------------------------------------------------------
| Profile Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


require __DIR__.'/auth.php';
