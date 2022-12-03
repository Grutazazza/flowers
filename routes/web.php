<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\TovarController;
use App\Http\Controllers\UserController;
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
    $tovars = \App\Models\Tovar::all()->sortByDesc('created_at')->take(4);
    return view('main',compact('tovars'));
})->name('main');

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('login',[UserController::class,'loginPost'])->name('loginPost');

Route::get('register',[UserController::class,'register'])->name('register');
Route::post('register',[UserController::class,'registerPost'])->name('registerPost');

Route::get('logout',[UserController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function (){
    Route::middleware('role')->group(function () {
        Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
            Route::resource('/tovar', TovarController::class);
            Route::get('/allOrders',[MainController::class,'orders'])->name('orders');
        });
    });
    Route::get('/menu',[MainController::class,'index'])->name('menu');
    Route::get('/show/{tovar}',[MainController::class,'show'])->name('show');
    Route::get('/add/{tovar}',[MainController::class,'toBasket'])->name('add');
    Route::get('/newBasket',[MainController::class,'newBasket'])->name('newBasket');
    Route::post('/newBasket',[MainController::class,'createOrder']);
    Route::get('/basket',[MainController::class,'basket'])->name('basket');
    Route::get('/deny/{basket}',[MainController::class,'deny'])->name('deny');
});
