<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ProduseController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\CategorieController as UserCategorieController;
use App\Http\Controllers\ProduseController as UserProduseController;
use App\Http\Controllers\DashboardController;

use App\Models\categorii;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {

    $categorii = categorii::all();

    return view('dashboard', compact('categorii'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::resource(
  //  'admin/categorii',
  //  CategorieController::class
//);
Route::get(
    '/admin/categorii',
    [CategorieController::class, 'index']
)->name('categorii.index');

Route::get(
    '/admin/categorii/create',
    [CategorieController::class, 'create']
)->name('categorii.create');

Route::post(
    '/admin/categorii',
    [CategorieController::class, 'store']
)->name('categorii.store');

Route::get(
    '/admin/categorii/edit',
    [CategorieController::class, 'edit']
)->name('categorii.edit');

Route::delete(
    '/admin/categorii/{id}',
    [CategorieController::class, 'destroy']
)->name('categorii.destroy');

Route::resource(
    'admin/produse',
    ProduseController::class
);
//Route::resource(
  //  'admin/order',
   // OrderController::class
//);
// 
Route::get('/admin/order', [OrderController::class, 'index'])
    ->name('admin.order.index');

Route::put('/admin/order/{order}', [OrderController::class, 'update'])
    ->name('admin.order.update');

Route::delete('/admin/order/{order}', [OrderController::class, 'destroy'])
    ->name('admin.order.destroy');
Route::get(
    '/order',
    [UserOrderController::class, 'index']
)->name('user.orders');


Route::get(
    '/categorie/{categorie}',
    [UserCategorieController::class, 'show']
)->name('categorie.show');

Route::get(
    '/produse/{$id}/detalii' , [UserProduseController::class, 'show']
)->name('public.produse.show');

Route::get('/produse/{id}/detalii', [UserProduseController::class, 'show'])
    ->name('public.produse.show');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

    Route::post(
    '/produs/{id}/buy',
    [UserOrderController::class, 'store']
)->middleware('auth')
 ->name('order.store');
 

Route::get('/my-order',[OrderController::class, 'index'])->middleware('auth');

Route::view('/terms' , 'terms')->name('terms');
Route::view('/contact' , 'contact')->name('contact');
Route::view('/privacy' , 'privacy')->name('privacy');