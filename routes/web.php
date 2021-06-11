<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\User;


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


//User Info Route
Route::get('/userInfo', function(){
    return view('userinfo');
});

Route::get('fileUpload', [\App\Http\Controllers\FileUploadController::class, 'fileUpload'] );

Route::post('FileUpload', [\App\Http\Controllers\FileUploadController::class, 'upload']);

Route::get('fileDownload/{id}', [\App\Http\Controllers\DownloadFileController::class, 'download']);
Route::get('fileDelete/{id}', [\App\Http\Controllers\DownloadFileController::class, 'delete']);



Route::get('myFiles', [\App\Http\Controllers\DownloadFileController::class, 'downloadView'] );




use Illuminate\Http\Request;


//Testing

Route::get('/billing-portal', function (Request $request) {
    $user = Auth::user();
    $user->createOrGetStripeCustomer();
    return $request->user()->redirectToBillingPortal(url('/subscription'));
});




Route::post('/user/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'subscribe']);

Route::get('/subscription', function(){
    return view('subscription');
});

