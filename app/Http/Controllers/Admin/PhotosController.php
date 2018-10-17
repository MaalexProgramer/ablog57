<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
	public function store(Post $post)
	{
		$this->validate(request(), [
			'photo' => 'required|image|max:2048'
		]);

		$photo = request()->file('photo')->store('public');		//storage/public

		Photo::create([
			'url'			=> Storage::url($photo),
			'post_id' => $post->id
		]);
	}

  public function destroy(Photo $photo)
  {
    $photo->delete();
    $photoPath = str_replace('storage', 'public', $photo->url);
    Storage::delete($photoPath);

    return back()->with('success', 'Foto eliminada');
  }
}