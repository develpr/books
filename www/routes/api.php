<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['api']], function ($router) {
    $router->post('register', 'Auth\RegisterController@register');
});

Route::group(['middleware' => ['auth:api']], function ($router) {

    $router->get('oauth/scopes', [
        'uses' => '\Laravel\Passport\Http\Controllers\ScopeController@all',
    ]);

    $router->get('oauth/tokens', [
        'uses' => '\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@forUser',
    ]);

    $router->delete('oauth/tokens/{token_id}', [
        'uses' => '\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@destroy',
    ]);


    $router->get('users/me', function(Request $request) {
        return $request->user();
    });
});