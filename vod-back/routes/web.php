<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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
//     return view('welcome');
// });

Route::group(['prefix' => 'admin'], function () {

    Route::group(['middleware' => 'guest:web'], function () {
        Route::get('/login', [AuthController::class, 'LoginForm'])->name('admin.login');
        Route::post('login', [AuthController::class, 'LoginAttempt'])->name('admin.login_attempt');
    });

    Route::group(['middleware' => ['auth:web', 'admin']], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});
