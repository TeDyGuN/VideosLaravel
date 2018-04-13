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
Route::Resource('video-api', 'VideoApiController');
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
//Descripcion de Video
Route::get('/video/{id}', 'VideoController@getDescription');
Route::get('/getVideo/{archivo}', 'VideoController@getVideo');
Route::get('/listarVideo', 'VideoController@listar');
Route::get('/modificarVideo/{id}', 'VideoController@modificar');
Route::post('/updateVideo', 'VideoController@update');
//Route::get('/search/{key?}', 'VideoController@search')->as('videoSearch');
Route::get('/search/{key?}', array(
  'as'  => 'videoSearch',
  'uses'  => 'VideoController@search'
));
//categoria
Route::get('categoria', 'CategoriaController@index');
Route::post('categoria/save', 'CategoriaController@save');
Route::get('categorias/{id}', 'VideoController@categoria');
