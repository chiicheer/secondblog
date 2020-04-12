<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('post','PostController');
//Route::resource('post','PostController')->middleware('auth');

Route::get('/trashed-posts',[
	'uses' => 'PostController@trashed', //←今までの書き方と指示は一緒。もう1つの書き方。
	'as' => 'post.trashed'
]);

Route::get('/restore-post/{id}',[
	'uses' => 'PostController@restore',
	'as' => 'post.restore'
]);

Route::delete('/kill-post/{id}',[
	'uses' => 'PostController@kill',
	'as' => 'post.kill'
]);

Route::get('/category/index',[
	'uses' => 'CategoryController@index',
	'as' => 'category.index'
]);

Route::get('/category/create',[
	'uses' => 'CategoryController@create',
	'as ' => 'category.create'
]);

Route::post('/category/store',[
	'uses' => 'CategoryController@store',
	'as' => 'category.store'
]);

Route::get('/settings',[
  	'uses' => 'SettingController@index',
  	'as' => 'setting.index'
]);

Route::post('/settings/update',[
	'uses' => 'SettingController@update',
	'as' => 'setting.update'
]);