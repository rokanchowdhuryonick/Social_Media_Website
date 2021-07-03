<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\UserController;

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

Route::get('/country', [CountryController::class, 'index']);
Route::post('/country', [CountryController::class, 'createCountry']);
Route::get('/country/update/{id}', [CountryController::class, 'updateViewCountry']);
Route::post('/country/update/{id}', [CountryController::class, 'updateCountry']);
Route::get('/country/delete/{id}', [CountryController::class, 'deleteCountry']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/profile/{id}', [UserController::class, 'profileView']);

