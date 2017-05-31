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

$api = app('Dingo\Api\Routing\Router');



$params = [
	'version' => 'v1',
	'namespace' => 'App\V1\Controllers',
];

$api->group($params, function($api){

	$api->get('/check', function (){
    	$res['api'] = "Project Api";
    	$res['ver'] = "v.1.0";
    	return $res;
	});

	$api->post('/register', 'UsersController@create');

	$api->post('/login', 'UsersController@login');

});

