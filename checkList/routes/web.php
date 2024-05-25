<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[EmployeeController::class, 'index'])->name('employee-index');

Route::get('/create', [EmployeeController::class, 'create'])->name('employee-create');

Route::post('/employee', [EmployeeController::class, 'store'])->name('employee-store');

Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee-edit');

Route::put('/{id}', [EmployeeController::class, 'update'])->where('id', '[0-9]+')->name('employee-update');

Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee-destroy');

Route::delete('/selected-employee',[EmployeeController::class, 'deleteAll'])->name('employee-delete');