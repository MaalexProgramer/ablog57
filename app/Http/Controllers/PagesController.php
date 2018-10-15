<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function home()
  {
    $posts = Post::published()->get();    //Query scopes --> Modelo

	  return view('welcome', compact('posts'));
  }
}