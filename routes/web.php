<?php

/*
|--------------------------------------------------------------------------
| Vue App
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => 'auth'], function ($router) {
    $router->get('/{vue_capture?}', 'HomeController@index')
        ->where('vue_capture','^(?!api).*$')
        ->name('app');
});


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
//Route::get('/', 'HomeController@index')->name('home');

Auth::routes();


/*
|--------------------------------------------------------------------------
| Website display for all users and guest
|--------------------------------------------------------------------------
|
*/
Route::group(['namespace' => 'Website', 'middleware' => 'guest'], function ($router) {
    $router->get('/', 'WelcomeController@index')->name('index');
    $router->get('/companies', 'WelcomeController@companies')->name('companies');
    $router->get('/order', 'WelcomeController@order')->name('order');

    $router->get('/p/{item}', 'PageController@show')->name('page');

    $router->get('/contacts', 'ContactsController@index')->name('contacts');
    $router->post('/contacts', 'ContactsController@send')->name('contacts.submit');
});


