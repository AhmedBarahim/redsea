<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\PrizeTypeController;
use App\Http\Controllers\RegisterationController;
use App\Http\Controllers\WinConrtoller;
use App\Http\Controllers\WinnerController;
use App\Models\User;
use App\Notifications\NewWinnerNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
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
Route::group(['middleware' => 'auth', 'prefix' => 'admin'],function () {
    Route::get('/' , [DashboardController::class, 'index'])->name('admin');
    Route::resource('prize-types', PrizeTypeController::class);
    Route::get('prizes/delete', [PrizeController::class, 'delete'])->name('prizes.delete');
    Route::delete('prizes/delete', [PrizeController::class, 'deletePrizes'])->name('prizes.deletePrizes');
    Route::resource('prizes', PrizeController::class)->except([
        'show', 'update'
    ]);
    Route::resource('customers', CustomerController::class)->only([
        'index', 'show'
    ]);
    Route::get('new-winners', [WinnerController::class, 'newWinners'])->name('new-winners');
    Route::resource('winners', WinnerController::class)->only([
        'index', 'show' ,'update'
    ]);
});

Route::get('win', [WinConrtoller::class, 'index'])->name('win')->middleware('customer');
Route::get('test', function () {
    event(new App\Events\NewWinner('Someone'));
    Notification::send(User::all(), new NewWinnerNotification());


    return "Event has been sent!";
});


Route::controller(RegisterationController::class)->group(function () {
    Route::get('registeration', 'index')->name('registeration');
    Route::post('registeration' ,'register');
    Route::post('sign-in' ,'login');

    // Route::post('/orders', 'store');
});



Auth::routes([
    // 'login' => false,
    'reset' => false,
    // 'register' => false,
    'confirm' => false

]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
