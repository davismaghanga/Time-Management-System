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
Route::group(["namespace"=>"Api"],function (){
    Route::post('login', 'LoginController@login');
    Route::post('register', 'RegisterController@register');

    Route::group(['middleware'=>'auth:api'],function (){
        Route::post('createTask','TaskController@createTask');
        Route::get('getUsers','UserController@getUsers');
        Route::get('viewMyTasks/{id}','TaskController@viewMyTasks');
        Route::get('deleteTask/{id}','TaskController@deleteTask');
        Route::post('updateTask/{id}','TaskController@updateTask');
        Route::post('storeUser','UserController@storeUser');
        Route::get('deleteUser/{id}','UserController@deleteUser');
        Route::post('updateUser/{id}','UserController@updateUser');
    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
