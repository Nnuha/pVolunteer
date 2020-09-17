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

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
Route::get('admin/home', 'EventController@dashboard')->name('admin.home')->middleware('is_admin');


Route::get('/user/profile/{id}', 'UserController@show')->name('user.profile');
Route::get('/user/edit', 'UserController@edit')->name('user.edit');
Route::post('/user/edit', 'UserController@update')->name('user.update');


Route::get('/admin/edit','AdminController@edit')->name('admin.edit')->middleware('is_admin');
Route::post('/admin/edit','AdminController@update')->name('admin.update')->middleware('is_admin');


Route::get('admin/event/list','EventController@index')->name('admin.event.list')->middleware('is_admin');

Route::get('admin/event/create', 'EventController@create')->name('admin.event.create')->middleware('is_admin');
Route::post('admin/event/create','EventController@store')->name('admin.event.store')->middleware('is_admin');

Route::get('admin/event/edit/{id}', 'EventController@edit')->name('admin.event.edit')->middleware('is_admin');

Route::put('admin/event/update{event}','EventController@update')->name('admin.event.update')->middleware('is_admin'); 

//Admin view user list
Route::get('admin/event/user/{id}', 'EventController@show')->name('admin.event.user')->middleware('is_admin');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/event/view/{id}', 'HomeController@show')->name('user.event.view-event');
Route::get('/user/event/list', 'HomeController@list')->name('user.event.list');

//For user to apply volunteering work
Route::get('/user/event/register/{id}', 'HomeController@applyEvent')->name('user.event.register');
Route::post('/user/event/register', 'HomeController@storeEventUser')->name('user.event.storeEventUser');

//For user to view the applied volunteering work
Route::get('/user/event/applied', 'HomeController@applied')->name('user.event.applied');
// For user to unjoin event/delete 
Route::delete('/user/event/{event}', 'HomeController@destroy')->name('user.event.destroy');



//Application

Route::get('/user/application/create', 'ApplicationController@create')->name('user.application.application');
Route::post('/user/application/create', 'ApplicationController@store')->name('user.application.store');
Route::get('/user/application/view', 'ApplicationController@index')->name('user.application.view');

//Admin update
Route::get('/admin/application/view', 'ApplicationController@adminView')->name('admin.application.view')->middleware('is_admin');
Route::get('/admin/application/edit{id}', 'ApplicationController@edit')->name('admin.application.edit')->middleware('is_admin');
Route::put('admin/application/update/{application}', 'ApplicationController@update')->name('application.update')->middleware('is_admin');

Route::get('/download/{application_proposal}', 'ApplicationController@download')->name('download')->middleware('is_admin');
// Admin update user -> admin
Route::get('/admin/users', 'AdminController@showUser')->name('admin.user')->middleware('is_admin');
Route::get('/admin/view/{id}', 'AdminController@showProfile')->name('admin.view-user')->middleware('is_admin');
Route::put('/admin/user/update/{users}', 'AdminController@add')->name('admin.add')->middleware('is_admin');


//remove admin to normal user
Route::get('/admin/admins', 'AdminController@showAdmin')->name('admin.admin')->middleware('is_admin');
Route::get('/admin/view/Admin/{id}', 'AdminController@showProfileAdmin')->name('admin.view-admin')->middleware('is_admin');
Route::put('/admin/update/{users}', 'AdminController@remove')->name('admin.add')->middleware('is_admin');




                     