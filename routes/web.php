<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KarmandController;
use App\Http\Controllers\MarzakanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\sardanikarController;
use App\Http\Controllers\SarparshtyarController;
use App\Http\Controllers\UserController;
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



Route::redirect('/', 'dashboard');
Route::middleware(['guest'])->prefix('/login')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'login')->name('login');
    });
});

Route::middleware(['auth','isActive'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('hasRole:superadmin')->controller(MarzakanController::class)->prefix('/marzakan')->group(function () {
        Route::get('/', 'index')->name('marzakan');
        Route::post('/add', 'addNewMarzakan')->name('addNewMarzakan');
        Route::get('/{id}/edit', 'editMarzakan')->name('editMarzakan')->whereNumber('id');
        Route::post('/{id}', 'saveMarzakan')->name('saveMarzakan');
    });

    Route::middleware('hasRole:superadmin')->controller(SarparshtyarController::class)->prefix('/sarparshtyarakan')->group(function () {
        Route::get('/', 'index')->name('sarparshtyarakan');
        Route::post('/add', 'addSarparshtyar')->name('add-sarparshtyar');
        Route::get('{id}/edit', 'editSarparshtyar')->name('edit-sarparshtyar');
        Route::patch('{id}/update', 'updateSarparshtyar')->name('update-sarparshtyar');
    });


    Route::middleware('hasRole:superadmin,admin')->controller(KarmandController::class)->prefix('/karmand')->group(function () {
        Route::get('/', 'index')->name('karmandakan');
        Route::post('/add', 'addNewKarmand')->name('addNewKarmand');
        Route::get('/{id}/edit', 'editKarmand')->name('editKarmand')->whereNumber('id');
        Route::post('/{id}', 'saveKarmand')->name('saveKarmand');
    });
    Route::controller(UserController::class)->prefix('/users')->group(function () {
        Route::get('/', 'index')->name('users');
        Route::post('/add', 'userAdd')->name('userAdd');
        Route::get('/{id}/editUser', 'editUser')->name('editUser');
        Route::post('/{id}/saveUser', 'saveUser')->name('saveUser');
        Route::get('/{id}/editPassword', 'editPassword')->name('editPassword1');
        Route::post('/{id}/savePassword', 'savePassword')->name('savePassword');
    });
    Route::controller(ProfileController::class)->prefix('/profile')->group(function () {
        Route::get('/', 'index')->name('profile');
        Route::post('/{id}/editProfile', 'editProfile')->name('editProfile');
        Route::post('/{id}/profileEditPassword', 'editPassword')->name('editPassword');

    });

    Route::controller(sardanikarController::class)->prefix('/sardanikar')->group(function () {
        Route::get('/', 'index')->name('sardanikar');
        Route::post('/add', 'addSardanikar')->name('add-sardanikar');
    });

    Route::controller(PrintController::class)->prefix('/print')->group(function () {
        Route::get('/invoice/{sardanikar}', 'invoice')->whereNumber('sardanikar');
    });
});
