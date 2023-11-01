<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MarzakanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SardaniakanController;
use App\Http\Controllers\sardanikarController;
use App\Http\Controllers\UserController;
use App\Livewire\Reports\Report;
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

Route::middleware(['auth', 'isActive'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('hasRole:superadmin')->group(function () {
        Route::controller(MarzakanController::class)->prefix('/marzakan')->group(function () {
            Route::get('/', 'index')->name('marzakan');
            Route::post('/add', 'addNewMarzakan')->name('addNewMarzakan');
            Route::get('/{id}/edit', 'editMarzakan')->name('editMarzakan')->whereNumber('id');
            Route::post('/{id}', 'saveMarzakan')->name('saveMarzakan');
        });
        Route::controller(UserController::class)->prefix('/users')->group(function () {
            Route::get('/', 'index')->name('users');
            Route::post('/add', 'userAdd')->name('userAdd');
            Route::prefix('/{id}')->group(function () {
                Route::get('/editUser', 'editUser')->name('editUser');
                Route::post('/saveUser', 'saveUser')->name('saveUser');
                Route::get('/editPassword', 'editPassword')->name('editPassword1');
                Route::post('/savePassword', 'savePassword')->name('savePassword');
                Route::patch('/changeStatus', 'changeStatus')->name('changeStatus');
            });
        });
    });


    Route::controller(ProfileController::class)->prefix('/profile')->group(function () {
        Route::get('/', 'index')->name('profile');
        Route::post('/{id}/editProfile', 'editProfile')->name('editProfile');
        Route::post('/{id}/profileEditPassword', 'editPassword')->name('editPassword');
    });

    Route::middleware('hasRole:karmand')->group(function () {


        Route::controller(SardaniakanController::class)->prefix('/sardaniakan')->group(function () {
            Route::get('/', 'index')->name('sardaniakan');
            Route::post('/add', 'addSardanikaran')->name('add-sardanikaran');
            Route::get('/showSardaniakan', 'showSardaniakan')->name('show-sardaniakan');
            Route::get('/{sardani}/edit', 'editSardani')->name('edit-sardani')->whereNumber('sardani');
            Route::patch('/{sardani}/update', 'updateSardani')->name('update-sardani')->whereNumber('sardani');
        });
    });

    Route::controller(sardanikarController::class)->prefix('/sardanikar')->group(function () {
        Route::get('/', 'index')->name('sardanikar');
        Route::post('/add', 'addSardanikar')->name('add-sardanikar');
        Route::get('/{id}/edit', 'editSardanikar')->name('edit-sardanikar')->whereNumber('id');
        Route::patch('/{id}/update', 'updateSardanikar')->name('update-sardanikar')->whereNumber('id');
        Route::get('/show', 'showSardanikaran')->name('show-sardanikaran');
    });


    Route::middleware('hasRole:superadmin,sarparshtyar')->prefix('/reports')->group(function () {
        Route::get('/', Report::class)->name('reports');
    });
    // Route::middleware('hasRole:superadmin,sarparshtyar')->controller(ReportController::class)->prefix('/reports')->group(function () {
    //     Route::get('/', 'index')->name('reports');
    // });

    Route::controller(PrintController::class)->prefix('/print')->group(function () {
        Route::get('/invoice/{sardani}', 'invoice')->whereNumber('sardani');
    });
});
