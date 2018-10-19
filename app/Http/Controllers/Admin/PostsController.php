<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

class PostsController extends Controller
{
  public function index()
  {
    //$posts = Post::all();
		//$posts = Post::where('user_id', auth()->id())->get();
		//$posts = auth()->user()->posts;

		$posts = Post::allowed()->get();

    return view('admin.posts.index', compact('posts'));
	}

/* 	public function create()
	{
		$categories = Category::all();
		$tags = Tag::all();

		return view('admin.posts.create', compact('categories', 'tags'));
	} */

	public function store(Request $request)
	{
		$this->authorize('create', new Post);

		$this->validate($request, ['title' => 'required|min:3']);

		//$post = Post::create($request->only('title'));			// Modelo create()
/* 		$post = Post::create([
			'title'	=> $request->get('title'),
			'user_id'	=> auth()->id()
		]); */
		$post = Post::create($request->all());

		return redirect()->route('admin.posts.edit', $post);
	}

	public function edit(Post $post)
	{
		$this->authorize('view', $post);

/* 		$categories = Category::all();
		$tags = Tag::all(); */

		return view('admin.posts.edit', [
				'post'	=> $post,
				'tags'	=> Tag::all(),
				'categories'	=> Category::all()
		]);
	}

	public function update(Post $post, StorePostRequest $request)
	{
		$this->authorize('update', $post);

/* 		$post->title = $request->get('title');
		$post->body = $request->get('body');
		$post->iframe = $request->get('iframe');
		$post->excerpt = $request->get('excerpt');
		$post->published_at = $request->get('published_at');	//Modelo setPublishedAtAttribute

		//Crear Categorías y Etiquetas en el formulario de los Posts
		$post->category_id = $request->get('category_id');				//Modelo setCategoryIdAttribute
		$post->save(); */

		$post->update($request->all());

/* 		$tags = [];

		//Etiquetas que se reciben
		foreach ($request->get('tags') as $tag)
		{
			//Guardar los id's de las Etiquetas
			$tags[] = Tag::find($tag)
									? $tag
									: Tag::create(['name' => $tag])->id;
		} */

		//$post->tags()->attach($request->get('tags'));
		//$post->tags()->sync($request->get('tags'));
		// Sincronizar las Etiquetas envias en el formulario

		// Reorganizar el código
		$post->syncTags($request->get('tags'));						//Modelo syncTags

		return redirect()
				->route('admin.posts.edit', $post)
				->with('success', 'La publicación ha sido guardada');
	}

	public function destroy(Post $post)
	{
		$this->authorize('delete', $post);

		// Quitar todas las etiquetas asociadas al Post - Pasa al Modelo Post
/* 		$post->tags()->detach();
		$post->photos->each->delete(); */

		//$this->authorize('delete', $post);

		$post->delete();

		return redirect()
				->route('admin.posts.index')
				->with('danger', 'La publicaciÔøΩn ha sido eliminada');
	}
}