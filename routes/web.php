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

Route::get('/', 'FeedController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('user.follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings', 'UsersController@followings')->name('users.followings');
        Route::get('followers', 'UsersController@followers')->name('users.followers');
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
        Route::get('category_followings', 'UsersController@category_followings')->name('users.followings');        
    });
    
    Route::group(['prefix' => 'questions/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    
    Route::group(['prefix' => 'categories/{id}'], function () {
        Route::post('category_follow', 'CategoryFollowController@store')->name('categories.follow');
        Route::delete('category_unfollow', 'CategoryFollowController@destroy')->name('categories.unfollow');
    });
    
    Route::resource('feed', 'FeedController', ['only' => ['index']]);
    Route::group(['prefix' => 'feed'], function () {
        Route::get('new', 'FeedController@new')->name('feed.new');
        Route::get('follow', 'FeedController@follow')->name('feed.follow');
    });
    
    Route::resource('answers', 'AnswersController', ['only' => ['store']]);
    
    Route::resource('questions', 'QuestionsController', ['only' => ['store', 'create', 'show']]);    

    Route::get('category', 'QuestionsController@category')->name('category.show');
});