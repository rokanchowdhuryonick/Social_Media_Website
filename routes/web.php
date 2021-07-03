<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});
Route::post('/login',[LoginController::class,'validation']);
Route::get('/login',[LoginController::class,'showview']);


Route::get('/homepage', function () {
   return view('homepage');
});
Route::get('/chat', function () {
    return view('chat');
 });


Route::post('/signup',[UserController::class,'addmember']);
Route::get('/signup',[UserController::class,'getview']);



Route::get('/homepage',[PostController::class,'getview']);
Route::post('/homepage',[PostController::class,'postCreatePost']);
     
Route::get('/logout',[LogoutController::class,'index']);

//Route::group(['middleware'=>['session']],function(){

     //route::view('/homepage');
      
//});

