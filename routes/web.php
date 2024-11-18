<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConferenceController;
use App\Http\Middleware\RoleMiddleware;



Route::group(['middleware' => RoleMiddleware::class.':klientas'], function () {
Route::get('/conferences', [ConferenceController::class, 'show'])->name('conferences.index');
Route::get('/conferences/{id}', [ConferenceController::class, 'show'])->name('conferences.show');
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::get('/client/{id}', [ClientController::class, 'show'])->name('client.show');
Route::post('/conferences/{conferenceId}/register', [ClientController::class, 'registerForConference'])->name('conferences.register');
});
Route::group(['middleware' => RoleMiddleware::class.':darbuotojas'], function () {
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/conferences/{id}', [EmployeeController::class, 'show'])->name('employee.conferences.show');
});
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => RoleMiddleware::class.':administratorius'], function () {
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/users', [AdminController::class, 'indexUsers'])->name('admin.users.index');
Route::get('/admin/users/edit/{id}', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::post('/admin/users/update/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');

Route::get('/admin/conferences/create', [AdminController::class, 'createConference'])->name('admin.conferences.create');
Route::get('/conferences/create', [ConferenceController::class, 'create'])->name('conferences.create');
Route::post('/conferences', [ConferenceController::class, 'store'])->name('conferences.store');



Route::get('/admin/conferences', [AdminController::class, 'indexConferences'])->name('admin.conferences.index');
Route::get('/admin/conferences/create', [AdminController::class, 'createConference'])->name('admin.conferences.create');
Route::post('/admin/conferences/store', [AdminController::class, 'storeConference'])->name('admin.conferences.store');
Route::get('/admin/conferences/edit/{id}', [AdminController::class, 'editConference'])->name('admin.conferences.edit');
Route::put('/admin/conferences/update/{id}', [AdminController::class, 'updateConference'])->name('admin.conferences.update');
Route::delete('/admin/conferences/delete/{id}', [AdminController::class, 'deleteConference'])->name('admin.conferences.delete');
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

