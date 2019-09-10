<?php

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

Route::get('/', function () {return redirect('/login');});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/church/{id}','ChurchesController@index');
Route::get('/church','ChurchesController@index_showall');
Route::get('/user','ChurchUserController@show');
Route::get('/view-church-user/{id}','ChurchesController@view_church_user');
Route::get('/sent-messages','messages@send');
Route::get('/sent-quick-messages','messages@send_quick_sms');
Route::get('/groups','messages@contact_groups');



Route::get('/create-user',function() { return view('after_login.create-users');});
Route::get('/addusers',function() { return view('after_login.add-users');});
Route::get('/contacts',function() { return view('after_login.contacts');});
Route::get('/manager',function() { return view('after_login.manager');});
Route::get('/createchurches',function(){return view('after_login.create-church');});

Route::post('/search','ChurchUserController@index');
Route::post('/create-church','ChurchesController@create');
Route::post('/create-user','ChurchesController@create_church_user');
Route::post('/adds-user','ChurchUserController@store');
Route::post('/search-church','ChurchesController@search');

