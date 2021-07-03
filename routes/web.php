<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestictedMessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

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

//Login
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware'=>['sessionAuth']], function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    Route::group(['middleware'=>['isAdmin']], function(){

        //Country Routes
        Route::get('/country', [CountryController::class, 'index']);
        Route::post('/country', [CountryController::class, 'createCountry']);
        Route::get('/country/update/{id}', [CountryController::class, 'updateViewCountry']);
        Route::post('/country/update/{id}', [CountryController::class, 'updateCountry']);
        Route::get('/country/delete/{id}', [CountryController::class, 'deleteCountry']);

        // Resticted or Banned Message Routes
        Route::get('/restictedWord', [RestictedMessageController::class, 'index']);
        Route::post('/restictedWord', [RestictedMessageController::class, 'addRestictedMessage']);
        Route::get('/restictedWord/delete/{id}', [RestictedMessageController::class, 'deleteRestictedMessage']);

        //User's Routes for admin 
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/profile/{id}', [UserController::class, 'profileView']);
        Route::get('/active/user/{id}', [UserController::class, 'activeUserProfile'])->name('user.active');
        Route::get('/deactive/user/{id}', [UserController::class, 'deactiveUserProfile'])->name('user.deactive');

        Route::get('/admin', [AdminController::class, 'index']);
        Route::post('/admin', [AdminController::class, 'addAdmin']);
        Route::get('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');
    });
});