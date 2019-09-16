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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/church/{id}','ChurchesController@index');
    Route::get('/church','ChurchesController@index_showall');
    Route::get('/user','ChurchUserController@show');

    Route::post('/search-user','ChurchUserController@index');
    Route::get('/display-sent-messages','messages@display_sent_messages');
    Route::get('/sent-quick-messages','messages@drop_down_groups');
    Route::get('/sent-messages','messages@send');
    Route::get('/view-church-user/{id}','ChurchesController@view_church_user');
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
    Route::get('/contact-groups','GroupsController@index');
    Route::post('/search-group','GroupsController@search_group');
    //Route::post('/search-sent-messages','messages@search_use_contact_group_attributes');

    Route::post('/create-group','GroupsController@create_group');
    Route::get('/create-group-form','GroupsController@show_form');
    Route::post('/store-sent-messages','messages@store_sent_messages');
    Route::get('/view-contacts/{id}','ContactsController@view_for_group');
    Route::post('/save-contact-to-group/{id}','ContactsController@save_contact_to_group');

});
