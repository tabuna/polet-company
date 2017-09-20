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
//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


$this->group(['prefix' => 'messages','namespace' => 'Message'], function ($router) {
    $router->post('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    $router->post('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    $router->post('/thread', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    $router->post('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    $router->put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});



/*
|--------------------------------------------------------------------------
| Yandex Kassa Payments
|--------------------------------------------------------------------------
|
*/
$this->group(['namespace' => 'Payments', 'prefix' => 'payments'], function ($router) {
    $router->resource('order', 'AvisoController');
});



/*
|--------------------------------------------------------------------------
| Profile display for all users
|--------------------------------------------------------------------------
|
*/
$this->group(['middleware' => 'auth', 'prefix' => 'profile', 'namespace' => 'Profile'], function ($router) {


    $router->post('/{user?}', 'ProfileController@show')->where('user', '[0-9]+')->name('profile');
    $router->get('/tags/{tag?}', 'TagController@show')->name('profile.tags');

    $router->post('/fave', 'FavoriteController@index')->name('profile.fave');
    $router->put('/fave/{user}', 'FavoriteController@update')->name('profile.fave.add');

    $router->post('/edit', 'ProfileController@index')->name('profile.edit');
    $router->put('/edit', 'ProfileController@update')->name('profile.update');
    $router->post('/password', 'ProfileController@password')->name('profile.password');
    $router->put('/password', 'ProfileController@changePassword')->name('profile.password.update');

    $router->post('/statistics', 'ProfileController@statistics')->name('profile.statistics');
});



/*
|--------------------------------------------------------------------------
| Tender
|--------------------------------------------------------------------------
|
*/
$this->group(['middleware' => 'auth', 'prefix' => 'tender', 'namespace' => 'Tender'], function ($router) {
    $router->post('/', 'TenderController@index')->name('tender.index');
    $router->post('/comment/{id}', 'TenderController@comment')->name('tender.comment');

    $router->post('/upload', 'FileUploadController@upload')->name('upload');
    $router->post('/create', 'TenderController@store')->name('tender.store');
    $router->get('/tags/{tag?}', 'TagController@show')->name('tender.tags');
    $router->post('/{tender}', 'TenderController@show')->name('tender.show');
});


$router->post('/companies', 'Profile\ProfileController@companies')->name('companies');

/*
|--------------------------------------------------------------------------
| Other
|--------------------------------------------------------------------------
|
*/
$this->group(['middleware' => 'auth', 'prefix' => 'other', 'namespace' => 'Other'], function ($router) {
    $router->post('/city/{city?}', 'CityController@show')->name('city');
});





/*
|--------------------------------------------------------------------------
| Vue App
|--------------------------------------------------------------------------
|
*/
$this->group([],function ($router) {
    $router->get('{vue_capture?}', 'HomeController@index')
        ->where('vue_capture', '^(?!dashboard).*$')->name('home');
});


/*
|--------------------------------------------------------------------------
| Website display for all users and guest
|--------------------------------------------------------------------------
|
*/
$this->group(['namespace' => 'Website', 'middleware' => 'guest'], function ($router) {
    $router->get('/companies', 'WelcomeController@companies')->name('companies');
    $router->get('/order', 'WelcomeController@order')->name('order');

    $router->get('/p/{item}', 'PageController@show')->name('page');

    $router->get('/contacts', 'ContactsController@index')->name('contacts');
    $router->post('/contacts', 'ContactsController@send')->name('contacts.submit');
});
