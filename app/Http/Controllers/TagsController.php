<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
	public function show(Tag $tag)
	{
		return view('pages.home', [
			'title' => "Publicaciones de la Etiqueta '{$tag->name}'",
			'posts' => $tag->posts()->published()->paginate()
		]);
	}
}