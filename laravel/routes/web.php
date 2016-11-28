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
Route::get('/self/basic/modify','User\UserController@modify');
Route::get('/info','User\UserController@info');
Route::get('/self/sports','User\SportsController@index');
Route::get('/contest/createContest','Contest\ContestController@create');
Route::get('/contest/showContest','Contest\ContestController@showContest');
Route::get('/analyze/dataAnalyze','analyze\DataController@dataAnalyze');


Route::post('/editComment/upload','Comment\EditorController@uploadImage');
Route::post('/editComment/publish','Comment\EditorController@publishComment');
Route::post('/self/basic/modify','User\UserController@update');
Route::post('/self/basic/add','User\UserController@add');
Route::post('/contest/create','Contest\ContestController@newContest');
Route::post('/contest/finish','Contest\ContestController@finishContest');
Route::post('/contest/join','Contest\ContestController@joinContest');

Auth::routes();


