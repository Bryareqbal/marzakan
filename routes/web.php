<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
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



// Route::redirect('/', 'login');
Route::middleware(['guest'])->prefix('/login')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/marzakan', function () {
    })->name('marzakan');

    Route::get('/sarparshtyar', function () {
    })->name('sarparshtyar');

    Route::get('/karmand', function () {
    })->name('karmand');

    Route::get('/sardanikar', function () {
    })->name('sardanikar');
});
