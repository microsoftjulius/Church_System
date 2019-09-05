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

Route::get('/create-user',function() { return view('after_login.create-users');});

Route::get('/contacts',function() {
    return view('after_login.contacts');
});

Route::get('/manager',function() {
    return view('after_login.manager');
});
<<<<<<< HEAD

Route::get('/form',function() {
    return view('after_login.form');
});
=======
Route::post('/create-church','ChurchesController@create');
Route::post('/create-user','ChurchesController@create_church_user');
Route::get('/createchurches',function(){return view('after_login.create-church');});
>>>>>>> 6ff3206b8fbcb2faa7567a3e18426887b492c2e2
