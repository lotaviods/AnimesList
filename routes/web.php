<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'Animes@index');

Route::get('/animes', 'Animes@index')->name('animes');

Route::get('/animes/criar', 'Animes@create')->name('criar')
    ->middleware('autenticador');
Route::post('/animes/criar', 'Animes@store')
    ->middleware('autenticador');
Route::post('/animes/{id}', 'Animes@destroy')
    ->middleware('autenticador');
Route::get('/animes/{animeId}/temporadas', 'Temporadas@index');
Route::post('/animes/{id}/editaNome', 'Animes@editaNome')
    ->middleware('autenticador');
Route::get('/temporadas/{temporada}/', 'EpisodiosController@index');
Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')
    ->middleware('autenticador');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index')->name('entrar');
Route::post('/entrar', 'EntrarController@entrar');
Route::get('/registrar', 'RegistroController@create')->name('registrar');
Route::post('/registrar', 'RegistroController@store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});
Route::get('upcoming', 'To_do@index')->name('To-do');
Route::get('/api', 'Animes@api');