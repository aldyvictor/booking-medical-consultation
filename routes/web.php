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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

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
});
