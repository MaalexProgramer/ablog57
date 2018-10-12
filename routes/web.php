<?php

use App\Post;

Route::get('/', function () {
  $posts = Post::latest('published_at')->get();

  return view('welcome', compact('posts'));
});

Route::get('posts', function () {
  return Post::all();
});