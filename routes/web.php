<?php

use App\Pagina;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

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
Auth::routes(['verify' => true]);
//Rota de teste para validação da pass
Route::get('/teste/{email}', function (Request $request) {
    if (! $request->hasValidSignature()) {
        abort(401);
    }

    // ...
})->name('teste');
/// ...Front-end Pages
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
Route::post('/pack/submit','PageController@packSumbit')->name('pack.submit');
Route::get('/politica-de-cookies', 'PageController@cookies')->name('politica-de-cookies');
Route::get('/politica-de-privacidade', 'PageController@privacidade')->name('politica-de-privacidade');
Route::get('/faqs', 'PageController@faqs')->name('faqs');
Route::get('admin/fotografias/query', 'FotografiaController@picsQuery')->name('pic.update-state');
Route::get('/admin', 'HomeController@index')->name('admin');
Route::group(['middleware' => 'admin'], function () {

    // ...Paginas Site
    Route::resource('admin/paginas', 'PaginaController');
    Route::put('admin/paginas/update/{pagina}', 'PaginaController@updateState')->name('paginas.update-state');
    // ...Fotografias
    Route::resource('admin/fotografias', 'FotografiaController');
    Route::put('admin/fotografias/update/{pic}', 'FotografiaController@updateState')->name('pic.update-state');
    // ...Videos
    Route::resource('admin/videos', 'VideoController');
    Route::put('admin/videos/update/{video}', 'VideoController@updateState')->name('video.update-state');
    // ...Testemonials
    Route::resource('admin/testimonials', 'TestimonialController');
    Route::put('admin/testimonials/update/{testimonial}', 'TestimonialController@updateState')->name('testimonials.update-state');

    Route::resource('admin/orcamentos', 'OrcamentoController');

    Route::get('admin/users','Admin\UsersController@index')->name('users.index');
    Route::get('admin/users/{user}','Admin\UsersController@show')->name('user.show');
    Route::get('admin/users/{user}/edit','Admin\UsersController@edit')->name('user.edit');
    Route::put('admin/users/{user}', 'Admin\UsersController@update')->name('user.update');
    Route::put('admin/users/update/{user}', 'Admin\UsersController@updateState')->name('user.update-state');

    Route::post('admin/precos','PackController@store')->name('pack.store');
    Route::get('admin/precos','PackController@index')->name('packs.index');
    Route::get('admin/precos/create', 'PackController@create')->name('packs.create');
    Route::get('admin/precos/{pack}', 'PackController@show')->name('pack.show');
    Route::get('admin/precos/{pack}/edit', 'PackController@edit')->name('pack.edit');
    Route::put('admin/precos/{pack}', 'PackController@update')->name('pack.update');
    Route::delete('admin/precos/{pack}', 'PackController@destroy')->name('pack.destroy');
    Route::put('admin/precos/update/{pack}', 'PackController@updateState')->name('pack.update-state');


    Route::get('admin/extras','ExtraController@index')->name('extras.index');
    Route::post('admin/extras/store','ExtraController@store')->name('extra.store');
    Route::get('admin/extras/create', 'ExtraController@create')->name('extras.create');
    Route::get('admin/extras/{extra}', 'ExtraController@show')->name('extra.show');
    Route::get('admin/extras/{extra}/edit', 'ExtraController@edit')->name('extra.edit');
    Route::put('admin/extras/{extra}', 'ExtraController@update')->name('extra.update');
    Route::delete('admin/extras/{extra}', 'ExtraController@destroy')->name('extra.destroy');
    Route::put('admin/extras/update/{extra}', 'ExtraController@updateState')->name('extra.update-state');

    Route::get('admin/custom-price','CustomPriceController@index')->name('custom-price.index');
    // ...Sliders
    Route::resource('admin/sliders', 'SliderController');
    Route::put('admin/sliders/update/{slider}', 'SliderController@updateState')->name('slider.update-state');
    Route::get('admin/', 'SliderController@index');

});
