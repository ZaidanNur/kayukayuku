<?php

use App\Models\ChangeLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\ChangeLogController;
use App\Http\Controllers\OrderAdminController;

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
Route::get('/barang',[ProductController::class,'barang'])->name('barang');
Route::get('/payment/{order}',[PaymentController::class,'show_payment_confirmation'])->name('payment_confirmation');
Route::post('/orders/cancel',[OrderController::class,'cancel_order'])->name('orders.cancel');
// Route::get('/edit-profile/{id}', [UserController::class, 'edit'])->name('edit-profile');



// Route::get('/money', function () {
//     return view('pages.admin.money');
// });

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/admin', function () {
    return view('layouts.admin');
})->name('admin');

Route::middleware('role:admin')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::put('/change-stock-batch/{id}',[ProductController::class,'change_stock_batch'])->name('change-stock.batch');
    Route::get('/order-admin/order', [OrderAdminController::class, 'order'])->name('order-admin.order');
    Route::get('/order-admin/order-detail/{order}', [OrderAdminController::class, 'order_detail'])->name('order-admin.order-detail');
    Route::get('/order-admin/canceled-order', [OrderAdminController::class, 'canceled_order'])->name('order-admin.canceled-order');
    Route::get('/order-admin/payment-confirmation/{id}', [OrderAdminController::class, 'payment_confirmation_index'])->name('order-admin.payment-confirmation');
    Route::get('/order-admin/payment-confirmation/accept/{id}', [OrderAdminController::class, 'payment_confirmation_accept'])->name('order-admin.payment-confirmation-accept');
    Route::get('/order-admin/payment-confirmation/rejected/{id}', [OrderAdminController::class, 'payment_confirmation_rejected'])->name('order-admin.payment-confirmation-rejected');
    Route::post('/order-admin/change-status', [OrderAdminController::class, 'order_status_change'])->name('order-admin.order-status-change');
    Route::post('/order-admin/edit/{id}', [OrderAdminController::class, 'order_edit'])->name('order-admin.order-edit');
    Route::get('/keuangan/pengeluaran', [KeuanganController::class, 'pengeluaran_index'])->name('keuangan.pengeluaran');
    Route::get('/keuangan/pengeluaran/month', [KeuanganController::class, 'pengeluaran_this_mount_index'])->name('keuangan.pengeluaran.thisMonth');
    Route::get('/keuangan/pengeluaran/today', [KeuanganController::class, 'pengeluaran_today_index'])->name('keuangan.pengeluaran.today');
    Route::get('/keuangan/pemasukan', [KeuanganController::class, 'pemasukan_index'])->name('keuangan.pemasukan');
    Route::get('/keuangan/pemasukan/month', [KeuanganController::class, 'pemasukan_this_month_index'])->name('keuangan.pemasukan.thisMonth');
    Route::get('/keuangan/pemasukan/today', [KeuanganController::class, 'pemasukan_today_index'])->name('keuangan.pemasukan.today');
    
    Route::resource('products',ProductController::class);
    Route::resource('galleries',GalleryController::class);
    Route::resource('changes_logs',ChangeLogController::class);
    Route::resource('order-admin',OrderAdminController::class);
    Route::resource('keuangan',KeuanganController::class);

    // Route::get('/user/profile', function () {
    //     // Uses first & second middleware...
    // });
});


Route::resource('users',UserController::class);
Route::resource('carts',CartController::class);
Route::resource('orders',OrderController::class);
Route::resource('payment',PaymentController::class);
Auth::routes(['verify'=>true]);