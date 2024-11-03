<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
Route::get('/conferences', function () {
    return view('conferences.index');
})->name('conferences.index');

Route::get('/conferences/{id}', function ($id) {
    return view('conferences.show', compact('id'));
})->name('conferences.show');
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/admin/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');
Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');

Route::get('/admin/conferences', [AdminController::class, 'indexConferences'])->name('admin.conferences.index');
Route::get('/admin/conferences/create', [AdminController::class, 'createConference'])->name('admin.conferences.create');
Route::post('/admin/conferences/store', [AdminController::class, 'storeConference'])->name('admin.conferences.store');
Route::get('/admin/conferences/edit/{id}', [AdminController::class, 'editConference'])->name('admin.conferences.edit');
Route::post('/admin/conferences/update/{id}', [AdminController::class, 'updateConference'])->name('admin.conferences.update');
Route::delete('/admin/conferences/delete/{id}', [AdminController::class, 'deleteConference'])->name('admin.conferences.delete');
Route::get('/', function () {
    return view('welcome');

})->name('welcome');



