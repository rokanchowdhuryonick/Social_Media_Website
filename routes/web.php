<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RestictedMessageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoticeController;

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

    Route::get('/profile/{id}', [UserController::class, 'profileView']);

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
        
        Route::get('/active/user/{id}', [UserController::class, 'activeUserProfile'])->name('user.active');
        Route::get('/deactive/user/{id}', [UserController::class, 'deactiveUserProfile'])->name('user.deactive');

        Route::get('/admin', [AdminController::class, 'index']);
        Route::post('/admin', [AdminController::class, 'addAdmin']);
        Route::get('/admin/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.update');
        Route::post('/admin/update/{id}', [AdminController::class, 'updateAdmin'])->name('admin.update');
        Route::get('/admin/delete/{id}', [AdminController::class, 'deleteAdmin'])->name('admin.delete');


        //Notices
        Route::get('/notice', [NoticeController::class, 'index']);
        Route::post('/notice', [NoticeController::class, 'createNotice']);
        Route::post('/notice/update/{id}', [NoticeController::class, 'updateNotice']);
        Route::get('/notice/{id}', [NoticeController::class, 'getNotice']);
        Route::get('/notice/delete/{id}', [NoticeController::class, 'deleteNotice']);


        //Report
        Route::get('report/export/users/csv', [AdminController::class, 'exportUsersToCSV'])->name('user.csv');
    });
});