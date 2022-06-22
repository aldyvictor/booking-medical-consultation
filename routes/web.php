<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomePageController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('profile/edit', [App\Http\Controllers\CustomerController::class, 'edit'])->name('profile.edit');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Form Login Admin
Route::get('/login-admin', [App\Http\Controllers\Auth\LoginController::class, 'showLoginFormAdmin'])->name('login-admin');


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard-admin');
    // Doctor Category
    Route::resource('/doctor-category', App\Http\Controllers\Admin\DoctorCategoryController::class);
    Route::post('/doctor-category/delete', [App\Http\Controllers\Admin\DoctorCategoryController::class, 'delete'])->name('doctor-category.delete');
    // Doctor
    Route::resource('/doctor', App\Http\Controllers\Admin\DoctorController::class);
    Route::post('/doctor/delete', [App\Http\Controllers\Admin\DoctorController::class, 'delete'])->name('doctor.delete');
    // Schedule Doctor
    Route::resource('/schedule-doctor', App\Http\Controllers\Admin\ScheduleDoctorController::class);
    Route::post('/schedule-doctor/delete', [App\Http\Controllers\Admin\ScheduleDoctorController::class, 'delete'])->name('schedule-doctor.delete');
    // Customer
    Route::get('/customer', [App\Http\Controllers\Admin\CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [App\Http\Controllers\Admin\CustomerController::class, 'create'])->name('customer.create');
    // User
    Route::get('/user/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('user.update');
});
