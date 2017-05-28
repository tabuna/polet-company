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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['namespace' => 'Website'], function ($router) {
    $router->get('/','WelcomeController@index')->name('index');
    $router->get('/p/{item}','PageController@show')->name('page');

    $router->get('/contacts','ContactsController@index')->name('contacts');
    $router->post('/contacts','ContactsController@send')->name('contacts.submit');
});
