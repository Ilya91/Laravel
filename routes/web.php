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

Route::get('/login', function () {
    return view('welcome');
});
Route::get('/concerts/{id}', 'ConcertsController@show');
Route::get('/learn', 'LearnController@index')->name('learn');

// Registration Routes...
/*Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');*/

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home/authorized-clients', 'HomeController@getAuthorizedClients')->name('authorized-clients');
Route::get('/home/my-clients', 'HomeController@getClients')->name('personal-clients');
Route::get('/home/my-tokens', 'HomeController@getTokens')->name('personal-tokens');
Route::get('/home', 'HomeController@index');

Route::get('/', function() {
    \App\Jobs\ProcessPodcast::dispatch('test')->delay(now()->addMinutes(1));
    return view('welcome');
})->middleware('guest')->name('home');

Route::get('/redis', function() {
    var_dump(app()->make('redis'));
})->name('redis');

Route::get('/blog', 'Blog\BlogController@index')->name('blog');
Route::get('/blog/article/{id}', 'Blog\BlogController@article')->name('article');
Route::get('/blog/categories', 'Blog\BlogController@categories')->name('categories');
Route::get('/blog/tag/{tag}', 'Blog\BlogController@tag')->name('tag');

Route::get('/publish', function() {
    Redis::publish('channel', json_encode(['foo' => 'bar']));
});
