<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/



Route::group(['prefix' => 'messages','namespace' => 'Message'], function ($router) {
    $router->post('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    $router->post('create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    $router->post('/thread', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    $router->post('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    $router->put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
});




Route::group(['prefix' => 'reviews','namespace' => 'Reviews'], function ($router) {
    $router->post('/', ['as' => 'reviews', 'uses' => 'ReviewsController@index']);
    $router->post('create', ['as' => 'reviews.create', 'uses' => 'ReviewsController@create']);
    $router->post('/store', ['as' => 'reviews.store', 'uses' => 'ReviewsController@store']);
    $router->post('{id}', ['as' => 'reviews.show', 'uses' => 'ReviewsController@show']);
    $router->put('{id}', ['as' => 'reviews.update', 'uses' => 'ReviewsController@update']);
});



/*
|--------------------------------------------------------------------------
| Yandex Kassa Payments
|--------------------------------------------------------------------------
|
*/
Route::group(['namespace' => 'Payments', 'prefix' => 'payments'], function ($router) {
    $router->resource('order', 'AvisoController');
});



/*
|--------------------------------------------------------------------------
| Profile display for all users
|--------------------------------------------------------------------------
|
*/
Route::group(['middleware' => 'auth', 'prefix' => 'profile', 'namespace' => 'Profile'], function ($router) {


    $router->post('/{user?}', 'ProfileController@show')->where('user', '[0-9]+')->name('profile');
    $router->get('/tags/{tag?}', 'TagController@show')->name('profile.tags');

    $router->post('/fave', 'FavoriteController@index')->name('profile.fave');
    $router->put('/fave/{user}', 'FavoriteController@update')->name('profile.fave.add');
    $router->post('/rating/{user}', 'RatingController@store')->name('profile.rating');

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
Route::group(['middleware' => 'auth', 'prefix' => 'tender', 'namespace' => 'Tender'], function ($router) {

    $router->post('/', 'TenderController@index')->name('tender.list');
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
Route::group(['middleware' => 'auth', 'prefix' => 'other', 'namespace' => 'Other'], function ($router) {
    $router->post('/city/{city?}', 'CityController@show')->name('city');
});



