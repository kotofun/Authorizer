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

$app->get('/', 'UIController@index');

$app->get('register', [
    'as' => 'auth.register.show',
    'uses' => 'UIController@showRegister',
]);

$app->post('register', [
    'as' => 'auth.register.create',
    'uses' => 'UIController@register',
]);

$app->group([
    'prefix' => 'socialize',
    'namespace' => 'App\Http\Controllers',
], function () use ($app) {
    $app->get('{provider}', [
        'as' => 'socialize.request',
        'uses' => 'SocializeController@request',
    ]);

    $app->get('{provider}/handle', [
        'as' => 'socialize.handle',
        'uses' => 'SocializeController@handle',
    ]);
});
