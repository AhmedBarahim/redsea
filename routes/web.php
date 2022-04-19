<?php

use App\Http\Controllers\PrizeController;
use App\Http\Controllers\PrizeTypeController;
use App\Http\Controllers\WinConrtoller;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('dashboard.layout');
    });
    Route::resource('prize-types', PrizeTypeController::class);
    Route::resource('prizes', PrizeController::class)->except([
        'show', 'edit', 'update', 'destroy'
    ]);
});



Route::get('win', [WinConrtoller::class, 'index']);


