<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('/',function (){
	return view('welcome');
});

Route::get('/commentPage','Comment\CommentController@index');
Route::get('/editComment','Comment\EditorController@index');
Route::get('/self/basic','User\UserController@index');
Route::post('/editComment/upload','Comment\EditorController@uploadImage');
Route::post('/editComment/publish','Comment\EditorController@publishComment');
Auth::routes();


