<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
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

// Route::get('/', function () {
//     return view('app');
// })
// ->name('application');

// Route::get('{any}', function () {
//     return view('app');
// })->where('any', '.*');

Route::controller(LoginController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->get('/dashboard/{any}', function ($any) {
    // Handle the logic for the /dashboard/any route here
    // You can access the wildcard parameter $any here
    
    return view('app');
})->where('any', '.*');