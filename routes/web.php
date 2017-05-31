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

Route::get('/home', 'Profile\ProfileController@show')->name('home');
/*
|--------------------------------------------------------------------------
| Website display for all users and guest
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Website'], function ($router) {
    $router->get('/', 'WelcomeController@index')->name('index');
    $router->get('/p/{item}', 'PageController@show')->name('page');

    $router->get('/contacts', 'ContactsController@index')->name('contacts');
    $router->post('/contacts', 'ContactsController@send')->name('contacts.submit');
});


/*
|--------------------------------------------------------------------------
| Profile display for all users
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'auth', 'prefix' => 'profile', 'namespace' => 'Profile'], function ($router) {
    $router->get('/{id?}', 'ProfileController@show')->name('profile');
    $router->get('/', 'ProfileController@index')->name('profile.edit');
    $router->put('/', 'ProfileController@update')->name('profile.update');
    $router->get('/password', 'ProfileController@password')->name('profile.password');
    $router->put('/password', 'ProfileController@changePassword')->name('profile.password.update');
});
