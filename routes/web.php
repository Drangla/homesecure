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

Route::get('/', 'GuestController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('person', 'PersonController');
Route::resource('flug', 'FlugController');
// Route::resource('domain', 'DomainController');

Route::get('/search/person', 'PersonController@search')->name('person.search');
Route::post('/search/person', 'PersonController@query')->name('person.query');
Route::get('/search/flug', 'FlugController@search')->name('flug.search');
Route::post('/search/flug', 'FlugController@query')->name('flug.query');

// Route::get('/list/domain', 'DomainController@list')->name('domain.list');
Route::get('/list/person', 'PersonController@list')->name('person.list');
Route::get('/list/flug', 'PersonController@list')->name('flug.list');

