<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/{id}', [EmployeeController::class, 'show'])->name('employee.show');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/', function () {
    return view('welcome');

});


