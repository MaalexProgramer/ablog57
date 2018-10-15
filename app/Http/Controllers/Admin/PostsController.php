<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
  public function index()
  {
    $posts = Post::all();

    return view('admin.posts.index', compact('posts'));
  }
  
  public function create()
  {
    $categories = Category::all();
    $tags = Tag::all();

    return view('admin.posts.create', compact('categories', 'tags'));
  }
  
  public function store(Request $request)
  {
    $this->validate($request, ['title' => 'required']);

    $post = Post::create([
      'title' => $request->get('title'),
      'url' => str_slug($request->get('title'))
    ]);

    return redirect()->route('admin.posts.edit', $post);
  }
  
  /* public function store(Request $request)
  {
    $this->validate($request, [
      'title'    => 'required',
      'body'     => 'required',
      'category_id' => 'required',
      'excerpt'  => 'required',
      'tags'     => 'required'
    ]);

    $post = new Post;
    $post->title = $request->get('title');
    $post->url = str_slug($request->get('title'));
    $post->body = $request->get('body');
    $post->excerpt = $request->get('excerpt');
    $post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null;
    $post->category_id = $request->get('category_id');
    $post->save();
    $post->tags()->attach($request->get('tags'));

    return back()->with('flash', 'Su publicación ha sido creada');

    //$post = Post::create( $request->all() );
    //return redirect()->route('admin.posts.index');
  } */

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit(Post $post)
  {
    return view('admin.posts.edit', compact('post'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
      //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }
}