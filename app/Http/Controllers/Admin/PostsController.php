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
    //return $request->all();
    $post = new Post;
    $post->title = $request->get('title');
    $post->body = $request->get('body');
    $post->excerpt = $request->get('excerpt');
    $post->published_at = Carbon::parse($request->get('published_at'));
    $post->category_id = $request->get('category_id');
    $post->save();
    $post->tags()->attach($request->get('tags'));

    return back()->with('flash', 'Su publicación ha sido creada');

    //$post = Post::create( $request->all() );
    //return redirect()->route('admin.posts.index');
  }

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
  public function edit($id)
  {
      //
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