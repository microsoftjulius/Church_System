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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect('/login');});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/church/{id}','ChurchesController@index');
    Route::get('/church','ChurchesController@index_showall')->name('Churches');
    Route::get('/user','ChurchUserController@show')->name('Church Users');
    Route::get('/search-user','ChurchUserController@index');
    Route::get('/display-sent-messages','messages@display_sent_messages')->name('Sent Messages');
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
    Route::get('/search-church','ChurchesController@search');
    Route::get('/contact-groups','GroupsController@index')->name('Contact Groups');
    Route::get('/get-next-page/{id}','GroupsController@pagination_for_groups');
    Route::get('/search-group','GroupsController@search_group');
    Route::post('/import-contacts/{id}', 'ContactsController@import')->name('import');
    Route::post('/create-group','GroupsController@create_group');
    Route::get('/create-group-form','GroupsController@show_form');
    Route::post('/store-sent-messages','messages@store_sent_messages');
    Route::get('/view-contacts/{id}','ContactsController@view_for_group')->name('Add Contacts to Group');
    Route::post('/save-contact-to-group/{id}','ContactsController@save_contact_to_group');
    Route::get('/search-sent-messages','messages@search_messages');

    Route::get('/read-file','messages@read_file');
    Route::get('/file-reading',function(){return view('after_login.file-reading');});
    Route::get('/search-term-list',function(){return view('after_login.search-term-table');});
    Route::get('/message-categories',function(){return view('after_login.message-categories');});
    Route::get('/change-passwords',function(){return view('after_login.change-password');});
    Route::post('/save-change-password','ChurchUserController@store_users_password');
    Route::get('/add-message-category',function(){return view('after_login.add-message-category');});
    Route::get('/incoming-messages',function(){return view('after_login.incoming-messages');});
    Route::get('/add-search-term',function(){return view('after_login.search-term-form');});
    Route::post('/add-message-categories','messages@save_message_category');
    Route::post('/search-message-categories','messages@search_message_categories');
    Route::post('/delete-contact/{group_id}','ContactsController@remove_element_from_an_array');
});
