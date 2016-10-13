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

$app->get('/', function () use ($app) {
    return redirect()->route('help.get');
});

$app->group(['namespace' => 'App\Http\Controllers'], function () use ($app) {
    $app->get('socialize/{provider}', ['uses' => 'SocialiteController@request', 'as' => 'socialize.request']);
    $app->get('socialize/{provider}/handle', ['uses' => 'SocialiteController@handle', 'as' => 'socialize.handle']);
});

$app->group(['middleware' => [], 'namespace' => '\App\Http\Controllers'], function () use ($app) {
    $app->get('help', ['uses' => 'HelpController@index', 'as' => 'help.get']);
    $app->post('help', ['uses' => 'HelpController@index', 'as' => 'help.post']);
});

$app->group(['middleware' => ['jwt-auth'], 'namespace' => '\App\Http\Controllers'], function () use ($app) {
    $app->get('user', ['uses' => 'UserController@index', 'as' => 'users.list.get']);
});
