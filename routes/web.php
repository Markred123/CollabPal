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
//Route::get('/FileUpload', function(){
//    return view('FileUpload');
//});
Route::get('FileUpload', [\App\Http\Controllers\FileUploadController::class, 'fileUpload'] );

Route::post('file-upload', [\App\Http\Controllers\FileUploadController::class, 'update']);


Route::get('/MyFiles', function(){
    return view('MyFiles');
});


Route::get('/Testy', function(){
    $directory="files/";
    $files = Storage::allFiles($directory);
    foreach($files as $file){
        echo $file."\n";

    }
});

use Illuminate\Http\Request;


//Testing

Route::get('/billing-portal', function (Request $request) {
    return $request->user()->redirectToBillingPortal(url('/welcome'));
});




Route::post('/user/subscribe', function (Request $request) {
    $request->user()->newSubscription(
        'Premium Collabpal', 'price_1IzgvTF738EjpHYFAaTxqTWe'
    )->create($request->paymentMethodId);
});

Route::get('/subscribe', function(){
    return view('subscribe');
});
