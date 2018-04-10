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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Rutas Controlador Videos
Route::get('/crear-video', array(
  'as'  => 'createVideo',
  'middleware' => 'auth',
  'uses'  => 'VideoController@createVideo'
));

Route::get('admin', 'HomeController@panel');

Route::post('/video/save', 'VideoController@saveVideo');
Route::get('/imagen/{archivo}', 'VideoController@getImage');
