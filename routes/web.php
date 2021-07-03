<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login','logincon@verify');
Route::post('/login','logincon@verify2');
route::get('/logout','logoutcon@logout');
route::get('/registration','registrationcontroller@registration');
route::group(['middleware'=>['sess']],function(){

    route::get('/home','homecon@index');
    route::post('/registration','registrationcontroller@registration2');
    route::get('/job','jobcon@jobpost');
    route::get('/messiging','messagingcon@message');
    route::get('/notificaition','noticon@noti');

    route::get('/group/create','groupcreatecon@create');
    route::post('/group/create','groupcreatecon@create2');
    route::get('/group/list','grouplistcon@list');
    route::get('/group/details/{id}','grouplistcon@details');
    route::get('/group/edit/{id}','grouplistcon@edit');
    route::post('/group/edit/{id}','grouplistcon@update_data');
    route::get('/group/delete/{id}','grouplistcon@delete');
   
    route::get('/createpost','createpostcontroller@createpost');
    route::post('/createpost','createpostcontroller@addjob');
   
  
    


});



