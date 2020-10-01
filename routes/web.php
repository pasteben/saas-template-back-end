<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use \App\Http\Controllers\SignUpController;

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

/** @see LoginController::login() */
Route::post('/login', [LoginController::class, 'login']);

/** @see LogoutController::logout() */
Route::post('/logout', [LogoutController::class, 'logout']);

/** @see SignUpController::store() */
Route::post('/sign-up', [SignUpController::class, 'store']);

Route::get('/products', function () {
    return \App\Models\Product::with('plans')->get();
});