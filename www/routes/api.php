<?php

use Books\Domain\BookType;
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

    $router->post('oauth/tokens', '\Books\Http\Controllers\Auth\TokenController@login');

});

Route::group(['middleware' => ['auth:api']], function ($router) {


    //Exchanges
//    $router->get('')

    $router->delete('oauth/tokens/mine', '\Books\Http\Controllers\Auth\TokenController@destroy');


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

    $router->put('users/me', function(Request $request) {
        /** @var \Books\User $user */
        $user = $request->user();

        $test = $request->get('favorite_book_type');

        $result = BookType::find($test);
        if($result) {
            $user->favoriteBookType()->associate($result);
        }

        $user->first_name = $request->get('firstname');
        $user->last_name = $request->get('lastname');
        $user->save();
        return $user;
    });

    /**
     * Exchange management
     */
    $router->get('exchanges', [
        'uses' => '\Books\Http\Controllers\BookExchangeController@allExchanges',
    ]);

    $router->get('exchanges/current', [
        'uses' => '\Books\Http\Controllers\BookExchangeController@currentExchange',
    ]);

    $router->get('exchanges/previous', [
        'uses' => '\Books\Http\Controllers\BookExchangeController@previousExchange',
    ]);

    /**
     * Participation management
     */
    $router->get('participation/current', [
        'uses' => '\Books\Http\Controllers\ParticipationController@getUsesCurrentExchangeParticipation',
    ]);

});