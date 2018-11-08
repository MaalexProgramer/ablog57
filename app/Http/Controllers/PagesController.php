<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function home()
  {
		//$query = Post::with(['category', 'tags', 'owner', 'photos'])->published();    	//Query scopes --> Modelo
		$query = Post::published();    	//scopePublished($query) con with --> Modelo

		if (request('month')) {
			$query->whereMonth('published_at', request('month'));
		}

		if (request('year')) {
			$query->whereYear('published_at', request('year'));
		}

    $posts = $query->paginate();

	  return view('pages.home', compact('posts'));
  }

	public function about()
	{
			return view('pages.about');
	}

	public function archive()
	{
			//return Post::selectRaw('monthname(published_at)')->groupBy('published_at')->get();
/* 			return Post::selectRaw('year(published_at)')
									->selectRaw('month(published_at)')
									->groupBy('year(published_at)', 'month(published_at)')
									->get(); */

/* 			$archive = Post::selectRaw('year(published_at) year')
							->selectRaw('monthname(published_at) month')
							->selectRaw('count(*) posts')
							->groupBy('year', 'month')
							->orderBy('published_at')
							->get(); */

			//\DB::statement("SET lc_time_names = 'es_ES'");		//AppServiceProvider

/* 			$archive = Post::selectRaw('year(published_at) year')
										->selectRaw('month(published_at) month')
										->selectRaw('monthname(published_at) monthname')
										->selectRaw('count(*) posts')
										->groupBy('year', 'month', 'monthname')
										->orderBy('published_at')
										->get(); */

			$archive = Post::published()->byYearAndMonth()->get();				//scopes --> Modelo

			return view('pages.archive', [
				'authors' 	 => User::latest()->take(4)->get(),
				'categories' => Category::take(7)->get(),
				'posts' 		 => Post::latest('published_at')->take(5)->get(),
				'archive'		 => $archive
			]);
	}

	public function contact()
	{
			return view('pages.contact');
	}
}