<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function home()
  {
    $posts = Post::published()->paginate(2);    //Query scopes --> Modelo

	  return view('welcome', compact('posts'));
  }
}