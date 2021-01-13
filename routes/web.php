<?php

// use Illuminate\Support\Facades\Route;

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

Route::get('/', 'TestController@welcome');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home2', 'Home2Controller@index')->name('home2');


//Unidades
Route::get('/unidades/{id}','UnidadesController@index')->name('unidades.index');
Route::get('/unidades/create/{id}','UnidadesController@create')->name('unidades.create');
Route::post('/unidades/{id}', 'UnidadesController@store');
Route::delete('/unidades/{id}/{idAsig}','UnidadesController@destroy')->name('unidades.destroy');


//Preguntas

Route::get('/preguntas/{id}','PreguntasController@index')->name('preguntas.index');
Route::get('/preguntas/create/{id}','PreguntasController@create')->name('preguntas.create');
Route::post('/preguntas/{id}', 'PreguntasController@store');
Route::delete('/preguntas/{id}/{idUnid}','PreguntasController@destroy')->name('preguntas.destroy');


//Respuestas
Route::get('/respuestas/{id}','RespuestasController@index')->name('respuestas.index');
Route::get('/respuestas/create/{id}','RespuestasController@create')->name('respuestas.create');
Route::post('/respuestas/{id}', 'RespuestasController@store');
Route::delete('/respuestas/{id}/{idUnid}','RespuestasController@destroy')->name('respuestas.destroy');

//Controllers
Route::resource('asignaturas', 'AsignaturasController');
Route::resource('unidades', 'UnidadesController');
Route::resource('preguntas', 'PreguntasController');
Route::resource('respuestas', 'RespuestasController');

