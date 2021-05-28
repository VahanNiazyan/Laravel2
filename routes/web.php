<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome-page');

Route::get('/myregister', function () {
    return view('register');
})->name('register-page');

Route::get('/', function () {
    return view('login');
})->name('login-page');

Route::post('/myregister/submit', [UserController::class, "register"])->name('main-register');
Route::get('/login/userlogined', [UserController::class, "dashboard"]);

Auth::routes();


////////////////////////
Route::get('/file', function () {
    return view('home.form');
})->name('file-page');

Route::post('/file/uplad', [fileController::class, "file_upload"])->name('main-file');

//////////////////

// if(Gate::allows('subs-only',Auth::user())){

//   }else{
//       return 'Not Found';
//   }
// });
Route::view('nosuccess', 'test.nosuccess');


Route::group(['middleware' => 'checklogin'], function () {

    Route::get('/home', function () {
        return view('test.home');
    });
    Route::post('/mylogin/submit', [UserController::class, "login"])->name('main-login');
});

///////////  --  resoursner haser@  --   /////////////

Route::get('/user', [UserController::class, "show"]);
Route::get('/user/delete/{id}', [UserController::class, "delete"])->name('delete');
//Route::resource('/animal','AnimalController');
//Route::resource('/user','UserController');

///////////  --  resoursner haser@  --   /////////////
