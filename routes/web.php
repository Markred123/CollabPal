<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\User;
use App\Models\Folder;


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




//Logout Routes
Route::get('/destroy',function(){
    Session::flush();
    return redirect()->intended('welcome');
});


//User Info Route
Route::middleware('auth')->get('/userInfo', function(){
    return view('userinfo');
});

Route::middleware('auth')->get('fileUpload', [\App\Http\Controllers\FileUploadController::class, 'fileUpload'] );

Route::middleware('auth')->post('FileUpload', [\App\Http\Controllers\FileUploadController::class, 'upload']);

Route::middleware('auth')->get('fileDownload/{id}', [\App\Http\Controllers\DownloadFileController::class, 'download']);
Route::middleware('auth')->get('fileDelete/{id}', [\App\Http\Controllers\DownloadFileController::class, 'delete']);
Route::middleware('auth')->get('fileShare/{id}', [\App\Http\Controllers\DownloadFileController::class, 'share']);
Route::middleware('auth')->get('fileShareByLink/{id}', [\App\Http\Controllers\DownloadFileController::class, 'shareByLink']);

Route::middleware('auth')->post('fileShare', [\App\Http\Controllers\DownloadFileController::class, 'share']);

Route::middleware('auth')->get('sharedFiles',[\App\Http\Controllers\ShareController::class,'shareView']);
Route::middleware('auth')->get('sharedDelete/{id}',[\App\Http\Controllers\ShareController::class,'shareDelete']);
Route::middleware('auth')->get('sharedDownload/{id}',[\App\Http\Controllers\ShareController::class,'shareDownload']);


Route::middleware('auth')->get('groupView',[\App\Http\Controllers\GroupController::class,'groupView']);
Route::middleware('auth')->post('groupCreate',[\App\Http\Controllers\GroupController::class,'groupCreate']);
Route::middleware('auth')->post('groupAdd',[\App\Http\Controllers\GroupController::class,'groupAdd']);
Route::middleware('auth')->post('groupDelete',[\App\Http\Controllers\GroupController::class,'groupDelete']);






Route::middleware('auth')->get('folderDelete/{id}', [\App\Http\Controllers\FileFolderController::class, 'folderDelete']);
Route::middleware('auth')->get('folderDelete/{id}', [\App\Http\Controllers\FileFolderController::class, 'folderDelete']);




Route::middleware('auth')->get('myFiles/{id}', [\App\Http\Controllers\DownloadFileController::class, 'downloadView'] );




use Illuminate\Http\Request;




Route::middleware('auth')->get('/billing-portal', function (Request $request) {
    $user = Auth::user();
    $user->createOrGetStripeCustomer();
    return $request->user()->redirectToBillingPortal(url('/subscription'));
});




Route::middleware('auth')->post('/user/subscribe', [\App\Http\Controllers\SubscriptionController::class, 'subscribe']);

Route::middleware('auth')->get('/subscription', function(){
    return view('subscription');
});

Route::middleware('auth')->get('/fileFolder', [\App\Http\Controllers\FileFolderController::class, 'fileFolderView']);

Route::middleware('auth')->post('/newFolder', [\App\Http\Controllers\FileFolderController::class, 'folderCreate']);
