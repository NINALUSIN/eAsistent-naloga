<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
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
$controller_path = 'App\Http\Controllers';

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/test-page',$controller_path . '\TestPageController@index')->name('test-page');
Route::get('/shopping-list',$controller_path . '\ShoppingListController@show_index')->name('shopping-list');

//Authentication
//Registration and login forms
Route::get('/register', $controller_path . '\Auth\LoginRegisterController@register')->name('register');
Route::get('/login', $controller_path . '\Auth\LoginRegisterController@login')->name('login');

//Login
Route::post('/authenticate', $controller_path . '\Auth\LoginRegisterController@authenticate')->name('authenticate');

//Logout
Route::match(['get', 'post'], '/logout', $controller_path . '\Auth\LoginRegisterController@logout')->name('logout');

//Save registration
Route::post('/register-store', $controller_path . '\Auth\LoginRegisterController@registerStore')->name('register-store');



/*
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
*/
