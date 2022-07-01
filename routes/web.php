<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarungController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;

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
Route::get('admin', [AdminController::class, 'admin'])->name('admin');

Route::get('auth/login', [LoginController::class, 'login'])->name('login');
Route::post('auth/login/proseslogin', [LoginController::class, 'proseslogin'])->name('proseslogin');
Route::post('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('auth/register', [RegisterController::class, 'register'])->name('register');
Route::post('auth/register/store', [RegisterController::class, 'store'])->name('store');

Route::group(['middleware'=> ['userlogin']], function() {
Route::get('/', [WarungController::class, 'index'])->name('index');
});
