<?php

use App\Http\Controllers\ChangeLogController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Models\ChangeLog;

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
Route::get('/company-profile', [CompanyController::class, 'index'])->name('company');
Route::get('/user-profile/{id}', [ProfileController::class, 'index'])->name('profile');
Route::get('/product-details/{id}',[ProductController::class,'details'])->name('product-details');
// Route::get('/edit-profile/{id}', [UserController::class, 'edit'])->name('edit-profile');



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
    Route::resource('galleries',GalleryController::class);
    Route::resource('changes_logs',ChangeLogController::class);

    // Route::get('/user/profile', function () {
    //     // Uses first & second middleware...
    // });
});


Route::resource('users',UserController::class);
Auth::routes(['verify'=>true]);