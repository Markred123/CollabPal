<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;


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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/registration', function(){
    return view('registration');
});


//Logout Routes
Route::Get('/destroy',function(){
    Session::flush();
    return view('welcome');
});
//Registration Routes
Route::get('/register',[RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store'] );

//Login Routes
Route::post('/AppLogin',[\App\Http\Controllers\LoginController::class,'authenticate']);
Route::get('/login', function(){
    return view('login');
});

//Testing Routes
Route::get('/test', function(){
    return view('test');
});

//User Info Route
Route::get('/userInfo', function(){
    return view('userinfo');
});
