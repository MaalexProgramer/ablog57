<?php

namespace App;

use App\Photo;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'title', 'body', 'iframe', 'excerpt', 'published_at', 'category_id'
	];

  protected $dates = ['published_at'];

	protected static function boot()
	{
		parent::boot();

		/**
		 * Al eliminar un Post, eliminar todas las etiquetas asociadas y
		 * eliminar todas las fotos
		 */
		static::deleting(function($post){
				$post->tags()->detach();
				$post->photos->each->delete();
		});
	}

  public function getRouteKeyName()
  {
    return 'url';
	}

	public function category()  // $post->category->name
	{
		return $this->belongsTo(Category::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}

	// Un Post podrÔøΩ tener varias fotos
	public function photos()
	{
		return $this->hasMany(Photo::class);
	}

	public function scopePublished($query)
	{
		$query->whereNotNull('published_at')
					->where('published_at', '<=', Carbon::now())
					->latest('published_at');
	}

	public static function create(array $attributes = [])
	{
			$post = static::query()->create($attributes);

			$post->generateUrl();

			return $post;
	}

	public function generateUrl()
	{
			$url = str_slug($this->title);

			if ($this->whereUrl($url)->exists())
			{
					$url = "{$url}-{$this->id}";
			}

			$this->url = $url;

			$this->save();
	}

	public function setPublishedAtAttribute($published_at)
	{
		$this->attributes['published_at'] = $published_at ? Carbon::parse($published_at) : null;
	}

	public function setCategoryIdAttribute($category)
	{
		$this->attributes['category_id'] = Category::find($category)
																				? $category
																				: Category::create(['name' => $category])->id;
	}

	public function syncTags($tags)
	{
			$tagIds = collect($tags)->map(function($tag){
					return Tag::find($tag) ? $tag : Tag::create(['name' => $tag])->id;
			});

			return $this->tags()->sync($tagIds);
	}

	public function isPublished()
	{
		return ! is_null($this->published_at) && $this->published_at < today();
	}
}