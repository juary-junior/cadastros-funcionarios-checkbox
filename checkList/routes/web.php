<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [EmployeeController::class, 'index'])->name('employee-index');

Route::get('/search', [EmployeeController::class, 'search']);

Route::get('/employee', [EmployeeController::class, 'create'])->name('employee-create');

Route::post('/store', [EmployeeController::class, 'store'])->name('employee-store');

Route::get('/employee/{id}/edit', [EmployeeController::class, 'edit'])->name('employee-edit');

Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employee-update');

Route::delete('/employee/{id}', [EmployeeController::class, 'destroy'])->name('employee-destroy');

Route::delete('/selected-employee', [EmployeeController::class, 'deleteAll'])->name('employee-delete');
