<?php

use App\Post;

Route::get('/', function () {
	$posts = Post::latest('published_at')->get();

	return view('welcome', compact('posts'));
});

Route::get('posts', function () {
	return Post::all();
});

Route::get('admin', function () {
	return view('admin.dashboard');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// if ($options['register'] ?? true) {
// 	Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// 	Route::post('register', 'Auth\RegisterController@register');
// }

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');