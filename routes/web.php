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

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


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

Route::resource('setting','SettingController');

Route::resource('category','CategoryController');

Route::resource('users','UsersController');

Route::resource('profile','ProfileController');

Route::get('/user/profile',[
        'uses' => 'ProfileController@index',
        'as' => 'user.profile'
    ]);

Route::post('/user/profile/update',[
        'uses' => 'ProfileController@update',
        'as' => 'user.profile.update'
    ]);

Route::resource('tag','TagController');

