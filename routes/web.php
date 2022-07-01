<?php

use App\Pagina;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

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
Route::get('/precos/{pack}', 'PageController@packShow')->name('user-pack-show');
Route::get('/contactos', 'PageController@contactos')->name('contactos');
Route::post('/contactos','PageController@contactSubmit')->name('contact.submit');
Route::get('/politica-de-cookies', 'PageController@cookies')->name('politica-de-cookies');
Route::get('/politica-de-privacidade', 'PageController@privacidade')->name('politica-de-privacidade');

Route::get('/admin', 'HomeController@index')->name('admin');
Route::group(['middleware' => 'admin'], function () {


    Route::resource('admin/paginas', 'PaginaController');
    Route::resource('admin/fotografias', 'FotografiaController');
    Route::resource('admin/videos', 'VideoController');

    Route::resource('admin/testimonials', 'TestimonialController');
    Route::resource('admin/orcamentos', 'OrcamentoController');

    Route::post('admin/precos','PackController@store')->name('pack.store');
    Route::get('admin/precos','PackController@index')->name('packs.index');
    Route::get('admin/precos/create', 'PackController@create')->name('packs.create');
    Route::get('admin/precos/{pack}', 'PackController@show')->name('pack.show');
    Route::get('admin/precos/{pack}/edit', 'PackController@edit')->name('pack.edit');
    Route::put('admin/precos/{pack}', 'PackController@update')->name('pack.update');
    Route::delete('admin/precos/{pack}', 'PackController@destroy')->name('pack.destroy');
    Route::put('admin/precos/update/{pack}', 'PackController@updateState')->name('pack.update-state');


    Route::get('admin/extras','ExtraController@index')->name('extras.index');

    Route::get('admin/custom-price','CustomPriceController@index')->name('custom-price.index');

    Route::resource('admin/sliders', 'SliderController');
    Route::get('admin/', 'SliderController@index');

});
