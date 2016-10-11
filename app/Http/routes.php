<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['middleware' => ['token.refresh'], 'namespace' => '\App\Http\Controllers'], function () use ($app) {
    $app->get('/', ['uses' => 'AuthController@login', 'as' => 'auth.login.get']);
    $app->post('/', ['uses' => 'AuthController@login', 'as' => 'auth.login.post']);

    $app->get('register', ['uses' => 'AuthController@register', 'as' => 'auth.register.get']);
    $app->post('register', ['uses' => 'AuthController@register', 'as' => 'auth.register.post']);

    $app->group(['namespace' => 'App\Http\Controllers'], function () use ($app) {
        $app->get('socialize/{provider}', ['uses' => 'SocialiteController@request', 'as' => 'socialize.request']);
        $app->get('socialize/{provider}/handle', ['uses' => 'SocialiteController@handle', 'as' => 'socialize.handle']);
    });
});

$app->group(['namespace' => '\App\Http\Controllers'], function () use ($app) {
    $app->post('token/refresh', ['uses' => 'TokenController@refresh', 'as' => 'token.update']);
});
