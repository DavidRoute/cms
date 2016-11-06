<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Category extends Model
{
    protected $fillable = ['name'];

    public function posts() {
    	return $this->hasMany('App\Post');
    }

    #For Timestamps
    public function getCreatedAtAttribute($value) {
    	return Carbon::parse($value)->diffForHumans();
    }

    public function getUpdatedAtAttribute($value) {
    	return Carbon::parse($value)->diffForHumans();
    }
}
