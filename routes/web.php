<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalerryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomepageController;

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

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/money', function () {
    return view('pages.admin.money');
});

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');

Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');

    Route::resource('products',ProductController::class);

    // Route::get('/user/profile', function () {
    //     // Uses first & second middleware...
    // });
});

Route::resource('galleries',GalerryController::class);
Auth::routes(['verify'=>true]);