<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;


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
    if(!Auth::guest()){
        return redirect()->intended('welcome');
    }
    else
    return view('registration');
});


//Logout Routes
Route::Get('/destroy',function(){
    Session::flush();
    return redirect()->intended('welcome');
});
//Registration Routes
Route::get('/register',[RegistrationController::class, 'create']);
Route::post('register', [RegistrationController::class, 'store'] );

//Login Routes
//Route::get('login', function(){
//    return view('login');
//});
//Route::post('AppLogin',[\App\Http\Controllers\LoginController::class,'authenticate']);



//Testing Routes
//Route::get('/2faChallenge', function(){
//    return view('2faChallenge');
//});

//User Info Route
Route::get('/userInfo', function(){
    return view('userinfo');
});
