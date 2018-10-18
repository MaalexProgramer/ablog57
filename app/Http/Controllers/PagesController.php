<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function home()
  {
    $posts = Post::published()->paginate(2);    //Query scopes --> Modelo

	  return view('pages.home', compact('posts'));
  }

	public function about()
	{
			return view('pages.about');
	}

	public function archive()
	{
/* 			$archive =  Post::selectRaw('year(published_at) year')
							->selectRaw('monthname(published_at) month')
							->selectRaw('count(*) posts')
							->groupBy('year', 'month')
							->orderBy('published_at')
							->get(); */

			return view('pages.archive');
	}

	public function contact()
	{
			return view('pages.contact');
	}
}