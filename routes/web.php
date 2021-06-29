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
  
    route::get('/job','jobcon@jobpost');
    route::get('/messiging','messagingcon@message');
    route::get('/notificaition','noticon@noti');

    route::get('/group/create','usercreatecon@create');
    route::get('/group/list','usercreatecon@list');
    route::get('/group/details/{id}','usercreatecon@details');
    route::get('/group/edit/{id}','usercreatecon@edit');
    route::get('/group/delete/{id}','usercreatecon@delete');
    route::post('/registration','registrationcontroller@registration2');
    route::get('/createpost','createpostcontroller@createpost');
    route::post('/createpost','createpostcontroller@addjob');
   
  
    


});



