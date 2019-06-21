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



Auth::routes();






Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'users'],function (){
    Route::get('/create','UserController@viewform');
    Route::get('/read','UserController@allusers');
//    Route::get('/read/jobs','UserController@allusers');
    Route::get('/update/{user}','UserController@update');
    Route::get('/delete/{id}','UserController@deleteUser');
    Route::post('/store','UserController@store');
    Route::get('/data','UserController@data');
    Route::get('/records','UserController@userRecords');
    Route::get('/records-data','UserController@userRecordsData');
//    Route::get('/','UserController@userRecordsData');

});

Route::group(['prefix'=>'jobs'],function (){
    Route::get('/create','UserController@viewJobForm');
    Route::post('/store','UserController@storeJob');
    Route::get('/update/{job}','UserController@updateJob');
    Route::get('/data/{id}','UserController@jobData');
    Route::get('/read/{id}','UserController@viewJobs');
    Route::get('/delete/{id}','UserController@deleteJob');
    Route::get('/deleteTask/{id}','UserController@deleteTask');
    Route::get('/updateTask/{task}','UserController@updateTask');



});


Route::get('/jobs',function(){
   return view('users.jobs') ;
});

Route::get('/manager-index',function(){
    return view('manager.index') ;
});
//Route::get('/manager-view-users',function(){
//    return view('manager.all-users') ;
//});


Route::get('/admin-index',function(){
    return view('admin.index') ;
});



Route::get('/admin-all-user-records',function(){
    return view('admin.users-jobs') ;
});


Route::get('/', function () {
    return view('auth.login');
});


