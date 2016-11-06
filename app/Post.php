<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Post extends Model
{
	protected $fillable = [
		'user_id', 'category_id', 'photo_id', 'title', 'body'
	];

	public function user() {
		return $this->belongsTo('App\User');
	}

	public function category() {
		return $this->belongsTo('App\Category');		
	}

	public function photo() {
		return $this->belongsTo('App\Photo');
	}

	#Accessor For Timestamps
	public function getCreatedAtAttribute($value) {
		return Carbon::parse($value)->diffForHumans();
	}

	public function getUpdatedAtAttribute($value) {
		return Carbon::parse($value)->diffForHumans();
	}	

}
