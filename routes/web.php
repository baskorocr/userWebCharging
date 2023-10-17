<?php

use App\Http\Middleware\cekRole;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['prefix' => 'user', 'middleware' => 'cekRole:0'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\UserControll\dashboardUser::class, 'index'])->name('user.index');
    Route::get('/history', [\App\Http\Controllers\UserControll\dashboardUser::class, 'history'])->name('user.history');
    Route::post('/history', [\App\Http\Controllers\UserControll\dashboardUser::class, 'postHistory'])->name('user.posthistory');
    Route::get('/map', [\App\Http\Controllers\UserControll\maps::class, 'index'])->name('user.map');
});
Route::group(['prefix' => 'seller', 'middleware' => 'cekRole:1'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\SellerControll\dashboardSeller::class, 'index'])->name('seller.index');


});


Route::get('/', [\App\Http\Controllers\index::class, 'index'])->name('index');
Route::get('/login', [\App\Http\Controllers\login::class, 'login'])->name('login')->middleware('auth');
Route::post('/cek', [\App\Http\Controllers\login::class, 'cek'])->name('cek');
Route::get('/register', [\App\Http\Controllers\login::class, 'login'])->name('register');
Route::get('/register_seller', [\App\Http\Controllers\SellerControll\registerSeller::class, 'index'])->name('registSeller');
Route::post('/register_sellerPost', [\App\Http\Controllers\SellerControll\registerSeller::class, 'register'])->name('registSellerPost');
Route::get('/logout', [\App\Http\Controllers\logout::class, 'logout'])->name('logout');
Route::get('/error', function () {
    return view('error');
})->name('error');