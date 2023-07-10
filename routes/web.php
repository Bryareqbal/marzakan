<?php

use App\Http\Controllers\AuthController;
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



Route::redirect('/', 'login');
Route::middleware(['guest'])->prefix('/login')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
    });
});
