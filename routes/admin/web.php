<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('login', 'Auth\LoginController@index')->name('login');

Route::prefix('login')->name('socialite.')->group(function () {


    Route::get('/google', 'Auth\LoginController@GoogleRedirect')->name('google.redirect');

    //google login routes
    Route::get('/google', 'Auth\LoginController@GoogleRedirect')->name('google.redirect');
    Route::get('/google/callback', 'Auth\LoginController@GoogleCallback')->name('google.callback');

    //facebook login routes
    Route::get('/facebook', 'Auth\LoginController@FacebookRedirect')->name('facebook.redirect');
    Route::get('/facebook/callback', 'Auth\LoginController@FacebookCallback')->name('facebook.callback');

});//end of socialite groupe


Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

    Route::get('/',function(){
        return view('admin.dashbord.home');
    })->name('index');

});
