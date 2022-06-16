<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('index');
});

Auth::routes();
Route::get('/', 'PageController@slider')->name('slider');
Route::get('/sobre', 'PageController@sobre')->name('sobre');
Route::get('/fotografias', 'PageController@fotografias')->name('fotografias');
Route::get('/videos', 'PageController@videos')->name('videos');
Route::get('/corporate', 'PageController@corporate')->name('corporate');
Route::get('/precos', 'PageController@precos')->name('precos');
Route::get('/contactos', 'PageController@contactos')->name('contactos');
Route::post('/contactos','PageController@contactSubmit')->name('contact.submit');
Route::get('/politica-de-cookies', 'PageController@cookies')->name('politica-de-cookies');
Route::get('/politica-de-privacidade', 'PageController@privacidade')->name('politica-de-privacidade');


Route::get('/admin', 'HomeController@index')->name('admin');
Route::group(['middleware' => 'admin'], function () {

    Route::resource('admin/paginas', 'PaginaController');
    Route::resource('admin/fotografias', 'FotografiaController');
    Route::resource('admin/videos', 'VideoController');
    Route::resource('admin/orcamentos', 'OrcamentoController');
    Route::get('admin/', 'SliderController@index');
    Route::resource('admin/sliders', 'SliderController');
});
