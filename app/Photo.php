<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Photo extends Model
{
	protected $guarded = [];
	
	protected static function boot()
	{
			parent::boot();

			// Cada vez que se elimine una foto, eliminarla del directio public
			static::deleting(function($photo){
					Storage::disk('public')->delete($photo->url);
			});
	}
}