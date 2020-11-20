<?php

use Illuminate\Routing\RouteDependencyResolverTrait;
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
Route::get('/animes/criar', 'Animes@create')->name('criar');
Route::post('/animes/criar', 'Animes@store');
Route::post('/animes/{id}','Animes@destroy');
