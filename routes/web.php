<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('loginpage');
Route:: get('/register', [AuthController::class, 'register'])->name('registerpage');
Route:: post('/register', [AuthController::class, 'registerPost'])->name('register');
Route:: post('/login', [AuthController::class, 'loginPost'])->name('login');
Route:: get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

Route::post('create', [UrlController::class,'create'])->where('url','.*')->name('create')->middleware('auth');
Route::get('{shortener_url}', [UrlController::class, 'link'])->where('shortener_url','.*')->name('shortener-url');
