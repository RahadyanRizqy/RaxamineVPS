<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VPSController;
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
    return view('homepage');
});

// Route::resource('accounts', AccountController::class);

// SESSION
Route::resource('account', AccountController::class);
Route::get('/login', [AccountController::class, 'index'])->name('account.index');
Route::get('/register', [AccountController::class, 'create'])->name('account.create');
Route::post('account/{mode}',[AccountController::class, 'store'])->name('account.store');


// DASHBOARD ROUTES
Route::get('dashboard', [DashboardController::class, 'main'])->name('section.main');
Route::get('/profile', [AccountController::class, 'show'])->name('user.profile');
Route::get('/logout', [AccountController::class, 'logout'])->name('user.logout');
Route::get('dashboard/service', [ServiceController::class, 'index'])->name('section.service');
Route::get('service/order', [ServiceController::class, 'order'])->name('service.order');
Route::get('dashboard/account', [AccountController::class, 'show'])->name('section.account');
Route::get('dashboard/activity', [DashboardController::class, 'activity'])->name('section.activity');
Route::get('dashboard/transaction', [DashboardController::class, 'transaction'])->name('section.transaction');

Route::get('dashboard/vps/{id}', [VPSController::class, 'terminal'])->name('vps.terminal');

Route::resource('vps', VPSController::class);
Route::resource('service', ServiceController::class);

// AJAX USAGE
Route::get('service/update/{id}',[ServiceController::class,'update']);

// Route::get('/service', [ServiceController::class, 'index'])->name('section.service');
Route::get('/payment', [TransactionController::class, 'doTransact']);

// JSON RESPONSE
// Route::get('fetch/get-os', [VPSController::class, 'getOSNames']);
Route::post('fetch/get-versions', [VPSController::class, 'getVersions']);
// Route::get('fetch/get-cores-2', [VPSController::class, 'getCores2']);
Route::post('fetch/get-cores', [VPSController::class, 'getCores']);
// Route::get('fetch/get-storage', [VPSController::class, 'getStorages']);
// Route::get('fetch/get-jsoned', [VPSController::class, 'getJSONed']);

// Route::get('/sat', function() { return view('sat'); })->name('sat');