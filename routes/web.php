<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KarmandController;
use App\Http\Controllers\MarzakanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ReportController;
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

Route::middleware(['auth', 'isActive'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::middleware('hasRole:superadmin')->controller(MarzakanController::class)->prefix('/marzakan')->group(function () {
        Route::get('/', 'index')->name('marzakan');
        Route::post('/add', 'addNewMarzakan')->name('addNewMarzakan');
        Route::get('/{id}/edit', 'editMarzakan')->name('editMarzakan')->whereNumber('id');
        Route::post('/{id}', 'saveMarzakan')->name('saveMarzakan');
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
        Route::get('/{id}/edit', 'editSardanikar')->name('edit-sardanikar')->whereNumber('id');
        Route::patch('/{id}/update', 'updateSardanikar')->name('update-sardanikar')->whereNumber('id');
        Route::get('/showSardanikar', 'showSardanikar')->name('show-sardanikar');
    });
    Route::controller(ReportController::class)->prefix('/reports')->group(function () {
        Route::get('/', 'index')->name('reports');
    });



    Route::controller(PrintController::class)->prefix('/print')->group(function () {
        Route::get('/invoice/{sardanikar}', 'invoice')->whereNumber('sardanikar');
    });
});


Route::get('/test', function () {
    $slaw = file_get_contents('../public/slaw.txt');

    $lines = explode("\r", $slaw);

    // Regular expressions to extract the necessary fields
    $namePattern = '/^P<([^<]+)<<([^<]+)<([^<]+)<([^<]+)<</';
    $passportNumberPattern = '/^A([0-9]{9})[A-Z0-9]{3}[0-9]{1}([0-9]{1})/';

    $result = array();

    foreach ($lines as $line) {
        if (preg_match($namePattern, $line, $nameMatches)) {
            $result['lastName'] = $nameMatches[1];
            $result['firstName'] = $nameMatches[2];
            $result['middleName'] = $nameMatches[3];
            $result['suffix'] = $nameMatches[4];
        }
        if (preg_match($passportNumberPattern, $line, $passportNumberMatches)) {
            $result['passportNumber'] = $passportNumberMatches[1];
            $result['birthDate'] = substr($passportNumberMatches[1], 1, 6); // Extract birthdate from passport number
            $result['gender'] = intval($passportNumberMatches[2]) % 2 === 0 ? 'Female' : 'Male';
        }
    }

    return $result;
});
