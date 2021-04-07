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
Route::get('/hello', 'App\Http\Controllers\TestController@index')->name('test');
Route::get('/about', 'App\Http\Controllers\AboutController@index')->name('about');
Route::get('/contact', 'App\Http\Controllers\ContactController@index');
Route::get('/home', 'App\Http\Controllers\HomeController@index');
// Route::resource('profiles', 'App\Http\Controllers\ProfileController');

Route::get('profiles', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
Route::get('profiles/{id}', 'App\Http\Controllers\ProfileController@show')->name('profile.show');

Route::redirect('old-about', 'about');

Route::namespace('App\Http\Controllers\Admin')->prefix('admin')->group (function(){
        Route::get('', 'DashboardController')->name('index');
        Route::get('posts/trashed', 'PostController@trashed')->name('posts.trashed');
        Route::post('posts/restore/{id}', 'PostController@restore')->name('posts.restore');
        Route::delete('posts/force/{id}', 'PostController@force')->name('posts.force');
        Route::delete('posts/multidelete', 'PostController@multiDelete')->name('posts.multidelete');

        Route::get('categories/trashed', 'CategoryController@trashed')->name('categories.trashed');
        Route::post('categories/restore/{id}', 'CategoryController@restore')->name('categories.restore');
        Route::delete('categories/force/{id}', 'CategoryController@force')->name('categories.force');

        Route::get('users/trashed', 'UserController@trashed')->name('users.trashed');
        Route::post('users/restore/{id}', 'UserController@restore')->name('users.restore');
        Route::delete('users/force/{id}', 'UserController@force')->name('users.force');        
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('users', 'UserController');
        Route::resource('tags', 'TagController');
});

Route::group(['prefix' => 'blog', 'as' => 'blog.', 'namespace' => 'App\Http\Controllers'], function () {
    Route::get('', 'BlogController@index')->name('index');
    Route::get('/{slug}', 'BlogController@show')->name('show');
    Route::get('user/{id}', 'BlogController@postsByUser')->name('user');
    Route::get('category/{id}', 'BlogController@postsByCategory')->name('category');
    Route::get('like/{id}', 'BlogController@like')->name('like');
});

// and of resource  and starts of fallback

Route::fallback(function(){
    return "<h2>ooops... It;s a pity</h2>";
});