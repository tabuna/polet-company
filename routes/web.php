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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

/*
|--------------------------------------------------------------------------
| Website display for all users and guest
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'Website', 'middleware' => 'guest'], function ($router) {
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

    $router->post('/{user?}', 'ProfileController@show')->where('user', '[0-9]+')->name('profile');


    $router->post('/fave', 'FavoriteController@index')->name('profile.fave');
    $router->put('/fave/{user}', 'FavoriteController@update')->name('profile.fave.add');

    $router->post('/edit', 'ProfileController@index')->name('profile.edit');
    $router->put('/edit', 'ProfileController@update')->name('profile.update');
    $router->post('/password', 'ProfileController@password')->name('profile.password');
    $router->put('/password', 'ProfileController@changePassword')->name('profile.password.update');
});



Route::group(['middleware' => 'auth', 'prefix' => 'tender', 'namespace' => 'Tender'], function ($router) {

    $router->post('/', 'TenderController@index')->name('tender.list');

});



Route::get('/{vue_capture?}', function () {
    return view('home');
})->where('vue_capture', '[\/\w\.-]*');
