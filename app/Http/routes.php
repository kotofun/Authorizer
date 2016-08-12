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

$app->get('/', [
    'as' => 'auth.login.get',
    'uses' => 'AuthController@login',
]);

$app->post('/', [
    'as' => 'auth.login.post',
    'uses' => 'AuthController@login',
]);

$app->get('register', [
    'as' => 'auth.register.show',
    'uses' => 'AuthController@showRegister',
]);

$app->post('register', [
    'as' => 'auth.register.create',
    'uses' => 'AuthController@register',
]);

$app->group([
    'prefix' => 'socialize',
    'namespace' => 'App\Http\Controllers',
], function () use ($app) {
    $app->get('{provider}', [
        'as' => 'socialize.request',
        'uses' => 'AuthController@request',
    ]);

    $app->get('{provider}/handle', [
        'as' => 'socialize.handle',
        'uses' => 'AuthController@handle',
    ]);
});
