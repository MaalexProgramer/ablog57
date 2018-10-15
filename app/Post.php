<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $guarded = [];
  
  protected $dates = ['published_at'];

  public function category()  // $post->category->name
  {
    return $this->belongsTo(Category::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}
}