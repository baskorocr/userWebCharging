<?php

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
Auth::routes();

Route::get('/', function () {
    if (request()->attributes->get('is_mobile')) {
        return redirect()->route('login');
    } else {
        return redirect()->route('index');
    }
});

Route::get('/index', [\App\Http\Controllers\index::class, 'index'])->name('index');